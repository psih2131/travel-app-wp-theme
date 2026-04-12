<?php
/**
 * Template Name: user_guide_tours
 * Страница «Стать гидом». Доступна только авторизованным.
 */

if ( ! is_user_logged_in() ) {
    wp_redirect( home_url( '/' ) );
    exit;
}

get_header();

set_query_var( 'current_user_aside_page', 'user-guide-tours-list' );
$user_guide_create_url = home_url( '/user-guide-tour-create/' );

$tours_query = new WP_Query(
	array(
		'post_type'      => 'tours',
		'author'         => get_current_user_id(),
		'post_status'    => array( 'publish', 'pending', 'draft', 'future', 'private' ),
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);
?>
<main class="main">
    <section class="user-account">
        <div class="container">
            <div class="user-account__inner">
                

                <!-- aside -->
                <?php get_template_part( 'components/user/aside' ); ?>

                <div class="user-account__user-tours">
                    <div class="user-tours__header">
                        <h1 class="user-tours__title">Мои туры</h1>
                        <a href="<?php echo esc_url( $user_guide_create_url ); ?>" class="user-tours__add-btn">Добавить тур</a>
                    </div>
    
                    <div class="user-tours__list">
                        <?php
                        if ( $tours_query->have_posts() ) :
                            while ( $tours_query->have_posts() ) :
                            $tours_query->the_post();
                            $tour_id     = get_the_ID();
                            $tour_status = get_post_status();
                            // $title       = get_the_title();
                            // $permalink   = get_permalink();


                            // publish → Активен; pending → На проверке; draft → Отклонён (по ТЗ); остальное — «Не опубликован».
                            if ( 'publish' === $tour_status ) {
                                $card_mod = 'active';
                                $stat_mod = 'active';
                                $stat_lbl = 'Активен';
                            } elseif ( 'pending' === $tour_status ) {
                                $card_mod = 'on-review';
                                $stat_mod = 'on-review';
                                $stat_lbl = 'На проверке';
                            } elseif ( 'draft' === $tour_status ) {
                                $card_mod = 'rejected';
                                $stat_mod = 'rejected';
                                $stat_lbl = 'Отклонён';
                            } else {
                                $card_mod = 'not-published';
                                $stat_mod = 'not-published';
                                $obj      = get_post_status_object( $tour_status );
                                $stat_lbl = $obj && ! empty( $obj->label ) ? $obj->label : $tour_status;
                            }
                            ?>
                        <a  class="user-tour-card user-tour-card--<?php echo esc_attr( $card_mod ); ?>">
                            <div class="user-tour-card__preview">
                            <?php 
                            //вывод изображения с alt атрибутом если массив изображения
                            $image = get_field('fonovoe_izobrazhenie');
                            if( !empty($image) ): ?>
                            <img class="user-tour-card__img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" width="80" height="80"/>
                            <?php endif; ?>
                                
                            </div>
                        
                            <div class="user-tour-card__info">
                                <p class="user-tour-card__title"><?php the_title(); ?></p>
                                <p class="user-tour-card__subtitle"><?php
                                    $travel_card_desc = function_exists( 'get_field' ) ? get_field( 'korotkoe_opisanie_kartochki' ) : '';
                                    $travel_card_desc = is_string( $travel_card_desc ) ? wp_strip_all_tags( $travel_card_desc ) : '';
                                    if ( $travel_card_desc !== '' && function_exists( 'mb_strlen' ) && mb_strlen( $travel_card_desc, 'UTF-8' ) > 150 ) {
                                        $travel_card_desc = mb_substr( $travel_card_desc, 0, 100, 'UTF-8' ) . '…';
                                    }
                                    echo esc_html( $travel_card_desc );
                                ?></p>
                            </div>
                        
                            <div class="user-tour-card__duration">
                                <span class="user-tour-card__duration-value"><?php the_field( 'prodolzhitelnost_tura' ); ?></span>
                            </div>
                        
                            <div class="user-tour-card__price">
                                <span class="user-tour-card__price-value"><?php the_field( 'osnovnaya_czena' ); ?></span>
                            </div>
                        
                            <div class="user-tour-card__status-wrap">
                                <span class="user-tour-card__status user-tour-card__status--<?php echo esc_attr( $stat_mod ); ?>"><?php echo esc_html( $stat_lbl ); ?></span>
                            </div>
                        </a>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            ?>
                        <p class="user-tours__empty">У вас пока нет туров. <a href="<?php echo esc_url( $user_guide_create_url ); ?>">Создать тур</a></p>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
<?php
get_footer();
