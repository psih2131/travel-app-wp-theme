<?php
/**
 * Колбэк для wp_list_comments() на страницах блога.
 *
 * @package travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Разметка одного комментария (как в вёрстке post-comment).
 *
 * @param WP_Comment $comment Объект комментария.
 * @param array      $args    Аргументы списка.
 * @param int        $depth   Уровень вложенности.
 */
function travel_blog_comment_callback( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
	?>
	<<?php echo $tag; ?> <?php comment_class( 'post-comments__item', $comment ); ?> id="comment-<?php comment_ID(); ?>">
		<article class="post-comment">
			<?php
			echo get_avatar(
				$comment,
				isset( $args['avatar_size'] ) ? (int) $args['avatar_size'] : 56,
				'',
				'',
				array(
					'class'   => 'post-comment__avatar',
					'loading' => 'lazy',
				)
			);
			?>
			<div class="post-comment__body">
				<?php echo get_comment_author($comment); ?>
				<h3 class="post-comment__name"><?php echo esc_html( get_comment_author( $comment ) ); ?></h3>
				<div class="post-comment__text"><?php comment_text( $comment ); ?></div>
			</div>
		</article>
	</<?php echo $tag; ?>>
	<?php
}
