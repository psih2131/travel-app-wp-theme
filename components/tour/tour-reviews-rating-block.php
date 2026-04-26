<?php
/**
 * Блок среднего рейтинга и гистограммы (1–5) по отзывам к туру.
 * Ожидает $args: post_id (int).
 *
 * @package travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id = isset( $args['post_id'] ) ? (int) $args['post_id'] : 0;
if ( $post_id < 1 || ! function_exists( 'travel_tour_reviews_get_rating_stats' ) ) {
	return;
}

$st            = travel_tour_reviews_get_rating_stats( $post_id );
$avg_display   = $st['rated'] > 0 ? number_format_i18n( (float) $st['average'], 2 ) : '—';
$round_stars   = (int) $st['avg_rounded'];
$star_path     = 'M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z';
$rated_total   = (int) $st['rated'];
$active_bucket = 0;
if ( (int) $st['max_bucket'] > 0 ) {
	for ( $k = 5; $k >= 1; $k-- ) {
		if ( (int) $st['dist'][ $k ] === (int) $st['max_bucket'] && (int) $st['dist'][ $k ] > 0 ) {
			$active_bucket = $k;
			break;
		}
	}
}
?>
<div class="tour-reviews__rating-block">
	<div class="tour-reviews__rating-left">
		<div class="tour-reviews__rating-value"><?php echo esc_html( $avg_display ); ?></div>
		<div
			class="tour-reviews__rating-stars"
			<?php
			if ( $st['rated'] > 0 ) {
				echo ' aria-label="' . esc_attr(
					sprintf(
						/* translators: 1: average string, 2: number of rated reviews. */
						__( 'Средняя оценка %1$s из 5, оценок: %2$d', 'travel' ),
						(string) $avg_display,
						(int) $st['rated']
					)
				) . '"';
			}
			?>
		>
			<?php
			for ( $i = 1; $i <= 5; $i++ ) {
				$on   = ( $st['rated'] > 0 && $i <= $round_stars );
				$fill = $on ? '#5DB8A6' : '#d1d5db';
				printf(
					'<svg width="24" height="24" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false"><path d="%s" fill="%s" /></svg>',
					esc_attr( $star_path ),
					esc_attr( $fill )
				);
			}
			?>
		</div>
		<p class="tour-reviews__rating-note">Написать отзыв можно только<br>после посещения. <button type="button" class="tour-reviews__rating-link js-tour-reviews-details">Подробнее</button></p>
	</div>
	<div class="tour-reviews__rating-distribution">
		<?php
		$k_list = array( 5, 4, 3, 2, 1 );
		foreach ( $k_list as $bucket ) {
			$count = isset( $st['dist'][ $bucket ] ) ? (int) $st['dist'][ $bucket ] : 0;
			$pct   = ( $rated_total > 0 && $count > 0 ) ? ( 100 * $count / $rated_total ) : 0;
			$mod   = ( $active_bucket > 0 && (int) $bucket === (int) $active_bucket ) ? ' tour-reviews__dist-row--active' : '';
			$stars = str_repeat( '★', (int) $bucket );
			?>
		<div class="tour-reviews__dist-row<?php echo $mod; ?>">
			<span class="tour-reviews__dist-stars"><?php echo esc_html( $stars ); ?></span>
			<span class="tour-reviews__dist-bar"><span class="tour-reviews__dist-bar-fill" style="width:<?php echo esc_attr( (string) round( (float) $pct, 2 ) ); ?>%;"></span></span>
			<span class="tour-reviews__dist-count"><?php echo esc_html( (string) $count ); ?></span>
		</div>
			<?php
		}
		?>
	</div>
</div>
