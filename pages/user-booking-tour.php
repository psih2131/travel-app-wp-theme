<?php
/**
 * Template Name: user_booking_tour
 * Страница заказов пользователя. Доступна только авторизованным.
 */
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url( '/' ) );
    exit;
}

get_header();

set_query_var( 'current_user_aside_page', 'user-orders' );


$booking_id = isset( $_GET['booking_id'] ) ? intval( $_GET['booking_id'] ) : 0;
$booking_post_data = get_post( $booking_id );
$booking_status = function_exists( 'get_field' ) ? (string) get_field( 'status_broniryvaniya', $booking_id ) : '';
$booking_status = trim( $booking_status );
$booking_bron   = function_exists( 'travel_tour_booking_bron_status_from_acf' )
	? travel_tour_booking_bron_status_from_acf( $booking_id )
	: array( 'mod' => 'pending', 'label' => __( 'В ожидании', 'travel' ) );

$tour_id = get_field( 'id_tura', $booking_id );
$tour_post_data = get_post( $tour_id );

$guide_id = get_field( 'id_gida', $booking_id );
$guide_user_data = get_userdata( (int) $guide_id );
$guide_avatar = get_field( 'foto_gida', 'user_' . $guide_id );



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
                            <a href="<?php echo home_url( '/user-orders/' ); ?>" class="user-booking-detail__breadcrumb-link">Мои бронирования</a>
                            <span class="user-booking-detail__breadcrumb-sep" aria-hidden="true">›</span>
                            <span class="user-booking-detail__breadcrumb-current">
                                <?php echo $booking_post_data->post_title; ?>
                            </span>
                        </nav>
    
    
                        <div class="user-booking-detail__summary">
                            <div class="user-booking-detail__summary-media">
                                <a href="/tour.html" class="user-booking-detail__thumb-link" aria-label="Перейти к странице тура">
                                    <div class="user-booking-detail__thumb">
                                        <img class="user-booking-detail__thumb-img" src="<?php echo get_the_post_thumbnail_url( $tour_id ); ?>" alt="" width="120" height="120" />
                                    </div>
                                </a>
                                <div class="user-booking-detail__summary-main">
                                    <h1 class="user-booking-detail__title">
                                        <?php echo $tour_post_data->post_title; ?>
                                    </h1>
                                    <p class="user-booking-detail__subtitle">
                                        <?php echo get_field( 'korotkoe_opisanie_kartochki', $tour_id ); ?>
                                    </p>
                                    <div class="user-booking-detail__summary-meta">
                                        <span class="user-booking-detail__status user-booking-detail__status--<?php echo esc_attr( $booking_bron['mod'] ); ?>"><?php echo esc_html( $booking_bron['label'] ); ?></span>
                                        <span class="user-booking-detail__booking-id">№ <?php echo $booking_id; ?></span>
                                    </div>
                                    <div class="user-booking-detail__tour-actions">
                                        <a href="<?php echo get_permalink( $tour_id ); ?>" class="user-booking-detail__btn">Перейти к туру</a>
                                        <a href="<?php echo get_permalink( $tour_id ); ?>" target="_blank" rel="noopener noreferrer" class="user-booking-detail__btn user-booking-detail__btn--outline">Открыть тур в новой вкладке</a>
                                    </div>
                                </div>
                            </div>
    
                            <dl class="user-booking-detail__metrics">
                                <div class="user-booking-detail__metric">
                                    <dt class="user-booking-detail__metric-label">Дата тура</dt>
                                    <dd class="user-booking-detail__metric-value"><?php echo get_field( 'data_broniryvaniya', $booking_id ); ?></dd>
                                </div>
                                <div class="user-booking-detail__metric">
                                    <dt class="user-booking-detail__metric-label">Количество участников</dt>
                                    <dd class="user-booking-detail__metric-value"><?php echo get_field( 'kolichestvo_lyudej', $booking_id ); ?></dd>
                                </div>
                                <div class="user-booking-detail__metric">
                                    <dt class="user-booking-detail__metric-label">Стоимость</dt>
                                    <dd class="user-booking-detail__metric-value">$ <?php echo get_field( 'stoimost', $booking_id ); ?></dd>
                                </div>
                            </dl>
    
                            <a href="<?php echo get_author_posts_url( $guide_id ); ?>" class="user-booking-detail__guide-mini" aria-label="Профиль гида: <?php echo $guide_user_data->display_name; ?>">
                                <div class="user-booking-detail__guide-avatar-wrap">
                                    <img class="user-booking-detail__guide-avatar" src="<?php echo $guide_avatar['url']; ?>" alt="<?php echo $guide_user_data->display_name; ?>" width="44" height="44" />
                                </div>
                                <div class="user-booking-detail__guide-text">
                                    <p class="user-booking-detail__guide-label">Гид</p>
                                    <p class="user-booking-detail__guide-name"><?php echo $guide_user_data->display_name; ?></p>
                                </div>
                            </a>
                        </div>
    
    
						<?php if ( 'Отклонено' !== $booking_status ) : ?>
                        <section class="user-booking-detail__payment" aria-label="Оплата">
                            <!-- payment-state: ожидание подтверждения гида -->
                            <div class="user-booking-detail__payment-inner user-booking-detail__payment-inner--waiting" data-payment-state="waiting">
                                <h2 id="user-booking-payment-wait" class="user-booking-detail__payment-title">Оплата</h2>
                                <p class="user-booking-detail__payment-wait-text">Оплата будет доступна после подтверждения гидом</p>
                            </div>
                            <!-- payment-state: оплата доступна -->
                            <div class="user-booking-detail__payment-inner user-booking-detail__payment-inner--ready" data-payment-state="ready">
                                <h2 id="user-booking-payment-ready" class="user-booking-detail__payment-title">Оплата</h2>
                                <p class="user-booking-detail__payment-lead">Сумма к оплате: <strong>$ 5 370</strong></p>
                                <a href="#" class="user-booking-detail__payment-pay-btn">Оплатить тур</a>
                            </div>
                        </section>
    
                        <?php get_template_part( 'components/user/user-booking-chat' ); ?>
    
						<?php
						$tour_review_param = isset( $_GET['tour_review'] ) ? sanitize_key( (string) wp_unslash( $_GET['tour_review'] ) ) : '';
						$booking_in_url    = isset( $_GET['booking_id'] ) ? (int) $_GET['booking_id'] : 0;
						if ( $tour_review_param && (int) $booking_in_url === (int) $booking_id && 'thanks' === $tour_review_param ) {
							echo '<p class="user-booking-review__status user-booking-review__status--ok" role="status">' . esc_html__( 'Отзыв опубликован. Спасибо!', 'travel' ) . '</p>';
						}
						if ( $tour_review_param && (int) $booking_in_url === (int) $booking_id && 'err' === $tour_review_param ) {
							echo '<p class="user-booking-review__status user-booking-review__status--err" role="alert">' . esc_html__( 'Не удалось отправить отзыв. Проверьте оценку и текст, затем попробуйте снова.', 'travel' ) . '</p>';
						}
						get_template_part(
							'components/user/user-booking-tour-review',
							null,
							array(
								'tour_id'    => (int) $tour_id,
								'booking_id' => (int) $booking_id,
							)
						);
						?>
						<?php endif; ?>
                    </article>
                </div>

            </div>
        </div>
    </section>
</main>
<?php
get_footer();
