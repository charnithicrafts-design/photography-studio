<?php
/**
 * Plugin Name: Chithramaya Photo Proofing
 * Description: Client photo proofing system for Chithramaya Creatives.
 * Version: 1.0.0
 * Author: Chithramaya Creatives
 * Text Domain: chitramaya-proofing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CHITRAMAYA_PROOFING_PATH', plugin_dir_path( __FILE__ ) );
define( 'CHITRAMAYA_PROOFING_URL', plugin_dir_url( __FILE__ ) );

// Include the CPT class
require_once CHITRAMAYA_PROOFING_PATH . 'inc/class-proofing-cpt.php';

// Initialize the system
function chitramaya_proofing_init() {
	$proofing_system = new Chitramaya_Proofing_System();
	$proofing_system->init();
}
add_action( 'plugins_loaded', 'chitramaya_proofing_init' );

// Activation hook
register_activation_hook( __FILE__, 'chitramaya_proofing_activate' );
function chitramaya_proofing_activate() {
	$proofing_system = new Chitramaya_Proofing_System();
	$proofing_system->register_cpt();
	flush_rewrite_rules();
}

// Deactivation hook
register_deactivation_hook( __FILE__, 'chitramaya_proofing_deactivate' );
function chitramaya_proofing_deactivate() {
	flush_rewrite_rules();
}
