<?php
function register_custom_post_types(){
    //register students
    $labels = array(
    'name' => _x( 'The Class', 'post type general name' ),
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
    'supports' => array( 'title', 'editor', 'thumbnail' ),
    'template'           => array(
        array( 'core/button' ),
        array( 'core/paragraph' ),
    ),
    'template_lock' => 'all'
    );
    register_post_type( 'rnb-students', $args );

    //register Staff
    $labels = array(
    'name'               => _x( 'Staff', 'post type general name'  ),
    'singular_name'      => _x( 'Staff', 'post type singular name'  ),
    'menu_name'          => _x( 'Staff', 'admin menu'  ),
    'name_admin_bar'     => _x( 'Staff', 'add new on admin bar' ),
    'add_new'            => _x( 'Add New', 'staff' ),
    'add_new_item'       => __( 'Add New staff' ),
    'new_item'           => __( 'New staff' ),
    'edit_item'          => __( 'Edit staff' ),
    'view_item'          => __( 'View staff'  ),
    'all_items'          => __( 'All Staff' ),
    'search_items'       => __( 'Search Staff' ),
    'parent_item_colon'  => __( 'Parent Staff:' ),
    'not_found'          => __( 'No Staff found.' ),
    'not_found_in_trash' => __( 'No Staff found in Trash.' ),
    );
    $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'staff' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => 8,
    'menu_icon'          => 'dashicons-carrot',
    'supports'           => array( 'title' ),
    'template'           => array( array( 'core/pullquote' ) ),
    'template_lock'      => 'all'
    );
    register_post_type( 'rnb-staff', $args );
        
}
add_action( 'init', 'register_custom_post_types' );



//Taxonomies
function register_taxonomies() {
    // Add Students taxonomy
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

    // Add Staff taxonomy
    $labels = array(
        'name'              => _x( 'Staff', 'taxonomy general name' ),
        'singular_name'     => _x( 'Staff', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Staff' ),
        'all_items'         => __( 'All Staff' ),
        'parent_item'       => __( 'Parent Staff' ),
        'parent_item_colon' => __( 'Parent Staff:' ),
        'edit_item'         => __( 'Edit Staff' ),
        'update_item'       => __( 'Update Staff' ),
        'add_new_item'      => __( 'Add New Staff' ),
        'new_item_name'     => __( 'New Work Staff' ),
        'menu_name'         => __( 'Staff' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'staff' ),
    );

    register_taxonomy( 'rnb-staff', array( 'rnb-staff' ), $args );
}
add_action( 'init', 'register_taxonomies' );