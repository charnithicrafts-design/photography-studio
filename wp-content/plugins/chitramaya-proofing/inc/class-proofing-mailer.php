<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Proofing_Mailer {

	public function init() {
		// Hook into the proofing submission action
		add_action( 'chitramaya_proofing_submitted', array( $this, 'send_admin_notification' ), 10, 1 );
		add_action( 'chitramaya_proofing_reselection_requested', array( $this, 'send_reselection_notification' ), 10, 1 );
	}

	public function send_admin_notification( $post_id ) {
		$post = get_post( $post_id );
		if ( ! $post || $post->post_type !== 'proofing_session' ) {
			return;
		}

		$enabled = get_post_meta( $post->ID, '_proofing_enable_notifications', true );
		if ( ! $enabled ) {
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

	public function send_reselection_notification( $post_id ) {
		$post = get_post( $post_id );
		if ( ! $post || $post->post_type !== 'proofing_session' ) {
			return;
		}

		$enabled = get_post_meta( $post->ID, '_proofing_enable_notifications', true );
		if ( ! $enabled ) {
			return;
		}

		$client_name = get_post_meta( $post->ID, '_proofing_client_name', true );
		$admin_email = get_option( 'admin_email' );
		
		$subject = 'Reselection Requested: ' . $post->post_title;
		$message = "The client '{$client_name}' has requested a reselection for the proofing session '{$post->post_title}'.\n\n";
		$message .= "The session status has been set back to 'In Review'.\n";
		$message .= "You can view it in the WordPress dashboard:\n";
		$message .= get_edit_post_link( $post->ID, 'raw' );

		wp_mail( $admin_email, $subject, $message );
	}
}
