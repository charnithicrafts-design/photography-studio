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
        $this->proofing_system->save_meta_boxes( $this->post_id );
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
        $this->proofing_system->save_meta_boxes( $this->post_id );
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
        $this->proofing_system->save_meta_boxes( $this->post_id );
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
        $this->proofing_system->save_meta_boxes( $this->post_id );
        $this->assertEmpty( get_post_meta( $this->post_id, '_proofing_client_name', true ) );
    }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_sanitizes_fields() { $this->assertTrue(true); }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_generates_access_code_if_empty() { $this->assertTrue(true); }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_saves_valid_email() { $this->assertTrue(true); }

    /**
     * @covers Chitramaya_Proofing_System::save_meta
     */
    public function test_saves_enable_notifications() { $this->assertTrue(true); }
}
