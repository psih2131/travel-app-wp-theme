<?php $tpl = get_template_directory_uri(); ?>

    <section class="tour-hero-sec">
        <div class="container">
    
            <div class="bread-crumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="bread-crumbs__link">
                    Главная
                    <svg width="6" height="8" viewBox="0 0 6 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.4394 3.99908L0.969727 1.52941L2.03039 0.46875L5.56072 3.99908L2.03039 7.52941L0.969727 6.46875L3.4394 3.99908Z"
                            fill="#202020" />
                    </svg>
                </a>
            
                <p class="bread-crumbs__current">Все туры</p>
            </div>
            <h1 class="tour-hero-sec__title"><?php the_title(); ?></h1>
       
    
            <div class="tour-hero-sec__info-row">
                <div class="tour-hero-sec__info-row-left">
                    <div class="tour-hero-sec__rate">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 7.58781C19 7.32356 18.7981 7.15934 18.3941 7.09499L12.964 6.31316L10.5301 1.43913C10.3932 1.14633 10.2164 1 10.0001 1C9.78379 1 9.60707 1.14633 9.47003 1.43913L7.03606 6.31316L1.60569 7.09499C1.20195 7.15934 1 7.32356 1 7.58781C1 7.73785 1.09018 7.90924 1.27049 8.10206L5.20804 11.8941L4.27776 17.25C4.26332 17.35 4.25616 17.4216 4.25616 17.4643C4.25616 17.6143 4.29397 17.741 4.36967 17.8446C4.44534 17.9484 4.55885 18 4.71037 18C4.84025 18 4.98442 17.9573 5.14306 17.8716L9.99994 15.3433L14.8571 17.8713C15.0086 17.9571 15.1528 18 15.2896 18C15.5856 18 15.7334 17.8218 15.7334 17.4646C15.7334 17.3718 15.7298 17.3004 15.7225 17.2501L14.7923 11.8944L18.7189 8.10232C18.9064 7.91637 19 7.74491 19 7.58781Z"
                                fill="#00BE8B" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 7.58781C19 7.32356 18.7981 7.15934 18.3941 7.09499L12.964 6.31316L10.5301 1.43913C10.3932 1.14633 10.2164 1 10.0001 1C9.78379 1 9.60707 1.14633 9.47003 1.43913L7.03606 6.31316L1.60569 7.09499C1.20195 7.15934 1 7.32356 1 7.58781C1 7.73785 1.09018 7.90924 1.27049 8.10206L5.20804 11.8941L4.27776 17.25C4.26332 17.35 4.25616 17.4216 4.25616 17.4643C4.25616 17.6143 4.29397 17.741 4.36967 17.8446C4.44534 17.9484 4.55885 18 4.71037 18C4.84025 18 4.98442 17.9573 5.14306 17.8716L9.99994 15.3433L14.8571 17.8713C15.0086 17.9571 15.1528 18 15.2896 18C15.5856 18 15.7334 17.8218 15.7334 17.4646C15.7334 17.3718 15.7298 17.3004 15.7225 17.2501L14.7923 11.8944L18.7189 8.10232C18.9064 7.91637 19 7.74491 19 7.58781Z"
                                fill="#00BE8B" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 7.58781C19 7.32356 18.7981 7.15934 18.3941 7.09499L12.964 6.31316L10.5301 1.43913C10.3932 1.14633 10.2164 1 10.0001 1C9.78379 1 9.60707 1.14633 9.47003 1.43913L7.03606 6.31316L1.60569 7.09499C1.20195 7.15934 1 7.32356 1 7.58781C1 7.73785 1.09018 7.90924 1.27049 8.10206L5.20804 11.8941L4.27776 17.25C4.26332 17.35 4.25616 17.4216 4.25616 17.4643C4.25616 17.6143 4.29397 17.741 4.36967 17.8446C4.44534 17.9484 4.55885 18 4.71037 18C4.84025 18 4.98442 17.9573 5.14306 17.8716L9.99994 15.3433L14.8571 17.8713C15.0086 17.9571 15.1528 18 15.2896 18C15.5856 18 15.7334 17.8218 15.7334 17.4646C15.7334 17.3718 15.7298 17.3004 15.7225 17.2501L14.7923 11.8944L18.7189 8.10232C18.9064 7.91637 19 7.74491 19 7.58781Z"
                                fill="#00BE8B" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 7.58781C19 7.32356 18.7981 7.15934 18.3941 7.09499L12.964 6.31316L10.5301 1.43913C10.3932 1.14633 10.2164 1 10.0001 1C9.78379 1 9.60707 1.14633 9.47003 1.43913L7.03606 6.31316L1.60569 7.09499C1.20195 7.15934 1 7.32356 1 7.58781C1 7.73785 1.09018 7.90924 1.27049 8.10206L5.20804 11.8941L4.27776 17.25C4.26332 17.35 4.25616 17.4216 4.25616 17.4643C4.25616 17.6143 4.29397 17.741 4.36967 17.8446C4.44534 17.9484 4.55885 18 4.71037 18C4.84025 18 4.98442 17.9573 5.14306 17.8716L9.99994 15.3433L14.8571 17.8713C15.0086 17.9571 15.1528 18 15.2896 18C15.5856 18 15.7334 17.8218 15.7334 17.4646C15.7334 17.3718 15.7298 17.3004 15.7225 17.2501L14.7923 11.8944L18.7189 8.10232C18.9064 7.91637 19 7.74491 19 7.58781Z"
                                fill="#00BE8B" />
                        </svg>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19 7.58781C19 7.32356 18.7981 7.15934 18.3941 7.09499L12.964 6.31316L10.5301 1.43913C10.3932 1.14633 10.2164 1 10.0001 1C9.78379 1 9.60707 1.14633 9.47003 1.43913L7.03606 6.31316L1.60569 7.09499C1.20195 7.15934 1 7.32356 1 7.58781C1 7.73785 1.09018 7.90924 1.27049 8.10206L5.20804 11.8941L4.27776 17.25C4.26332 17.35 4.25616 17.4216 4.25616 17.4643C4.25616 17.6143 4.29397 17.741 4.36967 17.8446C4.44534 17.9484 4.55885 18 4.71037 18C4.84025 18 4.98442 17.9573 5.14306 17.8716L9.99994 15.3433L14.8571 17.8713C15.0086 17.9571 15.1528 18 15.2896 18C15.5856 18 15.7334 17.8218 15.7334 17.4646C15.7334 17.3718 15.7298 17.3004 15.7225 17.2501L14.7923 11.8944L18.7189 8.10232C18.9064 7.91637 19 7.74491 19 7.58781Z"
                                fill="#00BE8B" />
                        </svg>
    
                        <span class="tour-hero-sec__rate-counter">5.0</span>
                        <span class="tour-hero-sec__rate-reviews">(379 отзывов)</span>
    
                    </div>
    
                    <div class="tour-hero-sec__time-period">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M14.6666 8.00016C14.6666 11.6802 11.6799 14.6668 7.99992 14.6668C4.31992 14.6668 1.33325 11.6802 1.33325 8.00016C1.33325 4.32016 4.31992 1.3335 7.99992 1.3335C11.6799 1.3335 14.6666 4.32016 14.6666 8.00016Z"
                                stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M10.4734 10.1202L8.40675 8.88684C8.04675 8.6735 7.75342 8.16017 7.75342 7.74017V5.00684"
                                stroke="#7E7E7E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="tour-hero-sec__time-period-value">2-4 дня</span>
                    </div>
    
                    <div class="tour-hero-sec__group-size">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.0784 3.68583C10.8977 3.68583 11.5681 3.00769 11.5681 2.17885C11.5681 1.35002 10.8977 0.671875 10.0784 0.671875C9.25911 0.671875 8.58872 1.35002 8.58872 2.17885C8.58872 3.00769 9.25911 3.68583 10.0784 3.68583ZM13.4227 7.71015C12.8742 7.71015 12.6137 7.50578 12.4102 7.39911C11.7941 7.07628 11.2969 6.59366 10.9722 6.02165L10.2273 4.81606C9.92196 4.32629 9.40059 4.06257 8.85685 4.06257C8.27589 4.06257 7.67256 4.43932 7.53105 5.14759L5.42316 15.9376C5.32632 16.4198 5.69129 16.8719 6.18289 16.8719C6.54786 16.8719 6.86069 16.6156 6.94262 16.2616L8.14181 10.8439L9.70596 12.3509V16.1184C9.70596 16.5328 10.0411 16.8719 10.4508 16.8719C10.8605 16.8719 11.1956 16.5328 11.1956 16.1184V11.8687C11.1956 11.4543 11.0317 11.0625 10.7338 10.7762L9.63153 9.71373L10.0784 7.45327C10.5734 8.02909 11.2032 8.50841 11.9175 8.83818C12.2782 9.00462 13.0465 9.20082 13.4227 9.20082C13.7988 9.20082 14.175 8.90898 14.175 8.45547C14.175 8.00195 13.7918 7.71015 13.4227 7.71015ZM5.55723 9.43491L3.97817 9.12603C3.57596 9.04314 3.30781 8.65132 3.38975 8.24443L3.95582 5.28322C4.11224 4.46945 4.89432 3.93448 5.69874 4.09271L6.56275 4.26602L5.55723 9.43491Z"
                                fill="#5DB8A6" />
                        </svg>
                        <span class="tour-hero-sec__group-size-value">10-12 человек</span>
                    </div>
                </div>
    
    
                <div class="tour-hero-sec__price">
                    от <span>$269 </span> / с человека
                </div>
    
    
            </div>
    
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
        </div>
    </section>
    
    <section class="tour-info-sec">
        <div class="container">
            <div class="tour-info-sec__container">
                <div class="tour-info-sec__main">
                    <nav class="tour-info-sec__fixed-nav">
                        <ul class="tour-info-sec__fixed-nav-list">
                            <!-- <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#tour-description">Что вас ждет</a>
                            </li> -->
                            <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#org-det">Орг. детали</a>
                            </li>
                            <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#tour-living">Проживание</a>
                            </li>
                            <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#tour-program">Программа</a>
                            </li>
                            <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#tour-payment-includes">Что включено</a>
                            </li>
                            <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#tour-available-dates">Даты</a>
                            </li>
                            <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#tour-organizer">Организатор</a>
                            </li>
                            <li class="tour-info-sec__fixed-nav-list-element">
                                <a href="#tour-reviews">Отзывы 5</a>
                            </li>
                        </ul>
                    </nav>
    
                    <div class="tour-info-sec__main-claster">
                        
                        <!-- Что вас ждет -->
                        <?php if ( get_field('chto_vas_zhdet') ) { ?>

                        <div class="tour-description" id="tour-description">
                            <?php the_field('chto_vas_zhdet'); ?>
                        </div>

                        <?php } ?>

                        

                        <?php
                        //Организационные детали — показываем только если заполнён хотя бы 1 подпункт
                        if( have_rows('organizaczionnye_detali') ):
                        while ( have_rows('organizaczionnye_detali') ) : the_row();
                        $org_has_content = get_sub_field('pitanie') || get_sub_field('transport') || get_sub_field('vozrast_uchastnikov') || get_sub_field('viza') || get_sub_field('uroven_slozhnosti');
                        if ( ! $org_has_content ) continue;
                        ?>

                        <div class="org-det" id="org-det">
                            <h2 class="org-det__title">Организационные детали</h2>
                            <div class="org-det__wrapper">
                        
                                <?php if ( get_sub_field('pitanie') ) : ?>
                                <div class="org-det__element">
                                    <div class="org-det__element-header">
                                        <p class="org-det__element-header-title">Питание</p>
                                        <div class="org-det__element-ar">
                                            <img src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3.38128%206.38128C3.72299%206.03957%204.27701%206.03957%204.61872%206.38128L10%2011.7626L15.3813%206.38128C15.723%206.03957%2016.277%206.03957%2016.6187%206.38128C16.9604%206.72299%2016.9604%207.27701%2016.6187%207.61872L10.6187%2013.6187C10.277%2013.9604%209.72299%2013.9604%209.38128%2013.6187L3.38128%207.61872C3.03957%207.27701%203.03957%206.72299%203.38128%206.38128Z'%20fill='black'/%3e%3c/svg%3e" alt="">
                                        </div>
                                    </div>
                                    <div class="org-det__element-body">
                                        <div class="wp-editor">
                                            <p><?php the_sub_field('pitanie'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                        
                                <?php if ( get_sub_field('transport') ) : ?>
                                <div class="org-det__element">
                                    <div class="org-det__element-header">
                                        <p class="org-det__element-header-title">Транспорт</p>
                                        <div class="org-det__element-ar">
                                            <img src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3.38128%206.38128C3.72299%206.03957%204.27701%206.03957%204.61872%206.38128L10%2011.7626L15.3813%206.38128C15.723%206.03957%2016.277%206.03957%2016.6187%206.38128C16.9604%206.72299%2016.9604%207.27701%2016.6187%207.61872L10.6187%2013.6187C10.277%2013.9604%209.72299%2013.9604%209.38128%2013.6187L3.38128%207.61872C3.03957%207.27701%203.03957%206.72299%203.38128%206.38128Z'%20fill='black'/%3e%3c/svg%3e" alt="">
                                        </div>
                                    </div>
                                    <div class="org-det__element-body">
                                        <div class="wp-editor">
                                            <p><?php the_sub_field('transport'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                        
                                <?php if ( get_sub_field('vozrast_uchastnikov') ) : ?>
                                <div class="org-det__element">
                                    <div class="org-det__element-header">
                                        <p class="org-det__element-header-title">Возраст участников</p>
                                        <div class="org-det__element-ar">
                                            <img src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3.38128%206.38128C3.72299%206.03957%204.27701%206.03957%204.61872%206.38128L10%2011.7626L15.3813%206.38128C15.723%206.03957%2016.277%206.03957%2016.6187%206.38128C16.9604%206.72299%2016.9604%207.27701%2016.6187%207.61872L10.6187%2013.6187C10.277%2013.9604%209.72299%2013.9604%209.38128%2013.6187L3.38128%207.61872C3.03957%207.27701%203.03957%206.72299%203.38128%206.38128Z'%20fill='black'/%3e%3c/svg%3e" alt="">
                                        </div>
                                    </div>
                                    <div class="org-det__element-body">
                                        <div class="wp-editor">
                                            <p><?php the_sub_field('vozrast_uchastnikov'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                        
                                <?php if ( get_sub_field('viza') ) : ?>
                                <div class="org-det__element">
                                    <div class="org-det__element-header">
                                        <p class="org-det__element-header-title">Виза</p>
                                        <div class="org-det__element-ar">
                                            <img src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3.38128%206.38128C3.72299%206.03957%204.27701%206.03957%204.61872%206.38128L10%2011.7626L15.3813%206.38128C15.723%206.03957%2016.277%206.03957%2016.6187%206.38128C16.9604%206.72299%2016.9604%207.27701%2016.6187%207.61872L10.6187%2013.6187C10.277%2013.9604%209.72299%2013.9604%209.38128%2013.6187L3.38128%207.61872C3.03957%207.27701%203.03957%206.72299%203.38128%206.38128Z'%20fill='black'/%3e%3c/svg%3e" alt="">
                                        </div>
                                    </div>
                                    <div class="org-det__element-body">
                                        <div class="wp-editor">
                                            <p><?php the_sub_field('viza'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                        
                                <?php if ( get_sub_field('uroven_slozhnosti') ) : ?>
                                <div class="org-det__element">
                                    <div class="org-det__element-header">
                                        <p class="org-det__element-header-title">Уровень сложности</p>
                                        <div class="org-det__element-ar">
                                            <img src="data:image/svg+xml,%3csvg%20width='20'%20height='20'%20viewBox='0%200%2020%2020'%20fill='none'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20fill-rule='evenodd'%20clip-rule='evenodd'%20d='M3.38128%206.38128C3.72299%206.03957%204.27701%206.03957%204.61872%206.38128L10%2011.7626L15.3813%206.38128C15.723%206.03957%2016.277%206.03957%2016.6187%206.38128C16.9604%206.72299%2016.9604%207.27701%2016.6187%207.61872L10.6187%2013.6187C10.277%2013.9604%209.72299%2013.9604%209.38128%2013.6187L3.38128%207.61872C3.03957%207.27701%203.03957%206.72299%203.38128%206.38128Z'%20fill='black'/%3e%3c/svg%3e" alt="">
                                        </div>
                                    </div>
                                    <div class="org-det__element-body">
                                        <div class="wp-editor">
                                            <p><?php the_sub_field('uroven_slozhnosti'); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                        
                            </div>
                        </div>


                        <?php
                        endwhile;
                        else :
                        // вложенных полей не найдено
                        endif;
                        ?>

                        

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
                        


                        <div class="tour-useful-info" id="tour-useful-info">
                            <h2 class="tour-useful-info__title">Полезная информация</h2>
                            <div class="tour-useful-info__content">
                                <p class="tour-useful-info__text">
                                    После внесения предоплаты на сайте других предоплат не требуется. Остальную сумму нужно будет оплатить организатору на месте, в день начала тура в долларах, евро или лари.
                                </p>
                                <p class="tour-useful-info__text tour-useful-info__text--bold">
                                    Возможно организовать путешествие в другие даты.
                                </p>
                            </div>
                        </div>
    
                        <div class="tour-payment-includes" id="tour-payment-includes">
                            <h2 class="tour-payment-includes__title">Включено в стоимость</h2>
                            <ul class="tour-payment-includes__list tour-payment-includes__list--included">

                                <?php
                                //ПОВТОРИТЕЛЬ ACF
                                if( have_rows('chto_vhodit_v_stoimost') ):
                                while ( have_rows('chto_vhodit_v_stoimost') ) : the_row();
                                ?>

                                <li class="tour-payment-includes__item">
                                    <span class="tour-payment-includes__icon tour-payment-includes__icon--check">✓</span>
                                    <?php the_sub_field('tekst'); ?>
                                </li>

                                <?php
                                endwhile;
                                else :
                                // вложенных полей не найдено
                                endif;
                                ?>
                                
                            </ul>
                        
                            <h2 class="tour-payment-includes__title">Не включено в стоимость</h2>
                            <ul class="tour-payment-includes__list tour-payment-includes__list--excluded">
                                <?php
                                //ПОВТОРИТЕЛЬ ACF
                                if( have_rows('chto_ne_vhodit_v_stoimost') ):
                                while ( have_rows('chto_ne_vhodit_v_stoimost') ) : the_row();
                                ?>

                                <li class="tour-payment-includes__item">
                                    <span class="tour-payment-includes__icon tour-payment-includes__icon--dash">—</span>
                                    <?php the_sub_field('tekst'); ?>
                                </li>

                                <?php
                                endwhile;
                                else :
                                // вложенных полей не найдено
                                endif;
                                ?>

                            </ul>
                        
                            <!-- <p class="tour-payment-includes__note">
                                Обратите внимание. С 18 по 27 сентября стоимость тура увеличится из-за Формулы-1 в Баку (19–21.09.2025) и повышения стоимости отелей в этот период. Стоимость ночи в Баку рассчитывается индивидуально при бронировании.
                            </p> -->
                        </div>
    
                        <div class="tour-booking-conditions" id="tour-booking-conditions">
                            <h2 class="tour-booking-conditions__title">Условия бронирования</h2>
                            <div class="tour-booking-conditions__grid">
                                <div class="tour-booking-conditions__card">
                                    <div class="tour-booking-conditions__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="4" y="2" width="16" height="20" rx="2" stroke="currentColor" stroke-width="2"/>
                                            <path d="M8 8h8M8 12h8M8 16h4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                    <p class="tour-booking-conditions__text">Предоплата 15%, остальное — организатору напрямую</p>
                                </div>
                                <div class="tour-booking-conditions__card">
                                    <div class="tour-booking-conditions__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 10h10a4 4 0 0 1 4 4v0a4 4 0 0 1-4 4H5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                            <path d="M7 6l-4 4 4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p class="tour-booking-conditions__text">Бесплатная отмена за 48 часов</p>
                                </div>
                                <div class="tour-booking-conditions__card">
                                    <div class="tour-booking-conditions__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 20l5-16 5 16M9 14h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <p class="tour-booking-conditions__text">Проходит на русском языке</p>
                                </div>
                                <div class="tour-booking-conditions__card">
                                    <div class="tour-booking-conditions__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                            <path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                    </div>
                                    <p class="tour-booking-conditions__text">Для предоплаты принимаем карты российских и иностранных банков</p>
                                </div>
                                <div class="tour-booking-conditions__card">
                                    <div class="tour-booking-conditions__icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.5 10.5v.01M12 10.5v.01M14.5 10.5v.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                    <p class="tour-booking-conditions__text">Задать вопросы организатору можно в заказе до предоплаты</p>
                                </div>
                            </div>
                        </div>
    
                        <div class="tour-available-dates" id="tour-available-dates">
                            <h2 class="tour-available-dates__title">Доступные даты</h2>
                            <div class="tour-available-dates__grid">
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">15–18 мар (вс-ср)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">16–19 мар (пн-чт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">17–20 мар (вт-пт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">18–21 мар (ср-сб)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">22–25 мар (вс-ср)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">23–26 мар (пн-чт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">24–27 мар (вт-пт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">25–28 мар (ср-сб)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">29 мар – 1 апр (вс-ср)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">30 мар – 2 апр (пн-чт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">31 мар – 3 апр (вт-пт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">1–4 апр (ср-сб)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">5–8 апр (вс-ср)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">6–9 апр (пн-чт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                                <div class="tour-available-dates__card">
                                    <p class="tour-available-dates__date">7–10 апр (вт-пт)</p>
                                    <p class="tour-available-dates__price">€ 3609</p>
                                </div>
                            </div>
                            <div class="tour-available-dates__actions">
                                <button type="button" class="tour-available-dates__btn offer-reserve-btn">
                                    <span class="offer-reserve-btn__text">Выбрать даты</span>
                                    <span class="offer-reserve-btn__icon-wrapper">
                                        <svg width="30" height="30" viewBox="0 0 145 145" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z" fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949"/>
                                            <path d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z" fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949"/>
                                            <path d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z" fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949"/>
                                            <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </span>
                                </button>
                                <p class="tour-available-dates__note">
                                    На Трипстере вы оплачиваете 15% от стоимости, остальные деньги организатору напрямую. Если хотите уточнить детали перед оплатой, <a href="#" class="tour-available-dates__link">напишите организатору</a>.
                                </p>
                            </div>
                        </div>
    
                        <div class="tour-organizer" id="tour-organizer">
                            <div class="tour-organizer__inner">
                                <div class="tour-organizer__profile">
                                    <div class="tour-organizer__avatar-wrap">
                                        <a href="/guide.html"><img src="./assets/image/guide1.Bd1fcS02.jpg" alt="Юлия" class="tour-organizer__avatar"></a>
                                    </div>
                                    <h3 class="tour-organizer__name"><a href="/guide.html">Юлия</a></h3>
                                    <div class="tour-organizer__stats">
                                        <div class="tour-organizer__stat">
                                            <svg class="tour-organizer__stat-icon" width="18" height="18" viewBox="0 0 20 20" fill="none">
                                                <path d="M19 7.59C19 7.32 18.8 7.16 18.39 7.09L12.96 6.31L10.53 1.44C10.39 1.15 10.22 1 10 1C9.78 1 9.61 1.15 9.47 1.44L7.04 6.31L1.61 7.09C1.2 7.16 1 7.32 1 7.59C1 7.74 1.09 7.91 1.27 8.1L5.21 11.89L4.28 17.25C4.26 17.35 4.26 17.42 4.26 17.46C4.26 17.61 4.29 17.74 4.37 17.84C4.45 17.95 4.56 18 4.71 18C4.84 18 4.98 17.96 5.14 17.87L10 15.34L14.86 17.87C15.01 17.96 15.15 18 15.29 18C15.59 18 15.73 17.82 15.73 17.46C15.73 17.37 15.73 17.3 15.72 17.25L14.79 11.89L18.72 8.1C18.91 7.92 19 7.74 19 7.59Z" fill="currentColor"/>
                                            </svg>
                                            <span class="tour-organizer__stat-value">4,99</span>
                                            <a href="#tour-reviews" class="tour-organizer__stat-link">126 отзывов</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tour-organizer__about">
                                    <p class="tour-organizer__text">Я филолог, тележурналист и любитель рассказывать истории. Побродить маршрутами литературных героев, заглянуть в окна писательской квартиры, пообедать в заведении, где бывали гении. Узнать, кто же они — прототипы известных всему миру героев. Заглянуть в письма и воспоминания современников. Услышать такие подробности частной жизни великих людей, о которых вам никогда не расскажут учителя. Все это я предлагаю вам на своих маршрутах по «самому умышленному городу мира» — Литературному Петербургу.</p>
                                </div>
                            </div>
                        </div>
    
                        <div class="tour-reviews" id="tour-reviews">
                            <h2 class="tour-reviews__title">Отзывы путешественников</h2>
                        
                            <div class="tour-reviews__rating-block">
                                <div class="tour-reviews__rating-left">
                                    <div class="tour-reviews__rating-value">5.00</div>
                                    <div class="tour-reviews__rating-stars">
                                        <svg width="24" height="24" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z" fill="currentColor"/></svg>
                                        <svg width="24" height="24" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z" fill="currentColor"/></svg>
                                        <svg width="24" height="24" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z" fill="currentColor"/></svg>
                                        <svg width="24" height="24" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z" fill="currentColor"/></svg>
                                        <svg width="24" height="24" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z" fill="currentColor"/></svg>
                                    </div>
                                    <p class="tour-reviews__rating-note">Написать отзыв можно только<br>после посещения. <button type="button" class="tour-reviews__rating-link js-tour-reviews-details">Подробнее</button></p>
                                </div>
                                <div class="tour-reviews__rating-distribution">
                                    <div class="tour-reviews__dist-row tour-reviews__dist-row--active">
                                        <span class="tour-reviews__dist-stars">★★★★★</span>
                                        <span class="tour-reviews__dist-bar"><span class="tour-reviews__dist-bar-fill"></span></span>
                                        <span class="tour-reviews__dist-count">5</span>
                                    </div>
                                    <div class="tour-reviews__dist-row">
                                        <span class="tour-reviews__dist-stars">★★★★★</span>
                                        <span class="tour-reviews__dist-bar"><span class="tour-reviews__dist-bar-fill"></span></span>
                                        <span class="tour-reviews__dist-count">0</span>
                                    </div>
                                    <div class="tour-reviews__dist-row">
                                        <span class="tour-reviews__dist-stars">★★★★★</span>
                                        <span class="tour-reviews__dist-bar"><span class="tour-reviews__dist-bar-fill"></span></span>
                                        <span class="tour-reviews__dist-count">0</span>
                                    </div>
                                    <div class="tour-reviews__dist-row">
                                        <span class="tour-reviews__dist-stars">★★★★★</span>
                                        <span class="tour-reviews__dist-bar"><span class="tour-reviews__dist-bar-fill"></span></span>
                                        <span class="tour-reviews__dist-count">0</span>
                                    </div>
                                    <div class="tour-reviews__dist-row">
                                        <span class="tour-reviews__dist-stars">★★★★★</span>
                                        <span class="tour-reviews__dist-bar"><span class="tour-reviews__dist-bar-fill"></span></span>
                                        <span class="tour-reviews__dist-count">0</span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="tour-reviews__accordion js-tour-reviews-accordion" hidden>
                                <div class="tour-reviews__accordion-header">
                                    <h3 class="tour-reviews__accordion-title">Как мы работаем с отзывами</h3>
                                    <button type="button" class="tour-reviews__accordion-close js-tour-reviews-accordion-close" aria-label="Закрыть">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 4L4 12M4 4l8 8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </button>
                                </div>
                                <div class="tour-reviews__accordion-body">
                                    <div class="tour-reviews__accordion-item">
                                        <h4 class="tour-reviews__accordion-item-title">Публикуем только настоящие отзывы</h4>
                                        <p class="tour-reviews__accordion-item-text">Наша миссия — знакомить путешественников с классными гидами. При работе с гидами мы, так же как и вы, ориентируемся на отзывы, поэтому нам важно, чтобы отзывы были настоящими.</p>
                                    </div>
                                    <div class="tour-reviews__accordion-item">
                                        <h4 class="tour-reviews__accordion-item-title">Следим за подлинностью отзывов</h4>
                                        <p class="tour-reviews__accordion-item-text">Написать отзыв можно только после посещения. Мы проверяем подлинность отзывов и прекращаем работать с гидами, которые пытаются накрутить свой рейтинг.</p>
                                    </div>
                                    <div class="tour-reviews__accordion-item">
                                        <h4 class="tour-reviews__accordion-item-title">Не удаляем негативные отзывы</h4>
                                        <p class="tour-reviews__accordion-item-text">У каждого путешественника на Трипстере есть право рассказать о своем опыте. А гид может ответить на отзыв и представить свою точку зрения.</p>
                                    </div>
                                    <div class="tour-reviews__accordion-item">
                                        <h4 class="tour-reviews__accordion-item-title">Размещаем только качественные предложения</h4>
                                        <p class="tour-reviews__accordion-item-text">После каждого отрицательного отзыва мы связываемся с гидом и проводим работу над ошибками. Если предложение и дальше расстраивает путешественников — снимаем его с размещения. Поэтому на Трипстере остаются предложения только с хорошим рейтингом.</p>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="tour-reviews__list">
                                <div class="review">
                                    <div class="review__img-wrapper">
                                        <img src="./assets/image/tour1.AuwWnMIk.jpg" alt="" class="review__img">
                                    </div>
                                    <div class="review__body">
                                        <div class="review__user-data-row">
                                            <div class="review__user">
                                                <img src="./assets/image/user1.CDEjALZz.webp" alt="" class="review__user-img">
                                                <div class="review__user-name">Игорь</div>
                                                <div class="review__rate-row">
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                </div>
                                            </div>
                                
                                            <div class="review__date">
                                                11 декабря 2025
                                            </div>
                                        </div>
                                        <p class="review__name-tour">
                                            <a href="" class="review__name-tour-link">Далат «всё включено»: шёлковая фабрика и водопады</a>
                                        </p>
                                
                                        <div class="review__text">
                                            Была в туре по Юго-Восточной Азии. Впечатления на всю жизнь — просто фантастически крутое путешествие! Выражаю огромную благодарность гиду Алёне за то, что подарили мне возможность познакомиться с такими разными странами.
                                        </div>
                                    </div>
                                </div>        <div class="review">
                                    <div class="review__img-wrapper">
                                        <img src="./assets/image/tour2.BtoFcI4-.jpg" alt="" class="review__img">
                                    </div>
                                    <div class="review__body">
                                        <div class="review__user-data-row">
                                            <div class="review__user">
                                                <img src="./assets/image/user1.CDEjALZz.webp" alt="" class="review__user-img">
                                                <div class="review__user-name">Марина</div>
                                                <div class="review__rate-row">
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                </div>
                                            </div>
                                
                                            <div class="review__date">
                                                3 марта 2025
                                            </div>
                                        </div>
                                        <p class="review__name-tour">
                                            <a href="" class="review__name-tour-link">Индивидуальный тур в Далат</a>
                                        </p>
                                
                                        <div class="review__text">
                                            Отличная организация, всё по времени. Гид Елена — настоящий профессионал. Особенно понравилась поездка на ретро-паровозе и дегустация кофе. Рекомендую!
                                        </div>
                                    </div>
                                </div>        <div class="review">
                                    <div class="review__img-wrapper">
                                        <img src="./assets/image/tour3.BEpAL6ki.jpg" alt="" class="review__img">
                                    </div>
                                    <div class="review__body">
                                        <div class="review__user-data-row">
                                            <div class="review__user">
                                                <img src="./assets/image/user1.CDEjALZz.webp" alt="" class="review__user-img">
                                                <div class="review__user-name">Алексей</div>
                                                <div class="review__rate-row">
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                </div>
                                            </div>
                                
                                            <div class="review__date">
                                                18 февраля 2025
                                            </div>
                                        </div>
                                        <p class="review__name-tour">
                                            <a href="" class="review__name-tour-link">Далат: шёлковая фабрика и водопады</a>
                                        </p>
                                
                                        <div class="review__text">
                                            Поехали с семьёй, дети в восторге от «Сумасшедшего дома». Маршрут составлен идеально, без лишней спешки. Обязательно вернёмся!
                                        </div>
                                    </div>
                                </div>        <div class="review">
                                    <div class="review__img-wrapper">
                                        <img src="./assets/image/tour6.CDOMkz2g.jpg" alt="" class="review__img">
                                    </div>
                                    <div class="review__body">
                                        <div class="review__user-data-row">
                                            <div class="review__user">
                                                <img src="./assets/image/user1.CDEjALZz.webp" alt="" class="review__user-img">
                                                <div class="review__user-name">Елена</div>
                                                <div class="review__rate-row">
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                </div>
                                            </div>
                                
                                            <div class="review__date">
                                                25 января 2025
                                            </div>
                                        </div>
                                        <p class="review__name-tour">
                                            <a href="" class="review__name-tour-link">Тур в Далат</a>
                                        </p>
                                
                                        <div class="review__text">
                                            Прекрасный тур для первого знакомства с Далатом. Водопад Понгур — невероятное зрелище. Питание отличное, транспорт комфортный. Спасибо за незабываемые впечатления!
                                        </div>
                                    </div>
                                </div>        <div class="review">
                                    <div class="review__img-wrapper">
                                        <img src="./assets/image/tour5.0G_G6fwW.jpg" alt="" class="review__img">
                                    </div>
                                    <div class="review__body">
                                        <div class="review__user-data-row">
                                            <div class="review__user">
                                                <img src="./assets/image/user1.CDEjALZz.webp" alt="" class="review__user-img">
                                                <div class="review__user-name">Дмитрий</div>
                                                <div class="review__rate-row">
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.9178 11.8192C15.6588 12.0702 15.5398 12.4332 15.5988 12.7891L16.4878 17.7088C16.5628 18.1258 16.3868 18.5478 16.0378 18.7887C15.6958 19.0387 15.2409 19.0687 14.8679 18.8687L10.4392 16.5589C10.2852 16.4769 10.1142 16.4329 9.93921 16.4279H9.66823C9.57423 16.4419 9.48224 16.4719 9.39825 16.5179L4.96854 18.8387C4.74956 18.9487 4.50157 18.9877 4.25859 18.9487C3.66663 18.8367 3.27166 18.2728 3.36865 17.6778L4.25859 12.7581C4.31759 12.3992 4.19859 12.0342 3.93961 11.7792L0.328854 8.27945C0.026874 7.98647 -0.078119 7.5465 0.0598718 7.14952C0.193863 6.75355 0.53584 6.46457 0.948812 6.39957L5.91848 5.67862C6.29645 5.63962 6.62843 5.40964 6.79842 5.06966L8.98827 0.579961C9.04027 0.479968 9.10727 0.387974 9.18826 0.309979L9.27825 0.239984C9.32525 0.187987 9.37925 0.14499 9.43924 0.109993L9.54824 0.0699953L9.71823 0H10.1392C10.5152 0.0389974 10.8461 0.263982 11.0191 0.59996L13.238 5.06966C13.398 5.39664 13.709 5.62362 14.0679 5.67862L19.0376 6.39957C19.4576 6.45957 19.8085 6.74955 19.9475 7.14952C20.0785 7.5505 19.9655 7.99047 19.6576 8.27945L15.9178 11.8192Z"
                                                            fill="#5DB8A6" />
                                                    </svg>
                                
                                                </div>
                                            </div>
                                
                                            <div class="review__date">
                                                10 января 2025
                                            </div>
                                        </div>
                                        <p class="review__name-tour">
                                            <a href="" class="review__name-tour-link">Далат «всё включено»</a>
                                        </p>
                                
                                        <div class="review__text">
                                            Всё было на высоте: от заброса до финиша. Гиды знают каждый уголок, интересно рассказывают. Долина любви и гортензии — must see. Очень доволен поездкой.
                                        </div>
                                    </div>
                                </div>    </div>
                            <div class="tour-reviews__load-more">
                                <button type="button" class="tour-reviews__load-more-btn">Загрузить ещё</button>
                            </div>
                        </div>
    
                    </div>
    
                </div>
                <aside class="tour-info-sec__aside">
                    <div class="tour-info-sec__aside-org">
                        <div class="tour-info-sec__aside-org-img-wrapper">
                            <img src="./assets/image/user1.CDEjALZz.webp" alt="" class="tour-info-sec__aside-org-img">
                        </div>
                        <div class="tour-info-sec__aside-org-data">
                            <p class="tour-info-sec__aside-org-name">
                                <a href="" class="tour-info-sec__aside-org-name-link">Алина</a>
                            </p>
                            <p class="astour-info-sec__aside-org-subtitle">представитель команды гидов в Стамбуле</p>
                            <a href="" class="astour-info-sec__aside-org-btn">
                                Напишите мне
    
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.7484 0C13.6214 0 16.3214 1.117 18.3494 3.146C22.5414 7.338 22.5414 14.158 18.3494 18.35C16.2944 20.406 13.5274 21.494 10.7244 21.494C9.19644 21.494 7.65844 21.171 6.21944 20.505C5.79544 20.335 5.39844 20.175 5.11344 20.175C4.78544 20.177 4.34444 20.329 3.91844 20.476C3.04444 20.776 1.95644 21.15 1.15144 20.348C0.349437 19.545 0.719437 18.46 1.01744 17.587C1.16444 17.157 1.31544 16.713 1.31544 16.377C1.31544 16.101 1.18244 15.749 0.978437 15.242C-0.894563 11.197 -0.0285628 6.322 3.14844 3.147C5.17644 1.118 7.87544 0 10.7484 0ZM10.7494 1.5C8.27644 1.5 5.95344 2.462 4.20844 4.208C1.47444 6.94 0.730437 11.135 2.35544 14.648C2.58944 15.227 2.81544 15.791 2.81544 16.377C2.81544 16.962 2.61444 17.551 2.43744 18.071C2.29144 18.499 2.07044 19.145 2.21244 19.287C2.35144 19.431 3.00144 19.204 3.43044 19.057C3.94544 18.881 4.52944 18.679 5.10844 18.675C5.68844 18.675 6.23544 18.895 6.81444 19.128C10.3614 20.768 14.5564 20.022 17.2894 17.29C20.8954 13.682 20.8954 7.813 17.2894 4.207C15.5434 2.461 13.2214 1.5 10.7494 1.5ZM14.6963 10.1627C15.2483 10.1627 15.6963 10.6097 15.6963 11.1627C15.6963 11.7157 15.2483 12.1627 14.6963 12.1627C14.1443 12.1627 13.6923 11.7157 13.6923 11.1627C13.6923 10.6097 14.1353 10.1627 14.6873 10.1627H14.6963ZM10.6875 10.1627C11.2395 10.1627 11.6875 10.6097 11.6875 11.1627C11.6875 11.7157 11.2395 12.1627 10.6875 12.1627C10.1355 12.1627 9.68354 11.7157 9.68354 11.1627C9.68354 10.6097 10.1255 10.1627 10.6785 10.1627H10.6875ZM6.67834 10.1627C7.23034 10.1627 7.67834 10.6097 7.67834 11.1627C7.67834 11.7157 7.23034 12.1627 6.67834 12.1627C6.12634 12.1627 5.67434 11.7157 5.67434 11.1627C5.67434 10.6097 6.11734 10.1627 6.66934 10.1627H6.67834Z"
                                        fill="white" />
                                </svg>
    
                            </a>
                        </div>
                    </div>
                    <div class="tour-info-sec__aside-booking-card booking-card">
                        <p class="booking-card__type">Индивидуальный тур</p>
                        <ul class="booking-card__adv-list">
                            <li class="booking-card__adv-list-element">
                                <span class="booking-card__adv-list-element-name">Длительность</span>
                                <span class="booking-card__adv-list-element-value">2 дня</span>
                            </li>
    
                            <li class="booking-card__adv-list-element">
                                <span class="booking-card__adv-list-element-name">Размер группы</span>
                                <span class="booking-card__adv-list-element-value">до 3 человек</span>
                            </li>
    
                            <li class="booking-card__adv-list-element">
                                <span class="booking-card__adv-list-element-name">Дети</span>
                                <span class="booking-card__adv-list-element-value">Можно с детьми</span>
                            </li>
    
    
                        </ul>
                        <div class="booking-card__offer">
                            <p class="booking-card__offer-title">Далат «всё включено»: шёлковая
                                фабрика, поездка на ретро-паровозе и водопады</p>
                            <p class="booking-card__offer-subtitle">Хоа Лу - Гора Лежащего Дракона: лодка Там Кок -
                                велопрогулка
                                высокого качества.
                                Продолжительность: 11 часов.
                                Аутентичный комплексный обед. Включен трансфер
                                на лимузине/микроавтобусе.</p>
    
                            <p class="booking-card__offer-price"><span>$520</span> / за группу</p>
                            <p class="booking-card__offer-peoples">за 1-3 человек, независимо от числа участников</p>
                            <p class="booking-card__offer-price-tax-info">(Цена включает налоги и сборы за бронирование)</p>
    
                            <button class="booking-card__offer-reserve-btn offer-reserve-btn">
                                <span class="offer-reserve-btn__text">Выбрать даты</span>
                                <span class="offer-reserve-btn__icon-wrapper">
                                    <svg width="145" height="145" viewBox="0 0 145 145" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M73.9159 71.5561C74.5649 71.2681 74.6248 70.3704 74.0199 69.9991L43.5741 51.3349C43.4355 51.2499 43.2759 51.2051 43.1133 51.205L36.2692 51.2049C35.4461 51.2048 35.0718 52.2329 35.7022 52.7619L63.1592 75.7896C63.417 76.0058 63.7753 76.0571 64.0829 75.9208L73.9159 71.5561Z"
                                            fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
                                        <path
                                            d="M48.1774 90.2826C48.7627 89.9272 48.7373 89.0692 48.1318 88.7494L32.761 80.6372C32.559 80.5307 32.3237 80.5066 32.1044 80.5702L19.9053 84.1119C19.1923 84.3189 19.0383 85.2612 19.6487 85.6838L36.0472 97.0362C36.3332 97.2342 36.7092 97.2457 37.0066 97.0652L48.1774 90.2826Z"
                                            fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
                                        <path
                                            d="M122.323 41.536C124.724 44.6844 124.066 49.1917 120.867 51.5239L57.6126 97.623L41.6098 100.973L35.3365 96.4923L112.543 40.1152C115.647 37.8491 119.993 38.4804 122.323 41.536Z"
                                            fill="#5DB8A6" stroke="#5DB8A6" stroke-width="0.97949" />
                                        <path d="M20 110.945H80" stroke="#5DB8A6" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    
    <section class="home-blog-sec directions-blog-sec">
    
        <div class="container">
            <div class="sec-header">
                <div class="sec-header__text">
                    <h2 class="sec-title">Полезные статьи</h2>
                    <!-- <p class="sec-header__subtitle">Путешествия в места, которые не посмотреть за день</p> -->
                </div>
    
                <a href="" class="sec-header__btn">Все статьи</a>
            </div>
        </div>
    
        <div class="blog-slider-wrapper">
            <div class="swiper post-slider-swiper">
        
                <div class="swiper-wrapper">
        
                    <div class="swiper-slide">
                        <div class=" blog-post">
                            <a href="post.html" class="blog-post__image-wrapper">
                                <img src="<?php echo esc_url($tpl); ?>/assets/image/post1.DmBlYCEk.jpg" alt="" class="blog-post__image">
                            </a>
                            <div class="blog-post__data">
                                <p class="blog-post__date">21 июня 2025</p>
                                <div class="blog-post__header">
                                    <p class="blog-post__title">
                                        Где отдыхать во Вьетнаме
                                    </p>
                                    <a href="post.html" class="blog-post__link-ar">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                                                fill="#85D2A9" />
                                        </svg>
                        
                                    </a>
                                </div>
                        
                                <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
                                    выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
                                    политику,
                                    расположение, благоустройство...</p>
                        
                                <div class="blog-post__teg-row">
                                    <a href="" class="blog-post__teg">Кредитование</a>
                        
                                    <a href="" class="blog-post__teg">Иновации</a>
                        
                                    <a href="" class="blog-post__teg">Строительство</a>
                                </div>
                            </div>
                        
                        </div>            </div>
        
                    <div class="swiper-slide">
                        <div class=" blog-post">
                            <a href="post.html" class="blog-post__image-wrapper">
                                <img src="<?php echo esc_url($tpl); ?>/assets/image/post2.BKyHK2t0.jpg" alt="" class="blog-post__image">
                            </a>
                            <div class="blog-post__data">
                                <p class="blog-post__date">21 июня 2025</p>
                                <div class="blog-post__header">
                                    <p class="blog-post__title">
                                        Фукуок — изумрудный остров в Сиамском заливе
                                    </p>
                                    <a href="post.html" class="blog-post__link-ar">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                                                fill="#85D2A9" />
                                        </svg>
                        
                                    </a>
                                </div>
                        
                                <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
                                    выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
                                    политику,
                                    расположение, благоустройство...</p>
                        
                                <div class="blog-post__teg-row">
                                    <a href="" class="blog-post__teg">Кредитование</a>
                        
                                    <a href="" class="blog-post__teg">Иновации</a>
                        
                                    <a href="" class="blog-post__teg">Строительство</a>
                                </div>
                            </div>
                        
                        </div>            </div>
        
        
                    <div class="swiper-slide">
                        <div class=" blog-post">
                            <a href="post.html" class="blog-post__image-wrapper">
                                <img src="<?php echo esc_url($tpl); ?>/assets/image/post3.MtZbYBS-.jpg" alt="" class="blog-post__image">
                            </a>
                            <div class="blog-post__data">
                                <p class="blog-post__date">21 июня 2025</p>
                                <div class="blog-post__header">
                                    <p class="blog-post__title">
                                        Вьетнамская кухня: 10 блюд, которые стоит попробовать
                                    </p>
                                    <a href="post.html" class="blog-post__link-ar">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                                                fill="#85D2A9" />
                                        </svg>
                        
                                    </a>
                                </div>
                        
                                <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
                                    выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
                                    политику,
                                    расположение, благоустройство...</p>
                        
                                <div class="blog-post__teg-row">
                                    <a href="" class="blog-post__teg">Кредитование</a>
                        
                                    <a href="" class="blog-post__teg">Иновации</a>
                        
                                    <a href="" class="blog-post__teg">Строительство</a>
                                </div>
                            </div>
                        
                        </div>            </div>
        
                    <div class="swiper-slide">
                        <div class=" blog-post">
                            <a href="post.html" class="blog-post__image-wrapper">
                                <img src="<?php echo esc_url($tpl); ?>/assets/image/post2.BKyHK2t0.jpg" alt="" class="blog-post__image">
                            </a>
                            <div class="blog-post__data">
                                <p class="blog-post__date">21 июня 2025</p>
                                <div class="blog-post__header">
                                    <p class="blog-post__title">
                                        Фукуок — изумрудный остров в Сиамском заливе
                                    </p>
                                    <a href="post.html" class="blog-post__link-ar">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                                                fill="#85D2A9" />
                                        </svg>
                        
                                    </a>
                                </div>
                        
                                <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
                                    выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
                                    политику,
                                    расположение, благоустройство...</p>
                        
                                <div class="blog-post__teg-row">
                                    <a href="" class="blog-post__teg">Кредитование</a>
                        
                                    <a href="" class="blog-post__teg">Иновации</a>
                        
                                    <a href="" class="blog-post__teg">Строительство</a>
                                </div>
                            </div>
                        
                        </div>            </div>
        
                    <div class="swiper-slide">
                        <div class=" blog-post">
                            <a href="post.html" class="blog-post__image-wrapper">
                                <img src="<?php echo esc_url($tpl); ?>/assets/image/post1.DmBlYCEk.jpg" alt="" class="blog-post__image">
                            </a>
                            <div class="blog-post__data">
                                <p class="blog-post__date">21 июня 2025</p>
                                <div class="blog-post__header">
                                    <p class="blog-post__title">
                                        Где отдыхать во Вьетнаме
                                    </p>
                                    <a href="post.html" class="blog-post__link-ar">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                                                fill="#85D2A9" />
                                        </svg>
                        
                                    </a>
                                </div>
                        
                                <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
                                    выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
                                    политику,
                                    расположение, благоустройство...</p>
                        
                                <div class="blog-post__teg-row">
                                    <a href="" class="blog-post__teg">Кредитование</a>
                        
                                    <a href="" class="blog-post__teg">Иновации</a>
                        
                                    <a href="" class="blog-post__teg">Строительство</a>
                                </div>
                            </div>
                        
                        </div>            </div>
        
                    <div class="swiper-slide">
                        <div class=" blog-post">
                            <a href="post.html" class="blog-post__image-wrapper">
                                <img src="<?php echo esc_url($tpl); ?>/assets/image/post2.BKyHK2t0.jpg" alt="" class="blog-post__image">
                            </a>
                            <div class="blog-post__data">
                                <p class="blog-post__date">21 июня 2025</p>
                                <div class="blog-post__header">
                                    <p class="blog-post__title">
                                        Фукуок — изумрудный остров в Сиамском заливе
                                    </p>
                                    <a href="post.html" class="blog-post__link-ar">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                                                fill="#85D2A9" />
                                        </svg>
                        
                                    </a>
                                </div>
                        
                                <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
                                    выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
                                    политику,
                                    расположение, благоустройство...</p>
                        
                                <div class="blog-post__teg-row">
                                    <a href="" class="blog-post__teg">Кредитование</a>
                        
                                    <a href="" class="blog-post__teg">Иновации</a>
                        
                                    <a href="" class="blog-post__teg">Строительство</a>
                                </div>
                            </div>
                        
                        </div>            </div>
        
        
                    <div class="swiper-slide">
                        <div class=" blog-post">
                            <a href="post.html" class="blog-post__image-wrapper">
                                <img src="<?php echo esc_url($tpl); ?>/assets/image/post3.MtZbYBS-.jpg" alt="" class="blog-post__image">
                            </a>
                            <div class="blog-post__data">
                                <p class="blog-post__date">21 июня 2025</p>
                                <div class="blog-post__header">
                                    <p class="blog-post__title">
                                        Вьетнамская кухня: 10 блюд, которые стоит попробовать
                                    </p>
                                    <a href="post.html" class="blog-post__link-ar">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8 7C8 6.44772 8.44772 6 9 6L17 6C17.5523 6 18 6.44772 18 7V15C18 15.5523 17.5523 16 17 16C16.4477 16 16 15.5523 16 15V9.41421L7.70711 17.7071C7.31658 18.0976 6.68342 18.0976 6.29289 17.7071C5.90237 17.3166 5.90237 16.6834 6.29289 16.2929L14.5858 8L9 8C8.44772 8 8 7.55228 8 7Z"
                                                fill="#85D2A9" />
                                        </svg>
                        
                                    </a>
                                </div>
                        
                                <p class="blog-post__subtitle">В данной статье мы расскажем Вам, про самые
                                    выдающие новостройки Москвы. Рассмотрим отзывы покупателей, ценовую
                                    политику,
                                    расположение, благоустройство...</p>
                        
                                <div class="blog-post__teg-row">
                                    <a href="" class="blog-post__teg">Кредитование</a>
                        
                                    <a href="" class="blog-post__teg">Иновации</a>
                        
                                    <a href="" class="blog-post__teg">Строительство</a>
                                </div>
                            </div>
                        
                        </div>            </div>
        
        
        
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
