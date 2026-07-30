<?php
add_action('acf/init', 'chitramaya_register_pillar_acf_fields');
function chitramaya_register_pillar_acf_fields() {
    if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
    'key' => 'group_pillar_content',
    'title' => 'Pillar Page Content (Unified Architecture)',
    'fields' => array(
        // HERO SECTION
        array(
            'key' => 'tab_pillar_hero',
            'label' => 'Hero',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_pillar_hero_title',
            'label' => 'Hero Title',
            'name' => 'pillar_hero_title',
            'type' => 'text',
            'instructions' => 'Use &lt;em&gt; tags for the italicized serif accent word.',
        ),
        array(
            'key' => 'field_pillar_hero_desc',
            'label' => 'Hero Description',
            'name' => 'pillar_hero_desc',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_pillar_hero_img',
            'label' => 'Hero Background Image',
            'name' => 'pillar_hero_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_pillar_manifesto_title',
            'label' => 'Manifesto Title',
            'name' => 'pillar_manifesto_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_pillar_manifesto_desc',
            'label' => 'Manifesto Description',
            'name' => 'pillar_manifesto_desc',
            'type' => 'textarea',
        ),
        // SECTION 1
        array(
            'key' => 'tab_pillar_sec1',
            'label' => 'Section 1',
            'type' => 'tab',
        ),
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
        array(
            'key' => 'field_pillar_sec1_deliverables',
            'label' => 'Section 1 Deliverables',
            'name' => 'pillar_sec1_deliverables',
            'type' => 'textarea',
            'instructions' => 'Enter each deliverable on a new line.',
        ),
        array(
            'key' => 'field_pillar_sec1_cta_text',
            'label' => 'Section 1 CTA Text',
            'name' => 'pillar_sec1_cta_text',
            'type' => 'text',
        ),
        // SECTION 2
        array(
            'key' => 'tab_pillar_sec2',
            'label' => 'Section 2',
            'type' => 'tab',
        ),
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
        array(
            'key' => 'field_pillar_sec2_deliverables',
            'label' => 'Section 2 Deliverables',
            'name' => 'pillar_sec2_deliverables',
            'type' => 'textarea',
            'instructions' => 'Enter each deliverable on a new line.',
        ),
        array(
            'key' => 'field_pillar_sec2_cta_text',
            'label' => 'Section 2 CTA Text',
            'name' => 'pillar_sec2_cta_text',
            'type' => 'text',
        ),
        // SECTION 3
        array(
            'key' => 'tab_pillar_sec3',
            'label' => 'Section 3',
            'type' => 'tab',
        ),
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
        array(
            'key' => 'field_pillar_sec3_deliverables',
            'label' => 'Section 3 Deliverables',
            'name' => 'pillar_sec3_deliverables',
            'type' => 'textarea',
            'instructions' => 'Enter each deliverable on a new line.',
        ),
        array(
            'key' => 'field_pillar_sec3_cta_text',
            'label' => 'Section 3 CTA Text',
            'name' => 'pillar_sec3_cta_text',
            'type' => 'text',
        ),
        // SECTION 4
        array(
            'key' => 'tab_pillar_sec4',
            'label' => 'Section 4',
            'type' => 'tab',
        ),
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
        array(
            'key' => 'field_pillar_sec4_deliverables',
            'label' => 'Section 4 Deliverables',
            'name' => 'pillar_sec4_deliverables',
            'type' => 'textarea',
            'instructions' => 'Enter each deliverable on a new line.',
        ),
        array(
            'key' => 'field_pillar_sec4_cta_text',
            'label' => 'Section 4 CTA Text',
            'name' => 'pillar_sec4_cta_text',
            'type' => 'text',
        ),
        // SECTION 5
        array(
            'key' => 'tab_pillar_sec5',
            'label' => 'Section 5',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_pillar_sec5_title',
            'label' => 'Section 5 Title',
            'name' => 'pillar_sec5_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_pillar_sec5_desc',
            'label' => 'Section 5 Description',
            'name' => 'pillar_sec5_desc',
            'type' => 'textarea',
        ),
        array(
            'key' => 'field_pillar_sec5_img',
            'label' => 'Section 5 Image',
            'name' => 'pillar_sec5_img',
            'type' => 'image',
            'return_format' => 'url',
        ),
        array(
            'key' => 'field_pillar_sec5_deliverables',
            'label' => 'Section 5 Deliverables',
            'name' => 'pillar_sec5_deliverables',
            'type' => 'textarea',
            'instructions' => 'Enter each deliverable on a new line.',
        ),
        array(
            'key' => 'field_pillar_sec5_cta_text',
            'label' => 'Section 5 CTA Text',
            'name' => 'pillar_sec5_cta_text',
            'type' => 'text',
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
                'value' => 'template-podcast.php',
            ),
        ),
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'template-brand-design.php',
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
    'position' => 'normal',
    'style' => 'seamless',
));

    endif;
}

/**
 * Dynamic Label UX for Pillar Pages
 * Transforms generic "Section 1" labels into template-specific contextual labels
 */
add_filter('acf/load_field', 'chitramaya_dynamic_pillar_labels');
function chitramaya_dynamic_pillar_labels($field) {
    $post_id = false;
    if (isset($_POST['post_id'])) { $post_id = intval($_POST['post_id']); } 
    elseif (isset($_GET['post_id'])) { $post_id = intval($_GET['post_id']); }
    elseif (isset($_GET['post'])) { $post_id = intval($_GET['post']); } 
    else { global $post; if ($post) $post_id = $post->ID; }
    
    if (!$post_id) return $field;
    
    // Only target the unified pillar fields by KEY
    if (strpos($field['key'], 'pillar_sec') === false) return $field;
    
    $template = get_page_template_slug($post_id);
    if (!$template || $template === 'default') {
        $post_obj = get_post($post_id);
        if ($post_obj) {
            $slug = $post_obj->post_name;
            if ($slug === 'corporate-brand') $template = 'template-corporate.php';
            elseif ($slug === 'commercial') $template = 'template-commercial.php';
            elseif ($slug === 'events') $template = 'template-events.php';
            elseif ($slug === 'podcast-interview') $template = 'template-podcast.php';
            elseif ($slug === 'brand-design') $template = 'template-brand-design.php';
            elseif ($slug === 'maternity') $template = 'template-maternity.php';
        }
    }
    
    // Extract section number from field key
    if (!preg_match('/pillar_sec(\d+)/', $field['key'], $matches)) return $field;
    $sec = $matches[1];
    
    $custom_labels = [
        'template-corporate.php' => [
            '1' => 'Executive Leadership',
            '2' => 'The Workspace',
            '3' => 'Corporate Events',
            '4' => 'Cinematic Production',
            '5' => 'Events & Launches',
        ],
        'template-commercial.php' => [
            '1' => 'OOH Marketing Collaterals',
            '2' => 'Product & E-Commerce',
            '3' => 'Food & Lifestyle',
            '4' => 'Architecture & 360',
            '5' => 'Social Media & PR',
        ],
        'template-events.php' => [
            '1' => 'Weddings & Destination',
            '2' => 'Cultural Ceremonies',
            '3' => 'The Details',
        ],
        'template-podcast.php' => [
            '1' => 'Studio & Production',
            '2' => 'Content & Media',
            '3' => 'Photography & Branding',
            '4' => 'Multi-Camera & Lighting',
        ],
        'template-brand-design.php' => [
            '1' => 'Logo & Brand Identity',
            '2' => 'Product & Packaging',
            '3' => 'Marketing Collaterals',
            '4' => 'OOH & Installations',
            '5' => 'Brand Guidelines',
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
        $field['label'] = str_replace("Section $sec", $context, $field['label']);
    } elseif (isset($custom_labels[$template])) {
        // If the current template is defined in our array but does NOT define this section,
        // it means this section is unused. Returning false completely removes the field from the ACF UI.
        return false;
    }
    
    return $field;
}

/**
 * Dynamic Meta Box Title
 */
add_filter('acf/load_field_group', 'chitramaya_dynamic_pillar_group_title');
function chitramaya_dynamic_pillar_group_title($group) {
    if ($group['key'] !== 'group_pillar_content') return $group;
    
    $post_id = false;
    if (isset($_POST['post_id'])) { $post_id = intval($_POST['post_id']); } 
    elseif (isset($_GET['post'])) { $post_id = intval($_GET['post']); } 
    else { global $post; if ($post) $post_id = $post->ID; }
    
    if ($post_id) {
        $post_title = get_the_title($post_id);
        if ($post_title) {
            $group['title'] = $post_title . ' Page Content';
        }
    }
    return $group;
}
