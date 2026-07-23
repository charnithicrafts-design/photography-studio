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
    ),
));

endif;
