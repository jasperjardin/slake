<?php

$post_type_labels = array(
    'name'               => __( 'Questionnaires', 'post type general name', 'slake' ),
    'singular_name'      => __( 'Questionnaire', 'post type singular name', 'slake' ),
    'menu_name'          => __( 'BD Questionnaire' , 'admin menu', 'slake' ),
    'name_admin_bar'     => __( 'Questionnaires', 'add new on admin bar', 'slake' ),
    'add_new'            => __( 'Add New', 'Questionnaire', 'slake' ),
    'add_new_item'       => esc_html__( 'Add New', 'slake' ),
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
    'menu_icon'          => 'dashicons-admin-users',
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

register_post_type( 'bd-questionnaire', $post_type_args);

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

register_taxonomy( 'bd-questionnaire-category', array('bd-questionnaire'), $category_args);

$tag_labels = array(
    'name'                       => __( 'Questionnaire Tags', 'taxonomy general name', 'slake' ),
    'singular_name'              => __( 'Questionnaire Tag', 'taxonomy singular name', 'slake' ),
    'search_items'               => esc_html__( 'Search Questionnaire Tags', 'slake' ),
    'popular_items'              => esc_html__( 'Popular Questionnaire Tags', 'slake' ),
    'all_items'                  => esc_html__( 'All Questionnaire Tags', 'slake' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => esc_html__( 'Edit Tag', 'slake' ),
    'update_item'                => esc_html__( 'Update Tag', 'slake' ),
    'add_new_item'               => esc_html__( 'Add New Tag', 'slake' ),
    'new_item_name'              => esc_html__( 'New Tag Name', 'slake' ),
    'separate_items_with_commas' => esc_html__( 'Separate tag with commas', 'slake' ),
    'add_or_remove_items'        => esc_html__( 'Add or remove questionnaire tags', 'slake' ),
    'choose_from_most_used'      => esc_html__( 'Choose from the most used questionnaire tags', 'slake' ),
    'not_found'                  => esc_html__( 'No questionnaire tags found.', 'slake' ),
    'menu_name'                  => esc_html__( 'Questionnaire Tags', 'slake' ),
);

$tag_args = array(
    'hierarchical'          => false,
    'labels'                => $tag_labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array('slug' => 'wc-artlook-artists-tag' ),
);
register_taxonomy('bd-questionnaire-tag', 'bd-questionnaire', $tag_args);
