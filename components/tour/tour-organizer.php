<?php
$post_id = get_the_ID();
if ( ! $post_id ) {
	return;
}
$author_id = (int) get_post_field( 'post_author', $post_id );
if ( ! $author_id ) {
	return;
}
$guide_user = get_userdata( $author_id );
if ( ! $guide_user || ! ( $guide_user instanceof WP_User ) ) {
	return;
}

$user_id   = $guide_user->ID;
$guide_url = get_author_posts_url( $user_id );

$image = array();
if ( function_exists( 'get_field' ) ) {
	$avatar = get_field( 'foto_gida', 'user_' . $user_id );
	if ( is_array( $avatar ) && ! empty( $avatar['url'] ) ) {
		$image = $avatar;
	} elseif ( is_numeric( $avatar ) ) {
		$url = wp_get_attachment_image_url( (int) $avatar, 'full' );
		if ( $url ) {
			$image = array( 'url' => $url, 'alt' => $guide_user->display_name );
		}
	} elseif ( is_string( $avatar ) && $avatar !== '' ) {
		$image = array( 'url' => $avatar, 'alt' => $guide_user->display_name );
	}
}
if ( empty( $image['url'] ) ) {
	$image = array(
		'url' => get_template_directory_uri() . '/assets/image-default/user-image-default.jpg',
		'alt' => $guide_user->display_name,
	);
}

$opisanie = '';
if ( function_exists( 'get_field' ) ) {
	$opisanie = get_field( 'korotkoe_opisanie_gida', 'user_' . $user_id ) ?: get_field( 'o_sebe', 'user_' . $user_id );
}
$display_name = $guide_user->display_name ?: $guide_user->user_login;
if ( empty( $opisanie ) && ! empty( $guide_user->description ) ) {
	$opisanie = $guide_user->description;
}
?>
<div class="tour-organizer" id="tour-organizer">
    <div class="tour-organizer__inner">
        <div class="tour-organizer__profile">
            <div class="tour-organizer__avatar-wrap">
                <a href="<?php echo esc_url( $guide_url ); ?>"><img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ?? $display_name ); ?>" class="tour-organizer__avatar"></a>
            </div>
            <h3 class="tour-organizer__name"><a href="<?php echo esc_url( $guide_url ); ?>"><?php echo esc_html( $display_name ); ?></a></h3>
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
        <?php if ( $opisanie ) : ?>
        <div class="tour-organizer__about">
            <p class="tour-organizer__text"><?php echo esc_html( wp_strip_all_tags( $opisanie ) ); ?></p>
        </div>
        <?php endif; ?>
    </div>
</div>
