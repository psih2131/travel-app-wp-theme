<?php
/**
 * REST API: эндпоинт смены пароля (только для авторизованных).
 *
 * POST /wp-json/custom-endpoints/v1/change-password
 */

defined( 'ABSPATH' ) || exit;

add_action( 'rest_api_init', function () {
    register_rest_route( 'custom-endpoints/v1', '/change-password', array(
        'methods'             => 'POST',
        'callback'            => 'travel_change_password',
        'permission_callback'  => 'is_user_logged_in',
        'args'                => array(
            'current_password'    => array(
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => function ( $v ) { return $v; },
            ),
            'new_password'        => array(
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => function ( $v ) { return $v; },
            ),
            'new_password_repeat'  => array(
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => function ( $v ) { return $v; },
            ),
        ),
    ) );
} );

function travel_change_password( $request ) {
    $current = $request->get_param( 'current_password' );
    $new     = $request->get_param( 'new_password' );
    $repeat  = $request->get_param( 'new_password_repeat' );

    $user = wp_get_current_user();
    if ( ! $user->ID ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Вы не авторизованы.',
        ), 401 );
    }

    if ( ! wp_check_password( $current, $user->user_pass, $user->ID ) ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Неверный текущий пароль.',
        ), 400 );
    }

    $min_length = 6;
    if ( strlen( $new ) < $min_length ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Новый пароль должен быть не короче ' . $min_length . ' символов.',
        ), 400 );
    }

    if ( $new !== $repeat ) {
        return new WP_REST_Response( array(
            'success' => false,
            'message' => 'Пароли не совпадают.',
        ), 400 );
    }

    wp_set_password( $new, $user->ID );

    wp_set_current_user( $user->ID );
    wp_set_auth_cookie( $user->ID, true );

    return new WP_REST_Response( array(
        'success' => true,
        'message' => 'Пароль успешно изменён.',
    ), 200 );
}
