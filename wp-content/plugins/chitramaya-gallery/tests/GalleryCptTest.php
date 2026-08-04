<?php
/**
 * Test CPT and taxonomy registration.
 */

namespace Chitramaya\Tests;

use WP_UnitTestCase;

class GalleryCptTest extends WP_UnitTestCase {

	public function test_chitramaya_gallery_cpt_is_registered() {
		$this->assertTrue( post_type_exists( 'chitramaya_gallery' ) );
	}

	public function test_gallery_category_taxonomy_is_registered() {
		$this->assertTrue( taxonomy_exists( 'gallery_category' ) );
	}

	public function test_create_gallery_post_and_verify() {
		$post_id = self::factory()->post->create( [
			'post_type'  => 'chitramaya_gallery',
			'post_title' => 'Test Gallery',
		] );

		$this->assertGreaterThan( 0, $post_id );
		
		$post = get_post( $post_id );
		$this->assertEquals( 'chitramaya_gallery', $post->post_type );
		$this->assertEquals( 'Test Gallery', $post->post_title );
	}

	public function test_taxonomy_is_associated_with_cpt() {
		$taxonomies = get_object_taxonomies( 'chitramaya_gallery' );
		$this->assertContains( 'gallery_category', $taxonomies );
	}
}
