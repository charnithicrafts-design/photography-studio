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

// Register ACF Fields for the Thalam Baby Page Template
function chitramaya_register_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key' => 'group_thalam_baby_page',
            'title' => 'Thalam Baby & Maternity Settings',
            'fields' => array(
                array(
                    'key' => 'field_hero_bg_url',
                    'label' => 'Hero Background Image URL',
                    'name' => 'hero_bg_url',
                    'type' => 'url',
                    'instructions' => 'Paste an image link from Unsplash, Pexels, or your Media Library.',
                    'default_value' => 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=2400&q=80',
                ),
                array(
                    'key' => 'field_hero_headline',
                    'label' => 'Hero Headline',
                    'name' => 'hero_headline',
                    'type' => 'text',
                    'default_value' => 'The Weight of a Real Moment.',
                ),
                array(
                    'key' => 'field_hero_desc',
                    'label' => 'Hero Description',
                    'name' => 'hero_desc',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default_value' => 'They are only this small for a second. We archive the magic, the chaos, and the delicate art of your family\'s beginning.',
                ),
                array(
                    'key' => 'field_journey_heading',
                    'label' => 'Journey Heading',
                    'name' => 'journey_heading',
                    'type' => 'text',
                    'default_value' => 'The Archive<br>of You.',
                ),
                array(
                    'key' => 'field_journey_steps',
                    'label' => 'Journey Steps',
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
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'template-thalam-baby.php',
                    ),
                ),
            ),
            'active' => true,
        ) );
    }
}
add_action( 'acf/init', 'chitramaya_register_acf_fields' );
