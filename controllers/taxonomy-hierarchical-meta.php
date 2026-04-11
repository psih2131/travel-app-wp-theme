<?php
/**
 * Кастомный meta box для иерархических таксономий туров.
 * Логика: 1 родитель (обязательно) + опционально 1 ребёнок. Суммарно 1 или 2 термина.
 * Снятие родителя снимает ребёнка.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$travel_hierarchical_taxonomies = [ 'direction' ];

add_action( 'add_meta_boxes', 'travel_remove_default_taxonomy_meta_boxes', 10 );
function travel_remove_default_taxonomy_meta_boxes() {
    global $travel_hierarchical_taxonomies;

    foreach ( $travel_hierarchical_taxonomies as $tax ) {
        remove_meta_box( $tax . 'div', 'tours', 'side' );
    }
}

add_action( 'add_meta_boxes', 'travel_add_hierarchical_taxonomy_meta_boxes', 10 );
function travel_add_hierarchical_taxonomy_meta_boxes() {
    global $travel_hierarchical_taxonomies;

    foreach ( $travel_hierarchical_taxonomies as $tax ) {
        $tax_obj = get_taxonomy( $tax );
        if ( ! $tax_obj ) {
            continue;
        }
        add_meta_box(
            'travel_' . $tax . '_meta',
            $tax_obj->labels->singular_name,
            'travel_render_hierarchical_taxonomy_meta_box',
            'tours',
            'side',
            'default',
            [ 'taxonomy' => $tax ]
        );
    }
}

function travel_render_hierarchical_taxonomy_meta_box( $post, $box ) {
    $taxonomy = $box['args']['taxonomy'];
    $tax_obj  = get_taxonomy( $taxonomy );

    if ( ! $tax_obj ) {
        return;
    }

    $terms = get_terms( [
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'parent'     => 0,
    ] );

    if ( is_wp_error( $terms ) || empty( $terms ) ) {
        echo '<p>' . esc_html( 'Нет терминов.' ) . '</p>';
        return;
    }

    $post_terms = wp_get_object_terms( $post->ID, $taxonomy );
    $selected_parent = 0;
    $selected_child  = 0;
    if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
        foreach ( $post_terms as $t ) {
            if ( (int) $t->parent === 0 ) {
                $selected_parent = (int) $t->term_id;
            } else {
                $selected_child  = (int) $t->term_id;
                $selected_parent = (int) $t->parent;
            }
        }
    }

    $tree = [];
    foreach ( $terms as $parent ) {
        $children = get_terms( [
            'taxonomy'   => $taxonomy,
            'hide_empty' => false,
            'parent'     => $parent->term_id,
        ] );
        $tree[] = [
            'id'       => (int) $parent->term_id,
            'name'     => $parent->name,
            'children' => array_map( function ( $c ) {
                return [ 'id' => (int) $c->term_id, 'name' => $c->name ];
            }, is_array( $children ) ? $children : [] ),
        ];
    }

    wp_nonce_field( 'travel_save_' . $taxonomy, 'travel_' . $taxonomy . '_nonce' );

    echo '<style>.travel-tax-children{margin-left:1.5em;margin-top:.25em}.travel-tax-child-label{display:block}</style>';
    echo '<div id="travel-tax-app-' . esc_attr( $taxonomy ) . '" class="travel-hierarchical-tax" data-taxonomy="' . esc_attr( $taxonomy ) . '" data-terms="' . esc_attr( wp_json_encode( $tree ) ) . '" data-selected-parent="' . esc_attr( $selected_parent ) . '" data-selected-child="' . esc_attr( $selected_child ) . '"></div>';
}

add_action( 'admin_enqueue_scripts', 'travel_enqueue_hierarchical_taxonomy_scripts', 10 );
function travel_enqueue_hierarchical_taxonomy_scripts( $hook ) {
    if ( 'post.php' !== $hook && 'post-new.php' !== $hook ) {
        return;
    }

    $screen = get_current_screen();
    if ( ! $screen || 'tours' !== $screen->post_type ) {
        return;
    }

    wp_enqueue_script(
        'vue-3',
        'https://unpkg.com/vue@3/dist/vue.global.prod.js',
        [],
        '3.4.0',
        true
    );

    $js_path = get_template_directory() . '/assets/js/admin-taxonomy-hierarchical.js';
    if ( file_exists( $js_path ) ) {
        wp_enqueue_script(
            'travel-admin-taxonomy-hierarchical',
            get_template_directory_uri() . '/assets/js/admin-taxonomy-hierarchical.js',
            [ 'vue-3' ],
            filemtime( $js_path ),
            true
        );
    }
}

add_action( 'save_post_tours', 'travel_save_hierarchical_taxonomy', 10, 3 );
function travel_save_hierarchical_taxonomy( $post_id, $post, $update ) {
    global $travel_hierarchical_taxonomies;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    foreach ( $travel_hierarchical_taxonomies as $tax ) {
        if ( ! isset( $_POST[ 'travel_' . $tax . '_nonce' ] ) ) {
            continue;
        }
        if ( ! wp_verify_nonce( $_POST[ 'travel_' . $tax . '_nonce' ], 'travel_save_' . $tax ) ) {
            continue;
        }

        $parent_id = isset( $_POST[ 'travel_' . $tax . '_parent' ] )
            ? (int) $_POST[ 'travel_' . $tax . '_parent' ]
            : 0;
        $child_id = isset( $_POST[ 'travel_' . $tax . '_child' ] )
            ? (int) $_POST[ 'travel_' . $tax . '_child' ]
            : 0;

        if ( $parent_id <= 0 ) {
            wp_set_object_terms( $post_id, [], $tax );
            continue;
        }

        $term_ids = [ $parent_id ];
        if ( $child_id > 0 ) {
            $term_ids[] = $child_id;
        }
        wp_set_object_terms( $post_id, $term_ids, $tax );
    }
}
