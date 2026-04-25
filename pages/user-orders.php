<?php
/**
 * Template Name: user_orders
 * Страница заказов пользователя. Доступна только авторизованным.
 */
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url( '/' ) );
    exit;
}

get_header();

set_query_var( 'current_user_aside_page', 'user-orders' );
$user_bookings_query = new WP_Query(
	array(
		'post_type'      => 'tour-bookings',
		'post_status'    => 'any',
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'   => 'id_polzovatelya',
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

                
                <div class="user-account__user-bookings user-bookings">
                    <h1 class="user-bookings__title">Мои бронирования</h1>
    
                    <div class="user-bookings__list">
                    <?php
						if ( $user_bookings_query->have_posts() ) :
							while ( $user_bookings_query->have_posts() ) :
								$user_bookings_query->the_post();
								get_template_part( 'components/user/user-card-order' );
							endwhile;
							wp_reset_postdata();
						else :
							?>
						<p class="user-orders__empty"><?php esc_html_e( 'У вас пока нет бронирований.', 'travel' ); ?></p>
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
