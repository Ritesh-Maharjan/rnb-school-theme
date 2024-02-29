<?php
function register_custom_post_types(){
$labels = array(
'name' => _x( 'Students', 'post type general name' ),
'singular_name' => _x( 'Student', 'post type singular name' ),
'menu_name' => _x( 'Students', 'admin menu' ),
'name_admin_bar' => _x( 'Specialty', 'add new on admin bar' ),
'add_new' => _x( 'Add New', 'Specialty' ),
'add_new_item' => __( 'Add New Specialty' ),
'new_item' => __( 'New Specialty' ),
'edit_item' => __( 'Edit Specialty' ),
'view_item' => __( 'View Specialty' ),
'all_items' => __( 'All Students' ),
'search_items' => __( 'Search Students' ),
'parent_item_colon' => __( 'Parent Students:' ),
'not_found' => __( 'No Students found.' ),
'not_found_in_trash' => __( 'No Students found in Trash.' ),
);
$args = array(
'labels' => $labels,
'public' => true,
'publicly_queryable' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_rest' => true,
'query_var' => true,
'rewrite' => array( 'slug' => 'students' ),
'capability_type' => 'post',
'has_archive' => true,
'hierarchical' => false,
'menu_position' => 7,
'menu_icon' => 'dashicons-hammer',
'supports' => array( 'title', 'editor' ),
'template' => array( array( 'core/pullquote' ) ),
);
register_post_type( 'rnb-students', $args );

}
add_action( 'init', 'register_custom_post_types' );

function register_taxonomies() {
$labels = array(
'name' => _x( 'Specialty', 'taxonomy general name' ),
'singular_name' => _x( 'Specialty', 'taxonomy singular name' ),
'search_items' => ( 'Search Specialty' ),
'all_items' => ( 'All Specialty' ),
'parent_item' => ( 'Parent Specialty' ),
'parent_item_colon' => ( 'Parent Specialty:' ),
'edit_item' => ( 'Edit Specialty' ),
'update_item' => ( 'Update Specialty' ),
'add_new_item' => ( 'Add New Specialty' ),
'new_item_name' => ( 'New Work Specialty' ),
'menu_name' => __( 'Specialty' ),
);

$args = array(
'hierarchical' => true,
'labels' => $labels,
'show_ui' => true,
'show_admin_column' => true,
'show_in_rest' => true,
'query_var' => true,
'has_archive' => true,
'rewrite' => array( 'slug' => 'students-specialty' ),
);

register_taxonomy( 'students-specialty', array( 'rnb-students' ), $args );
}
add_action( 'init', 'register_taxonomies' );