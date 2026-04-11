<?php
/**
 * REST API: эндпоинт восстановления пароля.
 *
 * POST /wp-json/custom-endpoints/v1/recovery
 * Отправляет на почту пользователя ссылку для сброса пароля (ядро WP).
 */

defined( 'ABSPATH' ) || exit;

add_action( 'rest_api_init', function () {
    register_rest_route( 'custom-endpoints/v1', '/recovery', array(
        'methods'             => 'POST',
        'callback'             => 'travel_recovery_password',
        'permission_callback'  => '__return_true',
        'args'                 => array(
            'email_or_login' => array(
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ),
        ),
    ) );
});

function travel_recovery_password( $request ) {
    $input = trim( $request->get_param( 'email_or_login' ) );

    if ( empty( $input ) ) {
        return new WP_REST_Response( array(
            'status'  => 'error',
            'message' => 'Введите email или логин.',
        ), 400 );
    }

    $user = null;
    if ( is_email( $input ) ) {
        $user = get_user_by( 'email', $input );
    }
    if ( ! $user ) {
        $user = get_user_by( 'login', $input );
    }

    if ( ! $user ) {
        return new WP_REST_Response( array(
            'status'  => 'error',
            'message' => 'Пользователь с таким email или логином не найден.',
        ), 404 );
    }

    $result = retrieve_password( $user->user_login );

    if ( is_wp_error( $result ) ) {
        $message = 'Не удалось отправить письмо. Попробуйте позже или обратитесь в поддержку.';
        if ( $result->get_error_code() === 'no_reset_key' ) {
            $message = 'Сброс пароля для этого пользователя уже запрашивался. Проверьте почту или попробуйте позже.';
        }
        return new WP_REST_Response( array(
            'status'  => 'error',
            'message' => $message,
        ), 500 );
    }

    return new WP_REST_Response( array(
        'status'  => 'success',
        'message' => 'Инструкции для сброса пароля отправлены на вашу почту.',
    ), 200 );
}
