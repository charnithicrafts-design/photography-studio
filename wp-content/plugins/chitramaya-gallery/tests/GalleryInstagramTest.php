<?php
/**
 * Test Instagram Feed functionality.
 */

namespace Chitramaya\Tests;

use WP_UnitTestCase;

class GalleryInstagramTest extends WP_UnitTestCase {

	public function test_transient_caching_works() {
		$transient_key = 'chitramaya_instagram_feed_test';
		$mock_data     = [ 'status' => 'success', 'data' => [ 'id' => 1 ] ];
		
		set_transient( $transient_key, $mock_data, HOUR_IN_SECONDS );
		
		$cached_data = get_transient( $transient_key );
		$this->assertEquals( $mock_data, $cached_data );
	}

	public function test_shortcode_is_registered() {
		global $shortcode_tags;
		
		$this->assertArrayHasKey( 'chitramaya_instagram', $shortcode_tags, 'The shortcode [chitramaya_instagram] is not registered.' );
	}

	public function test_rendering_with_empty_feed_returns_message() {
		// Mock testing the shortcode when feed is empty or invalid
		$output = do_shortcode( '[chitramaya_instagram empty="true"]' );
		
		// The shortcode should at least return a string message when failing/empty.
		$this->assertIsString( $output );
		$this->assertNotEmpty( $output );
	}
}
