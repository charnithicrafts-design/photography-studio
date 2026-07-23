<?php
// Find the Services page
$page = get_page_by_path('services');
if (!$page) {
    echo "Services page not found!\n";
    exit;
}
$post_id = $page->ID;

// Data Structure
$data = [
    1 => [
        'title' => 'COMMERCIAL & BRAND',
        'headline' => 'ENGINEERING VISUAL AUTHORITY',
        'manifesto' => 'Every frame is calibrated to command respect, build profound trust, and assert your market dominance. From the boardroom to the billboard, we engineer images that influence perception and drive engagement.',
        'verticals' => [
            'Executive Portfolios & Team Identity',
            'Workspace & Cinematic Culture',
            'E-Commerce & Product Catalogues',
            'Events, Seminars & Brand Launches',
            'Corporate Film & Brand TVCs',
        ]
    ],
    2 => [
        'title' => 'EVENTS & PORTRAIT',
        'headline' => 'PRESERVING THE HUMAN MILESTONE',
        'manifesto' => 'Time is the only luxury we cannot buy back, but we have the power to pause it. Our Events & Portrait photography is not about staging smiles; it is about preserving the profound, fleeting milestones of your lineage. We create a timeless, emotional archive of the people you love the most.',
        'verticals' => [
            'Maternity & Bump-to-Baby',
            'Newborn, Infant & Toddler',
            'Weddings & Destination Celebrations',
            'Generational & Cultural Milestones',
            'The Grand Family Heirloom',
        ]
    ],
    3 => [
        'title' => 'TALAM STUDIO SPACE',
        'headline' => 'THE THEATER OF DIALOGUE',
        'manifesto' => 'A great conversation should not just be heard; it must be felt. We have engineered the Talam Studio Space to be the ultimate theater of dialogue. By seamlessly fusing broadcast-grade audio engineering with cinematic, multi-camera visual production, we elevate your podcast into a commanding media property.',
        'verticals' => [
            'The Studio Space & Engineering',
            'Content Editing & Distribution',
            'Podcast Branding & Asset Creation',
        ]
    ],
    4 => [
        'title' => 'THE WORKFLOW',
        'headline' => 'ZERO-LATENCY EXECUTION',
        'manifesto' => 'From initial consultation to zero-latency CDN delivery. See exactly how we execute. No camera is touched until the psychological strategy and emotional response is explicitly defined.',
        'verticals' => [
            'Initial Consultation & Discovery',
            'Pre-Production & Light Architecture',
            'The Execution & Capture',
            'Zero-Latency CDN Delivery',
        ]
    ],
    5 => [
        'title' => 'BRAND DESIGN',
        'headline' => 'THE ARCHITECTURE OF IDENTITY',
        'manifesto' => 'Identity is not merely an aesthetic; it is a strategic weapon. Brand design is the relentless process of translating your core values into an unshakeable visual system. We do not just design graphics; we architect lasting recognition.',
        'verticals' => [
            'Logo & Core Identity Systems',
            'OOH Campaigns & Installation Design',
            'Product Design & Tactile Packaging',
            'Marketing Collaterals & Posters',
            'Comprehensive Brand Guidelines',
        ]
    ]
];

// Seed the data using update_post_meta (ACF uses update_field, but update_post_meta works too if we format it correctly. Actually, WP-CLI eval-file loads WordPress, so we can use update_field directly!)
if (function_exists('update_field')) {
    foreach ($data as $h => $horizontal) {
        update_field("h{$h}_title", $horizontal['title'], $post_id);
        update_field("h{$h}_headline", $horizontal['headline'], $post_id);
        update_field("h{$h}_manifesto", $horizontal['manifesto'], $post_id);
        
        // Verticals
        $v = 1;
        foreach ($horizontal['verticals'] as $v_title) {
            update_field("h{$h}_v{$v}_title", $v_title, $post_id);
            update_field("h{$h}_v{$v}_desc", "", $post_id); // leave desc blank for now as we didn't specify it
            $v++;
        }
        
        // Clear remaining verticals (if any) up to 6
        for ($clear = $v; $clear <= 6; $clear++) {
            update_field("h{$h}_v{$clear}_title", "", $post_id);
            update_field("h{$h}_v{$clear}_desc", "", $post_id);
        }
    }
    echo "Content successfully seeded to Services page (ID: {$post_id})!\n";
} else {
    echo "ACF update_field function not found.\n";
}
