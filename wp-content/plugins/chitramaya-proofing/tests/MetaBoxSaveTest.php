<?php

class MetaBoxSaveTest extends WP_UnitTestCase {
    private $post_id;
    private $proofing_system;

    public function setUp(): void {
        parent::setUp();
        $this->proofing_system = new Chitramaya_Proofing_System();
        $this->post_id = $this->factory()->post->create( [ 'post_type' => 'proofing_session' ] );
        wp_set_current_user( $this->factory()->user->create( [ 'role' => 'administrator' ] ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_fails_without_nonce() {
        $_POST = [ '_proofing_client_name' => 'John Doe' ];
        $this->proofing_system->save_meta( $this->post_id );
        $this->assertEmpty( get_post_meta( $this->post_id, '_proofing_client_name', true ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_fails_with_invalid_nonce() {
        $_POST = [
            'proofing_meta_nonce' => 'invalid',
            '_proofing_client_name' => 'John Doe'
        ];
        $this->proofing_system->save_meta( $this->post_id );
        $this->assertEmpty( get_post_meta( $this->post_id, '_proofing_client_name', true ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_skips_on_autosave() {
        if ( ! defined( 'DOING_AUTOSAVE' ) ) {
            define( 'DOING_AUTOSAVE', true );
        }
        $_POST = [
            'proofing_meta_nonce' => wp_create_nonce( 'proofing_save_meta' ),
            '_proofing_client_name' => 'John Doe'
        ];
        $this->proofing_system->save_meta( $this->post_id );
        $this->assertEmpty( get_post_meta( $this->post_id, '_proofing_client_name', true ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_fails_without_permission() {
        wp_set_current_user( $this->factory()->user->create( [ 'role' => 'subscriber' ] ) );
        $_POST = [
            'proofing_meta_nonce' => wp_create_nonce( 'proofing_save_meta' ),
            '_proofing_client_name' => 'John Doe'
        ];
        $this->proofing_system->save_meta( $this->post_id );
        $this->assertEmpty( get_post_meta( $this->post_id, '_proofing_client_name', true ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_sanitizes_fields() {
        $_POST = [
            'proofing_meta_nonce' => wp_create_nonce( 'proofing_save_meta' ),
            '_proofing_client_name' => '<b>John Doe</b>',
            '_proofing_client_email' => 'invalid-email',
            '_proofing_access_code' => ' CODE123 ',
            '_proofing_quota' => '10abc',
            '_proofing_status' => 'pending'
        ];
        $this->proofing_system->save_meta( $this->post_id );
        
        $this->assertEquals( 'John Doe', get_post_meta( $this->post_id, '_proofing_client_name', true ) );
        $this->assertEmpty( get_post_meta( $this->post_id, '_proofing_client_email', true ) );
        $this->assertEquals( 'CODE123', get_post_meta( $this->post_id, '_proofing_access_code', true ) );
        $this->assertEquals( 10, (int) get_post_meta( $this->post_id, '_proofing_quota', true ) );
        $this->assertEquals( 'pending', get_post_meta( $this->post_id, '_proofing_status', true ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_generates_access_code_if_empty() {
        $_POST = [
            'proofing_meta_nonce' => wp_create_nonce( 'proofing_save_meta' ),
            '_proofing_access_code' => ''
        ];
        $this->proofing_system->save_meta( $this->post_id );
        $this->assertNotEmpty( get_post_meta( $this->post_id, '_proofing_access_code', true ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_saves_valid_email() {
        $_POST = [
            'proofing_meta_nonce' => wp_create_nonce( 'proofing_save_meta' ),
            '_proofing_client_email' => 'test@example.com'
        ];
        $this->proofing_system->save_meta( $this->post_id );
        $this->assertEquals( 'test@example.com', get_post_meta( $this->post_id, '_proofing_client_email', true ) );
    }
}
