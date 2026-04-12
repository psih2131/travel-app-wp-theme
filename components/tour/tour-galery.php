<div class="tour-hero-sec__galery-wrapper">

    <div class="galery-tour">
        <?php
        $gallery = get_field('galereya_izobrazhenij');
        $img_field = 'izobradenie'; // или izobrazhenie — имя поля изображения в repeater
        $zoom_icon = "data:image/svg+xml,%3csvg%20width='24'%20height='24'%20viewBox='0%200%2024%2024'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='M10%204C6.68629%204%204%206.68629%204%2010C4%2013.3137%206.68629%2016%2010%2016C13.3137%2016%2016%2013.3137%2016%2010C16%206.68629%2013.3137%204%2010%204ZM2%2010C2%205.58172%205.58172%202%2010%202C14.4183%202%2018%205.58172%2018%2010C18%2011.8487%2017.3729%2013.551%2016.3199%2014.9056L21.7071%2020.2929C22.0976%2020.6834%2022.0976%2021.3166%2021.7071%2021.7071C21.3166%2022.0976%2020.6834%2022.0976%2020.2929%2021.7071L14.9056%2016.3199C13.551%2017.3729%2011.8487%2018%2010%2018C5.58172%2018%202%2014.4183%202%2010Z'%20fill='white'/%3e%3c/svg%3e";
        $gallery_count = is_array( $gallery ) ? count( $gallery ) : 0;
        $more_count = $gallery_count > 5 ? $gallery_count - 5 : 0;
        ?>

        <div class="galery-tour__front-img-wrapper">
            <?php if ( $gallery && isset( $gallery[0] ) ) :
                $image = $gallery[0][ $img_field ] ?? $gallery[0]['izobrazhenie'] ?? null;
                $caption = $gallery[0]['podpis'] ?? '';
                if ( ! empty( $image ) && is_array( $image ) ) : ?>
            <a class="galery-tour__img-link" href="<?php echo esc_url( $image['url'] ); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr( $caption ); ?>">
                <img class="galery-tour__img" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" />
                <div class="galery-tour__zoom"><img src="<?php echo esc_attr( $zoom_icon ); ?>" alt=""></div>
            </a>
            <?php endif; endif; ?>
        </div>

        <div class="galery-tour__col">
            <?php for ( $i = 1; $i <= 2 && isset( $gallery[ $i ] ); $i++ ) :
                $image = $gallery[ $i ][ $img_field ] ?? $gallery[ $i ]['izobrazhenie'] ?? null;
                if ( empty( $image ) || ! is_array( $image ) ) continue;
                $caption = $gallery[ $i ]['podpis'] ?? ''; ?>
            <div class="galery-tour__small-img-wrapper">
                <a class="galery-tour__img-link" href="<?php echo esc_url( $image['url'] ); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr( $caption ); ?>">
                    <img class="galery-tour__img" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" />
                    <div class="galery-tour__zoom"><img src="<?php echo esc_attr( $zoom_icon ); ?>" alt=""></div>
                </a>
            </div>
            <?php endfor; ?>
        </div>

        <div class="galery-tour__col">
            <?php for ( $i = 3; $i <= 4 && isset( $gallery[ $i ] ); $i++ ) :
                $image = $gallery[ $i ][ $img_field ] ?? $gallery[ $i ]['izobrazhenie'] ?? null;
                if ( empty( $image ) || ! is_array( $image ) ) continue;
                $caption = $gallery[ $i ]['podpis'] ?? ''; ?>
            <div class="galery-tour__small-img-wrapper">
                <a class="galery-tour__img-link" href="<?php echo esc_url( $image['url'] ); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr( $caption ); ?>">
                    <img class="galery-tour__img" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" />
                    <div class="galery-tour__zoom"><img src="<?php echo esc_attr( $zoom_icon ); ?>" alt=""></div>
                </a>
                <?php if ( $i === 4 && $more_count > 0 ) : ?>
                <div class="galery-tour__small-img-wrapper-have-more-images">
                    <span class="galery-tour__small-img-wrapper-have-more-images-counter">+<?php echo (int) $more_count; ?></span>
                </div>
                <?php endif; ?>
            </div>
            <?php endfor; ?>
        </div>

        <?php if ( $gallery_count > 5 ) : ?>
        <div class="galery-tour__hiden-images-container">
            <?php for ( $i = 5; $i < $gallery_count; $i++ ) :
                $image = $gallery[ $i ][ $img_field ] ?? $gallery[ $i ]['izobrazhenie'] ?? null;
                if ( empty( $image ) || ! is_array( $image ) ) continue;
                $caption = $gallery[ $i ]['podpis'] ?? ''; ?>
            <a class="galery-tour__hiden-image-link" href="<?php echo esc_url( $image['url'] ); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr( $caption ); ?>">
                <img class="galery-tour__hiden-image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? '' ); ?>" />
            </a>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>

</div>