<?php
/**
 * Plugin Name: Chitramaya Gallery
 * Description: Photography gallery system with client galleries, protection, and flexible layouts for Chitramaya Creatives.
 * Version: 1.0.0
 * Author: Chitramaya Creatives
 * Text Domain: chitramaya-gallery
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define( 'CHITRAMAYA_GALLERY_PATH', plugin_dir_path( __FILE__ ) );
define( 'CHITRAMAYA_GALLERY_URL', plugin_dir_url( __FILE__ ) );

// Include classes
require_once CHITRAMAYA_GALLERY_PATH . 'inc/class-gallery-cpt.php';
require_once CHITRAMAYA_GALLERY_PATH . 'inc/class-gallery-meta.php';
require_once CHITRAMAYA_GALLERY_PATH . 'inc/class-gallery-uploader.php';
require_once CHITRAMAYA_GALLERY_PATH . 'inc/class-gallery-protection.php';
require_once CHITRAMAYA_GALLERY_PATH . 'inc/class-gallery-frontend.php';
require_once CHITRAMAYA_GALLERY_PATH . 'inc/class-gallery-instagram.php';

function chitramaya_gallery_init() {
    $cpt = new Chitramaya_Gallery_CPT();
    $cpt->init();
    $meta = new Chitramaya_Gallery_Meta();
    $meta->init();
    $uploader = new Chitramaya_Gallery_Uploader();
    $uploader->init();
    $protection = new Chitramaya_Gallery_Protection();
    $protection->init();
    $frontend = new Chitramaya_Gallery_Frontend();
    $frontend->init();
    $instagram = new Chitramaya_Gallery_Instagram();
    $instagram->init();
}
add_action( 'plugins_loaded', 'chitramaya_gallery_init' );

register_activation_hook( __FILE__, 'chitramaya_gallery_activate' );
function chitramaya_gallery_activate() {
    $cpt = new Chitramaya_Gallery_CPT();
    $cpt->register_cpt();
    flush_rewrite_rules();
}

register_deactivation_hook( __FILE__, 'chitramaya_gallery_deactivate' );
function chitramaya_gallery_deactivate() {
    flush_rewrite_rules();
}
