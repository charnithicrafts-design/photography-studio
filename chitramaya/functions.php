<?php
/**
 * Chitramaya Child Theme functions and definitions
 */

if ( ! function_exists( 'get_field' ) ) {
    function get_field( $selector, $post_id = false, $format_value = true ) {
        return false; // Safely fail so our templates can use their hardcoded fallbacks
    }
}

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
                    'key' => 'field_hero_bg_image',
                    'label' => 'Hero Background Image (Media Library)',
                    'name' => 'hero_bg_image',
                    'type' => 'image',
                    'instructions' => 'Upload or select an image from the Media Library. If this is left blank, it will fall back to the External URL below.',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_hero_bg_url',
                    'label' => 'Hero Background Image (External URL)',
                    'name' => 'hero_bg_url',
                    'type' => 'url',
                    'instructions' => 'Paste an image link from Unsplash or Pexels.',
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
                // Step 1 Fields
                array( 'key' => 'field_journey_step_1_label', 'label' => 'Step 1: Label', 'name' => 'step_1_label', 'type' => 'text', 'default_value' => '01 — Maternity' ),
                array( 'key' => 'field_journey_step_1_title', 'label' => 'Step 1: Title', 'name' => 'step_1_title', 'type' => 'text', 'default_value' => 'The Prelude.' ),
                array( 'key' => 'field_journey_step_1_desc', 'label' => 'Step 1: Description', 'name' => 'step_1_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Studio or location-oriented sessions that honor the quiet power and anticipation of motherhood.' ),
                array( 'key' => 'field_journey_step_1_image', 'label' => 'Step 1: Image', 'name' => 'step_1_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
                
                // Step 2 Fields
                array( 'key' => 'field_journey_step_2_label', 'label' => 'Step 2: Label', 'name' => 'step_2_label', 'type' => 'text', 'default_value' => '02 — Newborn' ),
                array( 'key' => 'field_journey_step_2_title', 'label' => 'Step 2: Title', 'name' => 'step_2_title', 'type' => 'text', 'default_value' => 'The Arrival.' ),
                array( 'key' => 'field_journey_step_2_desc', 'label' => 'Step 2: Description', 'name' => 'step_2_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Intimate, art-directed studio sessions or house visits within the first critical weeks.' ),
                array( 'key' => 'field_journey_step_2_image', 'label' => 'Step 2: Image', 'name' => 'step_2_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),

                // Step 3 Fields
                array( 'key' => 'field_journey_step_3_label', 'label' => 'Step 3: Label', 'name' => 'step_3_label', 'type' => 'text', 'default_value' => '03 — Toddler' ),
                array( 'key' => 'field_journey_step_3_title', 'label' => 'Step 3: Title', 'name' => 'step_3_title', 'type' => 'text', 'default_value' => 'The Milestone.' ),
                array( 'key' => 'field_journey_step_3_desc', 'label' => 'Step 3: Description', 'name' => 'step_3_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Capturing the chaotic, beautiful energy of their first year. Unscripted, outdoors, or styled flawlessly.' ),
                array( 'key' => 'field_journey_step_3_image', 'label' => 'Step 3: Image', 'name' => 'step_3_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),

                // Step 4 Fields
                array( 'key' => 'field_journey_step_4_label', 'label' => 'Step 4: Label', 'name' => 'step_4_label', 'type' => 'text', 'default_value' => '04 — Bump to Baby' ),
                array( 'key' => 'field_journey_step_4_title', 'label' => 'Step 4: Title', 'name' => 'step_4_title', 'type' => 'text', 'default_value' => 'The Tapestry.' ),
                array( 'key' => 'field_journey_step_4_desc', 'label' => 'Step 4: Description', 'name' => 'step_4_description', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'A seamless, documentary-style archiving of your entire journey. Because you shouldn\'t have to choose which memory to keep.' ),
                array( 'key' => 'field_journey_step_4_image', 'label' => 'Step 4: Image', 'name' => 'step_4_image', 'type' => 'image', 'return_format' => 'array', 'preview_size' => 'medium' ),
                
                // Masonry Garden (Newborn Gallery)
                array(
                    'key' => 'field_baby_masonry_gallery',
                    'label' => 'Masonry Garden Gallery',
                    'name' => 'baby_masonry_gallery',
                    'type' => 'gallery',
                    'instructions' => 'Upload images for the tactile masonry grid. Best if images have varying aspect ratios.',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'insert' => 'append',
                    'library' => 'all',
                ),

                // Art-Themed Showcase
                array(
                    'key' => 'field_art_showcase_heading',
                    'label' => 'Art Showcase Heading',
                    'name' => 'art_showcase_heading',
                    'type' => 'text',
                    'default_value' => 'NOT JUST A PHOTO. AN ARCHIVE OF ART.',
                ),
                array(
                    'key' => 'field_art_showcase_image',
                    'label' => 'Art Showcase Feature Image (Media Library)',
                    'name' => 'art_showcase_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_art_showcase_image_url',
                    'label' => 'Art Showcase Feature Image (External URL)',
                    'name' => 'art_showcase_image_url',
                    'type' => 'url',
                    'default_value' => 'https://images.unsplash.com/photo-1510018146743-34e857ff17be?w=1200&q=90&auto=format&fit=crop',
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

// Include additional ACF field registrations
require_once get_stylesheet_directory() . '/inc/acf-home.php';
require_once get_stylesheet_directory() . '/inc/acf-thalam.php';
