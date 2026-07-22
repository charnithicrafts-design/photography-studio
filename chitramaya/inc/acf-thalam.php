<?php
// Register ACF Fields for the Thalam Studio Page Template
function chitramaya_register_thalam_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key' => 'group_thalam_studio_page',
            'title' => 'Thalam Studio Settings',
            'fields' => array(
                
                /* =======================
                   HERO SECTION
                ======================= */
                array( 'key' => 'tab_thalam_hero', 'label' => 'Hero Section', 'type' => 'tab' ),
                array( 'key' => 'field_thalam_hero_tag', 'label' => 'Hero Tag', 'name' => 'thalam_hero_tag', 'type' => 'text', 'default_value' => 'Production Hub // ' ),
                array( 'key' => 'field_thalam_hero_headline', 'label' => 'Hero Headline', 'name' => 'thalam_hero_headline', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'We<br><span class="accent-word">Execute.</span><br>You<br>Deliver.' ),
                array( 'key' => 'field_thalam_hero_body', 'label' => 'Hero Body', 'name' => 'thalam_hero_body', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Thalam is the operational studio of Chitramaya Creatives — specialising in ad shoots and baby photography. Controlled light. Real moments. Zero friction from brief to delivery.' ),
                array( 'key' => 'field_thalam_hero_img_url', 'label' => 'Hero Image (URL)', 'name' => 'thalam_hero_img_url', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1664817550969-5e76adc4a3fe?w=1600&q=90&auto=format&fit=crop' ),

                /* =======================
                   STATUS GRID
                ======================= */
                array( 'key' => 'tab_thalam_status', 'label' => 'Status Grid', 'type' => 'tab' ),
                array( 'key' => 'field_thalam_status_1', 'label' => 'Status 1 HTML', 'name' => 'thalam_status_1', 'type' => 'text', 'default_value' => '<strong>3 Sessions</strong> Active Today' ),
                array( 'key' => 'field_thalam_status_2', 'label' => 'Status 2 HTML', 'name' => 'thalam_status_2', 'type' => 'text', 'default_value' => 'Delivery: <strong>&lt;48 Hours</strong>' ),
                array( 'key' => 'field_thalam_status_3', 'label' => 'Status 3 HTML', 'name' => 'thalam_status_3', 'type' => 'text', 'default_value' => 'Next Available: <strong>July 18</strong>' ),
                array( 'key' => 'field_thalam_status_4', 'label' => 'Status 4 HTML', 'name' => 'thalam_status_4', 'type' => 'text', 'default_value' => 'Format: <strong>Medium Format · Full Frame</strong>' ),

                /* =======================
                   SERVICES DIRECTORY
                ======================= */
                array( 'key' => 'tab_thalam_services', 'label' => 'Services', 'type' => 'tab' ),
                array( 'key' => 'field_thalam_services_title', 'label' => 'Section Title', 'name' => 'thalam_services_title', 'type' => 'text', 'default_value' => 'Service Directory // 4 Active' ),
                
                // Service 1
                array( 'key' => 'field_thalam_svc_1_title', 'label' => 'Service 1: Title', 'name' => 'thalam_service_1_title', 'type' => 'text', 'default_value' => 'Ad Shoots' ),
                array( 'key' => 'field_thalam_svc_1_img', 'label' => 'Service 1: Image URL', 'name' => 'thalam_service_1_img', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=800&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_thalam_svc_1_price', 'label' => 'Service 1: Price', 'name' => 'thalam_service_1_price', 'type' => 'text', 'default_value' => '&#8377;25,000' ),

                // Service 2
                array( 'key' => 'field_thalam_svc_2_title', 'label' => 'Service 2: Title', 'name' => 'thalam_service_2_title', 'type' => 'text', 'default_value' => 'Baby & Newborn' ),
                array( 'key' => 'field_thalam_svc_2_img', 'label' => 'Service 2: Image URL', 'name' => 'thalam_service_2_img', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_thalam_svc_2_price', 'label' => 'Service 2: Price', 'name' => 'thalam_service_2_price', 'type' => 'text', 'default_value' => '&#8377;12,000' ),

                // Service 3
                array( 'key' => 'field_thalam_svc_3_title', 'label' => 'Service 3: Title', 'name' => 'thalam_service_3_title', 'type' => 'text', 'default_value' => 'Industrial' ),
                array( 'key' => 'field_thalam_svc_3_img', 'label' => 'Service 3: Image URL', 'name' => 'thalam_service_3_img', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=800&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_thalam_svc_3_price', 'label' => 'Service 3: Price', 'name' => 'thalam_service_3_price', 'type' => 'text', 'default_value' => '&#8377;45,000' ),

                // Service 4
                array( 'key' => 'field_thalam_svc_4_title', 'label' => 'Service 4: Title', 'name' => 'thalam_service_4_title', 'type' => 'text', 'default_value' => 'Weddings' ),
                array( 'key' => 'field_thalam_svc_4_img', 'label' => 'Service 4: Image URL', 'name' => 'thalam_service_4_img', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1606800052052-a08af7148866?w=800&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_thalam_svc_4_price', 'label' => 'Service 4: Price', 'name' => 'thalam_service_4_price', 'type' => 'text', 'default_value' => '&#8377;80,000' ),

                /* =======================
                   TRUST / TELEMETRY
                ======================= */
                array( 'key' => 'tab_thalam_trust', 'label' => 'Trust & Telemetry', 'type' => 'tab' ),
                array( 'key' => 'field_thalam_testi_1_quote', 'label' => 'Testimonial 1: Quote', 'name' => 'thalam_testi_1_quote', 'type' => 'textarea', 'rows' => 3, 'default_value' => '"Delivered 1,200 edited assets in 48 hours flat. Zero disruption to the factory floor. The images are razor sharp — our procurement team used them in an international tender document."' ),
                array( 'key' => 'field_thalam_testi_1_author', 'label' => 'Testimonial 1: Author', 'name' => 'thalam_testi_1_author', 'type' => 'text', 'default_value' => '— Ravi Krishnamurthy, GM Operations · Apex Precision Mfg.' ),
                
                array( 'key' => 'field_thalam_kpi_1_val', 'label' => 'KPI 1: Value HTML', 'name' => 'thalam_kpi_1_val', 'type' => 'text', 'default_value' => '1.2k<span>+</span>' ),
                array( 'key' => 'field_thalam_kpi_1_label', 'label' => 'KPI 1: Label', 'name' => 'thalam_kpi_1_label', 'type' => 'text', 'default_value' => 'Assets per project avg.' ),

                /* =======================
                   BOOKING SECTION
                ======================= */
                array( 'key' => 'tab_thalam_booking', 'label' => 'Booking Section', 'type' => 'tab' ),
                array( 'key' => 'field_thalam_booking_headline', 'label' => 'Headline', 'name' => 'thalam_booking_headline', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Book a<br><span>Session</span>' ),
                array( 'key' => 'field_thalam_booking_body', 'label' => 'Body Text', 'name' => 'thalam_booking_body', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Fill in the brief on the right and we will respond within 4 business hours with availability, crew allocation, and a formal quote. No obligations.' ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'template-thalam.php',
                    ),
                ),
            ),
            'active' => true,
        ) );
    }
}
add_action( 'acf/init', 'chitramaya_register_thalam_acf_fields' );
