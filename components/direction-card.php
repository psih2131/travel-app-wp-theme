<?php
$term = $args['term'] ?? null;
if ( ! $term || ! ( $term instanceof WP_Term ) ) {
    return;
}

$term_link = get_term_link( $term );
if ( is_wp_error( $term_link ) ) {
    return;
}

$count = $term->count;
$count_text = $count === 1 ? '1 экскурсия' : ( $count < 5 ? $count . ' экскурсии' : $count . ' экскурсий' );

$image_url = '';
if ( function_exists( 'get_field' ) ) {
    $img = get_field( 'izobrazhenie_napravleniya', 'direction_' . $term->term_id );
    if ( is_array( $img ) && ! empty( $img['url'] ) ) {
        $image_url = $img['url'];
    } elseif ( is_numeric( $img ) ) {
        $image_url = wp_get_attachment_image_url( (int) $img, 'full' );
    } elseif ( is_string( $img ) && $img !== '' ) {
        $image_url = $img;
    }
}
if ( empty( $image_url ) ) {
    $image_url = get_template_directory_uri() . '/assets/image/dir-1.C1Ozobgs.jpg';
}
?>
<a href="<?php echo esc_url( $term_link ); ?>" class="direction-card">
    <div class="direction-card__img-wrapper">
        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" class="direction-card__img">
    </div>
    <div class="direction-card__data">
        <p class="direction-card__name-location"><?php echo esc_html( $term->name ); ?></p>
        <div class="direction-card__count"><?php echo esc_html( $count_text ); ?></div>
    </div>
</a>
