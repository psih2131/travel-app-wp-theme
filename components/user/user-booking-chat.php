<?php
/**
 * Чат: вывод комментариев к посту брони. ID поста — GET ?booking_id=
 * Чужие: .user-booking-chat__msg--user; свои: .user-booking-chat__msg--guide
 * Шапка по умолчанию статична. Ниже — вёрстка формы (без обработки отправки).
 */
$booking_id = isset( $_GET['booking_id'] ) ? absint( wp_unslash( $_GET['booking_id'] ) ) : 0;
$booking_post = ( $booking_id > 0 ) ? get_post( $booking_id ) : null;
$is_valid_booking = $booking_post && 'tour-bookings' === $booking_post->post_type;

$current_uid = is_user_logged_in() ? (int) get_current_user_id() : 0;
$chat_with_label = __( 'Пользователем', 'travel' );
if ( $is_valid_booking && $current_uid > 0 ) {
	$guide_uid    = function_exists( 'get_field' ) ? (int) get_field( 'field_69db6527339a6', $booking_id ) : 0;
	$traveler_uid = function_exists( 'get_field' ) ? (int) get_field( 'id_polzovatelya', $booking_id ) : 0;
	if ( $traveler_uid < 1 && $booking_post ) {
		$traveler_uid = (int) $booking_post->post_author;
	}
	if ( $guide_uid > 0 && $current_uid === $guide_uid ) {
		$chat_with_label = __( 'Путешественником', 'travel' );
	} elseif ( $traveler_uid > 0 && $current_uid === $traveler_uid ) {
		$chat_with_label = __( 'Гидом', 'travel' );
	}
}

$comments = array();
if ( $is_valid_booking ) {
	$get_comments_args = array(
		'post_id' => $booking_id,
		'status'  => 'approve',
		'orderby' => 'comment_date',
		'order'   => 'ASC',
		'type'    => 'comment',
	);
	$comments = get_comments( $get_comments_args );
}

// После комментария WordPress ведёт на get_comment_link( пост брони ). Нужен return на эту страницу (см. redirect_to в wp-comments-post.php).
$chat_comment_redirect = '';
if ( $is_valid_booking ) {
	$current_page_id = (int) get_queried_object_id();
	$return_base = $current_page_id > 0 ? get_permalink( $current_page_id ) : null;
	if ( $return_base ) {
		$chat_comment_redirect = esc_url( add_query_arg( 'booking_id', (int) $booking_id, $return_base ) );
	} else {
		$chat_comment_redirect = esc_url( add_query_arg( 'booking_id', (int) $booking_id, home_url( '/' ) ) );
	}
}
?>

<section class="user-booking-chat" aria-label="<?php echo esc_attr__( 'Чат с гидом по бронированию', 'travel' ); ?>">
	<header class="user-booking-chat__header">
		<a href="#" class="user-booking-chat__guide-profile" aria-label="Профиль гида">
			<div class="user-booking-chat__header-main">
				<div class="user-booking-chat__guide-avatar-wrap">
					<img class="user-booking-chat__guide-avatar" src="/wp-content/themes/travel/assets/image-default/user-image-default.jpg" alt="" width="40" height="40" loading="lazy" decoding="async" />
				</div>
				<div class="user-booking-chat__header-text">
					<h2 class="user-booking-chat__title">Чат с</h2>
					<p class="user-booking-chat__guide-name"><?php echo esc_html( $chat_with_label ); ?></p>
				</div>
			</div>
		</a>
	</header>

	<div class="user-booking-chat__messages" role="log" aria-live="polite">
		<?php
		if ( $is_valid_booking && ! empty( $comments ) ) {
			foreach ( $comments as $comment ) {
				$cuid    = (int) $comment->user_id;
				$is_mine = ( $current_uid > 0 && $cuid === $current_uid );
				$msg_mod = $is_mine ? 'user-booking-chat__msg--user' : 'user-booking-chat__msg--guide';
				$time_iso   = get_comment_date( 'c', $comment );
				$time_label = get_comment_date( 'j F, H:i', $comment );
				?>
		<div class="user-booking-chat__msg <?php echo esc_attr( $msg_mod ); ?>" id="comment-<?php echo (int) $comment->comment_ID; ?>">
			<div class="user-booking-chat__msg-text">
				<?php
				ob_start();
				comment_text( $comment );
				echo ob_get_clean();
				?>
			</div>
			<time class="user-booking-chat__msg-time" datetime="<?php echo esc_attr( $time_iso ); ?>"><?php echo esc_html( $time_label ); ?></time>
		</div>
				<?php
			}
		} elseif ( $is_valid_booking ) {
			?>
		<p class="user-booking-chat__empty user-booking-chat__msg-text"><?php esc_html_e( 'Пока нет сообщений. Напишите первое.', 'travel' ); ?></p>
			<?php
		} elseif ( $booking_id > 0 ) {
			?>
		<p class="user-booking-chat__empty user-booking-chat__msg-text"><?php esc_html_e( 'Бронирование не найдено.', 'travel' ); ?></p>
			<?php
		}
		?>
	</div>

	<?php
	$post_id = $booking_id;
	$args = array(
		'title_reply'          => __( '' ),
		'title_reply_before'   => '',
		'title_reply_after'    => '',
		'logged_in_as'         => '',
		'comment_notes_before' => '',
		'comment_notes_after'  => '',
		'class_form'           => 'post-comments-form',
		'class_submit'         => 'post-comments-form__submit',
		'id_submit'            => 'submit',
		'name_submit'          => 'submit',
		'label_submit'         => __( 'Отправить комментарий', 'travel' ),
		'format'               => 'html5',
		'comment_field'        => '<div class="post-comments-form__row"><label class="post-comments-form__label" for="comment">' . esc_html__( 'Комментарий', 'travel' ) . '</label><textarea id="comment" name="comment" class="post-comments-form__textarea" rows="5" placeholder="' . esc_attr__( 'Ваш текст', 'travel' ) . '" required></textarea></div>',
	);
	$inject_booking_comment_redirect = static function () use ( $chat_comment_redirect ) {
		printf( '<input type="hidden" name="redirect_to" value="%s" />', esc_attr( $chat_comment_redirect ) );
	};
	add_action( 'comment_form_top', $inject_booking_comment_redirect, 1 );
	comment_form ( $args , $post_id );
	remove_action( 'comment_form_top', $inject_booking_comment_redirect, 1 );
	?>

	
	
</section>
