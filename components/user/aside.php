<?php
$user_home_url = home_url( '/user-home/' );
$user_orders_url = home_url( '/user-orders/' );
$user_be_guide_url = home_url( '/user-be-guide/' );
$user_guide_list_url = home_url( '/user-guide-tours/' );
$user_guide_create_url = home_url( '/user-guide-tour-create/' );


$current_user_aside_page = get_query_var( 'current_user_aside_page', '' );
$is_user_home_active = ( $current_user_aside_page === 'user-home' );
$is_user_orders_active = ( $current_user_aside_page === 'user-orders' );
$is_user_be_guide_active = ( $current_user_aside_page === 'user-be-guide' );
$is_user_guide_list_active = ( $current_user_aside_page === 'user-guide-tours-list' );



$current_user = wp_get_current_user();
$current_user_role = $current_user->roles[0];
?>

<aside class="user-aside">
    <nav class="user-aside__nav">
        <div class="user-aside__cluster">
            <p class="user-aside__cluster-title">Для путешественника</p>
            <ul class="user-aside__list">
                <li><a class="user-aside__link<?php echo $is_user_home_active ? ' user-aside__link--active' : ''; ?>" href="<?php echo esc_url( $user_home_url ); ?>">Профиль</a></li>
                <li><a class="user-aside__link<?php echo $is_user_orders_active ? ' user-aside__link--active' : ''; ?>" href="<?php echo esc_url( $user_orders_url ); ?>">Мои заказы</a></li>
                <li>
                    <span class="user-aside__link user-aside__link--disabled" title="В разработке">
                        <svg class="user-aside__lock-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        Промокоды
                    </span>
                </li>
            </ul>
        </div>
        <div class="user-aside__cluster">
            <p class="user-aside__cluster-title">Для гида</p>
            
            <ul class="user-aside__list">

                <?php if ( $current_user_role !== 'guide' ) : ?>
                    <li><a class="user-aside__link<?php echo $is_user_be_guide_active ? ' user-aside__link--active' : ''; ?>" href="<?php echo esc_url( $user_be_guide_url ); ?>">Стать гидом</a></li>
                <?php endif; ?>

                <?php if ( $current_user_role === 'guide' ) : ?>
                <li><a class="user-aside__link<?php echo $is_user_guide_list_active ? ' user-aside__link--active' : ''; ?>" href="<?php echo esc_url( $user_guide_list_url ); ?>">Мои туры</a></li>
                <?php endif; ?>

            </ul>
        </div>
    </nav>
    <div class="user-aside__footer">
        <a href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>" class="user-aside__logout" style="display:block;text-align:center;padding:10px;">Выйти</a>
    </div>
</aside>