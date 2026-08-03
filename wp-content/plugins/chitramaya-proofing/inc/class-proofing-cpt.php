<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Proofing_System {

	public function init() {
		add_action( 'init', array( $this, 'register_cpt' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post_proofing_session', array( $this, 'save_meta_boxes' ) );
		add_action( 'rest_api_init', array( $this, 'register_rest_routes' ) );
		add_filter( 'template_include', array( $this, 'template_override' ) );
		add_action( 'wp_ajax_chitramaya_scan_directory', array( $this, 'ajax_scan_directory' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	public function register_cpt() {
		$labels = array(
			'name'                  => _x( 'Proofing Sessions', 'Post type general name', 'chitramaya-proofing' ),
			'singular_name'         => _x( 'Proofing Session', 'Post type singular name', 'chitramaya-proofing' ),
			'menu_name'             => _x( 'Proofing', 'Admin Menu text', 'chitramaya-proofing' ),
			'name_admin_bar'        => _x( 'Proofing Session', 'Add New on Toolbar', 'chitramaya-proofing' ),
			'add_new'               => __( 'Add New', 'chitramaya-proofing' ),
			'add_new_item'          => __( 'Add New Proofing Session', 'chitramaya-proofing' ),
			'new_item'              => __( 'New Proofing Session', 'chitramaya-proofing' ),
			'edit_item'             => __( 'Edit Proofing Session', 'chitramaya-proofing' ),
			'view_item'             => __( 'View Proofing Session', 'chitramaya-proofing' ),
			'all_items'             => __( 'All Sessions', 'chitramaya-proofing' ),
			'search_items'          => __( 'Search Sessions', 'chitramaya-proofing' ),
			'not_found'             => __( 'No sessions found.', 'chitramaya-proofing' ),
			'not_found_in_trash'    => __( 'No sessions found in Trash.', 'chitramaya-proofing' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'proofing-session' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-images-alt2',
			'supports'           => array( 'title', 'thumbnail' ),
			'show_in_rest'       => true,
			'exclude_from_search'=> true,
		);

		register_post_type( 'proofing_session', $args );
	}

	public function add_meta_boxes() {
		add_meta_box(
			'proofing_session_config',
			__( 'Proofing Session Configuration', 'chitramaya-proofing' ),
			array( $this, 'render_config_meta_box' ),
			'proofing_session',
			'normal',
			'high'
		);
		add_meta_box(
			'proofing_session_upload',
			__( 'Upload Proofing Photos', 'chitramaya-proofing' ),
			array( $this, 'render_upload_meta_box' ),
			'proofing_session',
			'normal',
			'default'
		);
	}

	public function render_config_meta_box( $post ) {
		wp_nonce_field( 'proofing_save_meta', 'proofing_meta_nonce' );

		$client_name = get_post_meta( $post->ID, '_proofing_client_name', true );
		$client_email = get_post_meta( $post->ID, '_proofing_client_email', true );
		
		$access_code = get_post_meta( $post->ID, '_proofing_access_code', true );
		if ( empty( $access_code ) ) {
			$access_code = wp_generate_password( 8, false );
		}

		$quota = get_post_meta( $post->ID, '_proofing_quota', true );
		if ( $quota === '' ) $quota = 30;

		$status = get_post_meta( $post->ID, '_proofing_status', true );
		if ( empty( $status ) ) $status = 'in_review';

		$photos_json = get_post_meta( $post->ID, '_proofing_photos_json', true );
		$photos = json_decode( $photos_json, true );
		if ( ! is_array( $photos ) ) $photos = array();

		$total_photos = count( $photos );
		$selected_photos = array_filter( $photos, function( $p ) { return isset($p['status']) && $p['status'] === 'selected'; } );
		$selected_count = count( $selected_photos );
		
		$selected_filenames = array_map( function( $p ) {
			$info = pathinfo( $p['filename'] );
			return $info['filename'];
		}, $selected_photos );
		
		$lr_string = implode( ' ', $selected_filenames );

		$magic_link = home_url( '/proofing-session/' . $post->post_name . '/?token=' . $access_code );

		?>
		<table class="form-table">
			<tr>
				<th><label for="_proofing_client_name"><?php _e( 'Client Name', 'chitramaya-proofing' ); ?></label></th>
				<td><input type="text" id="_proofing_client_name" name="_proofing_client_name" value="<?php echo esc_attr( $client_name ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="_proofing_client_email"><?php _e( 'Client Email', 'chitramaya-proofing' ); ?></label></th>
				<td><input type="email" id="_proofing_client_email" name="_proofing_client_email" value="<?php echo esc_attr( $client_email ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="_proofing_access_code"><?php _e( 'Access Code', 'chitramaya-proofing' ); ?></label></th>
				<td><input type="text" id="_proofing_access_code" name="_proofing_access_code" value="<?php echo esc_attr( $access_code ); ?>" class="regular-text"></td>
			</tr>
			<tr>
				<th><label for="_proofing_quota"><?php _e( 'Quota', 'chitramaya-proofing' ); ?></label></th>
				<td><input type="number" id="_proofing_quota" name="_proofing_quota" value="<?php echo esc_attr( $quota ); ?>" class="small-text"> photos</td>
			</tr>
			<tr>
				<th><label for="_proofing_status"><?php _e( 'Status', 'chitramaya-proofing' ); ?></label></th>
				<td>
					<select id="_proofing_status" name="_proofing_status">
						<option value="in_review" <?php selected( $status, 'in_review' ); ?>><?php _e( 'In Review', 'chitramaya-proofing' ); ?></option>
						<option value="submitted" <?php selected( $status, 'submitted' ); ?>><?php _e( 'Submitted', 'chitramaya-proofing' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th><?php _e( 'Stats', 'chitramaya-proofing' ); ?></th>
				<td>
					<p><strong><?php echo esc_html( $selected_count ); ?></strong> selected of <strong><?php echo esc_html( $total_photos ); ?></strong> total (Quota: <?php echo esc_html( $quota ); ?>)</p>
				</td>
			</tr>
			<tr>
				<th><?php _e( 'Magic Link', 'chitramaya-proofing' ); ?></th>
				<td>
					<?php if ( $post->post_status === 'publish' ) : ?>
						<input type="text" readonly value="<?php echo esc_url( $magic_link ); ?>" class="large-text" style="background: #f0f0f1; cursor: pointer;" onclick="this.select();">
						<p class="description">Copy this link and send it to the client.</p>
					<?php else : ?>
						<p class="description">Publish the post to generate a magic link.</p>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th><?php _e( 'Lightroom Filter String', 'chitramaya-proofing' ); ?></th>
				<td>
					<div style="background: #1e1e1e; padding: 10px; border-radius: 4px; position: relative;">
						<textarea readonly id="lr_filter_string" style="width: 100%; height: 80px; background: transparent; color: #00ff66; border: none; font-family: monospace; resize: none;"><?php echo esc_textarea( $lr_string ); ?></textarea>
					</div>
					<button type="button" class="button button-secondary" style="margin-top: 10px;" onclick="var copyText = document.getElementById('lr_filter_string'); copyText.select(); document.execCommand('copy'); alert('Copied!');">Copy to Clipboard</button>
					<p class="description">Paste this in Lightroom's text search (Any Searchable Field, Contains All) to filter selected photos.</p>
				</td>
			</tr>
		</table>
		<?php
	}

	public function render_upload_meta_box( $post ) {
		$upload_dir = wp_upload_dir();
		$session_dir = $upload_dir['basedir'] . '/proofing-sessions/' . $post->ID;
		$session_url = $upload_dir['baseurl'] . '/proofing-sessions/' . $post->ID;
		
		?>
		<div id="proofing-scan-area">
			<p>Upload photos via FTP to: <code><?php echo esc_html( $session_dir ); ?></code></p>
			<button type="button" class="button button-primary" id="proofing-scan-btn" data-post_id="<?php echo esc_attr( $post->ID ); ?>" data-nonce="<?php echo wp_create_nonce('scan_dir_nonce'); ?>">Scan Directory</button>
			<span id="proofing-scan-result" style="margin-left: 10px;"></span>
		</div>
		<p class="description">Currently handles bulk upload by reading from the session folder. Click Scan to update the database with new photos found in the folder.</p>
		<?php
	}

	public function save_meta_boxes( $post_id ) {
		if ( ! isset( $_POST['proofing_meta_nonce'] ) || ! wp_verify_nonce( $_POST['proofing_meta_nonce'], 'proofing_save_meta' ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$fields = array(
			'_proofing_client_name'  => 'sanitize_text_field',
			'_proofing_client_email' => 'sanitize_email',
			'_proofing_access_code'  => 'sanitize_text_field',
			'_proofing_quota'        => 'intval',
			'_proofing_status'       => 'sanitize_text_field'
		);

		foreach ( $fields as $field => $callback ) {
			if ( isset( $_POST[ $field ] ) ) {
				update_post_meta( $post_id, $field, call_user_func( $callback, $_POST[ $field ] ) );
			}
		}
	}

	public function admin_scripts( $hook ) {
		global $post_type;
		if ( $post_type === 'proofing_session' ) {
			add_action( 'admin_footer', array( $this, 'scan_directory_js' ) );
		}
	}

	public function scan_directory_js() {
		?>
		<script>
		jQuery(document).ready(function($) {
			$('#proofing-scan-btn').on('click', function(e) {
				e.preventDefault();
				var btn = $(this);
				var post_id = btn.data('post_id');
				var nonce = btn.data('nonce');
				btn.prop('disabled', true).text('Scanning...');
				$('#proofing-scan-result').text('');

				$.post(ajaxurl, {
					action: 'chitramaya_scan_directory',
					post_id: post_id,
					nonce: nonce
				}, function(response) {
					btn.prop('disabled', false).text('Scan Directory');
					if (response.success) {
						$('#proofing-scan-result').css('color', 'green').text(response.data.message);
						setTimeout(function(){ location.reload(); }, 1500);
					} else {
						$('#proofing-scan-result').css('color', 'red').text(response.data.message || 'Error scanning directory');
					}
				});
			});
		});
		</script>
		<?php
	}

	public function ajax_scan_directory() {
		check_ajax_referer( 'scan_dir_nonce', 'nonce' );
		
		if ( ! current_user_can( 'edit_posts' ) ) {
			wp_send_json_error( array( 'message' => 'Permission denied.' ) );
		}

		$post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
		if ( ! $post_id ) {
			wp_send_json_error( array( 'message' => 'Invalid post ID.' ) );
		}

		$upload_dir = wp_upload_dir();
		$session_dir = $upload_dir['basedir'] . '/proofing-sessions/' . $post_id;
		$session_url = $upload_dir['baseurl'] . '/proofing-sessions/' . $post_id;

		if ( ! file_exists( $session_dir ) ) {
			wp_mkdir_p( $session_dir );
		}

		$files = glob( $session_dir . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE );
		
		$photos_json = get_post_meta( $post_id, '_proofing_photos_json', true );
		$existing_photos = json_decode( $photos_json, true );
		if ( ! is_array( $existing_photos ) ) $existing_photos = array();

		$existing_map = array();
		foreach ( $existing_photos as $p ) {
			if ( isset( $p['filename'] ) ) {
				$existing_map[ $p['filename'] ] = $p;
			}
		}

		$new_photos = array();
		$added_count = 0;

		if ( $files ) {
			foreach ( $files as $file ) {
				$filename = basename( $file );
				if ( isset( $existing_map[ $filename ] ) ) {
					$new_photos[] = $existing_map[ $filename ];
				} else {
					$new_photos[] = array(
						'id'       => md5( $filename . time() ),
						'filename' => $filename,
						'url'      => $session_url . '/' . $filename,
						'status'   => 'unreviewed', // selected, rejected, unreviewed
						'note'     => ''
					);
					$added_count++;
				}
			}
		}

		update_post_meta( $post_id, '_proofing_photos_json', wp_json_encode( $new_photos ) );

		wp_send_json_success( array( 'message' => sprintf( 'Found %d files. %d new files added.', count( $files ), $added_count ) ) );
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

		register_rest_route( 'chitramaya/v1', '/proofing/session/(?P<id>\d+)', array(
			'methods'             => 'GET',
			'callback'            => array( $this, 'api_get_session' ),
			'permission_callback' => '__return_true',
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

		// Send email to admin
		$client_name = get_post_meta( $post->ID, '_proofing_client_name', true );
		$admin_email = get_option( 'admin_email' );
		$subject = 'Proofing Submitted: ' . $post->post_title;
		$message = "The proofing session '{$post->post_title}' for client '{$client_name}' has been submitted.\n\n";
		$message .= "You can view the final selection in the WordPress dashboard:\n";
		$message .= get_edit_post_link( $post->ID, 'raw' );

		wp_mail( $admin_email, $subject, $message );

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

	public function template_override( $template ) {
		if ( is_singular( 'proofing_session' ) ) {
			$custom_template = CHITRAMAYA_PROOFING_PATH . 'templates/single-proofing.php';
			if ( file_exists( $custom_template ) ) {
				return $custom_template;
			}
		}
		return $template;
	}
}
