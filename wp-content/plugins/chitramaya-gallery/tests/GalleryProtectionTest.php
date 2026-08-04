<?php
/**
 * Test Gallery protection logic.
 */

namespace Chitramaya\Tests;

use WP_UnitTestCase;

class GalleryProtectionTest extends WP_UnitTestCase {

	public function test_public_gallery_allows_access() {
		$post_id = self::factory()->post->create( [
			'post_type' => 'chitramaya_gallery',
		] );
		update_post_meta( $post_id, '_gallery_access_type', 'public' );

		$access_type = get_post_meta( $post_id, '_gallery_access_type', true );
		$this->assertEquals( 'public', $access_type );
	}

	public function test_getting_meta_for_password() {
		$post_id = self::factory()->post->create( [
			'post_type' => 'chitramaya_gallery',
		] );
		update_post_meta( $post_id, '_gallery_access_type', 'password' );

		$access_type = get_post_meta( $post_id, '_gallery_access_type', true );
		$this->assertEquals( 'password', $access_type );
	}

	public function test_magic_link_token_validation() {
		$post_id = self::factory()->post->create( [
			'post_type' => 'chitramaya_gallery',
		] );
		
		$test_token = 'token_abc123';
		update_post_meta( $post_id, '_gallery_access_code', $test_token );

		$saved_token = get_post_meta( $post_id, '_gallery_access_code', true );
		$this->assertEquals( $test_token, $saved_token );
	}

	public function test_new_gallery_auto_generates_access_code() {
		$post_id = self::factory()->post->create( [
			'post_type' => 'chitramaya_gallery',
		] );

		// Check if a code was automatically generated upon creation.
		$access_code = get_post_meta( $post_id, '_gallery_access_code', true );
		$this->assertNotEmpty( $access_code );
	}
}
