<?php
/**
 * REST API: загрузка аватара пользователя (только авторизованные).
 * Разрешены: png, jpg, webp. Не более 1 МБ.
 *
 * POST /wp-json/custom-endpoints/v1/update-avatar (multipart/form-data, поле avatar)
 */

defined( 'ABSPATH' ) || exit;

add_action( 'rest_api_init', function () {
    register_rest_route( 'custom-endpoints/v1', '/update-avatar', array(
        'methods'             => 'POST',
        'callback'            => 'travel_upload_avatar',
        'permission_callback' => 'is_user_logged_in',
    ) );
    register_rest_route( 'custom-endpoints/v1', '/delete-avatar', array(
        'methods'             => 'POST',
        'callback'            => 'travel_delete_avatar',
        'permission_callback' => 'is_user_logged_in',
    ) );
} );

function travel_upload_avatar( $request ) {
    $user = wp_get_current_user();
    if ( ! $user->ID ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Вы не авторизованы.' ), 401 );
    }

    if ( ! isset( $_FILES['avatar'] ) || empty( $_FILES['avatar']['tmp_name'] ) ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Файл не выбран.' ), 400 );
    }

    $file = $_FILES['avatar'];
    $max_size = 1048576; // 1 MB
    $allowed_types = array( 'image/png', 'image/jpeg', 'image/jpg', 'image/webp' );

    if ( $file['size'] > $max_size ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Размер файла не должен превышать 1 МБ.' ), 400 );
    }

    $finfo = finfo_open( FILEINFO_MIME_TYPE );
    $mime = finfo_file( $finfo, $file['tmp_name'] );
    finfo_close( $finfo );
    if ( ! in_array( $mime, $allowed_types, true ) ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Разрешены только файлы PNG, JPG и WEBP.' ), 400 );
    }

    if ( ! function_exists( 'wp_handle_upload' ) ) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }
    if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
    }

    $overrides = array(
        'test_form' => false,
        'mimes'     => array(
            'png'  => 'image/png',
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'webp' => 'image/webp',
        ),
    );
    $upload = wp_handle_upload( $file, $overrides );
    if ( isset( $upload['error'] ) ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => $upload['error'] ), 400 );
    }

    $attachment = array(
        'post_mime_type' => $upload['type'],
        'post_title'     => 'Аватар пользователя ' . $user->ID,
        'post_content'   => '',
        'post_status'    => 'inherit',
    );
    $attachment_id = wp_insert_attachment( $attachment, $upload['file'] );
    if ( is_wp_error( $attachment_id ) ) {
        @unlink( $upload['file'] );
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Не удалось сохранить файл.' ), 500 );
    }
    wp_generate_attachment_metadata( $attachment_id, $upload['file'] );

    if ( function_exists( 'update_field' ) ) {
        update_field( 'avatar_polzyvatelya', $attachment_id, 'user_' . $user->ID );
    }

    $avatar_url = wp_get_attachment_image_url( $attachment_id, 'full' );
    if ( ! $avatar_url ) {
        $avatar_url = $upload['url'];
    }

    return new WP_REST_Response( array(
        'success'    => true,
        'message'    => 'Аватар обновлён.',
        'avatar_url' => $avatar_url,
    ), 200 );
}

function travel_delete_avatar( $request ) {
    $user = wp_get_current_user();
    if ( ! $user->ID ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Вы не авторизованы.' ), 401 );
    }

    if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
        return new WP_REST_Response( array( 'success' => false, 'message' => 'Не удалось удалить аватар.' ), 503 );
    }

    $avatar = get_field( 'avatar_polzyvatelya', 'user_' . $user->ID );
    if ( $avatar && is_numeric( $avatar ) ) {
        wp_delete_attachment( (int) $avatar, true );
    }
    update_field( 'avatar_polzyvatelya', null, 'user_' . $user->ID );

    return new WP_REST_Response( array( 'success' => true, 'message' => 'Аватар удалён.' ), 200 );
}
