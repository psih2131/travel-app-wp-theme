<?php
/**
 * REST API: эндпоинт регистрации пользователя (роль «Путешественник»).
 *
 * POST /wp-json/travel/v1/register
 */

defined( 'ABSPATH' ) || exit;


//POST-эндпоинт
add_action('rest_api_init', function () {
    register_rest_route('custom-endpoints/v1', '/register', array(
        'methods' => 'POST',
        'callback' => 'registr_new_user',
        'permission_callback' => '__return_true', // можно заменить на проверку прав
        'args' => array(

            'user_name' => array(
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'validate_callback' => function( $value ) {
                    $value = trim( (string) $value );
                    if ( strlen( $value ) < 3 ) {
                        return new WP_Error( 'invalid_user_name', 'Имя не менее 3 символов.', array( 'status' => 400 ) );
                    }
                    return true;
                },
            ),

            'email' => array(
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_email',
                'validate_callback' => function( $value ) {
                    $value = trim( (string) $value );
                    if ( $value === '' ) {
                        return new WP_Error( 'invalid_email', 'Email обязателен.', array( 'status' => 400 ) );
                    }
                    if ( ! is_email( $value ) ) {
                        return new WP_Error( 'invalid_email', 'Некорректный email.', array( 'status' => 400 ) );
                    }
                    return true;
                },
            ),

            'password' => array(
				'required' => true,
				'type'     => 'string',
				'minLength' => 8,
			),

        ),
    ));
});



function registr_new_user($request) {
	$user_name    = $request->get_param('user_name');
	$user_email   = $request->get_param('email');
	$user_password = $request->get_param('password');

	$exist_user = email_exists($user_email);
				
	if($exist_user != false){
		return array(
			'status'         => 'error',
			'message'        => 'Ошибка, пользыватьель с таким email уже существует',
			'user_exist'     => true,
			'error'          => true,
		);
	}

	$user_id = wp_create_user($user_name, $user_password, $user_email);

	if ( is_wp_error( $user_id ) ) {
		return array(
			'status'         => 'error',
			'message'        => $user_id->get_error_message(),
			'user_exist'     => true,
			'error'          => true,
			'user_name'        => $user_name,
			'email'      => $user_email,
			'password'   => $user_password,
		);
	}
	else {
		return array(
			'status'         => 'success',
			'message'        => 'Пользыватель зарегестрирыван',
			'user_exist'     => false,
			'error'          => false,
			'user_name'        => $user_name,
			'email'      => $user_email,
			'password'   => $user_password,
		);
	}
	
}
