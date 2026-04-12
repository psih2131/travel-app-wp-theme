<?php $tpl = get_template_directory_uri(); ?>

    <section class="tour-hero-sec">
        <div class="container">
    
            <?php 
            //tour-header component
            get_template_part('components/tour/tour-header'); 
            ?>
    
            <?php 
            //tour-galery component
            get_template_part('components/tour/tour-galery'); 
            ?>

        </div>
    </section>
    
    <section class="tour-info-sec">
        <div class="container">
            <div class="tour-info-sec__container">
                <div class="tour-info-sec__main">
                    
                    <?php 
                    //tour-nav component
                    get_template_part('components/tour/tour-nav'); 
                    ?>
    
                    <div class="tour-info-sec__main-claster">
                        
                        <?php
                        //tour-description component
                        get_template_part('components/tour/tour-description'); 
                        ?>

                        <?php
                        //tour-org-det component
                        get_template_part('components/tour/tour-org-det'); 
                        ?>

                        <?php
                        //tour-living component
                        get_template_part('components/tour/tour-living'); 
                        ?>

                        <?php
                        //tour-program component
                        get_template_part('components/tour/tour-program'); 
                        ?>

                        <?php
                        //tour-useful-info component
                        get_template_part('components/tour/tour-useful-info'); 
                        ?>
                        
                        <?php
                        //tour-payment-includes component
                        get_template_part('components/tour/tour-payment-includes'); 
                        ?>

                        <?php
                        //tour-booking-conditions component
                        get_template_part('components/tour/tour-booking-conditions'); 
                        ?>
                        
                        <?php
                        //tour-available-dates component
                        get_template_part('components/tour/tour-available-dates'); 
                        ?>
                        
                        <?php 
                        //tour-organizer component
                        get_template_part('components/tour/tour-organizer'); 
                        ?>

                        <?php
                        //tour-reviews component
                        get_template_part('components/tour/tour-reviews'); 
                        ?>
                        
    
                    </div>
    
                </div>
                <aside class="tour-info-sec__aside">

                    <?php 
                    //tour-organizer-small component
                    get_template_part('components/tour/tour-organizer-small'); 
                    ?>
                    
                    <?php 
                    //tour-booking-card component
                    get_template_part('components/tour/tour-booking-card'); 
                    ?>
                    
                </aside>
            </div>
        </div>
    </section>
    
    <?php 
    //tour-blog-posts-slider component
    get_template_part('components/tour/tour-blog-posts-slider'); 
    ?>

