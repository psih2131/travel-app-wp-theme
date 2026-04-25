<?php
/**
 * Автоодобрение комментариев к записям tour-bookings (чат брони без ручной модерации).
 *
 * - get_post_status: pending/draft иначе comment_on_draft.
 * - comments_open: иначе «comments are closed» (проверка идёт раньше черновика).
 */
add_filter( 'get_post_status', 'travel_tour_bookings_get_post_status_for_comment_post', 10, 2 );
add_filter( 'comments_open', 'travel_tour_bookings_comments_open_for_chat', 10, 2 );
add_filter( 'pre_comment_approved', 'travel_pre_comment_approved_tour_bookings', 10, 2 );
add_filter( 'duplicate_comment_id', 'travel_tour_bookings_allow_duplicate_comments', 10, 2 );
add_filter( 'wp_is_comment_flood', 'travel_tour_bookings_disable_comment_flood', 10, 5 );

/**
 * Доступ к чату брони (текущий или указанный пользователь).
 *
 * @param int $booking_id ID поста tour-bookings.
 * @param int $user_id     0 = текущий.
 * @return bool
 */
function travel_tour_booking_user_can_comment_chat( $booking_id, $user_id = 0 ) {
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
		$gid = (int) get_field( 'field_69db6527339a6', $booking_id );
		if ( $gid > 0 && $gid === $user_id ) {
			return true;
		}
		$trav = (int) get_field( 'id_polzovatelya', $booking_id );
		if ( $trav > 0 && $trav === $user_id ) {
			return true;
		}
	}
	return (bool) current_user_can( 'edit_post', $booking_id );
}

/**
 * Иначе при comment_status !== 'open' срабатывает «Sorry, comments are closed» ещё до проверки черновика.
 *
 * @param bool $open    Разрешены ли комментарии.
 * @param int  $post_id ID поста.
 * @return bool
 */
function travel_tour_bookings_comments_open_for_chat( $open, $post_id ) {
	$post_id = (int) $post_id;
	if ( $post_id < 1 || 'tour-bookings' !== get_post_type( $post_id ) ) {
		return $open;
	}
	if ( ! is_user_logged_in() ) {
		return $open;
	}
	if ( travel_tour_booking_user_can_comment_chat( $post_id, (int) get_current_user_id() ) ) {
		return true;
	}
	return $open;
}

/**
 * @param string|false  $post_status Статус.
 * @param WP_Post|false $post        Пост.
 * @return string|false
 */
function travel_tour_bookings_get_post_status_for_comment_post( $post_status, $post ) {
	if ( false === $post_status || ! ( $post instanceof WP_Post ) ) {
		return $post_status;
	}
	if ( 'tour-bookings' !== $post->post_type ) {
		return $post_status;
	}
	if ( ! in_array( $post_status, array( 'pending', 'draft' ), true ) ) {
		return $post_status;
	}
	if ( is_admin() ) {
		return $post_status;
	}
	if ( 'POST' !== ( $_SERVER['REQUEST_METHOD'] ?? '' ) || empty( $_POST['comment_post_ID'] ) ) {
		return $post_status;
	}
	if ( (int) $_POST['comment_post_ID'] !== (int) $post->ID ) {
		return $post_status;
	}
	if ( ! travel_tour_booking_user_can_comment_chat( (int) $post->ID, (int) get_current_user_id() ) ) {
		return $post_status;
	}
	return 'publish';
}

/**
 * @param int|string|float $approved     1, 0, 'spam', 'trash' и т.д.
 * @param array            $commentdata  Данные комментария до вставки.
 * @return int|string|float
 */
function travel_pre_comment_approved_tour_bookings( $approved, $commentdata ) {
	if ( 1 === (int) $approved ) {
		return $approved;
	}
	// Не снимаем спам/корзину с решений плагинов.
	if ( 'spam' === $approved || 'trash' === $approved ) {
		return $approved;
	}

	$post_id = isset( $commentdata['comment_post_ID'] ) ? (int) $commentdata['comment_post_ID'] : 0;
	if ( $post_id < 1 || 'tour-bookings' !== get_post_type( $post_id ) ) {
		return $approved;
	}
	return 1;
}

/**
 * Разрешить одинаковые сообщения в чате бронирования.
 *
 * @param int|string|null $dupe_id     Найденный дубликат.
 * @param array           $commentdata Данные комментария.
 * @return int|string|null
 */
function travel_tour_bookings_allow_duplicate_comments( $dupe_id, $commentdata ) {
	$post_id = isset( $commentdata['comment_post_ID'] ) ? (int) $commentdata['comment_post_ID'] : 0;
	if ( $post_id > 0 && 'tour-bookings' === get_post_type( $post_id ) ) {
		return 0;
	}
	return $dupe_id;
}

/**
 * Отключить антифлуд только для чата бронирований.
 *
 * @param bool   $is_flood Is flood.
 * @param string $ip       Author IP.
 * @param string $email    Author email.
 * @param string $date     Date GMT.
 * @param bool   $wp_error Return WP_Error instead of die.
 * @return bool
 */
function travel_tour_bookings_disable_comment_flood( $is_flood, $ip, $email, $date, $wp_error ) {
	if ( empty( $_POST['comment_post_ID'] ) ) {
		return $is_flood;
	}
	$post_id = (int) $_POST['comment_post_ID'];
	if ( $post_id > 0 && 'tour-bookings' === get_post_type( $post_id ) ) {
		return false;
	}
	return $is_flood;
}
