<?php

$url_theme = get_template_directory();

//controller regist custom post types file
require_once $url_theme . '/controllers/post-type-registr.php';

//controller for hierarchical taxonomy meta boxes (direction, tour-rubric)
require_once $url_theme . '/controllers/taxonomy-hierarchical-meta.php';

//roles controller
require_once $url_theme . '/controllers/user-role-controller.php';

// автоодобрение комментов к брони (tour-bookings)
require_once $url_theme . '/controllers/comment-approve-tour-bookings.php';
// отзыв к туру со страницы брони (ACF «rejting» + комментарий к tours)
require_once $url_theme . '/inc/user-booking-tour-review.php';
// агрегат рейтинга (1–5) для блока отзывов на карточке тура
require_once $url_theme . '/inc/tour-reviews-rating-stats.php';

// REST API: эндпоинт регистрации пользователя
require_once $url_theme . '/endpoints/register.php';

// REST API: эндпоинт авторизации пользователя
require_once $url_theme . '/endpoints/login.php';

// REST API: эндпоинт восстановления пароля
require_once $url_theme . '/endpoints/recovery.php';

// REST API: эндпоинт смены пароля
require_once $url_theme . '/endpoints/change-password.php';

// REST API: обновление личных данных пользователя
require_once $url_theme . '/endpoints/update-profile.php';

// REST API: загрузка аватара пользователя
require_once $url_theme . '/endpoints/update-avatar.php';

// REST API: список гидов
require_once $url_theme . '/endpoints/guides.php';

// Колбэк вывода комментариев для блога (wp_list_comments).
require_once $url_theme . '/inc/blog-comments-template.php';

/**
 * Для одиночных записей типа blog: постраничные комментарии и 5 штук на страницу (нативная пагинация WP).
 */
function travel_blog_option_page_comments( $value ) {
	if ( is_admin() ) {
		return $value;
	}
	$obj = get_queried_object();
	if ( $obj instanceof WP_Post && $obj->post_type === 'blog' ) {
		return true;
	}
	return $value;
}
add_filter( 'option_page_comments', 'travel_blog_option_page_comments' );

function travel_blog_option_comments_per_page( $value ) {
	if ( is_admin() ) {
		return $value;
	}
	$obj = get_queried_object();
	if ( $obj instanceof WP_Post && $obj->post_type === 'blog' ) {
		return 5;
	}
	return $value;
}
add_filter( 'option_comments_per_page', 'travel_blog_option_comments_per_page' );

/**
 * Обрезает текст до $max символов (UTF-8). Длиннее — обрезка + суффикс.
 *
 * @param string $text   Входной текст.
 * @param int    $max    Максимальная длина.
 * @param string $suffix Суффикс при обрезке.
 * @return string
 */
if ( ! function_exists( 'travel_truncate_text' ) ) {
	function travel_truncate_text( $text, $max = 1000, $suffix = '…' ) {
		if ( ! is_string( $text ) || '' === $text ) {
			return is_string( $text ) ? $text : '';
		}
		$enc = 'UTF-8';
		if ( function_exists( 'mb_strlen' ) && function_exists( 'mb_substr' ) ) {
			if ( mb_strlen( $text, $enc ) <= $max ) {
				return $text;
			}
			return mb_substr( $text, 0, $max, $enc ) . $suffix;
		}
		return strlen( $text ) > $max ? substr( $text, 0, $max ) . $suffix : $text;
	}
}

/**
 * Статус брони ACF `status_broniryvaniya`: плашка, финальное ли решение.
 * Варианты: «В ожидании», «Одобрено», «Отклонено».
 *
 * @param int $post_id ID поста tour-bookings.
 * @return array{ label: string, mod: string, is_final: bool, raw: string }
 */
if ( ! function_exists( 'travel_tour_booking_bron_status_from_acf' ) ) {
	function travel_tour_booking_bron_status_from_acf( $post_id ) {
		$default = array(
			'label'    => __( 'В ожидании', 'travel' ),
			'mod'      => 'pending',
			'is_final' => false,
			'raw'      => '',
		);
		$post_id = (int) $post_id;
		if ( $post_id < 1 ) {
			return $default;
		}
		$raw = function_exists( 'get_field' ) ? get_field( 'status_broniryvaniya', $post_id ) : null;
		if ( is_array( $raw ) ) {
			$raw = isset( $raw['value'] ) ? (string) $raw['value'] : ( isset( $raw['label'] ) ? (string) $raw['label'] : '' );
		} else {
			$raw = is_string( $raw ) ? trim( $raw ) : '';
		}
		$map = array(
			'В ожидании' => array( 'mod' => 'pending', 'label' => __( 'В ожидании', 'travel' ), 'is_final' => false ),
			'Одобрено'   => array( 'mod' => 'confirmed', 'label' => __( 'Одобрено', 'travel' ), 'is_final' => true ),
			'Отклонено'  => array( 'mod' => 'declined', 'label' => __( 'Отклонено', 'travel' ), 'is_final' => true ),
		);
		if ( $raw !== '' && isset( $map[ $raw ] ) ) {
			return array(
				'label'    => $map[ $raw ]['label'],
				'mod'      => $map[ $raw ]['mod'],
				'is_final' => $map[ $raw ]['is_final'],
				'raw'      => $raw,
			);
		}
		return $default;
	}
}

//регистрация страници с опциями ACF

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}



//registration meny
add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
    register_nav_menu( 'footermeny', 'Footer meny' );
    register_nav_menu( 'headermeny', 'Header meny' );
}


// Регистрация полей ACF для всех типов записей в REST API (только если плагин ACF активен)
function acf_register_fields_in_rest() {
    if ( ! function_exists( 'get_fields' ) ) {
        return;
    }
    $post_types = get_post_types( array( 'public' => true ), 'objects' );
    foreach ( $post_types as $post_type ) {
        $post_type_name = $post_type->name;
        register_rest_field( $post_type_name, 'acf', array(
            'get_callback' => 'acf_get_field_values',
            'schema'       => null,
        ) );
    }
}

// Получение значений полей ACF для каждого поста
function acf_get_field_values( $object ) {
    if ( ! function_exists( 'get_fields' ) ) {
        return null;
    }
    $post_id = $object['id'];
    $fields  = get_fields( $post_id );
    return $fields;
}

add_action('rest_api_init', 'acf_register_fields_in_rest');




//снятие ограничения вывода количества постов в одном запросе Rest API
add_filter('rest_certificate_query', 'custom_rest_certificate_query', 10, 2);
function custom_rest_certificate_query($args, $request) {
    $args['posts_per_page'] = 20; // Желаемое количество постов на страницу
    return $args;
}







/**
 * travel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travel
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function travel_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on travel, use a find and replace
		* to change 'travel' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'travel', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'travel' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'travel_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'travel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_content_width', 640 );
}
add_action( 'after_setup_theme', 'travel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'travel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'travel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'travel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */



add_action('wp_enqueue_scripts', function() {
    $uri  = get_template_directory_uri();
    $path = get_template_directory();

    // Основной стилевой бандл (main.*.css, без custom-styles)
    $main_css = glob($path . '/assets/style/main.*.css');
    $css_file = ! empty( $main_css ) ? $main_css[0] : null;
    if ( ! $css_file ) {
        $all_css = glob($path . '/assets/style/*.css') ?: [];
        foreach ( $all_css as $f ) {
            $base = basename( $f );
            if ( $base === 'custom-styles.css' ) {
                continue;
            }
            if ( strpos( $base, 'tourCreateForm.' ) === 0 ) {
                continue;
            }
            $css_file = $f;
            break;
        }
    }
    if ( $css_file ) {
        wp_enqueue_style(
            'travel-main',
            $uri . '/assets/style/' . basename( $css_file ),
            array(),
            filemtime( $css_file ),
            'all'
        );
    }

    // Основной скриптовый бандл (main.*.js, без all-tours-script и admin)
    $main_js = glob($path . '/assets/js/main.*.js');
    $js_file = ! empty( $main_js ) ? $main_js[0] : null;
    if ( ! $js_file ) {
        $all_js = glob($path . '/assets/js/*.js') ?: [];
        foreach ( $all_js as $f ) {
            $name = basename( $f );
            if ( $name === 'all-tours-script.js' || $name === 'admin-taxonomy-hierarchical.js' ) {
                continue;
            }
            if ( strpos( $name, 'tourCreateForm.' ) === 0 ) {
                continue;
            }
            $js_file = $f;
            break;
        }
    }
    if ( $js_file ) {
        wp_enqueue_script(
            'travel-main',
            $uri . '/assets/js/' . basename( $js_file ),
            array(),
            filemtime( $js_file ),
            true
        );
    }
}, 10);

/**
 * Vite-сборка main.*.js — ES-модуль (import(), import.meta.url). Без type="module" браузер не выполняет бандл.
 */
add_filter(
	'script_loader_tag',
	static function ( $tag, $handle ) {
		if ( 'travel-main' !== $handle ) {
			return $tag;
		}
		// Убрать type="text/javascript" (его иногда добавляет wp_get_script_tag), иначе type="module" не подставить.
		$tag = preg_replace( '/\stype=["\'][^"\']*["\']\s*/', ' ', $tag, 1 );
		return preg_replace( '/<script\s+/', '<script type="module" crossorigin ', $tag, 1 );
	},
	10,
	3
);

/**
 * Форма создания тура (Vite-бандл): только страница с шаблоном user-guide-tour-create.
 */
add_action(
    'wp_enqueue_scripts',
    function () {
        if ( ! is_page_template( 'pages/user-guide-tour-create.php' ) ) {
            return;
        }
        $uri  = get_template_directory_uri();
        $path = get_template_directory();

        $css_glob = glob( $path . '/assets/style/tourCreateForm.*.css' ) ?: array();
        $js_glob  = glob( $path . '/assets/js/tourCreateForm.*.js' ) ?: array();

        if ( ! empty( $css_glob[0] ) && is_readable( $css_glob[0] ) ) {
            $css_deps = wp_style_is( 'travel-main', 'registered' ) ? array( 'travel-main' ) : array();
            wp_enqueue_style(
                'travel-tour-create-form',
                $uri . '/assets/style/' . basename( $css_glob[0] ),
                $css_deps,
                filemtime( $css_glob[0] )
            );
        }
    },
    20
);

/**
 * tourCreateForm.*.js собран как ES-модуль (в конце файла `export { … }`).
 * Обычный <script src> без type="module" даёт синтаксическую ошибку и код не выполняется.
 * Экспортируется initTourCreateForm — явно импортируем и вызываем в footer.
 */
add_action(
    'wp_footer',
    function () {
        if ( ! is_page_template( 'pages/user-guide-tour-create.php' ) ) {
            return;
        }
        $uri     = get_template_directory_uri();
        $path    = get_template_directory();
        $js_glob = glob( $path . '/assets/js/tourCreateForm.*.js' ) ?: array();
        if ( empty( $js_glob[0] ) || ! is_readable( $js_glob[0] ) ) {
            return;
        }
        $js_ver = filemtime( $js_glob[0] );
        $js_url = esc_url(
            add_query_arg(
                'ver',
                (string) $js_ver,
                $uri . '/assets/js/' . basename( $js_glob[0] )
            )
        );
        echo '<script type="module">';
        echo 'import { initTourCreateForm } from "' . $js_url . '";';
        echo 'initTourCreateForm();';
        echo '</script>';
    },
    99
);

// Кастомные стили — подключаются последними и перезаписывают остальные
add_action('wp_enqueue_scripts', function() {
    $path = get_template_directory();
    $custom_css = $path . '/assets/style/custom-styles.css';
    if (file_exists($custom_css)) {
        wp_enqueue_style(
            'travel-custom-styles',
            get_template_directory_uri() . '/assets/style/custom-styles.css',
            array('travel-main', 'travel-style'),
            filemtime($custom_css)
        );
    }
}, 999);

function travel_scripts() {



	wp_enqueue_style( 'travel-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'travel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travel_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

