<?php
/**
 * REST API: эндпоинт авторизации пользователя.
 *
 * POST /wp-json/custom-endpoints/v1/login
 */

defined( 'ABSPATH' ) || exit;


//POST-эндпоинт
add_action('rest_api_init', function () {
    register_rest_route('custom-endpoints/v1', '/login', array(
        'methods' => 'POST',
        'callback' => 'travel_login_user',
        'permission_callback' => '__return_true',
        'args' => array(

            'username' => array(
                'required' => true,
                'type'     => 'string',
                'sanitize_callback' => 'sanitize_text_field',
            ),

            'password' => array(
                'required' => true,
                'type'     => 'string',
            ),

            'remember' => array(
                'required' => false,
                'type'     => 'boolean',
                'default'  => false,
            ),

        ),
    ));
});


function travel_login_user( $request ) {
	$username  = $request->get_param( 'username' );
	$password  = $request->get_param( 'password' );
	$remember  = (bool) $request->get_param( 'remember' );

	if ( is_email( $username ) ) {
		$user = get_user_by( 'email', $username );
		if ( $user ) {
			$username = $user->user_login;
		}
	}

	$result = wp_signon( array(
		'user_login'    => $username,
		'user_password'  => $password,
		'remember'       => $remember,
	), is_ssl() );

	if ( is_wp_error( $result ) ) {
		return array(
			'status'  => 'error',
			'message' => 'Неверный логин или пароль.',
			'error'   => true,
		);
	}

	return array(
		'status'   => 'success',
		'message'  => 'Вы успешно вошли.',
		'error'    => false,
		'redirect' => home_url( '/' ),
	);
}
