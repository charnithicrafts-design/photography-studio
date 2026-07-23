<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_pillar_content',
    'title' => 'Pillar Page Content (Unified Architecture)',
    'fields' => array(
        // HERO SECTION
        array(
            'key' => 'field_pillar_hero_title',
            'label' => 'Hero Title',
            'name' => 'pillar_hero_title',
            'type' => 'text',
            'instructions' => 'Use <em> tags for the italicized serif accent word.',
        ),
        array(
            'key' => 'field_pillar_hero_desc',
            'label' => 'Hero Description',
            'name' => 'pillar_hero_desc',
            'type' => 'textarea',
        ),
        // SECTION 1
        array(
            'key' => 'field_pillar_sec1_title',
            'label' => 'Section 1 Title',
            'name' => 'pillar_sec1_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_pillar_sec1_desc',
            'label' => 'Section 1 Description',
            'name' => 'pillar_sec1_desc',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_pillar_sec1_img',
            'label' => 'Section 1 Image',
            'name' => 'pillar_sec1_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        // SECTION 2
        array(
            'key' => 'field_pillar_sec2_title',
            'label' => 'Section 2 Title',
            'name' => 'pillar_sec2_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_pillar_sec2_desc',
            'label' => 'Section 2 Description',
            'name' => 'pillar_sec2_desc',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_pillar_sec2_img',
            'label' => 'Section 2 Image',
            'name' => 'pillar_sec2_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        // SECTION 3
        array(
            'key' => 'field_pillar_sec3_title',
            'label' => 'Section 3 Title',
            'name' => 'pillar_sec3_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_pillar_sec3_desc',
            'label' => 'Section 3 Description',
            'name' => 'pillar_sec3_desc',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_pillar_sec3_img',
            'label' => 'Section 3 Image',
            'name' => 'pillar_sec3_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        // SECTION 4
        array(
            'key' => 'field_pillar_sec4_title',
            'label' => 'Section 4 Title',
            'name' => 'pillar_sec4_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_pillar_sec4_desc',
            'label' => 'Section 4 Description',
            'name' => 'pillar_sec4_desc',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_pillar_sec4_img',
            'label' => 'Section 4 Image',
            'name' => 'pillar_sec4_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'template-corporate.php',
            ),
        ),
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'template-commercial.php',
            ),
        ),
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'template-events.php',
            ),
        ),
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'template-production.php',
            ),
        ),
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'template-maternity.php',
            ),
        ),
    ),
));

endif;

/**
 * Dynamic Label UX for Pillar Pages
 * Transforms generic "Section 1" labels into template-specific contextual labels
 */
add_filter('acf/prepare_field', 'chitramaya_dynamic_pillar_labels');
function chitramaya_dynamic_pillar_labels($field) {
    global $post;
    if (!$post) return $field;
    
    // Only target the unified pillar fields
    if (strpos($field['name'], 'pillar_sec') !== 0) return $field;
    
    $template = get_page_template_slug($post->ID);
    
    // Extract section number from field name (e.g., pillar_sec1_title -> 1)
    if (!preg_match('/pillar_sec(\d+)/', $field['name'], $matches)) return $field;
    $sec = $matches[1];
    
    $custom_labels = [
        'template-corporate.php' => [
            '1' => 'Executive Leadership',
            '2' => 'The Workspace',
            '3' => 'Corporate Events',
            '4' => 'Cinematic Production',
        ],
        'template-commercial.php' => [
            '1' => 'Product & E-Commerce',
            '2' => 'Food & Lifestyle',
            '3' => 'Architecture & 360',
        ],
        'template-events.php' => [
            '1' => 'Weddings & Destination',
            '2' => 'Cultural Ceremonies',
            '3' => 'The Details',
        ],
        'template-production.php' => [
            '1' => 'Podcast & Interview',
            '2' => 'Brand Identity',
            '3' => 'OOH Campaigns',
        ],
        'template-maternity.php' => [
            '1' => 'The Studio',
            '2' => 'The Location',
            '3' => 'The Village Awaits',
            '4' => 'Bump to Baby',
        ]
    ];
    
    if (isset($custom_labels[$template][$sec])) {
        $context = $custom_labels[$template][$sec];
        $field['label'] = str_replace("Section $sec", "$context (Section $sec)", $field['label']);
    }
    
    return $field;
}
