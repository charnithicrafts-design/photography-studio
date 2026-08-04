<?php

class ApiSaveTest extends WP_UnitTestCase {
    private $post_id;
    private $server;

    public function setUp(): void {
        parent::setUp();
        global $wp_rest_server;
        $this->server = $wp_rest_server = new WP_REST_Server();
        do_action( 'rest_api_init' );

        $this->post_id = $this->factory()->post->create( [ 'post_type' => 'proofing_session' ] );
        update_post_meta( $this->post_id, '_proofing_access_code', 'VALID_TOKEN' );
        update_post_meta( $this->post_id, '_proofing_status', 'pending' );
    }

    /**
     * @covers Chitramaya_Proofing_API::save_photos
     */
    public function test_valid_save_updates_meta() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/proofing/save' );
        $request->set_param( 'id', $this->post_id );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $request->set_param( 'photos', [ 'photo1.jpg', 'photo2.jpg' ] );
        
        $response = $this->server->dispatch( $request );
        $this->assertEquals( 200, $response->get_status() );
        
        $saved = get_post_meta( $this->post_id, '_proofing_photos_json', true );
        $this->assertEquals( wp_json_encode( [ 'photo1.jpg', 'photo2.jpg' ] ), $saved );
    }

    /**
     * @covers Chitramaya_Proofing_API::save_photos
     */
    public function test_xss_sanitization() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/proofing/save' );
        $request->set_param( 'id', $this->post_id );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $request->set_param( 'photos', [ '<script>alert(1)</script>photo.jpg' ] );
        
        $response = $this->server->dispatch( $request );
        $this->assertEquals( 200, $response->get_status() );
        
        $saved = get_post_meta( $this->post_id, '_proofing_photos_json', true );
        $this->assertStringNotContainsString( '<script>', $saved );
    }

    /**
     * @covers Chitramaya_Proofing_API::save_photos
     */
    public function test_url_sanitization() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/proofing/save' );
        $request->set_param( 'id', $this->post_id );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $request->set_param( 'photos', [ 'http://example.com/photo.jpg' ] );
        
        $response = $this->server->dispatch( $request );
        $this->assertEquals( 200, $response->get_status() );
        
        $saved = get_post_meta( $this->post_id, '_proofing_photos_json', true );
        $this->assertStringContainsString( 'http://example.com/photo.jpg', $saved );
    }

    /**
     * @covers Chitramaya_Proofing_API::save_photos
     */
    public function test_locked_after_submit() {
        update_post_meta( $this->post_id, '_proofing_status', 'submitted' );
        
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/proofing/save' );
        $request->set_param( 'id', $this->post_id );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $request->set_param( 'photos', [ 'photo1.jpg' ] );
        
        $response = $this->server->dispatch( $request );
        $this->assertTrue( is_wp_error( $response ) || $response->is_error() );
    }

    /**
     * @covers Chitramaya_Proofing_API::save_photos
     */
    public function test_invalid_data_type() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/proofing/save' );
        $request->set_param( 'id', $this->post_id );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $request->set_param( 'photos', 'not_an_array' ); // Invalid type
        
        $response = $this->server->dispatch( $request );
        $this->assertEquals( 200, $response->get_status() ); 
        
        $saved = get_post_meta( $this->post_id, '_proofing_photos_json', true );
        $this->assertEmpty( json_decode( $saved, true ) );
    }
}
