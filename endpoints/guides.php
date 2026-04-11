<?php
/**
 * REST API: эндпоинт списка гидов (пользователи с ролью guide).
 * GET /wp-json/custom-endpoints/v1/guides?per_page=6&page=1
 */

defined( 'ABSPATH' ) || exit;

add_action( 'rest_api_init', function () {
    register_rest_route( 'custom-endpoints/v1', '/guides', array(
        'methods'             => 'GET',
        'callback'            => 'travel_rest_get_guides',
        'permission_callback' => '__return_true',
        'args'                => array(
            'per_page' => array(
                'default'           => 6,
                'sanitize_callback' => 'absint',
                'validate_callback' => function ( $v ) { return $v > 0 && $v <= 50; },
            ),
            'page' => array(
                'default'           => 1,
                'sanitize_callback' => 'absint',
                'validate_callback' => function ( $v ) { return $v > 0; },
            ),
        ),
    ) );
} );

function travel_rest_get_guides( $request ) {
    $per_page = (int) $request->get_param( 'per_page' );
    $page    = (int) $request->get_param( 'page' );
    $offset  = ( $page - 1 ) * $per_page;

    $user_args = array(
        'role'    => 'guide',
        'number'  => $per_page,
        'offset'  => $offset,
        'orderby' => 'display_name',
        'order'   => 'ASC',
    );

    $query   = new WP_User_Query( $user_args );
    $guides  = $query->get_results();
    $total   = $query->get_total();

    $items = array();
    foreach ( $guides as $user ) {
        $user_id     = $user->ID;
        $guide_url   = get_author_posts_url( $user_id );
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

        $rejting = '5.0';
        $otzyvy  = '0';
        $opisanie = '';
        if ( function_exists( 'get_field' ) ) {
            $rejting  = get_field( 'rejting', 'user_' . $user_id ) ?: '5.0';
            $otzyvy   = get_field( 'kolichestvo_otzyvov', 'user_' . $user_id ) ?: '0';
            $opisanie = get_field( 'korotkoe_opisanie_gida', 'user_' . $user_id ) ?: get_field( 'o_sebe', 'user_' . $user_id );
        }
        if ( empty( $opisanie ) && ! empty( $user->description ) ) {
            $opisanie = $user->description;
        }

        $items[] = array(
            'id'      => $user_id,
            'url'     => $guide_url,
            'img'     => $img_url,
            'name'    => $display_name,
            'rate'    => $rejting,
            'reviews' => $otzyvy . ' отзывов',
            'desc'    => $opisanie,
        );
    }

    return rest_ensure_response( array(
        'items' => $items,
        'total' => (int) $total,
    ) );
}
