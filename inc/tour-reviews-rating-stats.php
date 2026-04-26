<?php
/**
 * Рейтинги отзывов к туру: ACF/мета «rejting» у комментариев, агрегаты для блока tour-reviews.
 *
 * @package travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Оценка 0–5 из ACF/мета комментария (логика как в tour-review-card).
 *
 * @param int $comment_id ID комментария.
 * @return int 0 = нет оценки, 1–5 = звёзды.
 */
function travel_tour_get_comment_rejting( $comment_id ) {
	$comment_id   = (int) $comment_id;
	$comment_ctx  = 'comment_' . $comment_id;
	$acf_rating_key = (string) apply_filters( 'travel_tour_booking_comment_acf_rating_key', 'rejting' );
	$rating       = 0;
	if ( function_exists( 'get_field' ) ) {
		$raw = get_field( $acf_rating_key, $comment_ctx );
		if ( is_numeric( $raw ) ) {
			$rating = (int) $raw;
		}
	}
	if ( $rating < 1 || $rating > 5 ) {
		$raw = get_comment_meta( $comment_id, 'rejting', true );
		if ( is_numeric( $raw ) ) {
			$rating = (int) $raw;
		}
	}
	if ( $rating < 1 || $rating > 5 ) {
		$raw = get_comment_meta( $comment_id, 'rating', true );
		if ( is_numeric( $raw ) ) {
			$rating = (int) $raw;
		}
	}
	return min( 5, max( 0, $rating ) );
}

/**
 * Статистика по одобренным комментариям к посту (тур).
 *
 * @param int $post_id ID поста (tours).
 * @return array{total:int,rated:int,average:float,avg_rounded:int,dist:array<int,int>,max_bucket:int} max_bucket = макс. значение в dist (для подсветки ряда).
 */
function travel_tour_reviews_get_rating_stats( $post_id ) {
	$post_id = (int) $post_id;
	$empty   = array(
		'total'       => 0,
		'rated'       => 0,
		'average'     => 0.0,
		'avg_rounded' => 0,
		'dist'        => array( 5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0 ),
		'max_bucket'  => 0,
	);
	if ( $post_id < 1 ) {
		return $empty;
	}
	$comments = get_comments(
		array(
			'post_id'                   => $post_id,
			'status'                    => 'approve',
			'type'                      => 'comment',
			'update_comment_meta_cache' => true,
		)
	);
	if ( empty( $comments ) || ! is_array( $comments ) ) {
		return $empty;
	}
	$dist = array( 5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0 );
	$sum  = 0;
	$rated = 0;
	foreach ( $comments as $c ) {
		if ( ! ( $c instanceof WP_Comment ) ) {
			continue;
		}
		$r = travel_tour_get_comment_rejting( (int) $c->comment_ID );
		if ( $r >= 1 && $r <= 5 ) {
			$rated++;
			$sum += $r;
			$dist[ $r ]++;
		}
	}
	$max_bucket = 0;
	foreach ( $dist as $c ) {
		$max_bucket = max( $max_bucket, (int) $c );
	}
	$total = count( $comments );
	$avg   = $rated > 0 ? ( $sum / $rated ) : 0.0;
	$round = (int) min( 5, max( 0, (int) round( $avg ) ) );
	return array(
		'total'       => $total,
		'rated'       => $rated,
		'average'     => $avg,
		'avg_rounded' => $round,
		'dist'        => $dist,
		'max_bucket'  => $max_bucket,
	);
}
