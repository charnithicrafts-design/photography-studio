<?php
/**
 * Test Mailer
 */
class MailerTest extends WP_UnitTestCase {

    protected $post_id;
    protected $mailer;
    protected $mail_data;

    public function setUp(): void {
        parent::setUp();
        $this->post_id = $this->factory()->post->create( [
            'post_type'  => 'proofing_session',
            'post_title' => 'Test Session Mail'
        ] );
        
        $this->mailer = new Chitramaya_Proofing_Mailer();
        $this->mail_data = null;
        
        add_filter( 'wp_mail', [ $this, 'mock_wp_mail' ] );
    }

    public function tearDown(): void {
        remove_filter( 'wp_mail', [ $this, 'mock_wp_mail' ] );
        parent::tearDown();
    }

    public function mock_wp_mail( $args ) {
        $this->mail_data = $args;
        return false; // Prevent actual sending
    }

    /**
     * @covers Chitramaya_Proofing_Mailer::send_admin_notification
     */
    public function test_notification_sent_on_submit() {
        $this->mailer->send_admin_notification( $this->post_id );
        
        $this->assertNotNull( $this->mail_data, 'wp_mail was not called.' );
        $this->assertEquals( get_option( 'admin_email' ), $this->mail_data['to'] );
    }

    /**
     * @covers Chitramaya_Proofing_Mailer::send_admin_notification
     */
    public function test_notification_contains_session_title() {
        $this->mailer->send_admin_notification( $this->post_id );
        
        $this->assertNotNull( $this->mail_data );
        $this->assertStringContainsString( 'Test Session Mail', $this->mail_data['subject'] );
    }

    /**
     * @covers Chitramaya_Proofing_Mailer::send_admin_notification
     */
    public function test_notification_contains_edit_link() {
        $this->mailer->send_admin_notification( $this->post_id );
        
        $edit_link = get_edit_post_link( $this->post_id, 'raw' );
        $this->assertNotNull( $this->mail_data );
        $this->assertStringContainsString( $edit_link, $this->mail_data['message'] );
    }

    /**
     * @covers Chitramaya_Proofing_Mailer::send_admin_notification
     */
    public function test_notification_skipped_for_wrong_post_type() {
        $post_id = $this->factory()->post->create( [
            'post_type'  => 'post',
            'post_title' => 'Regular Post'
        ] );
        
        $this->mailer->send_admin_notification( $post_id );
        $this->assertNull( $this->mail_data, 'wp_mail should not have been called.' );
    }
}
