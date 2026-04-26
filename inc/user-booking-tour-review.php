<?php
/**
 * Отзыв с страницы брони: комментарий к записи тура (tours) + ACF number «rejting» в мета комментария.
 *
 * @package travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const TRAVEL_TOUR_BOOKING_REVIEW_COMMENT_META = 'tour_booking_review_booking';

/**
 * Путешественник (владелец брони), а не гид.
 *
 * @param int $booking_id ID tour-bookings.
 * @param int $user_id    ID пользователя.
 * @return bool
 */
function travel_tour_booking_is_traveler_for_review( $booking_id, $user_id = 0 ) {
	$booking_id = (int) $booking_id;
	$user_id    = (int) ( $user_id > 0 ? $user_id : get_current_user_id() );
	if ( $booking_id < 1 || $user_id < 1 ) {
		return false;
	}
	$p = get_post( $booking_id );
	if ( ! $p || 'tour-bookings' !== $p->post_type ) {
		return false;
	}
	if ( (int) $p->post_author === $user_id ) {
		return true;
	}
	if ( function_exists( 'get_field' ) ) {
		$trav = (int) get_field( 'id_polzovatelya', $booking_id );
		if ( $trav > 0 && $trav === $user_id ) {
			return true;
		}
	}
	return false;
}

/**
 * Тур в брони совпадает с переданным.
 *
 * @param int $tour_id    ID записи tours.
 * @param int $booking_id ID брони.
 * @return bool
 */
function travel_tour_booking_tour_id_matches( $tour_id, $booking_id ) {
	if ( ! function_exists( 'get_field' ) ) {
		return false;
	}
	$tid = (int) get_field( 'id_tura', $booking_id );
	return $tid > 0 && (int) $tour_id === $tid;
}

/**
 * Уже оставлен отзыв с этой брони.
 *
 * @param int $tour_id    ID тура.
 * @param int $booking_id ID брони.
 * @param int $user_id    ID пользователя.
 * @return bool
 */
function travel_user_booking_tour_has_submitted_review( $tour_id, $booking_id, $user_id = 0 ) {
	$uid = (int) ( $user_id > 0 ? $user_id : get_current_user_id() );
	if ( $uid < 1 || (int) $tour_id < 1 || (int) $booking_id < 1 ) {
		return false;
	}
	$n = (int) get_comments(
		array(
			'post_id' => (int) $tour_id,
			'user_id' => $uid,
			'count'   => true,
			'status'  => 'all',
			'meta_query' => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
				array(
					'key'   => TRAVEL_TOUR_BOOKING_REVIEW_COMMENT_META,
					'value' => (string) (int) $booking_id,
					'compare' => '=',
				),
			),
		)
	);
	return $n > 0;
}

/**
 * Проверка: можно ли в этом POST открыть комментарии к туру (формы отзыва с брони).
 *
 * @return bool
 */
function travel_user_booking_tour_review_is_valid_request() {
	if ( 'POST' !== (string) ( $_SERVER['REQUEST_METHOD'] ?? '' ) || empty( $_POST['tour_booking_review_submitted'] ) || '1' !== (string) $_POST['tour_booking_review_submitted'] ) {
		return false;
	}
	$booking_id = isset( $_POST['tour_booking_id'] ) ? (int) $_POST['tour_booking_id'] : 0;
	$nonce      = isset( $_POST['tour_booking_tour_review_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['tour_booking_tour_review_nonce'] ) ) : '';
	$tour_id    = isset( $_POST['comment_post_ID'] ) ? (int) $_POST['comment_post_ID'] : 0;
	if ( $booking_id < 1 || $tour_id < 1 || $nonce === '' || ! is_user_logged_in() ) {
		return false;
	}
	if ( ! wp_verify_nonce( $nonce, 'tour_booking_tour_review_' . $booking_id ) ) {
		return false;
	}
	$uid = (int) get_current_user_id();
	if ( ! travel_tour_booking_is_traveler_for_review( $booking_id, $uid ) || ! travel_tour_booking_tour_id_matches( $tour_id, $booking_id ) ) {
		return false;
	}
	if ( travel_user_booking_tour_has_submitted_review( $tour_id, $booking_id, $uid ) ) {
		return false;
	}
	return ( 'tours' === get_post_type( $tour_id ) ) && (bool) get_post( $tour_id );
}

/**
 * Разрешить «comments open» к туру при валидной заявке отзыва с брони.
 *
 * @param bool $open    Исходное значение.
 * @param int  $post_id ID поста (тур).
 * @return bool
 */
function travel_user_booking_tour_comments_open( $open, $post_id ) {
	if ( 'tours' !== get_post_type( (int) $post_id ) || ! is_user_logged_in() ) {
		return $open;
	}
	if ( ! travel_user_booking_tour_review_is_valid_request() ) {
		return $open;
	}
	return (int) $_POST['comment_post_ID'] === (int) $post_id ? true : $open;
}
add_filter( 'comments_open', 'travel_user_booking_tour_comments_open', 5, 2 );

/**
 * URL для редиректа при ошибке (тот же redirect_to, что в форме).
 *
 * @return string
 */
function travel_user_booking_tour_review_error_redirect_url() {
	if ( ! empty( $_POST['redirect_to'] ) ) {
		$url = esc_url_raw( wp_unslash( (string) $_POST['redirect_to'] ) );
		if ( $url !== '' ) {
			$url = remove_query_arg( array( 'tour_review', 'review_err' ), $url );
			return add_query_arg( array( 'tour_review' => 'err', 'review_err' => '1' ), $url );
		}
	}
	$ref = wp_get_referer();
	if ( is_string( $ref ) && $ref !== '' ) {
		$u = remove_query_arg( array( 'tour_review', 'review_err' ), $ref );
		return add_query_arg( array( 'tour_review' => 'err', 'review_err' => '1' ), $u );
	}
	return add_query_arg( array( 'tour_review' => 'err' ), home_url( '/' ) );
}

/**
 * Валидация до wp_new_comment. Нельзя возвращать WP_Error из preprocess_comment — в ядре ожидается массив.
 *
 * @param int $post_id ID поста, к которому пишем комментарий (тур).
 */
function travel_user_booking_tour_review_pre_comment( $post_id ) {
	if ( empty( $_POST['tour_booking_review_submitted'] ) || '1' !== (string) $_POST['tour_booking_review_submitted'] ) {
		return;
	}
	$post_id    = (int) $post_id;
	$booking_id = isset( $_POST['tour_booking_id'] ) ? (int) $_POST['tour_booking_id'] : 0;
	$nonce      = isset( $_POST['tour_booking_tour_review_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['tour_booking_tour_review_nonce'] ) ) : '';
	$uid        = (int) get_current_user_id();
	$rating     = isset( $_POST['booking_review_rating'] ) ? (int) wp_unslash( (string) $_POST['booking_review_rating'] ) : 0;

	if ( $post_id < 1 || $booking_id < 1 || $nonce === '' || $uid < 1 || ! is_user_logged_in() ) {
		wp_safe_redirect( travel_user_booking_tour_review_error_redirect_url() );
		exit;
	}
	if ( ! wp_verify_nonce( $nonce, 'tour_booking_tour_review_' . $booking_id ) ) {
		wp_safe_redirect( travel_user_booking_tour_review_error_redirect_url() );
		exit;
	}
	if ( 'tours' !== get_post_type( $post_id ) || ! (bool) get_post( $post_id ) ) {
		wp_safe_redirect( travel_user_booking_tour_review_error_redirect_url() );
		exit;
	}
	if ( ! travel_tour_booking_tour_id_matches( $post_id, $booking_id ) ) {
		wp_safe_redirect( travel_user_booking_tour_review_error_redirect_url() );
		exit;
	}
	if ( ! travel_tour_booking_is_traveler_for_review( $booking_id, $uid ) ) {
		wp_safe_redirect( travel_user_booking_tour_review_error_redirect_url() );
		exit;
	}
	if ( travel_user_booking_tour_has_submitted_review( $post_id, $booking_id, $uid ) ) {
		wp_safe_redirect( travel_user_booking_tour_review_error_redirect_url() );
		exit;
	}
	if ( $rating < 1 || $rating > 5 ) {
		wp_safe_redirect( travel_user_booking_tour_review_error_redirect_url() );
		exit;
	}
}
add_action( 'pre_comment_on_post', 'travel_user_booking_tour_review_pre_comment', 1, 1 );

/**
 * @param int                  $comment_id    ID комментария.
 * @param int|string|float|bool $approved     Статус.
 * @param array<string,mixed>  $commentdata   Данные.
 */
function travel_user_booking_tour_review_after_post( $comment_id, $approved, $commentdata ) {
	if ( empty( $commentdata['comment_post_ID'] ) || empty( $_POST['tour_booking_review_submitted'] ) || '1' !== (string) $_POST['tour_booking_review_submitted'] ) {
		return;
	}
	$booking_id = isset( $_POST['tour_booking_id'] ) ? (int) $_POST['tour_booking_id'] : 0;
	$tour_id    = (int) $commentdata['comment_post_ID'];
	$uid        = (int) get_current_user_id();
	if ( $booking_id < 1 || 'tours' !== get_post_type( $tour_id ) || ! travel_tour_booking_tour_id_matches( $tour_id, $booking_id ) || ! travel_tour_booking_is_traveler_for_review( $booking_id, $uid ) ) {
		return;
	}
	$c = get_comment( $comment_id );
	if ( ! $c instanceof WP_Comment || (int) $c->user_id !== $uid ) {
		return;
	}

	$rating = isset( $_POST['booking_review_rating'] ) ? (int) wp_unslash( (string) $_POST['booking_review_rating'] ) : 0;
	if ( $rating < 1 || $rating > 5 ) {
		return;
	}

	update_comment_meta( $comment_id, TRAVEL_TOUR_BOOKING_REVIEW_COMMENT_META, (int) $booking_id );

	$acf_key = apply_filters( 'travel_tour_booking_comment_acf_rating_key', 'rejting' );
	if ( $acf_key !== '' && function_exists( 'update_field' ) ) {
		update_field( $acf_key, $rating, 'comment_' . (int) $comment_id );
	} else {
		update_comment_meta( $comment_id, $acf_key, $rating );
	}
}
add_action( 'comment_post', 'travel_user_booking_tour_review_after_post', 20, 3 );

/**
 * @return void
 */
function travel_user_booking_tour_review_enqueue() {
	if ( ! is_user_logged_in() || ! is_page_template( 'pages/user-booking-tour.php' ) ) {
		return;
	}
	$path = get_template_directory() . '/js/user-booking-tour-review.js';
	if ( ! is_readable( $path ) ) {
		return;
	}
	wp_enqueue_script(
		'travel-user-booking-tour-review',
		get_template_directory_uri() . '/js/user-booking-tour-review.js',
		array(),
		(string) filemtime( $path ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'travel_user_booking_tour_review_enqueue', 30 );
