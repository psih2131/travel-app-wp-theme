<?php while ( have_posts() ) : the_post(); ?>

<section class="post-sec">
    <div class="post-sec__container">
        <p class="post-sec__date">Опубликовано <?php the_time( 'j F Y' ); ?></p>
        <h1 class="post-sec__title"><?php the_title(); ?></h1>
        <p class="post-sec__subtitle"><?php the_field( 'kratkoe_soderzhanie' ); ?></p>
    </div>
    <?php
    $image = get_field( 'izobrazhenie_posta' );
    if ( ! empty( $image ) ) : ?>
    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="post-sec__img">
    <?php endif; ?>

    <div class="post-sec__container">
        <div class="post-sec__wp-editor-post wp-editor-post">
            <?php
            if ( function_exists( 'get_field' ) && get_field( 'soderzhanie' ) ) {
                echo apply_filters( 'the_content', get_field( 'soderzhanie' ) );
            } else {
                the_content();
            }
            ?>
        </div>

        <div class="post-sec__teg-wrapper">
            <?php
            $terms = get_the_terms( get_the_ID(), 'blog-categories' );
            if ( $terms && ! is_wp_error( $terms ) ) :
                foreach ( $terms as $term ) : ?>
                    <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="blog-post__teg"><?php echo esc_html( $term->name ); ?></a>
                <?php endforeach;
            endif;
            ?>
        </div>


        <?php
        if ( comments_open() || get_comments_number() ) {
            comments_template( 'components/post-comments-component.php' );
        }
        ?>

        <div class="post-sec__back-ar">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'blog' ) ); ?>" class="post-sec__btn-ar-back">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3 14C3 13.4477 3.44772 13 4 13L16 13C17.6569 13 19 11.6569 19 10L19 6C19 5.44771 19.4477 5 20 5C20.5523 5 21 5.44771 21 6L21 10C21 12.7614 18.7614 15 16 15L4 15C3.44772 15 3 14.5523 3 14Z"
                        fill="white" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.29289 14.7071C2.90237 14.3166 2.90237 13.6834 3.29289 13.2929L7.29289 9.29289C7.68342 8.90237 8.31658 8.90237 8.70711 9.29289C9.09763 9.68342 9.09763 10.3166 8.70711 10.7071L5.41421 14L8.70711 17.2929C9.09763 17.6834 9.09763 18.3166 8.70711 18.7071C8.31658 19.0976 7.68342 19.0976 7.29289 18.7071L3.29289 14.7071Z"
                        fill="white" />
                </svg>
                Вернутся ко всем постам
            </a>
        </div>
    </div>
</section>

<section class="home-blog-sec reccoment-post-sec">
    <div class="container">
        <div class="sec-header">
            <div class="sec-header__text">
                <h2 class="sec-title">Полезные статьи</h2>
            </div>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'blog' ) ); ?>" class="sec-header__btn">Все статьи</a>
        </div>
    </div>

    <div class="blog-slider-wrapper">
        <div class="swiper post-slider-swiper">
            <div class="swiper-wrapper">
                <?php
                $post_objects = get_field( 'pohozhie_posty' );
                if ( $post_objects ) :
                    foreach ( $post_objects as $post ) :
                        setup_postdata( $post );
                        ?>
                        <div class="swiper-slide">
                            <?php get_template_part( 'components/blog-post' ); ?>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        <div class="swiper-button-blog blog-swiper-button-prev">
            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M8.15429 13.7071C8.53841 13.3166 8.53841 12.6834 8.15429 12.2929L2.94817 7L8.15429 1.70711C8.53841 1.31658 8.53841 0.683417 8.15429 0.292893C7.77017 -0.0976315 7.14738 -0.0976315 6.76326 0.292893L0.861622 6.29289C0.4775 6.68342 0.4775 7.31658 0.861622 7.70711L6.76326 13.7071C7.14738 14.0976 7.77017 14.0976 8.15429 13.7071Z"
                    fill="#5D736E" />
            </svg>
        </div>
        <div class="swiper-button-blog blog-swiper-button-next">
            <svg width="9" height="14" viewBox="0 0 9 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.845709 13.7071C0.461587 13.3166 0.461587 12.6834 0.845709 12.2929L6.05183 7L0.845708 1.70711C0.461586 1.31658 0.461586 0.683417 0.845708 0.292893C1.22983 -0.0976315 1.85262 -0.0976315 2.23674 0.292893L8.13838 6.29289C8.5225 6.68342 8.5225 7.31658 8.13838 7.70711L2.23674 13.7071C1.85262 14.0976 1.22983 14.0976 0.845709 13.7071Z"
                    fill="#5D736E" />
            </svg>
        </div>
    </div>
</section>

<?php endwhile; ?>
