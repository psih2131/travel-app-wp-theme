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
?>
<main class="main">
    <section class="user-account">
        <div class="container">
            <div class="user-account__inner">
   
                <!-- aside -->
                <?php get_template_part( 'components/user/aside' ); ?>

                
                <div class="user-account__user-orders">
                    <h1 class="user-orders__title">Мои заказы</h1>
    
                    <div class="user-orders__list">
                        
                        <!-- user-card-order -->
                        <?php get_template_part( 'components/user/user-card-order' ); ?>

                        <!-- user-card-order -->
                        <?php get_template_part( 'components/user/user-card-order' ); ?>

                        <!-- user-card-order -->
                        <?php get_template_part( 'components/user/user-card-order' ); ?>

                        <!-- user-card-order -->
                        <?php get_template_part( 'components/user/user-card-order' ); ?>
                        
                        <!-- user-card-order -->
                        <?php get_template_part( 'components/user/user-card-order' ); ?>

                        <!-- user-card-order -->
                        <?php get_template_part( 'components/user/user-card-order' ); ?>
                                    
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
