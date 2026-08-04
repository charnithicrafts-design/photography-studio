<?php
/**
 * Test API Submission
 */
class ApiSubmitTest extends WP_UnitTestCase {
    
    protected $post_id;
    protected $api;

    public function setUp(): void {
        parent::setUp();
        $this->post_id = $this->factory()->post->create( [
            'post_type'  => 'proofing_session',
            'post_title' => 'Test Session'
        ] );
        update_post_meta( $this->post_id, '_proofing_access_code', 'testcode123' );
        
        // Assuming Chitramaya_Proofing_API handles REST routes
        $this->api = new Chitramaya_Proofing_API();
    }

    /**
     * @covers Chitramaya_Proofing_API::submit
     */
    public function test_submit_sets_status() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/submit' );
        $request->set_param( 'session_id', $this->post_id );
        $request->set_param( 'token', 'testcode123' );
        
        $this->api->api_submit_proofing( $request );
        
        $status = get_post_meta( $this->post_id, '_proofing_status', true );
        $this->assertEquals( 'submitted', $status );
    }

    /**
     * @covers Chitramaya_Proofing_API::submit
     */
    public function test_submit_fires_action_hook() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/submit' );
        $request->set_param( 'session_id', $this->post_id );
        $request->set_param( 'token', 'testcode123' );
        
        $this->api->api_submit_proofing( $request );
        
        $this->assertGreaterThan( 0, did_action( 'chitramaya_proofing_submitted' ) );
    }

    /**
     * @covers Chitramaya_Proofing_API::submit
     */
    public function test_submit_is_idempotent() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/submit' );
        $request->set_param( 'session_id', $this->post_id );
        $request->set_param( 'token', 'testcode123' );
        
        $this->api->api_submit_proofing( $request );
        $status1 = get_post_meta( $this->post_id, '_proofing_status', true );
        
        $this->api->api_submit_proofing( $request );
        $status2 = get_post_meta( $this->post_id, '_proofing_status', true );
        
        $this->assertEquals( 'submitted', $status1 );
        $this->assertEquals( 'submitted', $status2 );
    }

    /**
     * @covers Chitramaya_Proofing_API::save
     */
    public function test_submit_locks_further_saves() {
        // Simulate already submitted session
        update_post_meta( $this->post_id, '_proofing_status', 'submitted' );
        
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/save' );
        $request->set_param( 'session_id', $this->post_id );
        $request->set_param( 'token', 'testcode123' );
        
        $response = $this->api->api_save_proofing( $request );
        
        $this->assertTrue( is_wp_error( $response ) || ( method_exists( $response, 'get_status' ) && (is_wp_error($response) ? $response->get_error_data()["status"] : $response->get_status()) === 403 ) || ( isset( $response->status ) && $response->status === 403 ) );
        
        if ( is_wp_error( $response ) ) {
            $this->assertEquals( 'session_locked', $response->get_error_code() );
        } elseif ( method_exists( $response, 'get_status' ) ) {
            $this->assertEquals( 403, (is_wp_error($response) ? $response->get_error_data()["status"] : $response->get_status()) );
        }
    }
}
