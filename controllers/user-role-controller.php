<?php



/**

 * Примитивы из зарегистрированного CPT, с исключением по списку имён.

 *

 * @param string   $post_type    Slug CPT.

 * @param string[] $exclude_caps Имена прав, которые не выдавать.

 * @return array<string, bool>

 */

function travel_role_capabilities_from_cpt( $post_type, array $exclude_caps = array() ) {

	$pto = get_post_type_object( $post_type );

	if ( ! $pto || empty( $pto->cap ) ) {

		return array();

	}

	$out = array();

	foreach ( (array) $pto->cap as $cap ) {

		if ( ! is_string( $cap ) ) {

			continue;

		}

		if ( in_array( $cap, $exclude_caps, true ) ) {

			continue;

		}

		$out[ $cap ] = true;

	}

	return $out;

}



function registr_role_raveler() {

	$role         = 'traveler';

	$display_name = 'Путешественник';

	$capabilities = array_merge(

		array( 'read' => true ),

		// Бронирования: без публикации и без чужих/приватных.

		travel_role_capabilities_from_cpt(

			'tour-bookings',

			array(

				'publish_tour_bookings',

				'edit_others_tour_bookings',

				'delete_others_tour_bookings',

				'read_private_tour_bookings',

				'edit_private_tour_bookings',

				'delete_private_tour_bookings',

			)

		)

	);

	travel_register_or_merge_role_caps( $role, $display_name, $capabilities );

}



function registr_role_guide() {

	$role         = 'guide';

	$display_name = 'Гид';

	$capabilities = array_merge(

		array( 'read' => true ),

		// Чтение данных пользователей с ролью traveler (проверка: current_user_can( 'read_traveler_users' )).
		// Не тянуть list_users — иначе откроется весь список в админке и /wp/v2/users.

		array( 'read_traveler_users' => true ),

		// Туры: только свои (без others / private).

		travel_role_capabilities_from_cpt(

			'tours',

			array(

				'edit_others_tours',

				'delete_others_tours',

				'read_private_tours',

				'edit_private_tours',

				'delete_private_tours',
				

			)

		),

		// Бронирования: полный набор (в т.ч. чужие заявки).

		travel_role_capabilities_from_cpt( 'tour-bookings', array() ),

		// Правка броней (CPT `capability_type` => tour_booking / tour_bookings): явно, если merge по CPT не подтянул.
		array(
			'edit_tour_booking'              => true,

			'edit_tour_bookings'            => true,

			'edit_others_tour_bookings'     => true,

			'edit_published_tour_bookings'  => true,
			
			'edit_private_tour_bookings'    => true,
		)

	);

	travel_register_or_merge_role_caps( $role, $display_name, $capabilities );

}



/**

 * Создаёт роль или дописывает права существующей.

 *

 * @param string               $role_slug    Slug роли.

 * @param string               $display_name Отображаемое имя.

 * @param array<string, bool> $capabilities Права.

 */

function travel_register_or_merge_role_caps( $role_slug, $display_name, array $capabilities ) {

	$existing = get_role( $role_slug );

	if ( ! $existing ) {

		add_role( $role_slug, $display_name, $capabilities );

		return;

	}

	foreach ( $capabilities as $cap => $grant ) {

		if ( $grant ) {

			$existing->add_cap( $cap );

		}

	}

}



add_action( 'init', 'registr_role_raveler', 11 );

add_action( 'init', 'registr_role_guide', 11 );



/**

 * Скрыть админ-бар (полоску сверху) для ролей «Путешественник» и «Гид».

 */

function travel_hide_admin_bar_for_roles( $show ) {

	if ( ! is_user_logged_in() ) {

		return $show;

	}

	$user = wp_get_current_user();

	if ( in_array( 'traveler', (array) $user->roles, true ) || in_array( 'guide', (array) $user->roles, true ) ) {

		return false;

	}

	return $show;

}

add_filter( 'show_admin_bar', 'travel_hide_admin_bar_for_roles' );

