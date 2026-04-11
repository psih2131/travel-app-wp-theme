<?php
/**
 * Template Name: User_account_home
 * Шаблон страницы пользователя. Доступен только авторизованным.
 */

if ( ! is_user_logged_in() ) {
    wp_redirect( home_url( '/' ) );
    exit;
}

get_header();

set_query_var( 'current_user_aside_page', 'user-home' );
$current_user   = wp_get_current_user();
$user_role_slug = ! empty( $current_user->roles[0] ) ? $current_user->roles[0] : '';
$wp_roles       = wp_roles();
$role_obj       = $user_role_slug ? $wp_roles->get_role( $user_role_slug ) : null;
$user_role_name = $role_obj ? $role_obj->name : 'Пользователь';

?>
<main class="main">
    <section class="user-account">
        <div class="container">
            <div class="user-account__inner">

                <!-- aside -->
                <?php get_template_part( 'components/user/aside' ); ?>

                <div class="user-account__about-user">
                    <div class="user-profile-card">

                        <!-- avatar -->
                        <?php get_template_part( 'components/user/user-avatar' ); ?>

                        <p class="user-profile-card__name"><?php echo esc_html( $user_role_name ); ?></p>
                        <p class="user-profile-card__login"><?php echo esc_html( $current_user->user_login ); ?></p>
                        <div class="user-profile-card__tabs">
                            <button type="button" class="user-profile-card__tab user-profile-card__tab--active">
                                <span class="user-profile-card__tab-icon" aria-hidden="true">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                </span>
                                Личные данные
                            </button>
                            <button type="button" class="user-profile-card__tab">
                                <span class="user-profile-card__tab-icon" aria-hidden="true">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                </span>
                                Логин и пароль
                            </button>
                        </div>
                    </div>

                    <div class="user-account__tab-contents">
                        <div class="user-account__tab-content user-account__tab-content--active">

                          <!-- user data form -->
                          <?php get_template_part( 'components/user/user-data' ); ?>

                        </div>

                        <div class="user-account__tab-content">

                            <!-- change password form -->
                            <?php get_template_part( 'components/user/change-password-form' ); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
