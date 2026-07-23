<?php
// Register ACF Fields for the Global Services Architecture (ACF Free Compatible)
function chitramaya_register_services_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        
        $fields = array();
        
        // ACF Free does not support the Repeater field.
        // We will statically allocate 5 Horizontals, and up to 6 Verticals per Horizontal.
        for ($h = 1; $h <= 5; $h++) {
            $fields[] = array( 'key' => "tab_horizontal_{$h}", 'label' => "Horizontal {$h}", 'type' => 'tab' );
            $fields[] = array( 'key' => "field_h{$h}_title", 'label' => 'Horizontal Name', 'name' => "h{$h}_title", 'type' => 'text' );
            $fields[] = array( 'key' => "field_h{$h}_headline", 'label' => 'Punchy Headline', 'name' => "h{$h}_headline", 'type' => 'text' );
            $fields[] = array( 'key' => "field_h{$h}_manifesto", 'label' => 'Manifesto', 'name' => "h{$h}_manifesto", 'type' => 'textarea', 'rows' => 4 );
            
            for ($v = 1; $v <= 6; $v++) {
                $fields[] = array( 'key' => "field_h{$h}_v{$v}_title", 'label' => "Vertical {$v} Title", 'name' => "h{$h}_v{$v}_title", 'type' => 'text', 'wrapper' => array('width' => '50') );
                $fields[] = array( 'key' => "field_h{$h}_v{$v}_desc", 'label' => "Vertical {$v} Description", 'name' => "h{$h}_v{$v}_desc", 'type' => 'textarea', 'rows' => 2, 'wrapper' => array('width' => '50') );
            }
        }

        acf_add_local_field_group( array(
            'key' => 'group_services_architecture',
            'title' => 'Chitramaya Service Ecosystem (Global Architecture)',
            'fields' => $fields,
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
