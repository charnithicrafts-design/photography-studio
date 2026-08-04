<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Gallery_CPT {
	public function init() {
		add_action( 'init', array( $this, 'register_cpt' ) );
		add_action( 'init', array( $this, 'register_taxonomy' ) );
	}

	public function register_cpt() {
		$labels = array(
			'name'                  => _x( 'Galleries', 'Post type general name', 'chitramaya-gallery' ),
			'singular_name'         => _x( 'Gallery', 'Post type singular name', 'chitramaya-gallery' ),
			'menu_name'             => _x( 'Galleries', 'Admin Menu text', 'chitramaya-gallery' ),
			'name_admin_bar'        => _x( 'Gallery', 'Add New on Toolbar', 'chitramaya-gallery' ),
			'add_new'               => __( 'Add New', 'chitramaya-gallery' ),
			'add_new_item'          => __( 'Add New Gallery', 'chitramaya-gallery' ),
			'new_item'              => __( 'New Gallery', 'chitramaya-gallery' ),
			'edit_item'             => __( 'Edit Gallery', 'chitramaya-gallery' ),
			'view_item'             => __( 'View Gallery', 'chitramaya-gallery' ),
			'all_items'             => __( 'All Galleries', 'chitramaya-gallery' ),
			'search_items'          => __( 'Search Galleries', 'chitramaya-gallery' ),
			'parent_item_colon'     => __( 'Parent Galleries:', 'chitramaya-gallery' ),
			'not_found'             => __( 'No galleries found.', 'chitramaya-gallery' ),
			'not_found_in_trash'    => __( 'No galleries found in Trash.', 'chitramaya-gallery' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'gallery' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-format-gallery',
			'supports'           => array( 'title', 'thumbnail' ),
			'show_in_rest'       => true,
		);

		register_post_type( 'chitramaya_gallery', $args );
	}

	public function register_taxonomy() {
		$labels = array(
			'name'              => _x( 'Gallery Categories', 'taxonomy general name', 'chitramaya-gallery' ),
			'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name', 'chitramaya-gallery' ),
			'search_items'      => __( 'Search Gallery Categories', 'chitramaya-gallery' ),
			'all_items'         => __( 'All Gallery Categories', 'chitramaya-gallery' ),
			'parent_item'       => __( 'Parent Gallery Category', 'chitramaya-gallery' ),
			'parent_item_colon' => __( 'Parent Gallery Category:', 'chitramaya-gallery' ),
			'edit_item'         => __( 'Edit Gallery Category', 'chitramaya-gallery' ),
			'update_item'       => __( 'Update Gallery Category', 'chitramaya-gallery' ),
			'add_new_item'      => __( 'Add New Gallery Category', 'chitramaya-gallery' ),
			'new_item_name'     => __( 'New Gallery Category Name', 'chitramaya-gallery' ),
			'menu_name'         => __( 'Category', 'chitramaya-gallery' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'gallery-category' ),
			'show_in_rest'      => true,
		);

		register_taxonomy( 'gallery_category', array( 'chitramaya_gallery' ), $args );
	}
}
