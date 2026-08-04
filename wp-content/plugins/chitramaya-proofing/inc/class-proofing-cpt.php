<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Proofing_System {

	public function init() {
		add_action( 'init', array( $this, 'register_cpt' ) );
		add_action( 'admin_menu', array( $this, 'add_office_dashboard' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post_proofing_session', array( $this, 'save_meta_boxes' ) );
		add_filter( 'template_include', array( $this, 'template_override' ) );
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

	public function add_office_dashboard() {
		add_submenu_page(
			'edit.php?post_type=proofing_session',
			'Office Dashboard',
			'Office Dashboard',
			'edit_posts',
			'proofing-office-dashboard',
			array( $this, 'render_office_dashboard' )
		);
	}

	public function render_office_dashboard() {
		$sessions = get_posts( array(
			'post_type'      => 'proofing_session',
			'posts_per_page' => 50,
			'post_status'    => 'any',
		) );

		echo '<div class="wrap">';
		echo '<h1>' . esc_html__( 'Office Dashboard', 'chitramaya-proofing' ) . '</h1>';
		echo '<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">';

		foreach ( $sessions as $session ) {
			$client_name = get_post_meta( $session->ID, '_proofing_client_name', true );
			$status = get_post_meta( $session->ID, '_proofing_status', true );
			$quota = get_post_meta( $session->ID, '_proofing_quota', true );
			
			$photos_json = get_post_meta( $session->ID, '_proofing_photos_json', true );
			$photos = json_decode( $photos_json, true );
			if ( ! is_array( $photos ) ) $photos = array();

			$selected_photos = array_filter( $photos, function( $p ) { return isset( $p['status'] ) && $p['status'] === 'selected'; } );
			$selected_count = count( $selected_photos );

			$status_label = 'In Review';
			$status_color = '#f0ad4e';
			if ( $status === 'submitted' ) {
				$status_label = 'Submitted';
				$status_color = '#5cb85c';
			} elseif ( $status === 'reselection_requested' || (get_post_meta( $session->ID, '_proofing_last_reselection_request', true ) && $status === 'in_review') ) {
				$status_label = 'Reselection Requested';
				$status_color = '#d9534f';
			}

			echo '<div style="background: #fff; border: 1px solid #ccd0d4; border-radius: 4px; padding: 15px; box-shadow: 0 1px 1px rgba(0,0,0,.04);">';
			
			// Header
			echo '<div style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">';
			echo '<h3 style="margin: 0 0 5px 0;">' . esc_html( $session->post_title ) . '</h3>';
			echo '<p style="margin: 0; color: #666;"><strong>Client:</strong> ' . esc_html( $client_name ) . '</p>';
			echo '</div>';

			// Badges
			echo '<div style="margin-bottom: 15px;">';
			echo '<span style="background: ' . esc_attr( $status_color ) . '; color: #fff; padding: 3px 8px; border-radius: 3px; font-size: 12px; font-weight: bold; margin-right: 10px;">' . esc_html( $status_label ) . '</span>';
			echo '<span style="background: #e5e5e5; color: #333; padding: 3px 8px; border-radius: 3px; font-size: 12px; font-weight: bold;">' . esc_html( $selected_count ) . ' of ' . esc_html( $quota ) . ' selected</span>';
			echo '</div>';

			// Photos grid
			echo '<div style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 5px; margin-bottom: 15px;">';
			$i = 0;
			foreach ( $selected_photos as $photo ) {
				if ( $i < 10 ) {
					echo '<img src="' . esc_url( $photo['url'] ) . '" style="width: 100%; height: 40px; object-fit: cover; border-radius: 2px;">';
				}
				$i++;
			}
			echo '</div>';
			if ( $selected_count > 10 ) {
				echo '<p style="font-size: 12px; color: #666; margin-top: -10px; margin-bottom: 15px;">+' . ( $selected_count - 10 ) . ' more</p>';
			}

			// Footer
			echo '<div>';
			echo '<a href="' . esc_url( get_edit_post_link( $session->ID ) ) . '" class="button button-primary">Edit Session</a>';
			echo '</div>';

			echo '</div>';
		}

		echo '</div>';
		echo '</div>';
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

		$enable_notifications = get_post_meta( $post->ID, '_proofing_enable_notifications', true );
		if ( $enable_notifications === '' ) $enable_notifications = 1;

		$last_reselect = get_post_meta( $post->ID, '_proofing_last_reselection_request', true );
		if ( $last_reselect ) {
			$date = date_i18n( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $last_reselect );
			echo '<div class="notice notice-warning inline" style="margin-top: 10px; margin-bottom: 10px;"><p>⚠️ Client requested reselection on <strong>' . esc_html( $date ) . '</strong></p></div>';
		}

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
						<option value="reselection_requested" <?php selected( $status, 'reselection_requested' ); ?>><?php _e( 'Reselection Requested', 'chitramaya-proofing' ); ?></option>
						<option value="submitted" <?php selected( $status, 'submitted' ); ?>><?php _e( 'Submitted', 'chitramaya-proofing' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="_proofing_enable_notifications"><?php _e( 'Notifications', 'chitramaya-proofing' ); ?></label></th>
				<td>
					<label>
						<input type="checkbox" id="_proofing_enable_notifications" name="_proofing_enable_notifications" value="1" <?php checked( $enable_notifications, 1 ); ?>>
						<?php _e( 'Enable Email Notifications', 'chitramaya-proofing' ); ?>
					</label>
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
						<textarea id="lr_filter_string" style="width: 100%; height: 80px; background: transparent; color: #00ff66; border: none; font-family: monospace; resize: none; user-select: text;" title="Click to select all, then copy"><?php echo esc_textarea( $lr_string ); ?></textarea>
					</div>
					<button type="button" class="button button-secondary" style="margin-top: 10px;" onclick="var copyText = document.getElementById('lr_filter_string'); copyText.select(); document.execCommand('copy'); alert('Copied!');">Copy to Clipboard</button>
					<p class="description">Paste this in Lightroom's text search (Any Searchable Field, Contains All) to filter selected photos.</p>
				</td>
			</tr>
		</table>
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

		if ( isset( $_POST['_proofing_enable_notifications'] ) ) {
			update_post_meta( $post_id, '_proofing_enable_notifications', 1 );
		} else {
			update_post_meta( $post_id, '_proofing_enable_notifications', 0 );
		}
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
