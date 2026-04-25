<?php
/*
Template Name: Tour Booking
*/



if ( ! is_user_logged_in() ) {
	wp_redirect( home_url( '/' ) );
	exit;
}

/**
 * Максимум участников по значению ACF «количество людей».
 *
 * @param mixed $tour_count_people Значение поля.
 * @return int
 */
if ( ! function_exists( 'get_tour_count_number_max' ) ) {
function get_tour_count_number_max( $tour_count_people ) {
	$k = str_replace( array( ' ', '–', '—' ), array( '', '-', '-' ), trim( (string) $tour_count_people ) );
	$m = array(
		'1'       => 1,
		'3-5'     => 5,
		'5-10'    => 10,
		'10-15'   => 15,
		'15-20'   => 20,
		'>20'     => 50,
		'3_5'     => 5,
		'5_10'    => 10,
		'10_15'   => 15,
		'15_20'   => 20,
		'over_20' => 50,
	);
	return isset( $m[ $k ] ) ? $m[ $k ] : 1;
}
}

/**
 * Стоимость заявки: цена слота из ACF × участники (если «за человека») или только слот («за группу»).
 *
 * @param float $slot_price    Цена из выбранной строки dostupnye_daty.
 * @param int   $participants  Количество людей.
 * @param mixed $tip_czeny     Значение ACF tip_czeny.
 * @return float
 */
if ( ! function_exists( 'travel_tour_booking_compute_stoimost' ) ) {
function travel_tour_booking_compute_stoimost( $slot_price, $participants, $tip_czeny ) {
	$slot_price   = (float) $slot_price;
	$participants = max( 1, (int) $participants );
	$tip          = is_string( $tip_czeny ) ? trim( $tip_czeny ) : '';
	if ( 'Цена за группу' === $tip ) {
		return $slot_price;
	}
	return $slot_price * $participants;
}
}

$travel_booking_flash = null;
if ( 'POST' !== ( $_SERVER['REQUEST_METHOD'] ?? '' ) || ! isset( $_POST['travel_tour_booking_submit'] ) ) {
	if ( isset( $_GET['booking'] ) && 'ok' === $_GET['booking'] ) {
		$travel_booking_flash = 'success';
	} elseif ( isset( $_GET['booking'] ) && 'error' === $_GET['booking'] ) {
		$travel_booking_flash = 'error';
	}
}

if ( 'POST' === ( $_SERVER['REQUEST_METHOD'] ?? '' ) && isset( $_POST['travel_tour_booking_submit'] ) ) {
	$p                       = wp_unslash( $_POST );
	$posted_tour_id_redirect = isset( $p['tour_id'] ) ? absint( $p['tour_id'] ) : 0;
	$return_base             = get_permalink( get_queried_object_id() );
	if ( ! $return_base ) {
		$return_base = home_url( '/' );
	}

	$tour_booking_pto = get_post_type_object( 'tour-bookings' );
	$tour_booking_cap = $tour_booking_pto && ! empty( $tour_booking_pto->cap->edit_posts )
		? $tour_booking_pto->cap->edit_posts
		: 'edit_tour_bookings';

	if ( empty( $p['travel_tour_booking_nonce'] ) || ! wp_verify_nonce( $p['travel_tour_booking_nonce'], 'travel_tour_booking' ) ) {
		$travel_booking_flash = 'error';
	} elseif ( ! current_user_can( $tour_booking_cap ) ) {
		$travel_booking_flash = 'error';
	} else {
		$posted_tour_id = $posted_tour_id_redirect;
		$posted_tour    = get_post( $posted_tour_id );

		if ( ! $posted_tour || 'tours' !== $posted_tour->post_type ) {
			$travel_booking_flash = 'error';
		} else {
			$tour_type_price_pb = function_exists( 'get_field' ) ? get_field( 'tip_czeny', $posted_tour_id ) : '';
			$tour_count_people_pb = function_exists( 'get_field' ) ? get_field( 'kolichestvo_lyudej', $posted_tour_id ) : '';
			$max_p                = $tour_count_people_pb ? get_tour_count_number_max( $tour_count_people_pb ) : 1;

			$tour_date_raw = isset( $p['tour_date'] ) ? sanitize_text_field( $p['tour_date'] ) : '';
			$slot_index    = 0;
			if ( preg_match( '/^slot-(\d+)$/', $tour_date_raw, $tm ) ) {
				$slot_index = (int) $tm[1];
			}

			$rows = function_exists( 'get_field' ) ? get_field( 'dostupnye_daty', $posted_tour_id ) : null;
			$row  = null;
			if ( is_array( $rows ) && $slot_index >= 1 && isset( $rows[ $slot_index - 1 ] ) ) {
				$row = $rows[ $slot_index - 1 ];
			}

			$participants = isset( $p['participants'] ) ? absint( $p['participants'] ) : 0;
			if ( $participants < 1 || $participants > $max_p ) {
				$participants = 0;
			}

			$imya    = isset( $p['customer_name'] ) ? sanitize_text_field( $p['customer_name'] ) : '';
			$email   = isset( $p['customer_email'] ) ? sanitize_email( $p['customer_email'] ) : '';
			$telefon = isset( $p['customer_phone'] ) ? sanitize_text_field( $p['customer_phone'] ) : '';

			if ( ! $row || $participants < 1 || '' === $imya || ! is_email( $email ) ) {
				$travel_booking_flash = 'error';
			} else {
				$data_bron = isset( $row['data'] ) ? sanitize_text_field( (string) $row['data'] ) : '';
				$czena_raw   = isset( $row['czena'] ) ? $row['czena'] : '';
				$czena_clean = preg_replace( '/[^\d.,-]/', '', (string) $czena_raw );
				$czena_clean = str_replace( ',', '.', $czena_clean );
				$czena_num   = ( '' !== $czena_clean && is_numeric( $czena_clean ) ) ? (float) $czena_clean : 0.0;

				$stoimost = travel_tour_booking_compute_stoimost( $czena_num, $participants, $tour_type_price_pb );

				$tour_author_id = (int) $posted_tour->post_author;
				$current_uid    = get_current_user_id();

				$booking_title = 'Бронирование - ' . $posted_tour->post_title;

				$booking_id = wp_insert_post(
					array(
						'post_title'     => $booking_title,
						'post_type'      => 'tour-bookings',
						'post_status'    => 'publish',
						'post_author'    => $current_uid,
						'comment_status' => 'open',
					),
					true
				);

				if ( is_wp_error( $booking_id ) || ! $booking_id ) {
					$travel_booking_flash = 'error';
				} elseif ( function_exists( 'update_field' ) ) {
					$opisanie_broniryvaniya_value = get_field( 'korotkoe_opisanie_kartochki', $posted_tour_id );
					$opisanie_broniryvaniya_value = is_string( $opisanie_broniryvaniya_value )
						? sanitize_textarea_field( $opisanie_broniryvaniya_value )
						: '';
					update_field( 'field_69db642edbc70', (string) $current_uid, $booking_id );
					update_field( 'field_69db645bdbc71', (string) $posted_tour_id, $booking_id );
					update_field( 'field_69db6527339a6', (string) $tour_author_id, $booking_id );
					update_field( 'field_69db64c7dbc72', $imya, $booking_id );
					update_field( 'field_69db64cbdbc73', $email, $booking_id );
					update_field( 'field_69db64cfdbc74', $telefon, $booking_id );
					update_field( 'field_69db64d6dbc75', $data_bron, $booking_id );
					update_field( 'field_69db64efdbc76', (string) $participants, $booking_id );
					update_field( 'field_69db64f7dbc77', $stoimost, $booking_id );
					update_field( 'opisanie_broniryvaniya', $opisanie_broniryvaniya_value, $booking_id );
					update_field( 'status_broniryvaniya', 'В ожидании', $booking_id );

					$booking_message = isset( $p['comment'] ) ? trim( (string) $p['comment'] ) : '';
					if ( '' !== $booking_message && $current_uid > 0 ) {
						$booking_message = sanitize_textarea_field( $booking_message );
					} else {
						$booking_message = '';
					}
					if ( '' !== $booking_message ) {
						$u = get_userdata( (int) $current_uid );
						wp_new_comment(
							array(
								'comment_post_ID'      => (int) $booking_id,
								'comment_content'      => $booking_message,
								'user_id'              => (int) $current_uid,
								'comment_author'       => $u ? $u->display_name : '',
								'comment_author_email' => $u ? $u->user_email : '',
								'comment_author_url'   => $u ? $u->user_url : '',
							),
							true
						);
					}

					wp_safe_redirect(
						add_query_arg(
							array(
								'tour_id' => $posted_tour_id,
								'booking' => 'ok',
							),
							$return_base
						)
					);
					exit;
				} else {
					wp_delete_post( $booking_id, true );
					$travel_booking_flash = 'error';
				}
			}
		}
	}

	if ( $posted_tour_id_redirect > 0 ) {
		wp_safe_redirect(
			add_query_arg(
				array(
					'tour_id' => $posted_tour_id_redirect,
					'booking' => 'error',
				),
				$return_base
			)
		);
	} else {
		wp_safe_redirect( home_url( '/' ) );
	}
	exit;
}

$tour_id = isset( $_GET['tour_id'] ) ? intval( $_GET['tour_id'] ) : 0;
$tour = get_post( $tour_id );
if ( ! $tour ) {
    wp_redirect( home_url( '/' ) );
    exit;
}

$tour_title = $tour->post_title;
$tour_type_price = get_field('tip_czeny', $tour_id);
$tour_count_people = get_field('kolichestvo_lyudej', $tour_id);
$tour_count_number_max = 0;
$tour_duration = get_field('prodolzhitelnost_tura', $tour_id);

if($tour_count_people) {
    $tour_count_number_max = get_tour_count_number_max( $tour_count_people );
}

$travel_booking_form_action = get_permalink( get_queried_object_id() );
if ( ! $travel_booking_form_action ) {
	$travel_booking_form_action = home_url( '/' );
}
$travel_booking_form_action = add_query_arg( 'tour_id', $tour_id, $travel_booking_form_action );

?>

<?php get_header() ?>

<main class="main">

    <section class="tour-booking">
        <div class="container">
            <nav class="tour-booking__breadcrumbs bread-crumbs" aria-label="Хлебные крошки">
                <a href="/index.html" class="bread-crumbs__link">
                    Главная
                    <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.4394 3.99908L0.969727 1.52941L2.03039 0.46875L5.56072 3.99908L2.03039 7.52941L0.969727 6.46875L3.4394 3.99908Z"
                            fill="#202020" />
                    </svg>
                </a>
                <a href="/tours.html" class="bread-crumbs__link">
                    Туры
                    <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.4394 3.99908L0.969727 1.52941L2.03039 0.46875L5.56072 3.99908L2.03039 7.52941L0.969727 6.46875L3.4394 3.99908Z"
                            fill="#202020" />
                    </svg>
                </a>
                <a href="/tour.html" class="bread-crumbs__link">
                    <?php echo $tour_title; ?>
                    <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.4394 3.99908L0.969727 1.52941L2.03039 0.46875L5.56072 3.99908L2.03039 7.52941L0.969727 6.46875L3.4394 3.99908Z"
                            fill="#202020" />
                    </svg>
                </a>
                <p class="bread-crumbs__current">Бронирование</p>
            </nav>
            <header class="tour-booking__header">
                <h1 class="tour-booking__title"><?php echo $tour_title; ?></h1>
                <p class="tour-booking__subtitle">Авторский тур в Хошимине</p>
            </header>
    
            <div class="tour-booking__layout">
                <div class="tour-booking__main">
					<?php if ( 'success' === $travel_booking_flash ) : ?>
						<p class="tour-booking__disclaimer tour-booking__disclaimer--flash tour-booking__disclaimer--success" role="status">Заявка отправлена.</p>
					<?php elseif ( 'error' === $travel_booking_flash ) : ?>
						<p class="tour-booking__disclaimer tour-booking__disclaimer--flash tour-booking__disclaimer--error" role="alert">Не удалось отправить заявку. Проверьте поля и попробуйте снова.</p>
					<?php endif; ?>
                    
                    <form class="tour-booking__form js-tour-booking-form" action="<?php echo esc_url( $travel_booking_form_action ); ?>" method="post" novalidate>
						<?php wp_nonce_field( 'travel_tour_booking', 'travel_tour_booking_nonce' ); ?>
						<input type="hidden" name="travel_tour_booking_submit" value="1" />
						<input type="hidden" name="tour_id" value="<?php echo esc_attr( (string) $tour_id ); ?>" />
                        <fieldset class="tour-booking__fieldset">
                            <legend class="tour-booking__legend">Даты</legend>
                            <div class="tour-booking__dates-grid" role="radiogroup" aria-label="Доступные даты тура">
                                <?php
                                // Повторитель ACF: имя поля + ID поста тура (не результат get_field).
                                if ( have_rows( 'dostupnye_daty', $tour_id ) ) :
                                    while ( have_rows( 'dostupnye_daty', $tour_id ) ) :
                                        the_row();
                                        $travel_date_slot_value = 'slot-' . get_row_index();
                                        $travel_date_price      = get_sub_field( 'czena' );
                                        $travel_date_price_attr = is_numeric( $travel_date_price )
                                            ? (string) $travel_date_price
                                            : preg_replace( '/[^\d.]/', '', (string) $travel_date_price );
                                        ?>
                                <label class="tour-booking__date-card">
                                    <input
                                        type="radio"
                                        name="tour_date"
                                        value="<?php echo esc_attr( $travel_date_slot_value ); ?>"
                                        class="tour-booking__date-input"
                                        data-price="<?php echo esc_attr( $travel_date_price_attr ); ?>"
                                        <?php echo 1 === (int) get_row_index() ? 'checked' : ''; ?>
                                    />
                                    <span class="tour-booking__date-card-inner">
                                        <span class="tour-booking__date-range"><?php the_sub_field( 'data' ); ?></span>
                                        <span class="tour-booking__date-price">$ <?php the_sub_field( 'czena' ); ?> / <?php echo $tour_type_price;?></span>
                                    </span>
                                </label>
                                        <?php
                                    endwhile;
                                else :
                                    ?>
                                <p class="tour-booking__no-dates">Нет доступных дат для этого тура.</p>
                                    <?php
                                endif;
                                ?>
                                
                                
                            </div>
                        </fieldset>
    
                        <div class="tour-booking__field tour-booking__field--group">
                            <div class="tour-booking__field-head">
                                <label class="tour-booking__label" for="tour-booking-participants">Сколько вас будет</label>
                                <span class="tour-booking__field-hint">до <?php echo $tour_count_number_max; ?> участников</span>
                            </div>
                            <select id="tour-booking-participants" name="participants" class="tour-booking__select js-tour-booking-participants">
                                <?php for ($i = 1; $i <= $tour_count_number_max; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
    
                        <div class="tour-booking__contacts">
                            <div class="tour-booking__contact-col">
                                <label class="tour-booking__label" for="tour-booking-name">Как вас зовут</label>
                                <input type="text" id="tour-booking-name" name="customer_name" class="tour-booking__input" placeholder="Имя" autocomplete="name" />
                            </div>
                            <div class="tour-booking__contact-col">
                                <label class="tour-booking__label" for="tour-booking-email">Ваша эл. почта</label>
                                <input type="email" id="tour-booking-email" name="customer_email" class="tour-booking__input" placeholder="email@example.com" autocomplete="email" />
                            </div>
                            <div class="tour-booking__contact-col">
                                <label class="tour-booking__label" for="tour-booking-phone">Ваш телефон</label>
                                <div class="tour-booking__phone">
                                    <span class="tour-booking__phone-prefix" aria-hidden="true">
                                        <span class="tour-booking__phone-flag" title="Россия"></span>
                                        <span class="tour-booking__phone-code">+7</span>
                                    </span>
                                    <input type="tel" id="tour-booking-phone" name="customer_phone" class="tour-booking__input tour-booking__input--phone" placeholder="900 000-00-00" autocomplete="tel" inputmode="numeric" />
                                </div>
                            </div>
                        </div>
    
                        <div class="tour-booking__field">
                            <div class="tour-booking__field-head">
                                <label class="tour-booking__label" for="tour-booking-comment">Вопросы и комментарии</label>
                                <span class="tour-booking__field-hint tour-booking__field-hint--muted">если хотите</span>
                            </div>
                            <textarea id="tour-booking-comment" name="comment" class="tour-booking__textarea" rows="4" placeholder="Напишите вопрос организатору"></textarea>
                        </div>
    
                        <div class="tour-booking__footer">
                            <p class="tour-booking__total js-tour-booking-total" aria-live="polite">Стоимость: $ 7 470 за 3 человека</p>
                            <p class="tour-booking__disclaimer">Вам не нужно ничего оплачивать, пока вы не получите подтверждение организатора.</p>
                            <button type="submit" class="tour-booking__submit offer-reserve-btn">
                                <span class="offer-reserve-btn__text">Отправить заявку</span>
                                <span class="offer-reserve-btn__icon-wrapper">
                                    <svg width="145" height="145" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
                                            fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
                                        <path
                                            d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
                                            fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
                                        <path
                                            d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
                                            fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
                                        <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
    
                <aside class="tour-booking__aside" aria-label="Информация об организаторе и туре">

                    <?php
                    $tour_author_id = (int) get_post_field( 'post_author', $tour_id );
                    $tour_author     = get_userdata( $tour_author_id );
                    if ( $tour_author ) {
                        $tour_guide_avatar = array(
                            'url' => get_template_directory_uri() . '/assets/image-default/user-image-default.jpg',
                            'alt' => $tour_author->display_name,
                        );
                        if ( function_exists( 'get_field' ) ) {
                            $tour_av = get_field( 'foto_gida', 'user_' . $tour_author_id );
                            if ( is_array( $tour_av ) && ! empty( $tour_av['url'] ) ) {
                                $tour_guide_avatar = $tour_av;
                            } elseif ( is_numeric( $tour_av ) ) {
                                $tour_av_url = wp_get_attachment_image_url( (int) $tour_av, 'full' );
                                if ( $tour_av_url ) {
                                    $tour_guide_avatar = array( 'url' => $tour_av_url, 'alt' => $tour_author->display_name );
                                }
                            } elseif ( is_string( $tour_av ) && $tour_av !== '' ) {
                                $tour_guide_avatar = array( 'url' => $tour_av, 'alt' => $tour_author->display_name );
                            }
                        }
                    ?>
                    <div class="tour-booking__guide">
                        <div class="tour-booking__guide-avatar-wrap">
                            <img class="tour-booking__guide-avatar" src="<?php echo esc_url( $tour_guide_avatar['url'] ); ?>" alt="<?php echo esc_attr( $tour_guide_avatar['alt'] ?? $tour_author->display_name ); ?>" width="56" height="56" loading="lazy" decoding="async" />
                        </div>
                        <div class="tour-booking__guide-text">
                            <p class="tour-booking__guide-name"><?php echo esc_html( $tour_author->display_name ); ?></p>
                            <p class="tour-booking__guide-meta">Отвечает в течение 5 минут</p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="tour-booking__info-card">
                        <p class="tour-booking__info-card-title">Авторский тур</p>
                        <ul class="tour-booking__info-list">
                            <li>Размер группы не больше <?php echo $tour_count_number_max; ?> человек</li>
                            <li>Длительность: <?php echo $tour_duration; ?></li>
                            <li>Место встречи: Хошимин, аэропорт, по договорённости</li>
                        </ul>
                    </div>
    
                    <ul class="tour-booking__trust">
                        <li class="tour-booking__trust-item">
                            <span class="tour-booking__trust-icon tour-booking__trust-icon--check" aria-hidden="true"></span>
                            <span>Можно задать вопросы организатору до оплаты</span>
                        </li>
                        <li class="tour-booking__trust-item">
                            <span class="tour-booking__trust-icon tour-booking__trust-icon--check" aria-hidden="true"></span>
                            <span>Не нужно платить всё сразу: после подтверждения заказа доступна частичная оплата</span>
                        </li>
                        <li class="tour-booking__trust-item">
                            <span class="tour-booking__trust-icon tour-booking__trust-icon--check" aria-hidden="true"></span>
                            <span>Гибкие условия возврата — уточняйте у организатора</span>
                        </li>
                        <li class="tour-booking__trust-item tour-booking__trust-item--plain">
                            <span>Мы работаем с 2013 года и помогаем путешественникам собирать поездки мечты</span>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </section>

</main>

<?php get_footer() ?>