<?php
/**
 * Chithramaya Centralized SEO & Structured Data Engine
 * 
 * Features:
 * 1. Open Graph & Twitter Card Meta Tags with dedicated pillar visual assets.
 * 2. Interlinked Schema.org Knowledge Graph (@graph) for PhotographyBusiness, Founder, Facility, and Services.
 * 3. FAQPage Schema for high-visibility expandable rich snippets in Google SERPs.
 * 4. XML Sitemap security hardening (disables user enumeration and excludes junk pages).
 *
 * @package Chithramaya
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get current page SEO metadata mapping based on template or slug.
 */
function chitramaya_get_seo_context() {
    $theme_uri = get_stylesheet_directory_uri();
    $site_url  = home_url( '/' );

    // Default metadata (Homepage / Global fallback)
    $context = array(
        'type'        => 'website',
        'title'       => 'Chithramaya Creatives — Visual Storytelling with a Human Pulse',
        'description' => 'Commercial photography, brand direction, executive portraits, and broadcast production from Tiruchirappalli (Trichy), Tamil Nadu.',
        'canonical'   => home_url( '/' ),
        'image'       => $theme_uri . '/assets/images/portfolio/img-001.jpg',
        'image_alt'   => 'Chithramaya Creatives — Visual storytelling and photography studio',
        'service_id'  => 'general',
        'faqs'        => array(),
    );

    if ( is_front_page() || is_page_template( 'template-chitramaya.php' ) ) {
        $context['title']       = 'Chithramaya Creatives — Photography Studio | Trichy, India';
        $context['description'] = 'Commercial photography, brand photography, events, and visual storytelling from Trichy, Tamil Nadu. Led by visual director Sriram Sridharan.';
        $context['canonical']   = home_url( '/' );
        $context['image']       = $theme_uri . '/artistic-photo.webp';
        $context['image_alt']   = 'Chithramaya Creatives Studio Direction';
    } elseif ( is_page( 'commercial' ) || is_page_template( 'template-commercial.php' ) ) {
        $context['title']       = 'Commercial & Brand Photography — Chithramaya | Trichy';
        $context['description'] = 'Products, spaces, food, fashion. We shoot what you sell and make people actually want it. Commercial photography across Tamil Nadu.';
        $context['canonical']   = home_url( '/commercial/' );
        $context['image']       = $theme_uri . '/assets/images/portfolio/img-001.jpg';
        $context['image_alt']   = 'Commercial & Product Photography by Chithramaya';
        $context['service_id']  = 'commercial';
        $context['faqs']        = array(
            array(
                'q' => 'Where does Chithramaya shoot commercial photography projects?',
                'a' => 'We shoot on-location across Tamil Nadu and South India, as well as in our fully equipped 2,400 sq ft production facility, Thalam Studio in Trichy.'
            ),
            array(
                'q' => 'What kinds of commercial photography do you specialize in?',
                'a' => 'We specialize in product advertising campaigns, architectural and interior spaces, food and beverage, fashion lookbooks, e-commerce collections, and high-resolution OOH billboard assets.'
            ),
            array(
                'q' => 'Do you provide art direction and set styling?',
                'a' => 'Yes. Every commercial assignment is overseen by Visual Director Sriram Sridharan, encompassing concept ideation, mood boards, lighting design, prop styling, and master post-production retouching.'
            )
        );
    } elseif ( is_page( 'corporate-brand' ) || is_page_template( 'template-corporate.php' ) ) {
        $context['title']       = 'Brand & Corporate Photography — Chithramaya | Trichy';
        $context['description'] = 'We photograph the people behind your brand — executive portraits, corporate culture, and workplace visual authority engineered for credibility.';
        $context['canonical']   = home_url( '/corporate-brand/' );
        $context['image']       = $theme_uri . '/assets/images/portfolio/img-005.jpg';
        $context['image_alt']   = 'Corporate Identity and Executive Portraiture';
        $context['service_id']  = 'corporate';
        $context['faqs']        = array(
            array(
                'q' => 'Can you shoot executive portraits on-site at our corporate office?',
                'a' => 'Yes, our mobile studio setup brings studio-grade strobe lighting, calibrated backdrops, and tethered review monitors directly to your headquarters or office.'
            ),
            array(
                'q' => 'How quickly are executive headshots delivered?',
                'a' => 'Proofing galleries are typically accessible within 24 to 48 hours, and final hand-retouched master portraits are delivered within 3 to 5 business days.'
            )
        );
    } elseif ( is_page( 'events-portrait' ) || is_page_template( 'template-events.php' ) ) {
        $context['title']       = 'Events & Heritage Portraiture — Chithramaya | Trichy';
        $context['description'] = 'The moments you will look at in 20 years and remember exactly how it felt. Unobtrusive, authentic event and milestone documentary photography.';
        $context['canonical']   = home_url( '/events-portrait/' );
        $context['image']       = $theme_uri . '/assets/images/portfolio/img-035.jpg';
        $context['image_alt']   = 'Events & Family Heritage Photography by Chithramaya';
        $context['service_id']  = 'events';
        $context['faqs']        = array(
            array(
                'q' => 'What is your photography approach for weddings and private events?',
                'a' => 'We photograph people, not job titles. We favor honest documentary moments, unscripted emotions, and quiet heritage portraits over stiff, forced poses.'
            ),
            array(
                'q' => 'Do you travel outside Trichy for destination events?',
                'a' => 'Yes, our team regularly travels throughout Tamil Nadu, Bengaluru, Kerala, and across India for milestone celebrations and intimate weddings.'
            )
        );
    } elseif ( is_page( 'podcast-interview' ) || is_page_template( 'template-podcast.php' ) ) {
        $context['title']       = 'Podcast Studio & Interview Suites — Thalam Studio | Trichy';
        $context['description'] = 'We set up the room. You bring the conversation. High-spec podcast studio with broadcast Shure audio, 4K multi-cam rigs, and acoustic treatment in Trichy.';
        $context['canonical']   = home_url( '/podcast-interview/' );
        $context['image']       = 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=1200&q=90&auto=format&fit=crop';
        $context['image_alt']   = 'Thalam Podcast and Video Production Suite';
        $context['service_id']  = 'podcast';
        $context['faqs']        = array(
            array(
                'q' => 'What audio and video gear is available in the podcast studio?',
                'a' => 'Our suite is equipped with broadcast-grade Shure SM7B microphones, Cloudlifters, Rodecaster audio consoles, Sony cinema 4K multi-camera angles, and calibrated soft key lighting.'
            ),
            array(
                'q' => 'Do you provide short-form video reels and editing?',
                'a' => 'Yes, our post-production team can cut high-performing vertical shorts, reels, and audiograms optimized for Instagram, YouTube Shorts, and LinkedIn.'
            )
        );
    } elseif ( is_page( 'thalam-studio' ) || is_page_template( 'template-thalam.php' ) ) {
        $context['title']       = 'Thalam Studio — 2,400 Sq Ft Production Facility | Trichy';
        $context['description'] = 'A purpose-built 2,400 sq ft production environment in Thillai Nagar, Trichy engineered for broadcast audio, precision lighting, commercial sets, and portraiture.';
        $context['canonical']   = home_url( '/thalam-studio/' );
        $context['image']       = $theme_uri . '/assets/img/og-thalam.jpg';
        $context['image_alt']   = 'Thalam Studio Production Space Trichy';
        $context['service_id']  = 'facility';
        $context['faqs']        = array(
            array(
                'q' => 'Where is Thalam Studio located?',
                'a' => 'Thalam Studio is located on Salai Road, near Bombay Dyeing, in prime Thillai Nagar, Tiruchirappalli (Trichy), Tamil Nadu 620018.'
            ),
            array(
                'q' => 'What sets and amenities does the 2,400 sq ft facility include?',
                'a' => 'The facility includes an acoustic podcast suite, wide cyclorama walls, Profoto and Aputure lighting ecosystems, private client lounge, changing suites, and fiber Wi-Fi.'
            ),
            array(
                'q' => 'How can I schedule a studio tour or book floor time?',
                'a' => 'You can book floor time or request a private studio walk-through directly through our WhatsApp studio desk (+91 80980 14123).'
            )
        );
    } elseif ( is_page( 'maternity' ) || is_page_template( 'template-maternity.php' ) ) {
        $context['title']       = 'Maternity & Bump-to-Baby Portraiture — Chithramaya | Trichy';
        $context['description'] = 'Quiet, beautiful portraits documenting the wait. We preserve the sacred, fleeting season of pregnancy with fine-art dignity in studio or natural light.';
        $context['canonical']   = home_url( '/maternity/' );
        $context['image']       = 'https://images.unsplash.com/photo-1542385151-efd9000785a0?w=1200&q=90&auto=format&fit=crop';
        $context['image_alt']   = 'Fine-Art Maternity Photography at Thalam Studio';
        $context['service_id']  = 'maternity';
        $context['faqs']        = array(
            array(
                'q' => 'What is the best week to schedule a maternity photoshoot?',
                'a' => 'The ideal time is between 28 and 34 weeks of pregnancy, when your baby bump is distinct and rounded, but before the final weeks of fatigue.'
            ),
            array(
                'q' => 'Can my husband, partner, or older children join the shoot?',
                'a' => 'Yes, absolutely. We celebrate the family unit and encourage partners and siblings to participate for intimate, timeless portraits.'
            ),
            array(
                'q' => 'Do you provide studio and outdoor maternity options?',
                'a' => 'Yes. We offer climate-controlled, sculptural studio portraits inside Thalam Studio as well as scenic golden-hour outdoor documentary sessions.'
            )
        );
    } elseif ( is_page( 'thalam-baby' ) || is_page_template( 'template-thalam-baby.php' ) ) {
        $context['title']       = 'Thalam Baby — Newborn & Infant Milestone Photography | Trichy';
        $context['description'] = 'From newborn curled-up sleep to the first messy cake smash. We gently archive your child fleeting early seasons with unhurried patience.';
        $context['canonical']   = home_url( '/thalam-baby/' );
        $context['image']       = 'https://images.unsplash.com/photo-1656633702381-939966720da4?w=1200&q=90&auto=format&fit=crop';
        $context['image_alt']   = 'Artful Newborn and Baby Portraiture at Thalam Studio';
        $context['service_id']  = 'baby';
        $context['faqs']        = array(
            array(
                'q' => 'When should newborn baby sessions take place?',
                'a' => 'The sweetest newborn window is between 5 and 15 days old, when babies sleep deeply and naturally enjoy curled womb-like poses.'
            ),
            array(
                'q' => 'How do you keep the baby comfortable and safe during the session?',
                'a' => 'We keep our dedicated baby studio sanitized and warm (26–28°C), use only soft organic wraps, and never force awkward poses. Breaks for feeding and soothing are built in.'
            ),
            array(
                'q' => 'Do you offer home visits for newborn sessions?',
                'a' => 'Yes. We provide both gentle in-home lifestyle sessions across Trichy and controlled studio art sessions at Thalam Studio.'
            )
        );
    } elseif ( is_page( 'brand-design' ) || is_page_template( 'template-brand-design.php' ) ) {
        $context['title']       = 'Brand Design & Visual Identity Systems — Chithramaya | Trichy';
        $context['description'] = 'Identity engineered for visual authority. We build distinctive typographic systems, wordmarks, and art direction that define your brand essence.';
        $context['canonical']   = home_url( '/brand-design/' );
        $context['image']       = $theme_uri . '/assets/images/portfolio/img-010.jpg';
        $context['image_alt']   = 'Brand Design & Visual Systems by Chithramaya';
        $context['service_id']  = 'design';
    }

    return $context;
}

/**
 * Output Open Graph and Twitter Cards in wp_head
 */
function chitramaya_render_seo_social_meta() {
    $c = chitramaya_get_seo_context();
    ?>
  <!-- Chithramaya Open Graph & Social Cards -->
  <meta property="og:site_name" content="Chithramaya Creatives">
  <meta property="og:locale" content="en_US">
  <meta property="og:type" content="<?php echo esc_attr( $c['type'] ); ?>">
  <meta property="og:title" content="<?php echo esc_attr( $c['title'] ); ?>">
  <meta property="og:description" content="<?php echo esc_attr( $c['description'] ); ?>">
  <meta property="og:url" content="<?php echo esc_url( $c['canonical'] ); ?>">
  <meta property="og:image" content="<?php echo esc_url( $c['image'] ); ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="<?php echo esc_attr( $c['image_alt'] ); ?>">

  <!-- Twitter Card Data -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr( $c['title'] ); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr( $c['description'] ); ?>">
  <meta name="twitter:image" content="<?php echo esc_url( $c['image'] ); ?>">
  <meta name="twitter:image:alt" content="<?php echo esc_attr( $c['image_alt'] ); ?>">
    <?php
}
add_action( 'wp_head', 'chitramaya_render_seo_social_meta', 1 );

/**
 * Output Structured Data Knowledge Graph (@graph JSON-LD)
 */
function chitramaya_render_schema_graph() {
    $c = chitramaya_get_seo_context();
    $theme_uri = get_stylesheet_directory_uri();
    $site_url  = home_url( '/' );

    // 1. Organization / PhotographyBusiness Node
    $org_node = array(
        '@type'            => array( 'PhotographyBusiness', 'ProfessionalService' ),
        '@id'              => $site_url . '#organization',
        'name'             => 'Chithramaya Creatives',
        'legalName'        => 'Chithramaya Creatives Studio',
        'url'              => $site_url,
        'logo'             => $theme_uri . '/artistic-photo.webp',
        'image'            => $c['image'],
        'description'      => 'Visual storytelling with a human pulse. Commercial, brand, and portrait photography studio in Tiruchirappalli (Trichy), Tamil Nadu.',
        'telephone'        => '+91-8098014123',
        'email'            => 'sriramsridharan.designer@gmail.com',
        'priceRange'       => '$$$',
        'founder'          => array(
            '@type' => 'Person',
            '@id'   => $site_url . '#sriram'
        ),
        'address'          => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Salai Road, Near Bombay Dyeing, Prime Thillai Nagar',
            'addressLocality' => 'Tiruchirappalli',
            'addressRegion'   => 'Tamil Nadu',
            'postalCode'      => '620018',
            'addressCountry'  => 'IN'
        ),
        'geo'              => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => 10.827388663646731,
            'longitude' => 78.68519161657615
        ),
        'sameAs'           => array(
            'https://instagram.com/chithramaya',
            'https://wa.me/918098014123'
        ),
        'hasOfferCatalog'  => array(
            '@type' => 'OfferCatalog',
            '@id'   => home_url( '/#services' ),
            'name'  => 'Chithramaya Creatives — Photography & Production Services'
        )
    );

    // 2. Founder / Person Node
    $person_node = array(
        '@type'       => 'Person',
        '@id'         => $site_url . '#sriram',
        'name'        => 'Sriram Sridharan',
        'jobTitle'    => 'Founder & Visual Director',
        'worksFor'    => array(
            '@id' => $site_url . '#organization'
        ),
        'knowsAbout'  => array(
            'Commercial Photography',
            'Visual Storytelling',
            'Art Direction',
            'Brand Identity',
            'Podcast Production',
            'Studio Lighting'
        ),
        'sameAs'      => array(
            'https://instagram.com/chithramaya'
        )
    );

    // 3. Facility / Thalam Studio Place Node
    $facility_node = array(
        '@type'             => 'ProfessionalService',
        '@id'               => home_url( '/thalam-studio/#facility' ),
        'name'              => 'Thalam Studio',
        'description'       => 'A purpose-built 2,400 sq ft production and podcast facility in Trichy by Chithramaya Creatives.',
        'parentOrganization'=> array(
            '@id' => $site_url . '#organization'
        ),
        'url'               => home_url( '/thalam-studio/' ),
        'telephone'         => '+91-8098014123',
        'address'           => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Salai Road, Near Bombay Dyeing, Prime Thillai Nagar',
            'addressLocality' => 'Tiruchirappalli',
            'addressRegion'   => 'Tamil Nadu',
            'postalCode'      => '620018',
            'addressCountry'  => 'IN'
        ),
        'geo'               => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => 10.827388663646731,
            'longitude' => 78.68519161657615
        ),
        'openingHoursSpecification' => array(
            array(
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ),
                'opens'     => '09:00',
                'closes'    => '20:00'
            )
        )
    );

    // Assemble the root @graph
    $graph = array(
        '@context' => 'https://schema.org',
        '@graph'   => array(
            $org_node,
            $person_node,
            $facility_node
        )
    );

    // 4. Add FAQPage Schema if current page has FAQs (Enables expandable rich snippets in SERP)
    if ( ! empty( $c['faqs'] ) ) {
        $faq_main_entity = array();
        foreach ( $c['faqs'] as $faq ) {
            $faq_main_entity[] = array(
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => array(
                    '@type' => 'Answer',
                    'text'  => $faq['a']
                )
            );
        }

        $graph['@graph'][] = array(
            '@type'      => 'FAQPage',
            '@id'        => $c['canonical'] . '#faq',
            'isPartOf'   => array( '@id' => $c['canonical'] ),
            'mainEntity' => $faq_main_entity
        );
    }

    echo "\n  <!-- Schema.org Interlinked Knowledge Graph -->\n";
    echo '  <script type="application/ld+json">' . "\n";
    echo wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) . "\n";
    echo "  </script>\n";
}
add_action( 'wp_head', 'chitramaya_render_schema_graph', 2 );

/**
 * 5. Homepage Service ItemList Schema
 *
 * Fires only on the homepage. Defines an ItemList of 5 core services as schema.org
 * Service entities, linked to the PhotographyBusiness organization node.
 * This is the primary signal Google uses to generate AI Overview service summaries.
 */
function chitramaya_render_service_itemlist() {
    if ( ! is_front_page() ) {
        return;
    }

    $site_url  = home_url( '/' );
    $theme_uri = get_stylesheet_directory_uri();

    $services = array(
        array(
            'position'    => 1,
            'id'          => home_url( '/commercial/#service' ),
            'name'        => 'Commercial & Brand Photography',
            'description' => 'Products, spaces, food, fashion. We shoot what you\'re selling and make people actually want it. On-location across Tamil Nadu and at Thalam Studio.',
            'url'         => home_url( '/commercial/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-001.jpg',
            'serviceType' => 'Commercial Photography',
        ),
        array(
            'position'    => 2,
            'id'          => home_url( '/corporate-brand/#service' ),
            'name'        => 'Corporate & Brand Identity Photography',
            'description' => 'We photograph the people behind your brand — executive portraits, corporate culture, and workplace visual authority that builds credibility.',
            'url'         => home_url( '/corporate-brand/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-005.jpg',
            'serviceType' => 'Corporate & Executive Photography',
        ),
        array(
            'position'    => 3,
            'id'          => home_url( '/events-portrait/#service' ),
            'name'        => 'Events & Heritage Portraiture',
            'description' => 'The moments you\'ll look at in 20 years and remember exactly how it felt. Unobtrusive documentary photography for weddings, milestones, and family heritage.',
            'url'         => home_url( '/events-portrait/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-035.jpg',
            'serviceType' => 'Events & Heritage Photography',
        ),
        array(
            'position'    => 4,
            'id'          => home_url( '/podcast-interview/#service' ),
            'name'        => 'Podcast & Interview Production',
            'description' => 'We set up the room. You bring the conversation. Broadcast-grade podcast studio with Shure SM7B audio, 4K multi-camera, and short-form video reels.',
            'url'         => home_url( '/podcast-interview/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-001.jpg',
            'serviceType' => 'Podcast & Video Production',
        ),
        array(
            'position'    => 5,
            'id'          => home_url( '/brand-design/#service' ),
            'name'        => 'Brand Design & Visual Identity Systems',
            'description' => 'Distinctive wordmarks, typographic systems, and art direction that define your brand\'s visual authority from day one.',
            'url'         => home_url( '/brand-design/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-010.jpg',
            'serviceType' => 'Brand Design & Visual Identity',
        ),
    );

    $list_items = array();
    foreach ( $services as $svc ) {
        $list_items[] = array(
            '@type'    => 'ListItem',
            'position' => $svc['position'],
            'item'     => array(
                '@type'       => 'Service',
                '@id'         => $svc['id'],
                'name'        => $svc['name'],
                'description' => $svc['description'],
                'url'         => $svc['url'],
                'image'       => $svc['image'],
                'serviceType' => $svc['serviceType'],
                'provider'    => array( '@id' => $site_url . '#organization' ),
                'areaServed'  => array(
                    '@type'      => 'GeoCircle',
                    'geoMidpoint' => array(
                        '@type'     => 'GeoCoordinates',
                        'latitude'  => 10.827388663646731,
                        'longitude' => 78.68519161657615
                    ),
                    'geoRadius'  => '500000'
                ),
                'offers'      => array(
                    '@type'              => 'Offer',
                    'availability'       => 'https://schema.org/InStock',
                    'priceSpecification' => array(
                        '@type'          => 'PriceSpecification',
                        'priceCurrency'  => 'INR',
                        'description'    => 'Custom pricing — contact us for a tailored quote.'
                    )
                )
            )
        );
    }

    $itemlist_schema = array(
        '@context'       => 'https://schema.org',
        '@type'          => 'ItemList',
        '@id'            => $site_url . '#services',
        'name'           => 'Chithramaya Creatives — Photography & Production Services',
        'description'    => 'Photography and production services by Chithramaya Creatives in Tiruchirappalli (Trichy), Tamil Nadu. Led by Visual Director Sriram Sridharan.',
        'itemListOrder'  => 'https://schema.org/ItemListOrderAscending',
        'numberOfItems'  => count( $services ),
        'itemListElement'=> $list_items,
    );

    echo "\n  <!-- Schema.org Service ItemList — AI Overview & Rich Results -->\n";
    echo '  <script type="application/ld+json">' . "\n";
    echo wp_json_encode( $itemlist_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) . "\n";
    echo "  </script>\n";
}
add_action( 'wp_head', 'chitramaya_render_service_itemlist', 3 );

/**
 * 6. Per-Pillar Standalone Service Schema Node
 *
 * Fires on each individual pillar page (not homepage). Emits a Service entity
 * that cross-references the homepage ItemList and the PhotographyBusiness org node.
 * This creates the full interlinked entity chain: Organization → ItemList → Service (pillar).
 */
function chitramaya_render_pillar_service_node() {
    if ( is_front_page() ) {
        return;
    }

    $c         = chitramaya_get_seo_context();
    $theme_uri = get_stylesheet_directory_uri();
    $site_url  = home_url( '/' );

    // Map each service_id to its full Service definition
    $service_map = array(
        'commercial' => array(
            'id'          => home_url( '/commercial/#service' ),
            'name'        => 'Commercial & Brand Photography',
            'description' => 'Products, spaces, food, fashion. We shoot what you\'re selling and make people actually want it. On-location across Tamil Nadu and at Thalam Studio, Trichy.',
            'url'         => home_url( '/commercial/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-001.jpg',
            'serviceType' => 'Commercial Photography',
        ),
        'corporate' => array(
            'id'          => home_url( '/corporate-brand/#service' ),
            'name'        => 'Corporate & Brand Identity Photography',
            'description' => 'Executive portraits, team culture documentation, and corporate visual authority engineered for credibility. On-site or at Thalam Studio.',
            'url'         => home_url( '/corporate-brand/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-005.jpg',
            'serviceType' => 'Corporate & Executive Photography',
        ),
        'events' => array(
            'id'          => home_url( '/events-portrait/#service' ),
            'name'        => 'Events & Heritage Portraiture',
            'description' => 'The moments you\'ll look at in 20 years and remember exactly how it felt. Documentary wedding, milestone, and family heritage photography across India.',
            'url'         => home_url( '/events-portrait/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-035.jpg',
            'serviceType' => 'Events & Heritage Photography',
        ),
        'podcast' => array(
            'id'          => home_url( '/podcast-interview/#service' ),
            'name'        => 'Podcast & Interview Production',
            'description' => 'Broadcast-grade Shure SM7B audio, 4K multi-camera angles, and short-form social video reels. Thalam Studio, Trichy.',
            'url'         => home_url( '/podcast-interview/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-001.jpg',
            'serviceType' => 'Podcast & Video Production',
        ),
        'maternity' => array(
            'id'          => home_url( '/maternity/#service' ),
            'name'        => 'Maternity & Bump-to-Baby Portraiture',
            'description' => 'Quiet, beautiful portraits documenting the sacred wait. Fine-art maternity photography in studio and natural light settings across Trichy.',
            'url'         => home_url( '/maternity/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-001.jpg',
            'serviceType' => 'Maternity Photography',
        ),
        'baby' => array(
            'id'          => home_url( '/thalam-baby/#service' ),
            'name'        => 'Thalam Baby — Newborn & Infant Photography',
            'description' => 'From the first curled-up sleep to the messy cake smash. Gentle, unhurried newborn and baby milestone sessions at Thalam Studio, Trichy.',
            'url'         => home_url( '/thalam-baby/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-001.jpg',
            'serviceType' => 'Newborn & Infant Photography',
        ),
        'design' => array(
            'id'          => home_url( '/brand-design/#service' ),
            'name'        => 'Brand Design & Visual Identity Systems',
            'description' => 'Wordmarks, typographic systems, and complete visual identity art direction that define your brand\'s authority and give it a face people remember.',
            'url'         => home_url( '/brand-design/' ),
            'image'       => $theme_uri . '/assets/images/portfolio/img-010.jpg',
            'serviceType' => 'Brand Design & Visual Identity',
        ),
        'facility' => array(
            'id'          => home_url( '/thalam-studio/#service' ),
            'name'        => 'Thalam Studio — Production Facility Hire',
            'description' => 'A purpose-built 2,400 sq ft production and podcast facility with cyclorama walls, Profoto lighting, acoustic suites, and client lounge in Trichy.',
            'url'         => home_url( '/thalam-studio/' ),
            'image'       => $theme_uri . '/assets/img/og-thalam.jpg',
            'serviceType' => 'Studio & Production Facility Hire',
        ),
    );

    $service_id = isset( $c['service_id'] ) ? $c['service_id'] : '';
    if ( empty( $service_id ) || ! isset( $service_map[ $service_id ] ) || 'general' === $service_id ) {
        return;
    }

    $svc = $service_map[ $service_id ];

    $service_schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'Service',
        '@id'         => $svc['id'],
        'name'        => $svc['name'],
        'description' => $svc['description'],
        'url'         => $svc['url'],
        'image'       => $svc['image'],
        'serviceType' => $svc['serviceType'],
        'provider'    => array( '@id' => $site_url . '#organization' ),
        'isPartOf'    => array( '@id' => $site_url . '#services' ),
        'areaServed'  => array(
            '@type'      => 'GeoCircle',
            'geoMidpoint' => array(
                '@type'     => 'GeoCoordinates',
                'latitude'  => 10.827388663646731,
                'longitude' => 78.68519161657615
            ),
            'geoRadius'  => '500000'
        ),
        'offers' => array(
            '@type'              => 'Offer',
            'availability'       => 'https://schema.org/InStock',
            'url'                => $svc['url'],
            'seller'             => array( '@id' => $site_url . '#organization' ),
            'priceSpecification' => array(
                '@type'         => 'PriceSpecification',
                'priceCurrency' => 'INR',
                'description'   => 'Custom pricing — contact us for a tailored quote.'
            )
        )
    );

    echo "\n  <!-- Schema.org Service Node — Pillar Page Entity -->\n";
    echo '  <script type="application/ld+json">' . "\n";
    echo wp_json_encode( $service_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) . "\n";
    echo "  </script>\n";
}
add_action( 'wp_head', 'chitramaya_render_pillar_service_node', 3 );

/**
 * 7. XML Sitemap & Security Hardening
 */

// Disable author/users sitemap to prevent username enumeration
function chitramaya_disable_sitemap_users( $provider, $name ) {
    if ( 'users' === $name ) {
        return false;
    }
    return $provider;
}
add_filter( 'wp_sitemaps_add_provider', 'chitramaya_disable_sitemap_users', 10, 2 );

// Exclude sample-page and unwanted post IDs from XML sitemaps
function chitramaya_filter_sitemap_pages( $args, $post_type ) {
    if ( 'page' === $post_type ) {
        // Exclude by slug
        $sample_page = get_page_by_path( 'sample-page' );
        if ( $sample_page ) {
            $args['post__not_in'] = isset( $args['post__not_in'] ) ? array_merge( $args['post__not_in'], array( $sample_page->ID ) ) : array( $sample_page->ID );
        }
    }
    return $args;
}
add_filter( 'wp_sitemaps_posts_query_args', 'chitramaya_filter_sitemap_pages', 10, 2 );

// Ensure core canonical redirects to trailing slash cleanly
function chitramaya_enforce_canonical_slash( $canonical_url ) {
    if ( ! empty( $canonical_url ) && ! pathinfo( parse_url( $canonical_url, PHP_URL_PATH ), PATHINFO_EXTENSION ) ) {
        return trailingslashit( $canonical_url );
    }
    return $canonical_url;
}
add_filter( 'wp_get_canonical_url', 'chitramaya_enforce_canonical_slash', 10, 1 );
