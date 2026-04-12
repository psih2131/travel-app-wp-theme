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