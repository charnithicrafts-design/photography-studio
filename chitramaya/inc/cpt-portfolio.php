<?php
// Register Portfolio Custom Post Type
function chitramaya_register_portfolio_cpt() {
    $labels = array(
        'name'                  => 'Projects',
        'singular_name'         => 'Project',
        'menu_name'             => 'Portfolio',
        'name_admin_bar'        => 'Project',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Project',
        'new_item'              => 'New Project',
        'edit_item'             => 'Edit Project',
        'view_item'             => 'View Project',
        'all_items'             => 'All Projects',
        'search_items'          => 'Search Projects',
        'parent_item_colon'     => 'Parent Projects:',
        'not_found'             => 'No projects found.',
        'not_found_in_trash'    => 'No projects found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-camera',
        'supports'           => array( 'title', 'thumbnail' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'chitramaya_project', $args );
    
    // Register Taxonomy
    $tax_labels = array(
        'name'              => 'Project Categories',
        'singular_name'     => 'Project Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories',
    );

    $tax_args = array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'project-category' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'project_category', array( 'chitramaya_project' ), $tax_args );
}
add_action( 'init', 'chitramaya_register_portfolio_cpt', 0 );
