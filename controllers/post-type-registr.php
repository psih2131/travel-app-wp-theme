<?php 

function travel_all_posttype(){
    register_post_type('tours', array(
        'labels'             => array(
            'name'               => 'tours', // Основное название типа записи
            'singular_name'      => 'tours', // отдельное название записи типа Book
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить новый тур',
            'edit_item'          => 'Редактирывать тур',
            'new_item'           => 'Новый тур',
            'view_item'          => 'Посмотреть туры',
            'search_items'       => 'Найти тур',
            'not_found'          =>  'туров не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Туры'

          ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        
	    'capability_type' => 'post',

        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-palmtree',
        'supports'           => array('title','thumbnail','comments','custom-fields','page-attributes','post-formats'),
        'show_in_rest'       => true 
    ) );



     register_post_type('blog', array(
        'labels'             => array(
            'name'               => 'blog', // Основное название типа записи
            'singular_name'      => 'blog', // отдельное название записи типа Book
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить новый пост',
            'edit_item'          => 'Редактирывать пост',
            'new_item'           => 'Новый пост',
            'view_item'          => 'Посмотреть посты',
            'search_items'       => 'Найти пост',
            'not_found'          =>  'постов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Блог'

          ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-edit-page',
        'supports'           => array('title','thumbnail','comments','custom-fields','page-attributes','post-formats'),
        'show_in_rest'       => true 
    ) );

    register_taxonomy( 'blog-categories', [ 'blog' ], [ 
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Категории',
            'singular_name'     => 'Категории',

            'menu_name'         => 'Категории',
        ],
        'description'           => '', // описание таксономии
        'public'                => true,
        'hierarchical'          => true,
        'rewrite'               => true,
        'capabilities'          => array(), 
        'meta_box_cb'           => null, 
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );

    register_taxonomy( 'direction', [ 'tours' ], [
        'label'                 => '',
        'labels'                => [
            'name'              => 'Направления',
            'singular_name'     => 'Направление',
            'search_items'      => 'Искать направление',
            'all_items'         => 'Все направления',
            'parent_item'       => 'Родительское направление',
            'parent_item_colon' => 'Родительское направление:',
            'edit_item'         => 'Редактировать направление',
            'update_item'       => 'Обновить направление',
            'add_new_item'      => 'Добавить новое направление',
            'new_item_name'     => 'Новое направление',
            'menu_name'         => 'Направления',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true,
        'rewrite'               => [ 'slug' => 'direction' ],
        'capabilities'          => [],
        'meta_box_cb'           => null,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'direction',
    ] );

    register_taxonomy( 'tour-rubric', [ 'tours' ], [
        'label'                 => '',
        'labels'                => [
            'name'              => 'Рубрики туров',
            'singular_name'     => 'Рубрика тура',
            'search_items'      => 'Искать рубрику',
            'all_items'         => 'Все рубрики',
            'parent_item'       => 'Родительская рубрика',
            'parent_item_colon' => 'Родительская рубрика:',
            'edit_item'         => 'Редактировать рубрику',
            'update_item'       => 'Обновить рубрику',
            'add_new_item'      => 'Добавить новую рубрику',
            'new_item_name'     => 'Новая рубрика',
            'menu_name'         => 'Рубрики',
        ],
        'description'           => '',
        'public'                => true,
        'hierarchical'          => true,
        'rewrite'               => [ 'slug' => 'rubric' ],
        'capabilities'          => [],
        'meta_box_cb'           => null,
        'show_admin_column'     => true,
        'show_in_rest'          => true,
        'rest_base'             => 'tour-rubric',
    ] );

}
add_action('init', 'travel_all_posttype');

// Страница /direction/ — архив всех направлений (родительских термов)
add_action('init', 'travel_direction_archive_rewrite');
function travel_direction_archive_rewrite() {
    add_rewrite_rule('^direction/?$', 'index.php?direction_archive=1', 'top');
}

add_filter('query_vars', 'travel_direction_archive_query_vars');
function travel_direction_archive_query_vars($vars) {
    $vars[] = 'direction_archive';
    return $vars;
}

add_filter('template_include', 'travel_direction_archive_template');
function travel_direction_archive_template($template) {
    if ( (int) get_query_var('direction_archive') === 1 ) {
        $custom = get_template_directory() . '/direction-archive.php';
        return file_exists($custom) ? $custom : $template;
    }
    return $template;
}

add_filter('document_title_parts', 'travel_direction_archive_title');
function travel_direction_archive_title($title) {
    if ( (int) get_query_var('direction_archive') === 1 ) {
        $title['title'] = 'Направления';
    }
    return $title;
}

add_action('after_switch_theme', 'travel_flush_rewrite_rules');
function travel_flush_rewrite_rules() {
    flush_rewrite_rules();
}

add_filter( 'rest_tours_collection_params', 'travel_rest_tours_add_tax_params', 10, 1 );
function travel_rest_tours_add_tax_params( $params ) {
    $params['tour-rubric'] = array(
        'description'       => 'Filter by rubric (tour-rubric) term ID.',
        'type'              => 'integer',
        'sanitize_callback' => 'absint',
    );
    $params['direction'] = array(
        'description'       => 'Filter by direction taxonomy term ID.',
        'type'              => 'integer',
        'sanitize_callback' => 'absint',
    );
    return $params;
}

add_filter( 'rest_tours_query', 'travel_rest_tours_filter_by_tax', 10, 2 );
function travel_rest_tours_filter_by_tax( $args, $request ) {
    $tax_queries = array();
    $rubric = $request->get_param( 'tour-rubric' );
    if ( ! empty( $rubric ) ) {
        $tax_queries[] = array(
            'taxonomy' => 'tour-rubric',
            'field'    => 'term_id',
            'terms'    => array( (int) $rubric ),
        );
    }
    $direction = $request->get_param( 'direction' );
    if ( ! empty( $direction ) ) {
        $tax_queries[] = array(
            'taxonomy'         => 'direction',
            'field'            => 'term_id',
            'terms'            => array( (int) $direction ),
            'include_children' => true,
        );
    }
    if ( ! empty( $tax_queries ) ) {
        $args['tax_query'] = $tax_queries;
    }
    return $args;
}

?>