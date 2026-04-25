<div class="tour-info-sec__aside-booking-card booking-card">
    <p class="booking-card__type"><?php
        $travel_booking_type_lines = array();
        $travel_booking_directions = get_the_terms( get_the_ID(), 'direction' );
        if ( ! empty( $travel_booking_directions ) && ! is_wp_error( $travel_booking_directions ) ) {
            $travel_booking_type_lines[] = esc_html(
                'Направление: ' . implode( ', ', wp_list_pluck( $travel_booking_directions, 'name' ) )
            );
        }
        $travel_booking_rubrics = get_the_terms( get_the_ID(), 'tour-rubric' );
        if ( ! empty( $travel_booking_rubrics ) && ! is_wp_error( $travel_booking_rubrics ) ) {
            $travel_booking_type_lines[] = esc_html(
                'Тип: ' . implode( ', ', wp_list_pluck( $travel_booking_rubrics, 'name' ) )
            );
        }
        if ( $travel_booking_type_lines ) {
            echo implode( '<br />', $travel_booking_type_lines );
        }
    ?></p>
    <ul class="booking-card__adv-list">
        <?php if ( get_field('prodolzhitelnost_tura') ) { ?>
        <li class="booking-card__adv-list-element">
            <span class="booking-card__adv-list-element-name">Длительность</span>
            <span class="booking-card__adv-list-element-value"><?php the_field('prodolzhitelnost_tura'); ?></span>
        </li>
        <?php } ?>

        <?php if ( get_field('field_69db2c5fa6ccc') ) { ?>
        <li class="booking-card__adv-list-element">
            <span class="booking-card__adv-list-element-name">Размер группы</span>
            <span class="booking-card__adv-list-element-value"><?php the_field('field_69db2c5fa6ccc'); ?> человек</span>
        </li>
        <?php } ?>

        <li class="booking-card__adv-list-element">
            <span class="booking-card__adv-list-element-name">Дети</span>
            <span class="booking-card__adv-list-element-value">Можно с детьми</span>
        </li>


    </ul>
    <div class="booking-card__offer">
        <p class="booking-card__offer-title"><?php the_title(); ?></p>
        <?php
        $travel_booking_programma = function_exists( 'get_field' ) ? get_field( 'programma' ) : null;
        $travel_booking_prog_parts = array();
        if ( ! empty( $travel_booking_programma['etapy'] ) && is_array( $travel_booking_programma['etapy'] ) ) {
            foreach ( $travel_booking_programma['etapy'] as $travel_etap ) {
                if ( ! is_array( $travel_etap ) ) {
                    continue;
                }
                $travel_l1 = isset( $travel_etap['nazvanie_etapa'] ) ? trim( (string) $travel_etap['nazvanie_etapa'] ) : '';
                if ( $travel_l1 !== '' ) {
                    $travel_booking_prog_parts[] = $travel_l1;
                }
                if ( ! empty( $travel_etap['etapy_vnutri_dnya'] ) && is_array( $travel_etap['etapy_vnutri_dnya'] ) ) {
                    foreach ( $travel_etap['etapy_vnutri_dnya'] as $travel_step ) {
                        if ( ! is_array( $travel_step ) ) {
                            continue;
                        }
                        $travel_l2 = isset( $travel_step['zagolovok'] ) ? trim( (string) $travel_step['zagolovok'] ) : '';
                        if ( $travel_l2 !== '' ) {
                            $travel_booking_prog_parts[] = $travel_l2;
                        }
                    }
                }
            }
        }
        if ( $travel_booking_prog_parts ) {
            $travel_booking_sep = ' • ';
            echo '<p class="booking-card__offer-subtitle">' . implode( $travel_booking_sep, array_map( 'esc_html', $travel_booking_prog_parts ) ) . '</p>';
        }
        ?>

        <p class="booking-card__offer-price"><span>$<?php the_field('osnovnaya_czena'); ?></span> / <?php the_field('tip_czeny'); ?> </p>
        <p class="booking-card__offer-price-tax-info">(Цена включает налоги и сборы за бронирование)</p>

        
        <?php
        if ( is_user_logged_in() ) {
            ?>
        <a href="<?php echo esc_url( home_url( '/booking-page?tour_id=' . get_the_ID() ) ); ?>" class="booking-card__offer-reserve-btn offer-reserve-btn">
            <span class="offer-reserve-btn__text">Выбрать даты</span>
            <span class="offer-reserve-btn__icon-wrapper">
                <svg width="145" height="145" viewBox="0 0 145 145" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
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
        </a>
            <?php
        } else {
            ?>
            <div class="booking-card__need-login">
                <p class="booking-card__need-login-text">Для бронирования необходимо авторизоваться</p>
                <button type="button" class="header__auth-btn" data-engram-button="auth">Войти</button>
            </div>
            <?php
        }
        ?>
    </div>
</div>