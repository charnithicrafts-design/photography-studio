<?php
// Register Custom Post Type for Leads / Inquiries
function chitramaya_register_leads_cpt() {
    $labels = array(
        'name'                  => 'Inquiries',
        'singular_name'         => 'Inquiry',
        'menu_name'             => 'Inquiries',
        'all_items'             => 'All Inquiries',
    );
    $args = array(
        'label'                 => 'Inquiry',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor' ), // We will inject form data into the editor
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 26,
        'menu_icon'             => 'dashicons-email-alt', // Mail icon
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
    );
    register_post_type( 'chitramaya_lead', $args );
}
add_action( 'init', 'chitramaya_register_leads_cpt', 0 );
