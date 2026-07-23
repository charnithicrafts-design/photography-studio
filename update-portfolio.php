<?php
// Update Sundaram post date to sort first
$sundaram = get_page_by_title('The Sundaram Lineage — Grand Family Heirloom', OBJECT, 'chitramaya_project');
if ($sundaram) {
    wp_update_post([
        'ID' => $sundaram->ID,
        'post_date' => date('Y-m-d H:i:s', time() + 86400),
        'post_date_gmt' => date('Y-m-d H:i:s', time() + 86400),
    ]);
}

// Rename Forma Architecture
$forma = get_page_by_title('Forma Architecture — Cinematic Walkthrough', OBJECT, 'chitramaya_project');
if ($forma) {
    $new_title = 'Civil Construction & Architecture — Cinematic Walkthrough';
    wp_update_post([
        'ID' => $forma->ID,
        'post_title' => $new_title,
        'post_name' => sanitize_title($new_title)
    ]);
    
    // Update ACF Client Name
    update_field('project_client', 'Civil Construction & Architecture', $forma->ID);
}
echo "Portfolio updates complete.\n";
