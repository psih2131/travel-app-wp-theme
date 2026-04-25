<?php
/**
 * Template Name: user_guide_bookings
 * Страница «Стать гидом». Доступна только авторизованным.
 */

if ( ! is_user_logged_in() ) {
    wp_redirect( home_url( '/' ) );
    exit;
}

get_header();

set_query_var( 'current_user_aside_page', 'user-guide-bookings' );

$guide_bookings_query = new WP_Query(
	array(
		'post_type'      => 'tour-bookings',
		'post_status'    => 'any',
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'   => 'id_gida',
				'value' => (string) get_current_user_id(),
			),
		),
	)
);
?>
<main class="main">
    <section class="user-account">
        <div class="container">
            <div class="user-account__inner">
                

                <!-- aside -->
                <?php get_template_part( 'components/user/aside' ); ?>

                <div class="user-account__user-guide-bookings user-guide-bookings">
                    <h1 class="user-guide-bookings__title">Бронирования</h1>
                    <p class="user-guide-bookings__lead">Заявки и подтверждённые брони по вашим турам.</p>
    
                    <div class="user-guide-bookings__list">
                        <?php
                        if ( $guide_bookings_query->have_posts() ) :
                            while ( $guide_bookings_query->have_posts() ) :
                                $guide_bookings_query->the_post();
                                get_template_part( 'components/user/user-guide-booking-card' );
                            endwhile;
                            wp_reset_postdata();
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
