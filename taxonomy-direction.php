<?php
get_header();
$term = get_queried_object();
$is_child = $term instanceof WP_Term && $term->parent > 0;
?>
<main class="main">
    <?php
    if ( $is_child ) {
        get_template_part( 'templates/taxonomy-direction-child' );
    } else {
        get_template_part( 'templates/taxonomy-direction' );
    }
    ?>
</main>
<?php
get_footer();
