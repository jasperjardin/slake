<?php
$post_type_labels = array(
    'name'               => __( 'Questionnaires', 'post type general name', 'slake' ),
    'singular_name'      => __( 'Questionnaire', 'post type singular name', 'slake' ),
    'menu_name'          => __( 'BD Questionnaires' , 'admin menu', 'slake' ),
    'name_admin_bar'     => __( 'Questionnaires', 'add new on admin bar', 'slake' ),
    'add_new'            => __( 'Add New', 'Questionnaire', 'slake' ),
    'add_new_item'       => esc_html__( 'Add New Questionnaire', 'slake' ),
    'new_item'           => esc_html__( 'New', 'slake' ),
    'edit_item'          => esc_html__( 'Edit', 'slake' ),
    'view_item'          => esc_html__( 'View Questionnaire', 'slake' ),
    'all_items'          => esc_html__( 'All Questionnaire', 'slake' ),
    'search_items'       => esc_html__( 'Search Questionnaires', 'slake' ),
    'parent_item_colon'  => esc_html__( 'Parent Questionnaire:', 'slake' ),
    'not_found'          => esc_html__( 'No Questionnaire found.', 'slake' ),
    'not_found_in_trash' => esc_html__( 'No Questionnaires found in Trash.', 'slake' )
);

$post_type_args = array(
    'labels'             => $post_type_labels,
    'description'        => esc_html__('Description.', 'slake' ),
    'public'             => true,
    'publicly_queryable' => true,
    'menu_icon'          => 'dashicons-list-view',
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'bd-questionnaires' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

register_post_type( 'bd-questionnaires', $post_type_args);

$category_labels = array(
    'name'              => __( 'Questionnaire Category', 'taxonomy general name', 'slake' ),
    'singular_name'     => __( 'Questionnaire Category', 'taxonomy singular name', 'slake' ),
    'search_items'      => esc_html__( 'Search Categories', 'slake' ),
    'all_items'         => esc_html__( 'All Categories', 'slake' ),
    'parent_item'       => esc_html__( 'Parent Category', 'slake' ),
    'parent_item_colon' => esc_html__( 'Parent Category:', 'slake' ),
    'edit_item'         => esc_html__( 'Edit Category', 'slake' ),
    'update_item'       => esc_html__( 'Update Category', 'slake' ),
    'add_new_item'      => esc_html__( 'Add New Category', 'slake' ),
    'new_item_name'     => esc_html__( 'New Category', 'slake' ),
    'menu_name'         => esc_html__( 'Categories', 'slake' ),
);

$category_args = array(
    'hierarchical'      => true,
    'labels'            => $category_labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'bd-questionnaire-category' ),
);

register_taxonomy( 'bd-questionnaire-category', array('bd-questionnaires'), $category_args);
