<?php
$comment    = $args['comment'];
$comment_id = (int) $comment->comment_ID;
$uid        = (int) $comment->user_id;
if ( $uid > 0 ) {
	$comment_author = (string) get_user_meta( $uid, 'nickname', true );
	if ( '' === $comment_author ) {
		$u = get_userdata( $uid );
		$comment_author = $u ? (string) $u->display_name : (string) $comment->comment_author;
	}
} else {
	$comment_author = (string) $comment->comment_author;
}
$comment_date     = $comment->comment_date;
$comment_content  = $comment->comment_content;
$comment_ctx      = 'comment_' . $comment_id;
$acf_rating_key   = function_exists( 'apply_filters' ) ? (string) apply_filters( 'travel_tour_booking_comment_acf_rating_key', 'rejting' ) : 'rejting';
$comment_rating   = 0;
if ( function_exists( 'get_field' ) ) {
	$raw = get_field( $acf_rating_key, $comment_ctx );
	if ( is_numeric( $raw ) ) {
		$comment_rating = (int) $raw;
	}
}
if ( $comment_rating < 1 || $comment_rating > 5 ) {
	$raw = get_comment_meta( $comment_id, 'rejting', true );
	if ( is_numeric( $raw ) ) {
		$comment_rating = (int) $raw;
	}
}
if ( $comment_rating < 1 || $comment_rating > 5 ) {
	$raw = get_comment_meta( $comment_id, 'rating', true );
	if ( is_numeric( $raw ) ) {
		$comment_rating = (int) $raw;
	}
}
$comment_rating = min( 5, max( 0, $comment_rating ) );
$autor_acf_image  = get_field( 'avatar_polzyvatelya', 'user_' . $uid );
$tour_review_star_d = 'M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z';
?>
<div class="review">
    <div class="review__img-wrapper">
        <img src="<?php echo get_the_post_thumbnail_url( $comment->comment_post_ID ); ?>" alt="" class="review__img">
    </div>
    <div class="review__body">
        <div class="review__user-data-row">
            <div class="review__user">
                <img src="<?php echo $autor_acf_image['url']; ?>" alt="<?php echo $autor_acf_image['alt']; ?>" class="review__user-img">
                <div class="review__user-name"><?php echo esc_html( $comment_author ); ?></div>
                <div class="review__rate-row"<?php echo $comment_rating > 0 ? ' aria-label="' . esc_attr( sprintf( /* translators: %d: 1-5. */ __( 'Оценка: %d из 5', 'travel' ), $comment_rating ) ) . '"' : ''; ?>>
                    <?php
                    for ( $i = 1; $i <= 5; $i++ ) {
                        $fill = ( $comment_rating > 0 && $i <= $comment_rating ) ? '#5DB8A6' : '#d1d5db';
                        ?>
                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="<?php echo esc_attr( $tour_review_star_d ); ?>" fill="<?php echo esc_attr( $fill ); ?>" />
                    </svg>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="review__date">
                <?php echo date( 'd.m.Y', strtotime( $comment_date ) ); ?>
            </div>
        </div>
        <p class="review__name-tour">
            <a  class="review__name-tour-link"> <?php the_title(); ?></a>
        </p>

        <div class="review__text">
            <?php echo $comment_content; ?>
        </div>
    </div>
</div>
