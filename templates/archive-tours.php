<?php
$tpl = get_template_directory_uri();
$guides_page = get_pages( array( 'meta_key' => '_wp_page_template', 'meta_value' => 'pages/guides.php', 'number' => 1 ) );
$guides_url  = ! empty( $guides_page ) ? get_permalink( $guides_page[0] ) : home_url( '/guides/' );

$config = array(
    'apiRoot'    => esc_url( rest_url( 'wp/v2' ) ),
    'guidesApi'  => esc_url( rest_url( 'custom-endpoints/v1/guides' ) ),
    'siteUrl'    => esc_url( home_url( '/' ) ),
    'tplUri'     => esc_url( $tpl ),
    'toursUrl'   => esc_url( get_post_type_archive_link( 'tours' ) ),
    'guidesUrl'  => esc_url( $guides_url ),
    'heroTitle'  => get_field( 'zagolovok_tury', 'option' ) ?: 'Все туры',
    'heroSub'    => get_field( 'podzagolovok_tours', 'option' ) ?: '',
);

$blog_query = new WP_Query( array(
    'post_type'      => 'blog',
    'posts_per_page' => 10,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'post_status'    => 'publish',
) );
?>
<div id="travel-all-tours-app"></div>

<section class="home-blog-sec directions-blog-sec">
    <div class="container">
        <div class="sec-header">
            <div class="sec-header__text"><h2 class="sec-title">Полезные статьи</h2></div>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'blog' ) ); ?>" class="sec-header__btn">Все статьи</a>
        </div>
    </div>
    <div class="blog-slider-wrapper">
        <div class="swiper post-slider-swiper">
            <div class="swiper-wrapper">
                <?php
                if ( $blog_query->have_posts() ) :
                    while ( $blog_query->have_posts() ) :
                        $blog_query->the_post();
                        ?>
                        <div class="swiper-slide">
                            <?php get_template_part( 'components/blog-post' ); ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        <div class="swiper-button-blog blog-swiper-button-prev">
            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.15429 13.7071C8.53841 13.3166 8.53841 12.6834 8.15429 12.2929L2.94817 7L8.15429 1.70711C8.53841 1.31658 8.53841 0.683417 8.15429 0.292893C7.77017 -0.0976315 7.14738 -0.0976315 6.76326 0.292893L0.861622 6.29289C0.4775 6.68342 0.4775 7.31658 0.861622 7.70711L6.76326 13.7071C7.14738 14.0976 7.77017 14.0976 8.15429 13.7071Z" fill="#5D736E"/>
            </svg>
        </div>
        <div class="swiper-button-blog blog-swiper-button-next">
            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.845709 13.7071C0.461587 13.3166 0.461587 12.6834 0.845709 12.2929L6.05183 7L0.845708 1.70711C0.461586 1.31658 0.461586 0.683417 0.845708 0.292893C1.22983 -0.0976315 1.85262 -0.0976315 2.23674 0.292893L8.13838 6.29289C8.5225 6.68342 8.5225 7.31658 8.13838 7.70711L2.23674 13.7071C1.85262 14.0976 1.22983 14.0976 0.845709 13.7071Z" fill="#5D736E"/>
            </svg>
        </div>
    </div>
</section>

<script>window.travelAllToursConfig = <?php echo wp_json_encode( $config ); ?>;</script>
<script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
<script src="<?php echo esc_url( $tpl ); ?>/assets/vue/TourCard.js"></script>
<script src="<?php echo esc_url( $tpl ); ?>/assets/vue/ToursFilters.js"></script>
<script src="<?php echo esc_url( $tpl ); ?>/assets/vue/GuideSec.js"></script>
<script src="<?php echo esc_url( $tpl ); ?>/assets/vue/ReviewsSec.js"></script>
<script src="<?php echo esc_url( $tpl ); ?>/assets/js/all-tours-script.js"></script>
