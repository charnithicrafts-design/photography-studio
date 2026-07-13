<?php
/**
 * Chitramaya Child Theme functions and definitions
 */

function chitramaya_enqueue_styles() {
    $parent_style = 'twentytwentyfive-style';
    
    // Enqueue parent theme style
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    
    // Enqueue child theme style
    wp_enqueue_style( 'chitramaya-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'chitramaya_enqueue_styles' );

// Remove core block patterns to prevent bloat
function chitramaya_remove_core_patterns() {
    remove_theme_support('core-block-patterns');
}
add_action('after_setup_theme', 'chitramaya_remove_core_patterns');
