<?php
/**
 * Шаблон страницы /direction/ — архив всех направлений (родительских термов).
 * URL без slug терма (напр. /direction/) отображает список корневых направлений.
 */
get_header();
?>
<main class="main">
    <?php get_template_part( 'templates/taxonomy-direction' ); ?>
</main>
<?php
get_footer();
