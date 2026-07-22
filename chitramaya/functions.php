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

// Register Custom Blocks
function chitramaya_register_blocks() {
    register_block_type( __DIR__ . '/blocks/journey' );
}
add_action( 'init', 'chitramaya_register_blocks' );

// Register ACF Fields for the Block
function chitramaya_register_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key' => 'group_journey_block',
            'title' => 'Baby Journey Block',
            'fields' => array(
                array(
                    'key' => 'field_journey_heading',
                    'label' => 'Heading',
                    'name' => 'journey_heading',
                    'type' => 'text',
                    'default_value' => 'The Archive<br>of You.',
                ),
                array(
                    'key' => 'field_journey_steps',
                    'label' => 'Steps',
                    'name' => 'journey_steps',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Add Step',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_journey_step_label',
                            'label' => 'Step Label (e.g. 01 — Maternity)',
                            'name' => 'step_label',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_journey_step_title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_journey_step_description',
                            'label' => 'Description',
                            'name' => 'description',
                            'type' => 'textarea',
                            'rows' => 3,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'block',
                        'operator' => '==',
                        'value' => 'acf/journey',
                    ),
                ),
            ),
            'active' => true,
        ) );
    }
}
add_action( 'acf/init', 'chitramaya_register_acf_fields' );
