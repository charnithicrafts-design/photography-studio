<?php
// Register ACF Fields for the Chitramaya Home Page Template
function chitramaya_register_home_acf_fields() {
    if ( function_exists( 'acf_add_local_field_group' ) ) {
        acf_add_local_field_group( array(
            'key' => 'group_chitramaya_home_page',
            'title' => 'Chitramaya Home Page Settings',
            'fields' => array(
                
                /* =======================
                   HERO SECTION
                ======================= */
                array( 'key' => 'tab_home_hero', 'label' => 'Hero Section', 'type' => 'tab' ),
                array(
                    'key' => 'field_home_hero_bg_url', 'label' => 'Hero Background Image (URL)', 'name' => 'home_hero_bg_url', 'type' => 'url',
                    'default_value' => 'https://images.unsplash.com/photo-1750645438141-7deb206e17f6?w=2400&q=90&auto=format&fit=crop'
                ),
                array(
                    'key' => 'field_home_hero_headline', 'label' => 'Brand Headline', 'name' => 'home_hero_headline', 'type' => 'textarea', 'rows' => 2,
                    'default_value' => 'Chitra<br>maya<em>Creatives</em>'
                ),
                array(
                    'key' => 'field_home_hero_fragment', 'label' => 'Poetic Fragment', 'name' => 'home_hero_fragment', 'type' => 'textarea', 'rows' => 3,
                    'default_value' => 'Light, texture,<br>and the weight<br>of a real moment.'
                ),
                
                /* =======================
                   MANIFESTO SECTION
                ======================= */
                array( 'key' => 'tab_home_manifesto', 'label' => 'Manifesto Section', 'type' => 'tab' ),
                array( 'key' => 'field_home_manifesto_label', 'label' => 'Eyebrow Label', 'name' => 'home_manifesto_label', 'type' => 'text', 'default_value' => 'Chitramaya Creatives — Our Creed' ),
                array( 'key' => 'field_home_manifesto_headline', 'label' => 'Main Headline', 'name' => 'home_manifesto_headline', 'type' => 'textarea', 'rows' => 2, 'default_value' => 'Every photograph is a physical argument that the world is worth feeling.' ),
                array( 'key' => 'field_home_manifesto_body', 'label' => 'Body Text', 'name' => 'home_manifesto_body', 'type' => 'textarea', 'rows' => 5, 'default_value' => 'Founded on the belief that the greatest failure of digital photography is its inability to replicate touch, Chitramaya Creatives engineers each image to overcome that limitation. Through rigorous light architecture, uncompressed medium-format capture, and obsessive post-production restraint, we produce photographs that your audience does not just look at — they experience.' ),
                
                /* =======================
                   THALAM AD SECTION
                ======================= */
                array( 'key' => 'tab_home_thalam', 'label' => 'Thalam Ad', 'type' => 'tab' ),
                array( 'key' => 'field_home_thalam_bg_url', 'label' => 'Background Image (URL)', 'name' => 'home_thalam_bg_url', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=2400&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_home_thalam_headline', 'label' => 'Headline', 'name' => 'home_thalam_headline', 'type' => 'text', 'default_value' => 'Your <em>brand,</em> lit right.' ),
                
                /* =======================
                   WORK (PORTFOLIO)
                ======================= */
                array( 'key' => 'tab_home_work', 'label' => 'Portfolio Grid', 'type' => 'tab' ),
                array( 'key' => 'field_home_work_1_img_url', 'label' => 'Item 1: Image URL', 'name' => 'home_work_1_img_url', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=1600&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_home_work_1_client', 'label' => 'Item 1: Client/Title', 'name' => 'home_work_1_client', 'type' => 'text', 'default_value' => 'Heritage Label Co. — Identity' ),
                array( 'key' => 'field_home_work_1_cat', 'label' => 'Item 1: Category', 'name' => 'home_work_1_category', 'type' => 'text', 'default_value' => 'Portrait · Brand Campaign · 2024' ),
                
                array( 'key' => 'field_home_work_2_img_url', 'label' => 'Item 2: Image URL', 'name' => 'home_work_2_img_url', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1570913149827-d2ac84ab3f9a?w=1200&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_home_work_2_client', 'label' => 'Item 2: Client/Title', 'name' => 'home_work_2_client', 'type' => 'text', 'default_value' => 'Orchard Collective — Product' ),
                array( 'key' => 'field_home_work_2_cat', 'label' => 'Item 2: Category', 'name' => 'home_work_2_category', 'type' => 'text', 'default_value' => 'Macro · E-Commerce · 2024' ),
                
                array( 'key' => 'field_home_work_3_img_url', 'label' => 'Item 3: Image URL', 'name' => 'home_work_3_img_url', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&q=90&auto=format&fit=crop' ),
                array( 'key' => 'field_home_work_3_client', 'label' => 'Item 3: Client/Title', 'name' => 'home_work_3_client', 'type' => 'text', 'default_value' => 'Forma Studio — Architecture' ),
                array( 'key' => 'field_home_work_3_cat', 'label' => 'Item 3: Category', 'name' => 'home_work_3_category', 'type' => 'text', 'default_value' => 'Architectural · Editorial · 2023' ),

                /* =======================
                   SERVICES
                ======================= */
                array( 'key' => 'tab_home_services', 'label' => 'Services', 'type' => 'tab' ),
                array( 'key' => 'field_home_svc_1_title', 'label' => 'Service 1: Title', 'name' => 'home_service_1_title', 'type' => 'text', 'default_value' => 'Ad Shoots' ),
                array( 'key' => 'field_home_svc_1_desc', 'label' => 'Service 1: Description', 'name' => 'home_service_1_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Commercial photography that sells. Conceived, lit, and delivered from Thalam Studio — with the art direction, brand alignment, and production value your campaign demands.' ),
                
                array( 'key' => 'field_home_svc_2_title', 'label' => 'Service 2: Title', 'name' => 'home_service_2_title', 'type' => 'text', 'default_value' => 'Baby & Newborn' ),
                array( 'key' => 'field_home_svc_2_desc', 'label' => 'Service 2: Description', 'name' => 'home_service_2_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'The first year passes in a breath. Our baby sessions at Thalam Studio are crafted to capture weight, warmth, and the particular softness of new life — before it changes.' ),
                
                array( 'key' => 'field_home_svc_3_title', 'label' => 'Service 3: Title', 'name' => 'home_service_3_title', 'type' => 'text', 'default_value' => 'Editorial & Portfolio' ),
                array( 'key' => 'field_home_svc_3_desc', 'label' => 'Service 3: Description', 'name' => 'home_service_3_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'For brands, artists, and creative directors who need a visual partner that understands narrative. We treat each commission as a short film — with intention, conflict, and resolution.' ),

                /* =======================
                   PROCESS
                ======================= */
                array( 'key' => 'tab_home_process', 'label' => 'Process Steps', 'type' => 'tab' ),
                array( 'key' => 'field_home_proc_1_title', 'label' => 'Step 1: Title', 'name' => 'home_process_1_title', 'type' => 'text', 'default_value' => 'Brief & Discovery' ),
                array( 'key' => 'field_home_proc_1_desc', 'label' => 'Step 1: Description', 'name' => 'home_process_1_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'We spend the first week understanding your audience\'s psychology, competitive landscape, and the specific emotional response your images must trigger. No camera is touched until this is complete.' ),
                
                array( 'key' => 'field_home_proc_2_title', 'label' => 'Step 2: Title', 'name' => 'home_process_2_title', 'type' => 'text', 'default_value' => 'Light Architecture' ),
                array( 'key' => 'field_home_proc_2_desc', 'label' => 'Step 2: Description', 'name' => 'home_process_2_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Every shoot has a designed lighting plan based on the tactile quality we need to extract from the subject. We treat the studio as a precision instrument, not a backdrop.' ),
                
                array( 'key' => 'field_home_proc_3_title', 'label' => 'Step 3: Title', 'name' => 'home_process_3_title', 'type' => 'text', 'default_value' => 'Capture & Selection' ),
                array( 'key' => 'field_home_proc_3_desc', 'label' => 'Step 3: Description', 'name' => 'home_process_3_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Shooting in medium format. From several hundred exposures, we select fewer than fifteen. Ruthless curation is the most important part of our creative process.' ),
                
                array( 'key' => 'field_home_proc_4_title', 'label' => 'Step 4: Title', 'name' => 'home_process_4_title', 'type' => 'text', 'default_value' => 'Delivery & Licensing' ),
                array( 'key' => 'field_home_proc_4_desc', 'label' => 'Step 4: Description', 'name' => 'home_process_4_desc', 'type' => 'textarea', 'rows' => 3, 'default_value' => 'Final assets delivered as uncompressed TIFF masters alongside web-optimised versions with verified alt-text metadata for your SEO team. Full licensing documentation included.' ),

                /* =======================
                   TESTIMONIAL SECTION
                ======================= */
                array( 'key' => 'tab_home_testi', 'label' => 'Testimonial', 'type' => 'tab' ),
                array( 'key' => 'field_home_testi_quote', 'label' => 'Quote', 'name' => 'home_testi_quote', 'type' => 'textarea', 'rows' => 4, 'default_value' => '"When we received the product photographs, our e-commerce team went silent. You could see the weight of the glass, the coolness of the metal. No filter. No CGI. We increased conversion on that product page by 34% within a month."' ),
                array( 'key' => 'field_home_testi_author', 'label' => 'Author', 'name' => 'home_testi_author', 'type' => 'text', 'default_value' => '— Priya Sundaram, Creative Director · Maison Kaur' ),

                /* =======================
                   CTA BANNER
                ======================= */
                array( 'key' => 'tab_home_cta', 'label' => 'CTA Banner', 'type' => 'tab' ),
                array( 'key' => 'field_home_cta_bg_url', 'label' => 'Background Image (URL)', 'name' => 'home_cta_bg_url', 'type' => 'url', 'default_value' => 'https://images.unsplash.com/photo-1452457807411-4979b707c5be?w=2400&q=80&auto=format&fit=crop' ),
                array( 'key' => 'field_home_cta_title', 'label' => 'Headline', 'name' => 'home_cta_title', 'type' => 'text', 'default_value' => 'Start a<br><em>Commission</em>' ),

            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'template-chitramaya.php',
                    ),
                ),
            ),
            'active' => true,
        ) );
    }
}
add_action( 'acf/init', 'chitramaya_register_home_acf_fields' );
