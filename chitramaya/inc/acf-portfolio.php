<?php
// Register ACF Fields for Portfolio (ACF Free Compatible)
function chitramaya_register_portfolio_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key' => 'group_portfolio_project',
            'title' => 'Project Details',
            'fields' => array(
                array(
                    'key' => 'field_project_client',
                    'label' => 'Client Name',
                    'name' => 'project_client',
                    'type' => 'text',
                    'instructions' => 'e.g., Heritage Label Co.',
                ),
                array(
                    'key' => 'field_project_year',
                    'label' => 'Project Year',
                    'name' => 'project_year',
                    'type' => 'number',
                ),
                array(
                    'key' => 'field_project_brief',
                    'label' => 'The Brief / Manifesto',
                    'name' => 'project_brief',
                    'type' => 'textarea',
                    'rows' => 3,
                    'instructions' => 'A short, punchy description of what the client needed and the psychological angle we took.',
                ),
                array(
                    'key' => 'field_project_gallery',
                    'label' => 'The Visual Archive',
                    'name' => 'project_gallery',
                    'type' => 'gallery',
                    'instructions' => 'Upload curated images for this project. They will be displayed in a brutalist masonry grid.',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                // Static fields for Credits (Since Repeater is Pro only)
                array( 'key' => 'field_tab_credits', 'label' => 'Credits', 'type' => 'tab' ),
                array( 'key' => 'field_credit_1_role', 'label' => 'Credit 1 Role', 'name' => 'credit_1_role', 'type' => 'text', 'wrapper' => array('width' => '50'), 'instructions' => 'e.g., Art Director' ),
                array( 'key' => 'field_credit_1_name', 'label' => 'Credit 1 Name', 'name' => 'credit_1_name', 'type' => 'text', 'wrapper' => array('width' => '50'), 'instructions' => 'e.g., Priya Sundaram' ),
                array( 'key' => 'field_credit_2_role', 'label' => 'Credit 2 Role', 'name' => 'credit_2_role', 'type' => 'text', 'wrapper' => array('width' => '50') ),
                array( 'key' => 'field_credit_2_name', 'label' => 'Credit 2 Name', 'name' => 'credit_2_name', 'type' => 'text', 'wrapper' => array('width' => '50') ),
                array( 'key' => 'field_credit_3_role', 'label' => 'Credit 3 Role', 'name' => 'credit_3_role', 'type' => 'text', 'wrapper' => array('width' => '50') ),
                array( 'key' => 'field_credit_3_name', 'label' => 'Credit 3 Name', 'name' => 'credit_3_name', 'type' => 'text', 'wrapper' => array('width' => '50') ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'chitramaya_project',
                    ),
                ),
            ),
            'active' => true,
        ) );
    }
}
add_action( 'acf/init', 'chitramaya_register_portfolio_acf_fields' );
