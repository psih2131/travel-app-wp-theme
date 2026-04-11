<?php
/**
 * REST API: обновление личных данных пользователя (только авторизованные).
 * Email не меняется. Все строки санитизируются для защиты от XSS и инъекций.
 *
 * POST /wp-json/custom-endpoints/v1/update-profile
 */

defined( 'ABSPATH' ) || exit;

add_action( 'rest_api_init', function () {
    register_rest_route( 'custom-endpoints/v1', '/update-profile', array(
        'methods'             => 'POST',
        'callback'            => 'travel_update_profile',
        'permission_callback' => 'is_user_logged_in',
        'args'                => array(
            'imya'             => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
            'familiya'         => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
            'adress'           => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
            'gorod'            => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
            'nomer_telefona'   => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
            'indeks'           => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
            'pol'              => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
            'data_rozhdeniya'  => array( 'required' => false, 'type' => 'string', 'sanitize_callback' => 'sanitize_text_field' ),
        ),
    ) );
} );

function travel_update_profile( $request ) {
    $user = wp_get_current_user();
    if ( ! $user->ID ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Вы не авторизованы.' ), 401 );
    }

    if ( ! function_exists( 'update_field' ) ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Сохранение данных временно недоступно.' ), 503 );
    }

    $user_context = 'user_' . $user->ID;

    // Текстовые поля — уже пройдут sanitize_text_field в args, дополнительно обрезаем длину и убираем лишнее
    $imya   = travel_sanitize_profile_string( $request->get_param( 'imya' ), 100 );
    $familiya = travel_sanitize_profile_string( $request->get_param( 'familiya' ), 100 );
    $adress = travel_sanitize_profile_string( $request->get_param( 'adress' ), 255 );
    $gorod  = travel_sanitize_profile_string( $request->get_param( 'gorod' ), 100 );

    // Пол — только разрешённые значения (защита от подмены)
    $pol_raw = $request->get_param( 'pol' );
    $pol_allowed = array( 'Не выбрано', 'Мужчина', 'Женщина' );
    $pol = in_array( $pol_raw, $pol_allowed, true ) ? $pol_raw : '';

    // Телефон и индекс — только цифры (и возможно + в начале для телефона)
    $nomer_telefona = travel_sanitize_phone( $request->get_param( 'nomer_telefona' ) );
    $indeks = travel_sanitize_digits( $request->get_param( 'indeks' ), 20 );

    // Дата — только формат Y-m-d
    $data_rozhdeniya_raw = $request->get_param( 'data_rozhdeniya' );
    $data_rozhdeniya = '';
    if ( is_string( $data_rozhdeniya_raw ) && preg_match( '/^\d{4}-\d{2}-\d{2}$/', $data_rozhdeniya_raw ) ) {
        $data_rozhdeniya = $data_rozhdeniya_raw;
    }

    update_field( 'imya', $imya, $user_context );
    update_field( 'familiya', $familiya, $user_context );
    update_field( 'adress', $adress, $user_context );
    update_field( 'gorod', $gorod, $user_context );
    update_field( 'nomer_telefona', $nomer_telefona, $user_context );
    update_field( 'indeks', $indeks, $user_context );
    update_field( 'pol', $pol, $user_context );
    update_field( 'data_rozhdeniya', $data_rozhdeniya, $user_context );

    return new WP_REST_Response( array(
        'success' => true,
        'message' => 'Данные сохранены.',
    ), 200 );
}

/**
 * Санитизация строки профиля: теги и опасные символы убираются, длина ограничена.
 */
function travel_sanitize_profile_string( $value, $max_length = 255 ) {
    if ( ! is_string( $value ) ) {
        return '';
    }
    $value = sanitize_text_field( $value );
    $value = wp_strip_all_tags( $value );
    if ( strlen( $value ) > $max_length ) {
        $value = substr( $value, 0, $max_length );
    }
    return $value;
}

/**
 * Только цифры (для индекса и т.п.), ограничение длины.
 */
function travel_sanitize_digits( $value, $max_length = 20 ) {
    if ( ! is_string( $value ) && ! is_numeric( $value ) ) {
        return '';
    }
    $value = preg_replace( '/[^0-9]/', '', (string) $value );
    if ( strlen( $value ) > $max_length ) {
        $value = substr( $value, 0, $max_length );
    }
    return $value;
}

/**
 * Телефон: цифры, пробелы, плюс, дефис, скобки — остальное убираем, ограничение длины.
 */
function travel_sanitize_phone( $value ) {
    if ( ! is_string( $value ) && ! is_numeric( $value ) ) {
        return '';
    }
    $value = preg_replace( '/[^0-9+\s\-()]/', '', (string) $value );
    if ( strlen( $value ) > 30 ) {
        $value = substr( $value, 0, 30 );
    }
    return trim( $value );
}
