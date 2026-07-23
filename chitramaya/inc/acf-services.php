<?php
// Register ACF Fields for the Global Services Architecture
function chitramaya_register_services_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key' => 'group_services_architecture',
            'title' => 'Chitramaya Service Ecosystem (Global Architecture)',
            'fields' => array(
                array(
                    'key' => 'field_service_horizontals',
                    'label' => 'Service Horizontals',
                    'name' => 'service_horizontals',
                    'type' => 'repeater',
                    'instructions' => 'Add core service categories (e.g., Commercial & Brand, Events & Portrait).',
                    'layout' => 'block',
                    'button_label' => 'Add Horizontal',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_horizontal_title',
                            'label' => 'Horizontal Name (e.g. COMMERCIAL & BRAND)',
                            'name' => 'horizontal_title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_horizontal_headline',
                            'label' => 'Punchy Headline (e.g. ENGINEERING VISUAL AUTHORITY)',
                            'name' => 'headline',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_horizontal_manifesto',
                            'label' => 'Manifesto (Lead Paragraph)',
                            'name' => 'manifesto',
                            'type' => 'textarea',
                            'rows' => 4,
                        ),
                        array(
                            'key' => 'field_horizontal_verticals',
                            'label' => 'Verticals (Sub-Services)',
                            'name' => 'verticals',
                            'type' => 'repeater',
                            'layout' => 'row',
                            'button_label' => 'Add Vertical',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_vertical_title',
                                    'label' => 'Title',
                                    'name' => 'title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_vertical_desc',
                                    'label' => 'Description',
                                    'name' => 'description',
                                    'type' => 'textarea',
                                    'rows' => 2,
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'template-services.php',
                    ),
                ),
            ),
            'active' => true,
        ) );
    }
}
add_action( 'acf/init', 'chitramaya_register_services_acf_fields' );
