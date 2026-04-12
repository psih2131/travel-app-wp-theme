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