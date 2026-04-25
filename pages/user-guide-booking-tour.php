<?php
/**
 * Template Name: user_guide_booking_tour
 * Страница «Стать гидом». Доступна только авторизованным.
 */

if ( ! is_user_logged_in() ) {
	wp_redirect( home_url( '/' ) );
	exit;
}

// обновление статуса бронирования
if ( 'POST' === ( $_SERVER['REQUEST_METHOD'] ?? '' )
	&& ! empty( $_POST['booking_id'] )
	&& isset( $_POST['booking_action'], $_POST['travel_booking_decision_nonce'] )
) {
	$posted_bid = (int) $_POST['booking_id'];
	if ( $posted_bid > 0 && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['travel_booking_decision_nonce'] ) ), 'travel_booking_decision_' . $posted_bid ) ) {
		$action     = sanitize_key( wp_unslash( $_POST['booking_action'] ) );
		$acf_status = ( 'decline' === $action ) ? 'Отклонено' : 'Одобрено';
		if ( function_exists( 'update_field' ) ) {
			update_field( 'status_broniryvaniya', $acf_status, $posted_bid );
		} else {
			$wp_status = ( 'decline' === $action ) ? 'draft' : 'publish';
			wp_update_post( array( 'ID' => $posted_bid, 'post_status' => $wp_status ) );
		}
		$page_id = (int) get_queried_object_id();
		$return  = $page_id ? get_permalink( $page_id ) : home_url( '/' );
		wp_safe_redirect( add_query_arg( array( 'booking_id' => $posted_bid, 'decision' => 'ok' ), $return ) );
		exit;
	}
}

$travel_booking_decision_ok = isset( $_GET['decision'] ) && 'ok' === sanitize_key( wp_unslash( $_GET['decision'] ) );

get_header();

set_query_var( 'current_user_aside_page', 'user-guide-bookings' );


$booking_id = isset( $_GET['booking_id'] ) ? intval( $_GET['booking_id'] ) : 0;
$booking_post_data = get_post( $booking_id );

$booking_detail_status_label = '';
$booking_detail_status_mod   = 'pending';

// данные бронирования
if ( $booking_post_data ) {
	$booking_title   = $booking_post_data->post_title;
	$booking_content = $booking_post_data->post_content;
	$booking_tour_id = get_field( 'id_tura', $booking_id );
	$booking_traveler_id = get_field( 'id_polzovatelya', $booking_id );

	$bron                        = travel_tour_booking_bron_status_from_acf( $booking_id );
	$booking_detail_status_label = $bron['label'];
	$booking_detail_status_mod   = $bron['mod'];

	if ( $booking_tour_id ) {
		$current_tour_data = get_current_tour_data( $booking_tour_id );
	}

	if ( $booking_traveler_id ) {
		$current_traveler_data = get_traveler_data( $booking_traveler_id );
	}
}

// данные тура
function get_current_tour_data( $tour_id ) {
    $tour_post_data = get_post( $tour_id );
    return $tour_post_data;
}

// данные путешественника
function get_traveler_data( $traveler_id ) {
	$uid = (int) $traveler_id;
	if ( $uid < 1 ) {
		return false;
	}
	return get_userdata( $uid );
}

// Аватар путешественника по ACF.
function get_user_avatar( $user_id ) {
	$default = get_template_directory_uri() . '/assets/image-default/user-image-default.jpg';
	$uid     = (int) $user_id;
	if ( $uid < 1 || ! function_exists( 'get_field' ) ) {
		return $default;
	}
	foreach ( array( 'avatar_polzyvatelya', 'foto_gida' ) as $acf_avatar_field ) {
		$av = get_field( $acf_avatar_field, 'user_' . $uid );
		if ( is_array( $av ) && ! empty( $av['url'] ) ) {
			return $av['url'];
		}
		if ( is_numeric( $av ) ) {
			$att_url = wp_get_attachment_image_url( (int) $av, 'full' );
			if ( $att_url ) {
				return $att_url;
			}
		}
		if ( is_string( $av ) && $av !== '' ) {
			return $av;
		}
	}
	return $default;
}

?>
<main class="main">
    <section class="user-account">
        <div class="container">
            <div class="user-account__inner">
                

                <!-- aside -->
                <?php get_template_part( 'components/user/aside' ); ?>

                <div class="user-account__user-booking-detail">
       
              
                    <article class="user-booking-detail">
                        <nav class="user-booking-detail__breadcrumbs" aria-label="Навигация">
                            <a href="<?php echo esc_url( home_url( '/user-guide-bookings/' ) ); ?>" class="user-booking-detail__breadcrumb-link">Бронирования</a>
                            <span class="user-booking-detail__breadcrumb-sep" aria-hidden="true">›</span>
                            <span class="user-booking-detail__breadcrumb-current"><?php echo esc_html( $booking_title ); ?></span>
                        </nav>

                        <!-- путешественник -->
                        <section class="user-booking-detail__traveler" aria-label="Путешественник">
                            <h2 class="user-booking-detail__traveler-heading">Заявка на бронирование</h2>
                            <div class="user-booking-detail__traveler-card">
                                <div class="user-booking-detail__traveler-avatar-wrap">
                                    <img class="user-booking-detail__traveler-avatar" src="<?php echo esc_url( get_user_avatar( $current_traveler_data->ID ) ); ?>" alt="" width="64" height="64" />
                                </div>
                                <div class="user-booking-detail__traveler-info">
                                    <p class="user-booking-detail__traveler-label">Путешественник</p>
                                    <a class="user-booking-detail__traveler-name user-booking-detail__traveler-name--link">
                                       <?php echo esc_html( $current_traveler_data->display_name ); ?>
                                    </a>
                                </div>
                            </div>
                        </section>

                        <!-- тура -->
                        <section class="user-booking-detail__summary">
                            <div class="user-booking-detail__summary-media">
                                <a href="/tour.html" class="user-booking-detail__thumb-link" aria-label="Перейти к странице тура">
                                    <div class="user-booking-detail__thumb">
                                        <img class="user-booking-detail__thumb-img" src="<?php echo esc_url( get_the_post_thumbnail_url( $current_tour_data->ID ) ); ?>" alt="" width="120" height="120" />
                                    </div>
                                </a>
                                <div class="user-booking-detail__summary-main">
                                    <h1 class="user-booking-detail__title"><?php echo esc_html( $current_tour_data->post_title ); ?></h1>
                                    <p class="user-booking-detail__subtitle">
                                        <?php echo esc_html( get_field( 'korotkoe_opisanie_kartochki', $current_tour_data->ID ) ); ?>
                                    </p>
                                    <div class="user-booking-detail__summary-meta">
                                        <span class="user-booking-detail__status user-booking-detail__status--<?php echo esc_attr( $booking_detail_status_mod ); ?>">
                                            <?php echo esc_html( $booking_detail_status_label ); ?>
                                        </span>
                                        <span class="user-booking-detail__booking-id">№ <?php echo esc_html( $booking_id ); ?></span>
                                    </div>
                                    <div class="user-booking-detail__tour-actions">
                                        <a href="<?php echo esc_url( get_permalink( $current_tour_data->ID ) ); ?>" class="user-booking-detail__btn">Перейти к туру</a>
                                        <a href="<?php echo esc_url( get_permalink( $current_tour_data->ID ) ); ?>" target="_blank" rel="noopener noreferrer" class="user-booking-detail__btn user-booking-detail__btn--outline">Открыть тур в новой вкладке</a>
                                    </div>
                                </div>
                            </div>
    
                            <dl class="user-booking-detail__metrics">
                                <div class="user-booking-detail__metric">
                                    <dt class="user-booking-detail__metric-label">Дата тура</dt>
                                    <dd class="user-booking-detail__metric-value"><?php echo esc_html( get_field( 'data_broniryvaniya', $booking_id ) ); ?></dd>
                                </div>
                                <div class="user-booking-detail__metric">
                                    <dt class="user-booking-detail__metric-label">Количество участников</dt>
                                    <dd class="user-booking-detail__metric-value"><?php echo esc_html( get_field( 'kolichestvo_lyudej', $booking_id ) ); ?></dd>
                                </div>
                                <div class="user-booking-detail__metric">
                                    <dt class="user-booking-detail__metric-label">Стоимость</dt>
                                    <dd class="user-booking-detail__metric-value">$ <?php echo esc_html( get_field( 'stoimost', $booking_id ) ); ?></dd>
                                </div>
                            </dl>
    
                        </section>
    
						<?php if ( $booking_id > 0 && $booking_post_data ) : ?>
						<?php
						$booking_bron            = travel_tour_booking_bron_status_from_acf( $booking_id );
						$booking_decision_locked = $booking_bron['is_final'];
						?>
                        <section class="user-booking-detail__guide-decision" aria-labelledby="user-booking-guide-decision-title">
                            <h2 id="user-booking-guide-decision-title" class="user-booking-detail__guide-decision-title"><?php esc_html_e( 'Решение по заявке', 'travel' ); ?></h2>
							<?php if ( $travel_booking_decision_ok ) : ?>
							<p class="user-booking-detail__decision-notice user-booking-detail__decision-notice--ok" role="status"><?php esc_html_e( 'Статус заявки обновлён.', 'travel' ); ?></p>
							<?php endif; ?>
							<?php if ( $booking_decision_locked && ! $travel_booking_decision_ok ) : ?>
							<p class="user-booking-detail__decision-final<?php echo 'confirmed' === $booking_bron['mod'] ? ' user-booking-detail__decision-final--approved' : ' user-booking-detail__decision-final--declined'; ?>" role="status">
								<?php
								if ( 'confirmed' === $booking_bron['mod'] ) {
									esc_html_e( 'Решение по заявке уже принято: бронирование одобрено.', 'travel' );
								} else {
									esc_html_e( 'Решение по заявке уже принято: бронирование отклонено.', 'travel' );
								}
								?>
							</p>
							<?php elseif ( ! $booking_decision_locked ) : ?>
                            <form class="user-booking-detail__guide-decision-form" method="post" action="<?php echo esc_url( get_permalink( (int) get_queried_object_id() ) ); ?>">
								<?php wp_nonce_field( 'travel_booking_decision_' . (int) $booking_id, 'travel_booking_decision_nonce' ); ?>
								<input type="hidden" name="booking_id" value="<?php echo esc_attr( (string) (int) $booking_id ); ?>" />
                                <div class="user-booking-detail__guide-decision-actions">
                                    <button type="submit" name="booking_action" value="confirm" class="user-booking-detail__btn"><?php esc_html_e( 'Подтвердить бронирование', 'travel' ); ?></button>
                                    <button type="submit" name="booking_action" value="decline" class="user-booking-detail__btn user-booking-detail__btn--outline user-booking-detail__btn--decline"><?php esc_html_e( 'Отклонить бронирование', 'travel' ); ?></button>
                                </div>
                            </form>
							<?php endif; ?>
                        </section>
						<?php endif; ?>

                        <!-- чат -->
                        <?php
						if ( $booking_id > 0 && $booking_post_data ) {
							get_template_part( 'components/user/user-booking-chat' );
						}
						?>

                    </article>
                 
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
