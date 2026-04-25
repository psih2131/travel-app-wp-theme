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
    
                        <section class="user-booking-review" aria-labelledby="user-booking-review-title">
                            <h2 id="user-booking-review-title" class="user-booking-review__title">Оставить комментарий</h2>
                            <form class="user-booking-review__form js-user-booking-review-form" action="#" method="post" novalidate>
                                <input type="hidden" name="booking_review_rating" value="" class="js-user-booking-review-rating" autocomplete="off" />
                        
                                <div class="user-booking-review__field">
                                    <span class="user-booking-review__label" id="user-booking-review-stars-label">Оценка</span>
                                    <div
                                        class="user-booking-review__stars js-user-booking-review-stars"
                                        data-rating="0"
                                        role="radiogroup"
                                        aria-labelledby="user-booking-review-stars-label"
                                    >
                                        <button type="button" class="user-booking-review__star js-user-booking-review-star" data-value="1" aria-label="1 из 5 звёзд">★</button>
                                        <button type="button" class="user-booking-review__star js-user-booking-review-star" data-value="2" aria-label="2 из 5 звёзд">★</button>
                                        <button type="button" class="user-booking-review__star js-user-booking-review-star" data-value="3" aria-label="3 из 5 звёзд">★</button>
                                        <button type="button" class="user-booking-review__star js-user-booking-review-star" data-value="4" aria-label="4 из 5 звёзд">★</button>
                                        <button type="button" class="user-booking-review__star js-user-booking-review-star" data-value="5" aria-label="5 из 5 звёзд">★</button>
                                    </div>
                                </div>
                        
                                <div class="user-booking-review__field">
                                    <label for="user-booking-review-text" class="user-booking-review__label">Ваш отзыв</label>
                                    <textarea
                                        id="user-booking-review-text"
                                        name="booking_review_text"
                                        class="user-booking-review__textarea"
                                        rows="4"
                                        placeholder="Расскажите, как прошёл тур и общение с гидом"
                                        autocomplete="off"
                                    ></textarea>
                                </div>
                        
                                <p class="user-booking-review__error js-user-booking-review-error" role="alert" hidden></p>
                                <button type="submit" class="user-booking-review__submit">Отправить отзыв</button>
                            </form>
                        </section>
						<?php endif; ?>
                    </article>
                </div>

            </div>
        </div>
    </section>
</main>
<?php
get_footer();
