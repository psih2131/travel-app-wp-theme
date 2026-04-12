<?php
//ПОВТОРИТЕЛЬ ACF
if( have_rows('prozhivanie') ):
while ( have_rows('prozhivanie') ) : the_row();
?>


<div class="tour-living" id="tour-living">
    <div class="tour-living__title">Проживание</div>
    <div class="tour-living__wrapper">
        <div class="wp-editor">
            <?php the_sub_field('opisanie'); ?>
        </div>

        <div class="galery-img">
            <?php
            $living_rows = get_sub_field('izobrazheniya_mesta_prozhivaniya');
            $more_count  = ( $living_rows && count( $living_rows ) > 4 ) ? count( $living_rows ) - 4 : 0;
            if ( have_rows('izobrazheniya_mesta_prozhivaniya') ) :
                $idx = 0;
                while ( have_rows('izobrazheniya_mesta_prozhivaniya') ) : the_row();
                    $img = get_sub_field('izobradenie') ?: get_sub_field('izobrazhenie');
                    if ( empty( $img ) ) continue;
                    if ( is_numeric( $img ) ) {
                        $src = wp_get_attachment_image_src( (int) $img, 'full' );
                        $img = $src ? [ 'url' => $src[0], 'alt' => '' ] : null;
                    } elseif ( is_string( $img ) ) {
                        $img = [ 'url' => $img, 'alt' => '' ];
                    }
                    if ( empty( $img['url'] ) ) continue;
                    $idx++;
                    $caption = get_sub_field('podpis') ?: ( $img['caption'] ?? '' );
                    $is_fourth = ( $idx === 4 );
            ?>
            <div class="galery-img__img-wrapper">
                <a class="galery-img__img-wrapper-link" href="<?php echo esc_url( $img['url'] ); ?>" data-fancybox="living" data-caption="<?php echo esc_attr( $caption ); ?>">
                    <img class="galery-img__img" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ?? '' ); ?>" />
                </a>
                <?php if ( $is_fourth && $more_count > 0 ) : ?>
                <div class="galery-img__img-wrapper-wrapper">
                    <div class="galery-img__img-wrapper-counter">+<?php echo (int) $more_count; ?></div>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php
endwhile;
else :
// вложенных полей не найдено
endif;
?>