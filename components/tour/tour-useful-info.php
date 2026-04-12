<?php if ( get_field('poleznaya_informacziya') ) { ?>
<div class="tour-useful-info" id="tour-useful-info">
    <h2 class="tour-useful-info__title">Полезная информация</h2>
    <div class="wp-editor">
       <?php the_field('poleznaya_informacziya'); ?>
    </div>
</div>
<?php } ?>