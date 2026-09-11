<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Proofing_API {

	public function init() {
		add_action( 'rest_api_init', array( $this, 'register_rest_routes' ) );
	}

	public function register_rest_routes() {
		register_rest_route( 'chitramaya/v1', '/proofing/save', array(
			'methods'             => 'POST',
			'callback'            => array( $this, 'api_save_proofing' ),
			'permission_callback' => '__return_true',
		) );

		register_rest_route( 'chitramaya/v1', '/proofing/submit', array(
			'methods'             => 'POST',
			'callback'            => array( $this, 'api_submit_proofing' ),
			'permission_callback' => '__return_true',
		) );

		register_rest_route( 'chitramaya/v1', '/proofing/reselect', array(
			'methods'             => 'POST',
			'callback'            => array( $this, 'api_reselect_proofing' ),
			'permission_callback' => '__return_true',
		) );

		register_rest_route( 'chitramaya/v1', '/proofing/session/(?P<id>\d+)', array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'api_get_session' ),
			'permission_callback' => '__return_true',
		) );

		// Desktop Sync App endpoint — authenticates via access code, returns selected filename stems
		register_rest_route( 'chitramaya/v1', '/proofing/sync', array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'api_sync_selections' ),
			'permission_callback' => '__return_true',
			'args'                => array(
				'code' => array(
					'required'          => true,
					'sanitize_callback' => 'sanitize_text_field',
				),
			),
		) );
	}

	private function validate_api_request( $request ) {
		$session_id = $request->get_param( 'session_id' ) ?: $request['id'];
		$token = $request->get_param( 'token' );

		if ( ! $session_id || ! $token ) {
			return new WP_Error( 'missing_params', 'Session ID and Token are required.', array( 'status' => 400 ) );
		}

		$post = get_post( $session_id );
		if ( ! $post || $post->post_type !== 'proofing_session' ) {
			return new WP_Error( 'invalid_session', 'Invalid session.', array( 'status' => 404 ) );
		}

		$saved_token = get_post_meta( $session_id, '_proofing_access_code', true );
		if ( $token !== $saved_token ) {
			return new WP_Error( 'invalid_token', 'Invalid access code.', array( 'status' => 401 ) );
		}

		return $post;
	}

	public function api_save_proofing( $request ) {
		$post = $this->validate_api_request( $request );
		if ( is_wp_error( $post ) ) return $post;

		$status = get_post_meta( $post->ID, '_proofing_status', true );
		if ( $status === 'submitted' ) {
			return new WP_Error( 'session_locked', 'This session has already been submitted and cannot be modified.', array( 'status' => 403 ) );
		}

		$photos = $request->get_param( 'photos' );
		if ( ! is_array( $photos ) ) {
			return new WP_Error( 'invalid_data', 'Photos data is missing or invalid.', array( 'status' => 400 ) );
		}

		// Sanitize photos
		$sanitized_photos = array();
		foreach ( $photos as $p ) {
			$sanitized_photos[] = array(
				'id'       => sanitize_text_field( $p['id'] ?? '' ),
				'filename' => sanitize_file_name( $p['filename'] ?? '' ),
				'url'      => esc_url_raw( $p['url'] ?? '' ),
				'status'   => sanitize_text_field( $p['status'] ?? 'unreviewed' ),
				'note'     => sanitize_textarea_field( $p['note'] ?? '' )
			);
		}

		update_post_meta( $post->ID, '_proofing_photos_json', wp_json_encode( $sanitized_photos ) );

		return rest_ensure_response( array( 'success' => true, 'timestamp' => time() ) );
	}

	public function api_submit_proofing( $request ) {
		$post = $this->validate_api_request( $request );
		if ( is_wp_error( $post ) ) return $post;

		$status = get_post_meta( $post->ID, '_proofing_status', true );
		if ( $status === 'submitted' ) {
			return rest_ensure_response( array( 'success' => true, 'message' => 'Already submitted.' ) );
		}

		update_post_meta( $post->ID, '_proofing_status', 'submitted' );

		// Fire an action so the Mailer class can handle it
		do_action( 'chitramaya_proofing_submitted', $post->ID );

		return rest_ensure_response( array( 'success' => true ) );
	}

	public function api_reselect_proofing( $request ) {
		$post = $this->validate_api_request( $request );
		if ( is_wp_error( $post ) ) return $post;

		$status = get_post_meta( $post->ID, '_proofing_status', true );
		if ( $status !== 'submitted' ) {
			return new WP_Error( 'not_submitted', 'Reselection can only be requested for submitted sessions.', array( 'status' => 400 ) );
		}

		update_post_meta( $post->ID, '_proofing_status', 'reselection_requested' );
		update_post_meta( $post->ID, '_proofing_last_reselection_request', time() );

		do_action( 'chitramaya_proofing_reselection_requested', $post->ID );

		return rest_ensure_response( array( 'success' => true ) );
	}

	public function api_get_session( $request ) {
		$post = $this->validate_api_request( $request );
		if ( is_wp_error( $post ) ) return $post;

		$photos_json = get_post_meta( $post->ID, '_proofing_photos_json', true );
		$photos = json_decode( $photos_json, true );
		if ( ! is_array( $photos ) ) $photos = array();

		$quota = (int) get_post_meta( $post->ID, '_proofing_quota', true );
		$status = get_post_meta( $post->ID, '_proofing_status', true );
		
		$selected_count = 0;
		foreach ( $photos as $p ) {
			if ( isset( $p['status'] ) && $p['status'] === 'selected' ) {
				$selected_count++;
			}
		}

		return rest_ensure_response( array(
			'id'             => $post->ID,
			'title'          => $post->post_title,
			'client_name'    => get_post_meta( $post->ID, '_proofing_client_name', true ),
			'quota'          => $quota,
			'status'         => $status,
			'total_count'    => count( $photos ),
			'selected_count' => $selected_count,
			'photos'         => $photos
		) );
	}

	/**
	 * Desktop Sync App endpoint.
	 *
	 * Looks up a proofing session by its access code (not session ID),
	 * and returns only the selected filename stems for local RAW matching.
	 */
	public function api_sync_selections( $request ) {
		$code = $request->get_param( 'code' );

		if ( empty( $code ) || strlen( $code ) < 4 ) {
			return new WP_Error(
				'invalid_code',
				'A valid access code is required.',
				array( 'status' => 400 )
			);
		}

		// Find the proofing session that owns this access code.
		$sessions = get_posts( array(
			'post_type'      => 'proofing_session',
			'posts_per_page' => 1,
			'post_status'    => 'publish',
			'meta_query'     => array(
				array(
					'key'   => '_proofing_access_code',
					'value' => $code,
				),
			),
		) );

		if ( empty( $sessions ) ) {
			return new WP_Error(
				'session_not_found',
				'No proofing session found for this access code.',
				array( 'status' => 404 )
			);
		}

		$post = $sessions[0];

		// Extract selected photos and strip extensions to produce filename stems.
		$photos_json = get_post_meta( $post->ID, '_proofing_photos_json', true );
		$photos      = json_decode( $photos_json, true );
		if ( ! is_array( $photos ) ) {
			$photos = array();
		}

		$selected_stems = array();
		foreach ( $photos as $p ) {
			if ( isset( $p['status'] ) && $p['status'] === 'selected' && ! empty( $p['filename'] ) ) {
				$info             = pathinfo( $p['filename'] );
				$selected_stems[] = $info['filename']; // stem only, no extension
			}
		}

		return rest_ensure_response( array(
			'session_title'      => $post->post_title,
			'client_name'        => get_post_meta( $post->ID, '_proofing_client_name', true ),
			'selected_count'     => count( $selected_stems ),
			'selected_filenames' => $selected_stems,
		) );
	}
}
