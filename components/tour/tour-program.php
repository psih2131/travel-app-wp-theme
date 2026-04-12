<?php
//ПОВТОРИТЕЛЬ ACF
if( have_rows('programma') ):
while ( have_rows('programma') ) : the_row();
?>

<div class="program-tour" id="tour-program">
    <h2 class="program-tour__title">Программа</h2>

    <div class="program-tour__wrapper">

        <div class="wp-editor">
            <p><b>Начало тура:</b> <?php the_sub_field('nachalo'); ?></p>
            <p><b>Финиш:</b> <?php the_sub_field('finish'); ?></p>
        </div>

        <div class="program-tour__acordeons">

            <?php
            //ПОВТОРИТЕЛЬ ACF
            if( have_rows('etapy') ):
            while ( have_rows('etapy') ) : the_row();
            ?>

            

            <div class="program-tour__acordeon">
                <div class="program-tour__acordeon-header">
                    <p class="program-tour__acordeon-title"><?php the_sub_field('nazvanie_etapa'); ?></p>
                    <div class="program-tour__acordeon-ar">
                        <img src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3.38128%206.38128C3.72299%206.03957%204.27701%206.03957%204.61872%206.38128L10%2011.7626L15.3813%206.38128C15.723%206.03957%2016.277%206.03957%2016.6187%206.38128C16.9604%206.72299%2016.9604%207.27701%2016.6187%207.61872L10.6187%2013.6187C10.277%2013.9604%209.72299%2013.9604%209.38128%2013.6187L3.38128%207.61872C3.03957%207.27701%203.03957%206.72299%203.38128%206.38128Z'%20fill='black'/%3e%3c/svg%3e" alt="">
                    </div>
                </div>
                <div class="program-tour__acordeon-body">
                    <div class="program-tour__acordeon-staps">

                        <?php
                        //ПОВТОРИТЕЛЬ ACF
                        if( have_rows('etapy_vnutri_dnya') ):
                        $idx = 0;
                        while ( have_rows('etapy_vnutri_dnya') ) : the_row();
                        $idx++;
                        ?>

                        
                        <div class="program-tour__acordeon-stap">
                            <div class="program-tour__acordeon-stap-num"><?php echo $idx; ?></div>
                            <div class="program-tour__acordeon-data">
                                <p class="program-tour__acordeon-data-title"><?php the_sub_field('zagolovok'); ?></p>
                                <div class="wp-editor">
                                    <p><?php the_sub_field('opisanie'); ?></p>
                                </div>
                            </div>
                        </div>

                        <?php
                        endwhile;
                        else :
                        // вложенных полей не найдено
                        endif;
                        ?>
                        
                    </div>

                    <div class="galery-img">
                        <?php
                        $prog_rows  = get_sub_field('galereya_izobrazhenij');
                        $more_count = ( $prog_rows && count( $prog_rows ) > 4 ) ? count( $prog_rows ) - 4 : 0;
                        $fancy_id   = 'program-' . get_row_index();
                        if ( have_rows('galereya_izobrazhenij') ) :
                            $idx = 0;
                            while ( have_rows('galereya_izobrazhenij') ) : the_row();
                                $img = get_sub_field('izobrazhenie');
                                if ( empty( $img ) ) continue;
                                if ( is_numeric( $img ) ) {
                                    $src = wp_get_attachment_image_src( (int) $img, 'full' );
                                    $img = $src ? [ 'url' => $src[0], 'alt' => '' ] : null;
                                } elseif ( is_string( $img ) ) {
                                    $img = [ 'url' => $img, 'alt' => '' ];
                                }
                                if ( empty( $img['url'] ) ) continue;
                                $idx++;
                                $caption   = get_sub_field('podpis') ?: ( $img['caption'] ?? '' );
                                $is_fourth = ( $idx === 4 );
                        ?>
                        <div class="galery-img__img-wrapper">
                            <a class="galery-img__img-wrapper-link" href="<?php echo esc_url( $img['url'] ); ?>" data-fancybox="<?php echo esc_attr( $fancy_id ); ?>" data-caption="<?php echo esc_attr( $caption ); ?>">
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
            

        </div>


    </div>
</div>

<?php
endwhile;
else :
// вложенных полей не найдено
endif;
?>