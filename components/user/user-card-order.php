<?php
$booking_id = (int) get_the_ID();
$tour_id    = function_exists( 'get_field' ) ? (int) get_field( 'id_tura', $booking_id ) : 0;

$tour_title = $tour_id > 0 ? get_the_title( $tour_id ) : get_the_title( $booking_id );
$subtitle   = function_exists( 'get_field' ) && $tour_id > 0 ? (string) get_field( 'korotkoe_opisanie_kartochki', $tour_id ) : '';
$subtitle   = function_exists( 'travel_truncate_text' ) ? travel_truncate_text( $subtitle, 120 ) : $subtitle;

$thumb_url = $tour_id > 0 ? get_the_post_thumbnail_url( $tour_id, 'medium' ) : '';
if ( ! $thumb_url ) {
	$thumb_url = get_template_directory_uri() . '/assets/image-default/user-image-default.jpg';
}

$tour_date_main = function_exists( 'get_field' ) ? (string) get_field( 'data_broniryvaniya', $booking_id ) : '';
$tour_date_main = trim( $tour_date_main );

$price = function_exists( 'get_field' ) ? (string) get_field( 'stoimost', $booking_id ) : '';

$bron = function_exists( 'travel_tour_booking_bron_status_from_acf' )
	? travel_tour_booking_bron_status_from_acf( $booking_id )
	: array( 'mod' => 'pending', 'label' => __( 'В ожидании', 'travel' ) );
$booking_card_status_mod = ( 'declined' === $bron['mod'] ) ? 'cancelled' : $bron['mod'];

$comments_count = (int) get_comments_number( $booking_id );
?>
<a href="<?php echo esc_url( home_url( '/user-booking-tour/' ) . '?booking_id=' . $booking_id ); ?>" class="user-booking-card user-booking-card--<?php echo esc_attr( $booking_card_status_mod ); ?>">
    <div class="user-booking-card__tour-thumb">
        <div class="user-booking-card__tour-thumb-inner">
            <img class="user-booking-card__tour-img" src="<?php echo esc_url( $thumb_url ); ?>" alt="" width="96" height="96" />
        </div>
    </div>

    <div class="user-booking-card__tour">
        <p class="user-booking-card__tour-title"><?php echo esc_html( $tour_title ); ?></p>
        <p class="user-booking-card__tour-subtitle"><?php echo esc_html( $subtitle ); ?></p>
    </div>

    <div class="user-booking-card__date">
        <p class="user-booking-card__date-label">Дата тура</p>
        <p class="user-booking-card__date-main"><?php echo esc_html( $tour_date_main ); ?></p>
        <p class="user-booking-card__date-sub"></p>
    </div>

    <div class="user-booking-card__price">
        <span class="user-booking-card__price-value">$ <?php echo esc_html( $price ); ?></span>
    </div>

    <div class="user-booking-card__status-wrap">
        <span class="user-booking-card__status user-booking-card__status--<?php echo esc_attr( $booking_card_status_mod ); ?>"><?php echo esc_html( $bron['label'] ); ?></span>
    </div>

    <div class="user-booking-card__messages">
        <span class="user-booking-card__messages-icon-wrap">
            <svg class="user-booking-card__messages-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
            </svg>
            <?php if ( $comments_count > 0 ) : ?>
            <span class="user-booking-card__messages-badge"><?php echo esc_html( '+' . (string) $comments_count ); ?></span>
            <?php endif; ?>
        </span>
    </div>
</a>
