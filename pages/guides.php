<?php
/**
 * Template Name: Гиды
 * Страница со списком пользователей с ролью «Гид»
 */

get_header();

$paged = get_query_var( 'paged' ) ?: get_query_var( 'page' ) ?: ( isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1 );
$paged = max( 1, (int) $paged );
$per_page = 12;
$offset = ( $paged - 1 ) * $per_page;

$user_args = array(
    'role'    => 'guide',
    'number'  => $per_page,
    'offset'  => $offset,
    'orderby' => 'display_name',
    'order'   => 'ASC',
);

$guides_query = new WP_User_Query( $user_args );
$guides = $guides_query->get_results();
$total_guides = $guides_query->get_total();
$max_pages = ceil( $total_guides / $per_page );
$guides_page_url = get_permalink();
?>

<main class="main">

    <section class="guides-page-sec">
        <div class="container">
            <div class="bread-crumbs">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="bread-crumbs__link">
                    Главная
                    <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.4394 3.99908L0.969727 1.52941L2.03039 0.46875L5.56072 3.99908L2.03039 7.52941L0.969727 6.46875L3.4394 3.99908Z"
                            fill="#202020" />
                    </svg>
                </a>
                <p class="bread-crumbs__current">Список гидов</p>
            </div>
            <h1 class="tours-hero-sec__title"><?php the_field( 'zagolovok' ); ?></h1>
            <p class="tours-hero-sec__subtitle"><?php the_field( 'podzagolovok' ); ?></p>


            <div class="guides-page-sec__filtr-wrapper">
                <h2 class="guides-page-sec__filtr-title">Гиды по направлениям</h2>
                <div class="guides-page-sec__filtr-row">
                    <a href="" class="tours-hero-sec__teg tour-teg active">
                        Все
                        <span class="tour-teg__counter">12</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Россия
                        <span class="tour-teg__counter">4</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Вьетнам
                        <span class="tour-teg__counter">2</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Дананг
                        <span class="tour-teg__counter">54</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Тайланд
                        <span class="tour-teg__counter">3</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Греция
                        <span class="tour-teg__counter">12</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Иордания
                        <span class="tour-teg__counter">2</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Греция
                        <span class="tour-teg__counter">43</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Таджикистан
                        <span class="tour-teg__counter">2</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Казахстан
                        <span class="tour-teg__counter">9</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Киргизия
                        <span class="tour-teg__counter">9</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Узбекистан
                        <span class="tour-teg__counter">9</span>
                    </a>
                    <a href="" class="tours-hero-sec__teg tour-teg">
                        Таиланд
                        <span class="tour-teg__counter">9</span>
                    </a>
                </div>
            </div>

            <div class="guides-page-sec__list-people">
                <?php
                if ( $guides ) :
                    foreach ( $guides as $guide_user ) :
                        set_query_var( 'guide_user', $guide_user );
                        get_template_part( 'components/guide-card' );
                    endforeach;
                endif;
                ?>
            </div>

            <?php if ( $max_pages > 1 ) : ?>
            <div class="pagination-wrapper">
                <div class="pagination">
                    <?php
                    $base_url = $guides_page_url;
                    $base = str_replace( 999999999, '%#%', esc_url( add_query_arg( 'paged', 999999999, $base_url ) ) );
                    echo paginate_links( array(
                        'base'      => $base,
                        'format'    => '&paged=%#%',
                        'current'   => max( 1, $paged ),
                        'total'     => $max_pages,
                        'prev_text' => __( '« Назад' ),
                        'next_text' => __( 'Вперед »' ),
                    ) );
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php get_footer(); ?>
