<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Proofing_Mailer {

	public function init() {
		// Hook into the proofing submission action
		add_action( 'chitramaya_proofing_submitted', array( $this, 'send_admin_notification' ), 10, 1 );
	}

	public function send_admin_notification( $post_id ) {
		$post = get_post( $post_id );
		if ( ! $post || $post->post_type !== 'proofing_session' ) {
			return;
		}

		$client_name = get_post_meta( $post->ID, '_proofing_client_name', true );
		$admin_email = get_option( 'admin_email' );
		
		$subject = 'Proofing Submitted: ' . $post->post_title;
		$message = "The proofing session '{$post->post_title}' for client '{$client_name}' has been submitted.\n\n";
		$message .= "You can view the final selection in the WordPress dashboard:\n";
		$message .= get_edit_post_link( $post->ID, 'raw' );

		wp_mail( $admin_email, $subject, $message );
	}
}
