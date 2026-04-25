<?php
// клиент бронирования
$booking_author_id  = (int) get_post_field( 'post_author', get_the_ID() );
$booking_user       = $booking_author_id ? get_userdata( $booking_author_id ) : false;
$default_avatar_url = get_template_directory_uri() . '/assets/image-default/user-image-default.jpg';
$client_avatar_url  = $default_avatar_url;
$client_avatar_alt  = '';
$client_name        = '';

if ( $booking_user ) {
	$client_name = $booking_user->display_name;
	if ( function_exists( 'get_field' ) ) {
		$imya     = get_field( 'imya', 'user_' . $booking_author_id );
		$familiya = get_field( 'familiya', 'user_' . $booking_author_id );
		$imya     = is_string( $imya ) ? trim( $imya ) : '';
		$familiya = is_string( $familiya ) ? trim( $familiya ) : '';
		if ( $imya !== '' || $familiya !== '' ) {
			$client_name = trim( $imya . ' ' . $familiya );
		}
		foreach ( array( 'avatar_polzyvatelya', 'foto_gida' ) as $acf_avatar_field ) {
			$av = get_field( $acf_avatar_field, 'user_' . $booking_author_id );
			if ( is_array( $av ) && ! empty( $av['url'] ) ) {
				$client_avatar_url = $av['url'];
				if ( ! empty( $av['alt'] ) ) {
					$client_avatar_alt = (string) $av['alt'];
				}
				break;
			}
			if ( is_numeric( $av ) ) {
				$att_url = wp_get_attachment_image_url( (int) $av, 'full' );
				if ( $att_url ) {
					$client_avatar_url = $att_url;
					break;
				}
			}
			if ( is_string( $av ) && $av !== '' ) {
				$client_avatar_url = $av;
				break;
			}
		}
	}
	$client_avatar_alt = $client_avatar_alt !== '' ? $client_avatar_alt : $client_name;
} else {
	$client_name = __( 'Пользователь', 'travel' );
	$client_avatar_alt = $client_name;
}

// дата бронирования
$booking_created   = get_post_datetime( get_post(), 'date' );
$booking_time_main      = $booking_created ? wp_date( 'H:i', $booking_created->getTimestamp() ) : '—';
$booking_date_sub       = $booking_created ? wp_date( 'j F Y', $booking_created->getTimestamp() ) : '—';
$booking_comment_count  = (int) get_comments_number( get_the_ID() );

// статус: ACF status_broniryvaniya
$booking_bron = function_exists( 'travel_tour_booking_bron_status_from_acf' )
	? travel_tour_booking_bron_status_from_acf( (int) get_the_ID() )
	: array( 'label' => __( 'В ожидании', 'travel' ), 'mod' => 'pending' );
$booking_status_modifier = $booking_bron['mod'];
$booking_status_label    = $booking_bron['label'];

// описание бронирования
$booking_opisanie = function_exists( 'get_field' ) ? get_field( 'opisanie_broniryvaniya' ) : '';
$booking_opisanie = is_string( $booking_opisanie ) ? $booking_opisanie : '';
$booking_opisanie = function_exists( 'travel_truncate_text' ) ? travel_truncate_text( $booking_opisanie, 1000 ) : $booking_opisanie;
?>

<a href="<?php echo esc_url( home_url( '/user-guide-booking-tour/' ) . '?booking_id=' . get_the_ID() ); ?>" class="user-guide-booking-card user-guide-booking-card--<?php echo esc_attr( $booking_status_modifier ); ?>">
    <div class="user-guide-booking-card__client">
        <div class="user-guide-booking-card__avatar-wrap">
            <img class="user-guide-booking-card__avatar" src="<?php echo esc_url( $client_avatar_url ); ?>" alt="<?php echo esc_attr( $client_avatar_alt ); ?>" width="72" height="72" loading="lazy" decoding="async" />
        </div>
        <p class="user-guide-booking-card__client-name"><?php echo esc_html( $client_name ); ?></p>
    </div>

    <div class="user-guide-booking-card__tour">
        <p class="user-guide-booking-card__tour-title"><?php the_title(); ?></p>
        <p class="user-guide-booking-card__tour-subtitle"><?php echo esc_html( $booking_opisanie ); ?></p>
    </div>

    <div class="user-guide-booking-card__date">
        <p class="user-guide-booking-card__date-label"><?php esc_html_e( 'Создано', 'travel' ); ?></p>
        <p class="user-guide-booking-card__date-main"><?php echo esc_html( $booking_time_main ); ?></p>
        <p class="user-guide-booking-card__date-sub"><?php echo esc_html( $booking_date_sub ); ?></p>
    </div>

    <div class="user-guide-booking-card__price">
        <span class="user-guide-booking-card__price-value">$ <?php the_field('stoimost'); ?></span>
    </div>

    <div class="user-guide-booking-card__status-wrap">
        <span class="user-guide-booking-card__status user-guide-booking-card__status--<?php echo esc_attr( $booking_status_modifier ); ?>"><?php echo esc_html( $booking_status_label ); ?></span>
    </div>

    <div class="user-guide-booking-card__messages">
        <span class="user-guide-booking-card__messages-icon-wrap">
            <svg class="user-guide-booking-card__messages-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
            </svg>
            <?php if ( $booking_comment_count > 0 ) : ?>
            <span class="user-guide-booking-card__messages-badge"><?php echo esc_html( (string) $booking_comment_count ); ?></span>
            <?php endif; ?>
        </span>
    </div>
</a>