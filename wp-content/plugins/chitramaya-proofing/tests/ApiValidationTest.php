<?php

class ApiValidationTest extends WP_UnitTestCase {
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
     * @covers Chitramaya_Proofing_API::validate_api_request
     */
    public function test_missing_params_returns_400() {
        $request = new WP_REST_Request( 'GET', '/chitramaya/v1/proofing/session/' . $this->post_id );
        $response = $this->server->dispatch( $request );
        $this->assertErrorResponse( 'missing_params', $response, 400 );
    }

    /**
     * @covers Chitramaya_Proofing_API::validate_api_request
     */
    public function test_invalid_session_returns_404() {
        $request = new WP_REST_Request( 'GET', '/chitramaya/v1/proofing/session/99999' );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $response = $this->server->dispatch( $request );
        $this->assertErrorResponse( 'invalid_session', $response, 404 );
    }

    /**
     * @covers Chitramaya_Proofing_API::validate_api_request
     */
    public function test_invalid_token_returns_401() {
        $request = new WP_REST_Request( 'GET', '/chitramaya/v1/proofing/session/' . $this->post_id );
        $request->set_param( 'token', 'INVALID_TOKEN' );
        $response = $this->server->dispatch( $request );
        $this->assertErrorResponse( 'invalid_token', $response, 401 );
    }

    /**
     * @covers Chitramaya_Proofing_API::validate_api_request
     */
    public function test_valid_token_get_session() {
        $request = new WP_REST_Request( 'GET', '/chitramaya/v1/proofing/session/' . $this->post_id );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $response = $this->server->dispatch( $request );
        $this->assertEquals( 200, (is_wp_error($response) ? $response->get_error_data()["status"] : $response->get_status()) );
    }

    /**
     * @covers Chitramaya_Proofing_API::validate_api_request
     */
    public function test_valid_token_post_save() {
        $request = new WP_REST_Request( 'POST', '/chitramaya/v1/proofing/save' );
        $request->set_param( 'id', $this->post_id );
        $request->set_param( 'token', 'VALID_TOKEN' );
        $request->set_param( 'photos', [] );
        $response = $this->server->dispatch( $request );
        $this->assertEquals( 200, (is_wp_error($response) ? $response->get_error_data()["status"] : $response->get_status()) );
    }

    protected function assertErrorResponse( $code, $response, $status ) {
        $this->assertTrue( is_wp_error( $response ) || $response->is_error() );
        $error = is_wp_error( $response ) ? $response : $response->as_error();
        $this->assertEquals( $code, $error->get_error_code() );
        $this->assertEquals( $status, $error->get_error_data()['status'] );
    }
}
