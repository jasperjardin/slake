<?php

$post_type_labels = array(
    'name'               => __( 'Question', 'post type general name', 'slake' ),
    'singular_name'      => __( 'Question', 'post type singular name', 'slake' ),
    'menu_name'          => __( 'BD Questions' , 'admin menu', 'slake' ),
    'name_admin_bar'     => __( 'Questions', 'add new on admin bar', 'slake' ),
    'add_new'            => __( 'Add New', 'Question', 'slake' ),
    'add_new_item'       => esc_html__( 'Add New Question', 'slake' ),
    'new_item'           => esc_html__( 'New', 'slake' ),
    'edit_item'          => esc_html__( 'Edit', 'slake' ),
    'view_item'          => esc_html__( 'View Question', 'slake' ),
    'all_items'          => esc_html__( 'All Question', 'slake' ),
    'search_items'       => esc_html__( 'Search Questions', 'slake' ),
    'parent_item_colon'  => esc_html__( 'Parent Question:', 'slake' ),
    'not_found'          => esc_html__( 'No Question found.', 'slake' ),
    'not_found_in_trash' => esc_html__( 'No Questions found in Trash.', 'slake' )
);

$post_type_args = array(
    'labels'             => $post_type_labels,
    'description'        => esc_html__( 'Description.', 'slake' ),
    'public'             => true,
    'publicly_queryable' => true,
    'menu_icon'          => 'dashicons-editor-help',
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'bd-questions' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
);

register_post_type( 'bd-questions', $post_type_args );
