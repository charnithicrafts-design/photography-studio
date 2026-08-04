<?php
/**
 * PHPUnit bootstrap file for the Chitramaya Proofing plugin.
 *
 * Uses the WordPress core test suite via the WP_TESTS_DIR environment variable.
 * Set WP_TESTS_DIR to point to the wordpress-develop/tests/phpunit directory.
 */

// Composer autoloader
if ( file_exists( dirname( __DIR__ ) . '/vendor/autoload.php' ) ) {
	require dirname( __DIR__ ) . '/vendor/autoload.php';
}

// Get the WordPress tests directory
$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	// Try the standard wp-env location
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find {$_tests_dir}/includes/functions.php.\n";
	echo "Set the WP_TESTS_DIR environment variable to the WordPress test suite directory.\n";
	echo "Example: export WP_TESTS_DIR=/path/to/wordpress-develop/tests/phpunit\n";
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	require dirname( __DIR__ ) . '/chitramaya-proofing.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
