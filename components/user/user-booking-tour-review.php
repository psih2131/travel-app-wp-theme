<?php
/**
 * Форма отзыва: комментарий к туру (tours) со страницы брони (не с single тура).
 * Ожидает $args: tour_id, booking_id (как get_template_part).
 *
 * @package travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$tour_id    = isset( $args['tour_id'] ) ? (int) $args['tour_id'] : 0;
$booking_id = isset( $args['booking_id'] ) ? (int) $args['booking_id'] : 0;

if ( $tour_id < 1 || $booking_id < 1 || ! is_user_logged_in() ) {
	return;
}

if ( ! function_exists( 'travel_tour_booking_is_traveler_for_review' ) || ! function_exists( 'travel_user_booking_tour_has_submitted_review' ) ) {
	return;
}

$uid = (int) get_current_user_id();
if ( ! travel_tour_booking_is_traveler_for_review( $booking_id, $uid ) || ! travel_tour_booking_tour_id_matches( $tour_id, $booking_id ) ) {
	return;
}

if ( travel_user_booking_tour_has_submitted_review( $tour_id, $booking_id, $uid ) ) {
	?>
	<section class="user-booking-review user-booking-review--submitted" aria-labelledby="user-booking-review-done-heading">
		<div class="user-booking-review__done-card">
			<div class="user-booking-review__done-icon" aria-hidden="true">
				<svg class="user-booking-review__done-check" viewBox="0 0 24 24" width="32" height="32" focusable="false" aria-hidden="true">
					<circle cx="12" cy="12" r="9.5" fill="none" stroke="currentColor" stroke-width="1.5" opacity="0.35" />
					<path
						fill="none"
						stroke="currentColor"
						stroke-width="2.1"
						stroke-linecap="round"
						stroke-linejoin="round"
						d="M7.5 12.3 10.2 15l5.3-5.2"
					/>
				</svg>
			</div>
			<div class="user-booking-review__done-content">
				<p id="user-booking-review-done-heading" class="user-booking-review__done" role="status">
					<?php esc_html_e( 'Спасибо, отзыв по этой брони уже оставлен.', 'travel' ); ?>
				</p>
			</div>
		</div>
	</section>
	<?php
	return;
}

$page_id = (int) get_queried_object_id();
$base    = $page_id > 0 ? get_permalink( $page_id ) : home_url( '/' );
$redirect = add_query_arg(
	array(
		'booking_id'  => (int) $booking_id,
		'tour_review' => 'thanks',
	),
	$base
);

$comments_file = site_url( 'wp-comments-post.php' );

?>
<section class="user-booking-review" aria-labelledby="user-booking-review-title">
	<h2 id="user-booking-review-title" class="user-booking-review__title">
		<?php esc_html_e( 'Оставить комментарий', 'travel' ); ?>
	</h2>
	<form
		class="user-booking-review__form js-user-booking-review-form"
		action="<?php echo esc_url( $comments_file ); ?>"
		method="post"
		novalidate
	>
		<?php wp_nonce_field( 'tour_booking_tour_review_' . (int) $booking_id, 'tour_booking_tour_review_nonce' ); ?>
		<input type="hidden" name="tour_booking_review_submitted" value="1" />
		<input type="hidden" name="tour_booking_id" value="<?php echo esc_attr( (string) (int) $booking_id ); ?>" />
		<input type="hidden" name="comment_post_ID" value="<?php echo esc_attr( (string) (int) $tour_id ); ?>" id="comment_post_ID" />
		<input type="hidden" name="comment_parent" value="0" />
		<input type="hidden" name="redirect_to" value="<?php echo esc_url( $redirect ); ?>" />
		<input type="hidden" name="booking_review_rating" value="" class="js-user-booking-review-rating" autocomplete="off" />

		<div class="user-booking-review__field">
			<span class="user-booking-review__label" id="user-booking-review-stars-label">
				<?php esc_html_e( 'Оценка', 'travel' ); ?>
			</span>
			<div
				class="user-booking-review__stars js-user-booking-review-stars"
				data-rating="0"
				role="radiogroup"
				aria-labelledby="user-booking-review-stars-label"
			>
				<?php
				for ( $i = 1; $i <= 5; $i++ ) {
					$al = sprintf(
						/* translators: %d: star 1-5. */
						esc_attr__( '%d из 5 звёзд', 'travel' ),
						$i
					);
					printf(
						'<button type="button" class="user-booking-review__star js-user-booking-review-star" data-value="%1$d" aria-pressed="false" aria-label="%2$s">★</button>',
						(int) $i,
						$al
					);
				}
				?>
			</div>
		</div>

		<div class="user-booking-review__field">
			<label for="user-booking-review-text" class="user-booking-review__label">
				<?php esc_html_e( 'Ваш отзыв', 'travel' ); ?>
			</label>
			<textarea
				id="user-booking-review-text"
				name="comment"
				class="user-booking-review__textarea"
				rows="4"
				required
				placeholder="<?php echo esc_attr__( 'Расскажите, как прошёл тур и общение с гидом', 'travel' ); ?>"
				autocomplete="off"
			></textarea>
		</div>

		<p
			class="user-booking-review__error js-user-booking-review-error"
			role="alert"
			hidden
			data-msg-rating="<?php echo esc_attr__( 'Укажите оценку от 1 до 5 звёзд.', 'travel' ); ?>"
		></p>
		<button type="submit" class="user-booking-review__submit">
			<?php esc_html_e( 'Отправить отзыв', 'travel' ); ?>
		</button>
	</form>
</section>
