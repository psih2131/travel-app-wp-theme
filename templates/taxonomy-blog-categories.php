<?php
$current_term = get_queried_object();
?>

<section class="blog-sec">

    <div class="blog-sec__wrapper">
        <h1 class="blog-sec__title"><?php echo esc_html( $current_term->name ); ?></h1>
        <p class="blog-sec__subtitle"><?php echo esc_html( $current_term->description ); ?></p>
        <nav class="blog-sec__nav">
            <ul class="blog-sec__nav-ul">
            <li class="blog-sec__nav-li">
                <a href="<?php echo esc_url( get_post_type_archive_link( 'blog' ) ); ?>" class="blog-sec__nav-link">Все</a>
            </li>
                <?php $blog_categories = get_terms( array(
                    'taxonomy' => 'blog-categories',
                    'hide_empty' => false,
                ) );
                foreach( $blog_categories as $category ) { ?>
                    <li class="blog-sec__nav-li">
                        <a href="<?php echo get_term_link( $category ); ?>" class="blog-sec__nav-link <?php echo ( $current_term->term_id === $category->term_id ? 'blog-sec__nav-link--activ' : '' ); ?>"><?php echo $category->name; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>

        <div class="blog-sec__post-container">
        <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $args = array(
        'orderby'   => 'date',
        'order' => 'DESC',
        'posts_per_page' => 12,
        'paged' => $paged,
        'post_type' => 'blog',
        'tax_query' => array(
            array(
                'taxonomy' => 'blog-categories',
                'field'    => 'term_id',
                'terms'    => $current_term->term_id,
            ),
        ),
        );
        $query = new WP_query($args);
        if ( $query->have_posts()): while ( $query->have_posts() ): $query->the_post();
        ?>

        <?php get_template_part( 'components/blog-post' ); ?>

        <?php endwhile; endif; wp_reset_postdata();  ?>

        </div>


        <div class="pagination-wrapper pagination-wrapper--blog">
            <div class="pagination">
            <?php
            $term_link = get_term_link( $current_term );
            $base = trailingslashit( $term_link ) . '%_%';
            echo paginate_links( array(
                'base'      => $base,
                'format'    => 'page/%#%/',
                'total'     => $query->max_num_pages,
                'current'   => max( 1, $paged ),
                'prev_text' => __( '« Назад' ),
                'next_text' => __( 'Вперед »' ),
            ) );
            ?>
            </div>
        </div>
    </div>
</section>
