<div class="tour-booking-conditions" id="tour-booking-conditions">
    <h2 class="tour-booking-conditions__title">Условия бронирования</h2>
    <div class="tour-booking-conditions__grid">

        <?php
        if( have_rows('usloviya_bronirovaniya','options') ):
        while ( have_rows('usloviya_bronirovaniya','options') ) : the_row();
        ?>
        
        <div class="tour-booking-conditions__card">
            <div class="tour-booking-conditions__icon">
            <?php the_sub_field('svg_icon'); ?>
            </div>
            <p class="tour-booking-conditions__text"><?php the_sub_field('opisanie'); ?></p>
        </div>

        <?php
        endwhile;
        else :
        // вложенных полей не найдено
        endif;
        ?>

    </div>
</div>