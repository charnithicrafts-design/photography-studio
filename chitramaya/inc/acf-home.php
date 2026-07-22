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
