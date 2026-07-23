<?php
// Find 4 images from the media library to use as a dummy gallery
$attachments = get_posts([
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => 4,
    'fields'         => 'ids'
]);

$projects = [
    [
        'title' => 'Maison Kaur — Product & Tactile Packaging',
        'category' => 'Commercial Photography',
        'client' => 'Maison Kaur',
        'year' => 2024,
        'brief' => 'A clinical extraction of texture. The client required high-fidelity e-commerce assets that conveyed the weight and coolness of their glass packaging without relying on CGI. We engineered a bespoke light architecture that influenced consumer perception and directly drove a 34% increase in conversion.',
        'credits' => [
            ['role' => 'Art Director', 'name' => 'Priya Sundaram'],
            ['role' => 'Lead Photographer', 'name' => 'Chitramaya Studio']
        ]
    ],
    [
        'title' => 'The Sundaram Lineage — Grand Family Heirloom',
        'category' => 'Events & Portrait',
        'client' => 'The Sundaram Family',
        'year' => 2023,
        'brief' => 'Preserving the human milestone. Rather than staging forced smiles for a fleeting social feed, we art-directed a sweeping, generational portrait designed to be passed down as a physical heirloom, capturing the profound gravity and tradition of their lineage.',
        'credits' => [
            ['role' => 'Creative Director', 'name' => 'Talam Studio']
        ]
    ],
    [
        'title' => 'Forma Architecture — Cinematic Walkthrough',
        'category' => 'Brand & Corporate',
        'client' => 'Forma Architecture',
        'year' => 2024,
        'brief' => 'Documenting operational scale to build absolute trust. The objective was to capture the structural truth of their newly constructed headquarters. We utilized zero-distortion medium format lenses to assert their market dominance through uncompromising, brutalist architectural photography.',
        'credits' => [
            ['role' => 'Lead Architect', 'name' => 'Vikram Mehta'],
            ['role' => 'Production', 'name' => 'Chitramaya Creatives']
        ]
    ]
];

foreach ($projects as $p) {
    // Check if post exists
    $existing = get_page_by_title($p['title'], OBJECT, 'chitramaya_project');
    if ($existing) {
        $post_id = $existing->ID;
    } else {
        $post_id = wp_insert_post([
            'post_title' => $p['title'],
            'post_type' => 'chitramaya_project',
            'post_status' => 'publish',
        ]);
    }
    
    // Set category
    wp_set_object_terms($post_id, $p['category'], 'project_category');
    
    // Set ACF Fields
    update_field('project_client', $p['client'], $post_id);
    update_field('project_year', $p['year'], $post_id);
    update_field('project_brief', $p['brief'], $post_id);
    update_field('project_gallery', $attachments, $post_id);
    
    // Clear credits first
    for ($i = 1; $i <= 3; $i++) {
        update_field("credit_{$i}_role", '', $post_id);
        update_field("credit_{$i}_name", '', $post_id);
    }
    
    // Set new credits
    foreach ($p['credits'] as $index => $credit) {
        $idx = $index + 1;
        if ($idx <= 3) {
            update_field("credit_{$idx}_role", $credit['role'], $post_id);
            update_field("credit_{$idx}_name", $credit['name'], $post_id);
        }
    }
    
    // Set featured image
    if (!empty($attachments)) {
        set_post_thumbnail($post_id, $attachments[0]);
    }
    
    echo "Seeded: {$p['title']}\n";
}
echo "Portfolio seeding complete.\n";
