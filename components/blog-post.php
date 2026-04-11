<div class=" blog-post">
    <a href="<?php the_permalink(); ?>" class="blog-post__image-wrapper">

    <?php 
    //вывод изображения с alt атрибутом если массив изображения
    $image = get_field('izobrazhenie_posta');
    if( !empty($image) ): ?>
    <img class="blog-post__image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
    <?php endif; ?>
    </a>
    <div class="blog-post__data">
        <p class="blog-post__date"><?php the_time('d F Y'); ?></p>
        <div class="blog-post__header">
            <p class="blog-post__title">
                <?php the_title(); ?>
            </p>
            <a href="<?php the_permalink(); ?>" class="blog-post__link-ar">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                        fill="#85D2A9" />
                </svg>

            </a>
        </div>

        <p class="blog-post__subtitle"><?php the_field('kratkoe_soderzhanie'); ?></p>

        <div class="blog-post__teg-row">
            <?php
            $blog_categories = get_the_terms( get_the_ID(), 'blog-categories' );
            if ( $blog_categories && ! is_wp_error( $blog_categories ) ) :
                foreach ( $blog_categories as $category ) :
                    ?>
                    <a href="<?php echo esc_url( get_term_link( $category ) ); ?>" class="blog-post__teg"><?php echo esc_html( $category->name ); ?></a>
                    <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>

</div>