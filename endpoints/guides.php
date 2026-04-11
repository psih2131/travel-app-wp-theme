<?php
/**
 * REST API: гиды (роль guide), фильтр по ACF napravlenie_raboty_gida (таксономия direction).
 *
 * GET /wp-json/custom-endpoints/v1/guides?per_page=12&page=1&direction=0
 * GET /wp-json/custom-endpoints/v1/guides-filters — направления и счётчики гидов
 */

defined( 'ABSPATH' ) || exit;

/**
 * ID терминов direction из ACF поля napravlenie_raboty_gida у пользователя.
 *
 * @param int $user_id ID пользователя.
 * @return int[]
 */
function travel_get_user_napravlenie_raboty_term_ids( $user_id ) {
	$ids = array();
	$user_id = (int) $user_id;
	if ( $user_id < 1 || ! function_exists( 'get_field' ) ) {
		return $ids;
	}

	$field = get_field( 'napravlenie_raboty_gida', 'user_' . $user_id );
	if ( empty( $field ) && $field !== '0' && $field !== 0 ) {
		return $ids;
	}

	if ( is_numeric( $field ) ) {
		return array( (int) $field );
	}

	if ( is_object( $field ) && isset( $field->term_id ) ) {
		return array( (int) $field->term_id );
	}

	if ( ! is_array( $field ) ) {
		return $ids;
	}

	foreach ( $field as $item ) {
		if ( is_numeric( $item ) ) {
			$ids[] = (int) $item;
		} elseif ( is_object( $item ) && isset( $item->term_id ) ) {
			$ids[] = (int) $item->term_id;
		} elseif ( is_array( $item ) && ! empty( $item['term_id'] ) ) {
			$ids[] = (int) $item['term_id'];
		}
	}

	return array_values( array_unique( array_filter( $ids ) ) );
}

/**
 * Подходит ли гид под выбранный термин direction (точное совпадение или родитель/потомок).
 *
 * @param int $user_id         ID пользователя.
 * @param int $filter_term_id  term_id направления; 0 — без фильтра (все).
 * @return bool
 */
function travel_guide_matches_direction_term( $user_id, $filter_term_id ) {
	$filter_term_id = (int) $filter_term_id;
	if ( $filter_term_id <= 0 ) {
		return true;
	}

	$term = get_term( $filter_term_id, 'direction' );
	if ( ! $term || is_wp_error( $term ) ) {
		return true;
	}

	$assigned = travel_get_user_napravlenie_raboty_term_ids( $user_id );
	if ( empty( $assigned ) ) {
		return false;
	}

	$ancestors_filter = get_ancestors( $filter_term_id, 'direction', 'taxonomy' );

	foreach ( $assigned as $tid ) {
		$tid = (int) $tid;
		if ( $tid === $filter_term_id ) {
			return true;
		}
		if ( in_array( $tid, $ancestors_filter, true ) ) {
			return true;
		}
		$ancestors_assigned = get_ancestors( $tid, 'direction', 'taxonomy' );
		if ( in_array( $filter_term_id, $ancestors_assigned, true ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Все пользователи с ролью guide, отсортированные по display_name.
 *
 * @return WP_User[]
 */
function travel_get_all_guide_users_sorted() {
	return get_users(
		array(
			'role'    => 'guide',
			'orderby' => 'display_name',
			'order'   => 'ASC',
			'fields'  => 'all',
		)
	);
}

/**
 * Карточка гида для REST (совместимо с GuideSec + страница гидов).
 *
 * @param WP_User $user Пользователь.
 * @return array
 */
function travel_rest_guide_user_to_item( WP_User $user ) {
	$user_id      = $user->ID;
	$guide_url    = get_author_posts_url( $user_id );
	$display_name = $user->display_name ?: $user->user_login;

	$img_url = '';
	if ( function_exists( 'get_field' ) ) {
		$avatar = get_field( 'foto_gida', 'user_' . $user_id );
		if ( is_array( $avatar ) && ! empty( $avatar['url'] ) ) {
			$img_url = $avatar['url'];
		} elseif ( is_numeric( $avatar ) ) {
			$url = wp_get_attachment_image_url( (int) $avatar, 'full' );
			if ( $url ) {
				$img_url = $url;
			}
		} elseif ( is_string( $avatar ) && $avatar !== '' ) {
			$img_url = $avatar;
		}
	}
	if ( empty( $img_url ) ) {
		$img_url = get_template_directory_uri() . '/assets/image-default/user-image-default.jpg';
	}

	$rejting    = '5.0';
	$otzyvy     = '0';
	$opisanie   = '';
	$profession = '';
	if ( function_exists( 'get_field' ) ) {
		$rejting    = get_field( 'rejting', 'user_' . $user_id ) ?: '5.0';
		$otzyvy     = get_field( 'kolichestvo_otzyvov', 'user_' . $user_id ) ?: '0';
		$opisanie   = get_field( 'korotkoe_opisanie_gida', 'user_' . $user_id ) ?: get_field( 'o_sebe', 'user_' . $user_id );
		$profession = get_field( 'korotko_speczializacziya_gida', 'user_' . $user_id );
	}
	if ( empty( $opisanie ) && ! empty( $user->description ) ) {
		$opisanie = $user->description;
	}

	$desc_plain = is_string( $opisanie ) ? wp_strip_all_tags( $opisanie ) : '';
	$desc_trim  = $desc_plain ? wp_trim_words( $desc_plain, 25 ) : '';

	return array(
		'id'            => $user_id,
		'url'           => $guide_url,
		'img'           => $img_url,
		'name'          => $display_name,
		'profession'    => is_string( $profession ) ? $profession : '',
		'rate'          => $rejting,
		'reviews'       => $otzyvy . ' отзывов',
		'desc'          => $desc_trim,
		'direction_ids' => travel_get_user_napravlenie_raboty_term_ids( $user_id ),
	);
}

add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'custom-endpoints/v1',
			'/guides',
			array(
				'methods'             => 'GET',
				'callback'            => 'travel_rest_get_guides',
				'permission_callback' => '__return_true',
				'args'                => array(
					'per_page'  => array(
						'default'           => 6,
						'sanitize_callback' => 'absint',
						'validate_callback' => function ( $v ) {
							return $v > 0 && $v <= 50;
						},
					),
					'page'      => array(
						'default'           => 1,
						'sanitize_callback' => 'absint',
						'validate_callback' => function ( $v ) {
							return $v > 0;
						},
					),
					'direction' => array(
						'default'           => 0,
						'sanitize_callback' => 'absint',
					),
				),
			)
		);

		register_rest_route(
			'custom-endpoints/v1',
			'/guides-filters',
			array(
				'methods'             => 'GET',
				'callback'            => 'travel_rest_get_guides_filters',
				'permission_callback' => '__return_true',
			)
		);
	}
);

/**
 * @param WP_REST_Request $request Запрос.
 * @return WP_REST_Response
 */
function travel_rest_get_guides( $request ) {
	$per_page = (int) $request->get_param( 'per_page' );
	$page     = (int) $request->get_param( 'page' );
	$offset   = ( $page - 1 ) * $per_page;
	$direction = (int) $request->get_param( 'direction' );

	$all = travel_get_all_guide_users_sorted();
	$filtered = array();
	foreach ( $all as $user ) {
		if ( travel_guide_matches_direction_term( $user->ID, $direction ) ) {
			$filtered[] = $user;
		}
	}

	$total = count( $filtered );
	$slice = array_slice( $filtered, $offset, $per_page );

	$items = array();
	foreach ( $slice as $user ) {
		$items[] = travel_rest_guide_user_to_item( $user );
	}

	return rest_ensure_response(
		array(
			'items' => $items,
			'total' => $total,
		)
	);
}

/**
 * Направления (direction) и число гидов по каждому; total — все гиды.
 *
 * @return WP_REST_Response
 */
function travel_rest_get_guides_filters() {
	$all = travel_get_all_guide_users_sorted();
	$total_guides = count( $all );

	$terms = get_terms(
		array(
			'taxonomy'   => 'direction',
			'hide_empty' => false,
		)
	);

	if ( is_wp_error( $terms ) || ! is_array( $terms ) ) {
		$terms = array();
	}

	$directions = array();
	foreach ( $terms as $term ) {
		$count = 0;
		foreach ( $all as $user ) {
			if ( travel_guide_matches_direction_term( $user->ID, (int) $term->term_id ) ) {
				++$count;
			}
		}
		$directions[] = array(
			'id'    => (int) $term->term_id,
			'name'  => $term->name,
			'slug'  => $term->slug,
			'count' => $count,
		);
	}

	return rest_ensure_response(
		array(
			'total'      => $total_guides,
			'directions' => $directions,
		)
	);
}
