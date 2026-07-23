<?php
// Find the Services page
$page = get_page_by_path('services');
if (!$page) {
    echo "Services page not found!\n";
    exit;
}
$post_id = $page->ID;

// Data Structure (Updated with Descriptions)
$data = [
    1 => [
        'title' => 'COMMERCIAL & BRAND',
        'headline' => 'ENGINEERING VISUAL AUTHORITY',
        'manifesto' => 'Every frame is calibrated to command respect, build profound trust, and assert your market dominance. From the boardroom to the billboard, we engineer images that influence perception and drive engagement.',
        'verticals' => [
            [
                'title' => 'Executive Portfolios & Team Identity',
                'desc' => 'Humanizing your leadership with environmental portraits that project both absolute authority and approachability.'
            ],
            [
                'title' => 'Workspace & Cinematic Culture',
                'desc' => 'Documenting your operational environment to build trust and showcase the true physical scale of your infrastructure.'
            ],
            [
                'title' => 'E-Commerce & Product Catalogues',
                'desc' => 'Clinically precise, high-fidelity images engineered to drive desire and drastically improve conversion rates.'
            ],
            [
                'title' => 'Events, Seminars & Brand Launches',
                'desc' => 'Uncompromising coverage of your corporate milestones, ensuring your PR narratives are backed by undeniable visuals.'
            ],
            [
                'title' => 'Corporate Film & Brand TVCs',
                'desc' => 'Cinematic, broadcast-grade video production that distills your brand\'s mission into a visceral storytelling experience.'
            ]
        ]
    ],
    2 => [
        'title' => 'EVENTS & PORTRAIT',
        'headline' => 'PRESERVING THE HUMAN MILESTONE',
        'manifesto' => 'Time is the only luxury we cannot buy back, but we have the power to pause it. Our Events & Portrait photography is not about staging smiles; it is about preserving the profound, fleeting milestones of your lineage. We create a timeless, emotional archive of the people you love the most.',
        'verticals' => [
            [
                'title' => 'Maternity & Bump-to-Baby',
                'desc' => 'Honoring the quiet power and profound anticipation of motherhood in our art-themed studio or on location.'
            ],
            [
                'title' => 'Newborn, Infant & Toddler',
                'desc' => 'Delicate, unscripted archives of your child\'s fastest-changing years, captured with extreme care and patience.'
            ],
            [
                'title' => 'Weddings & Destination Celebrations',
                'desc' => 'Sweeping, cinematic documentation of your union, spanning everything from pre-wedding intimacy to massive destination narratives.'
            ],
            [
                'title' => 'Generational & Cultural Milestones',
                'desc' => 'Preserving the sacred cultural traditions—from 1st birthdays to Sadhabishegam—that bind your lineage together.'
            ],
            [
                'title' => 'The Grand Family Heirloom',
                'desc' => 'Majestic, art-directed family portraiture designed not for the feed, but to be passed down as a physical heirloom.'
            ]
        ]
    ],
    3 => [
        'title' => 'TALAM STUDIO SPACE',
        'headline' => 'THE THEATER OF DIALOGUE',
        'manifesto' => 'A great conversation should not just be heard; it must be felt. We have engineered the Talam Studio Space to be the ultimate theater of dialogue. By seamlessly fusing broadcast-grade audio engineering with cinematic, multi-camera visual production, we elevate your podcast into a commanding media property.',
        'verticals' => [
            [
                'title' => 'The Studio Space & Engineering',
                'desc' => 'A meticulously engineered acoustic and visual environment, optimized for intimate portraits and clinical product shoots.'
            ],
            [
                'title' => 'Content Editing & Distribution',
                'desc' => 'Ruthless post-production, multi-cam editing, and formatting designed to maximize retention across all platforms.'
            ],
            [
                'title' => 'Podcast Branding & Asset Creation',
                'desc' => 'We don\'t just record you; we brand you. High-end promotional visuals crafted to assert your authority in a crowded market.'
            ]
        ]
    ],
    4 => [
        'title' => 'THE WORKFLOW',
        'headline' => 'ZERO-LATENCY EXECUTION',
        'manifesto' => 'From initial consultation to zero-latency CDN delivery. See exactly how we execute. No camera is touched until the psychological strategy and emotional response is explicitly defined.',
        'verticals' => [
            [
                'title' => 'Initial Consultation & Discovery',
                'desc' => 'We define the exact emotional response your visuals must trigger before a single camera is ever touched.'
            ],
            [
                'title' => 'Pre-Production & Light Architecture',
                'desc' => 'A bespoke lighting plan is engineered based on the tactile qualities we need to extract from the subject.'
            ],
            [
                'title' => 'The Execution & Capture',
                'desc' => 'We shoot in medium format. From hundreds of exposures, we ruthlessly curate to find the absolute strongest frames.'
            ],
            [
                'title' => 'Zero-Latency CDN Delivery',
                'desc' => 'Final assets are delivered as uncompressed masters and SEO-optimized web variants through a blazing-fast global CDN.'
            ]
        ]
    ],
    5 => [
        'title' => 'BRAND DESIGN',
        'headline' => 'THE ARCHITECTURE OF IDENTITY',
        'manifesto' => 'Identity is not merely an aesthetic; it is a strategic weapon. Brand design is the relentless process of translating your core values into an unshakeable visual system. We do not just design graphics; we architect lasting recognition.',
        'verticals' => [
            [
                'title' => 'Logo & Core Identity Systems',
                'desc' => 'The geometric foundation of your brand. We engineer logos that are mathematically precise and instantly recognizable.'
            ],
            [
                'title' => 'OOH Campaigns & Installation Design',
                'desc' => 'Massive, larger-than-life visual systems designed to dominate physical spaces and demand absolute public attention.'
            ],
            [
                'title' => 'Product Design & Tactile Packaging',
                'desc' => 'Translating your brand identity into physical, tactile objects that consumers can feel, hold, and desire.'
            ],
            [
                'title' => 'Marketing Collaterals & Posters',
                'desc' => 'Editorial-grade print and digital materials that enforce your market positioning with brutalist consistency.'
            ],
            [
                'title' => 'Comprehensive Brand Guidelines',
                'desc' => 'The absolute law of your visual identity, documented meticulously to ensure long-term, unshakeable consistency.'
            ]
        ]
    ]
];

// Seed the data
if (function_exists('update_field')) {
    foreach ($data as $h => $horizontal) {
        update_field("h{$h}_title", $horizontal['title'], $post_id);
        update_field("h{$h}_headline", $horizontal['headline'], $post_id);
        update_field("h{$h}_manifesto", $horizontal['manifesto'], $post_id);
        
        $v = 1;
        foreach ($horizontal['verticals'] as $vertical) {
            update_field("h{$h}_v{$v}_title", $vertical['title'], $post_id);
            update_field("h{$h}_v{$v}_desc", $vertical['desc'], $post_id);
            $v++;
        }
        
        // Clear remaining verticals (if any) up to 6
        for ($clear = $v; $clear <= 6; $clear++) {
            update_field("h{$h}_v{$clear}_title", "", $post_id);
            update_field("h{$h}_v{$clear}_desc", "", $post_id);
        }
    }
    echo "Content with descriptions successfully seeded to Services page (ID: {$post_id})!\n";
} else {
    echo "ACF update_field function not found.\n";
}
