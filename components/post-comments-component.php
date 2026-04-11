<?php
/**
 * Шаблон комментариев для записей блога (подключается через comments_template()).
 * Список: wp_list_comments + нативная пагинация (next_comments_link).
 * Форма: comment_form() только для авторизованных.
 *
 * @package travel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>
<div class="post-comments" aria-labelledby="post-comments-heading">
	<h2 id="post-comments-heading" class="post-comments__title">
		<?php
		$count = (int) get_comments_number();
		if ( $count > 0 ) {
			printf(
				/* translators: %s: number of comments */
				esc_html__( 'Комментарии (%s)', 'travel' ),
				number_format_i18n( $count )
			);
		} else {
			esc_html_e( 'Комментарии', 'travel' );
		}
		?>
	</h2>

	<?php if ( have_comments() ) : ?>
		<ul class="post-comments__list">
			<?php
			wp_list_comments(
				array(
					'callback'          => 'travel_blog_comment_callback',
					'style'             => 'ul',
					'short_ping'        => true,
					'avatar_size'       => 56,
					'reverse_top_level' => false,
				)
			);
			?>
		</ul>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
			$travel_next_comments_attrs = static function () {
				return 'class="post-comments__more-btn"';
			};
			add_filter( 'next_comments_link_attributes', $travel_next_comments_attrs );
			ob_start();
			next_comments_link( esc_html__( 'Загрузить ещё', 'travel' ) );
			remove_filter( 'next_comments_link_attributes', $travel_next_comments_attrs );
			$travel_next_comments = trim( ob_get_clean() );
			if ( $travel_next_comments !== '' ) {
				echo '<div class="post-comments__more">' . wp_kses_post( $travel_next_comments ) . '</div>';
			}
		}
		?>

	<?php endif; ?>

	<?php if ( is_user_logged_in() && comments_open() ) : ?>
		<div class="post-comments__form-block">
			<?php
			comment_form(
				array(
					'title_reply'          => __( 'Оставить комментарий', 'travel' ),
					'title_reply_before'   => '<h3 id="post-comments-form-heading" class="post-comments__form-title">',
					'title_reply_after'    => '</h3>',
					'logged_in_as'         => '',
					'comment_notes_before' => '',
					'comment_notes_after'  => '',
					'class_form'           => 'post-comments-form',
					'class_submit'         => 'post-comments-form__submit',
					'id_submit'            => 'submit',
					'name_submit'          => 'submit',
					'label_submit'         => __( 'Отправить комментарий', 'travel' ),
					'format'               => 'html5',
					'comment_field'        => '<div class="post-comments-form__row"><label class="post-comments-form__label" for="comment">' . esc_html__( 'Комментарий', 'travel' ) . '</label><textarea id="comment" name="comment" class="post-comments-form__textarea" rows="5" placeholder="' . esc_attr__( 'Ваш текст', 'travel' ) . '" required></textarea></div>',
				)
			);
			?>
		</div>
	<?php endif; ?>
</div>
