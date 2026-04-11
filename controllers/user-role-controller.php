<?php

function registr_role_raveler() {
	$role         = 'traveler';
	$display_name = 'Путешественник';
	$capabilities = [
		'read' => true, // вход в консоль + возможность писать комментарии на сайте (при включённой настройке «Пользователи должны быть залогинены»)
	];
	add_role( $role, $display_name, $capabilities );
}

function registr_role_guide() {
	$role         = 'guide';
	$display_name = 'Гид';
	$capabilities = [
		'read' => true,
		// создание и редактирование туров (только черновики; публикация — после проверки администратором)
		'edit_tours'   => true,
		'edit_tour'    => true,
		// удаление своих туров/черновиков
		'delete_tours' => true,
		'delete_tour'  => true,
	];
	add_role( $role, $display_name, $capabilities );
}

add_action( 'init', 'registr_role_raveler' );
add_action( 'init', 'registr_role_guide' );


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