<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Gallery_Meta {
	public function init() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post_chitramaya_gallery', array( $this, 'save_meta' ) );
	}

	public function add_meta_boxes() {
		add_meta_box(
			'gallery_settings',
			__( 'Gallery Settings', 'chitramaya-gallery' ),
			array( $this, 'render_meta_box' ),
			'chitramaya_gallery',
			'normal',
			'high'
		);
	}

	public function render_meta_box( $post ) {
		wp_nonce_field( 'gallery_save_meta', 'gallery_meta_nonce' );

		$layout            = get_post_meta( $post->ID, '_gallery_layout', true ) ?: 'masonry';
		$client_name       = get_post_meta( $post->ID, '_gallery_client_name', true );
		$client_email      = get_post_meta( $post->ID, '_gallery_client_email', true );
		$access_type       = get_post_meta( $post->ID, '_gallery_access_type', true ) ?: 'public';
		
		$access_code       = get_post_meta( $post->ID, '_gallery_access_code', true );
		if ( empty( $access_code ) ) {
			$access_code = wp_generate_password( 8, false );
		}
		
		$disable_right_click = get_post_meta( $post->ID, '_gallery_disable_right_click', true );
		if ( $disable_right_click === '' ) {
			$disable_right_click = '1';
		}
		
		$disable_drag = get_post_meta( $post->ID, '_gallery_disable_drag', true );
		if ( $disable_drag === '' ) {
			$disable_drag = '1';
		}
		
		$columns = get_post_meta( $post->ID, '_gallery_columns', true ) ?: '3';

		?>
		<table class="form-table">
			<tr>
				<th><label for="gallery_layout"><?php esc_html_e( 'Gallery Layout', 'chitramaya-gallery' ); ?></label></th>
				<td>
					<select name="gallery_layout" id="gallery_layout">
						<option value="masonry" <?php selected( $layout, 'masonry' ); ?>><?php esc_html_e( 'Masonry', 'chitramaya-gallery' ); ?></option>
						<option value="grid" <?php selected( $layout, 'grid' ); ?>><?php esc_html_e( 'Grid', 'chitramaya-gallery' ); ?></option>
						<option value="slider" <?php selected( $layout, 'slider' ); ?>><?php esc_html_e( 'Slider', 'chitramaya-gallery' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="gallery_columns"><?php esc_html_e( 'Columns', 'chitramaya-gallery' ); ?></label></th>
				<td>
					<input type="number" name="gallery_columns" id="gallery_columns" value="<?php echo esc_attr( $columns ); ?>" min="2" max="6" />
				</td>
			</tr>
			<tr>
				<th><label for="gallery_client_name"><?php esc_html_e( 'Client Name', 'chitramaya-gallery' ); ?></label></th>
				<td>
					<input type="text" name="gallery_client_name" id="gallery_client_name" class="regular-text" value="<?php echo esc_attr( $client_name ); ?>" />
				</td>
			</tr>
			<tr>
				<th><label for="gallery_client_email"><?php esc_html_e( 'Client Email', 'chitramaya-gallery' ); ?></label></th>
				<td>
					<input type="email" name="gallery_client_email" id="gallery_client_email" class="regular-text" value="<?php echo esc_attr( $client_email ); ?>" />
				</td>
			</tr>
			<tr>
				<th><label for="gallery_access_type"><?php esc_html_e( 'Access Type', 'chitramaya-gallery' ); ?></label></th>
				<td>
					<select name="gallery_access_type" id="gallery_access_type">
						<option value="public" <?php selected( $access_type, 'public' ); ?>><?php esc_html_e( 'Public', 'chitramaya-gallery' ); ?></option>
						<option value="password" <?php selected( $access_type, 'password' ); ?>><?php esc_html_e( 'Password', 'chitramaya-gallery' ); ?></option>
						<option value="magic_link" <?php selected( $access_type, 'magic_link' ); ?>><?php esc_html_e( 'Magic Link', 'chitramaya-gallery' ); ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<th><label for="gallery_access_code"><?php esc_html_e( 'Access Code/Password', 'chitramaya-gallery' ); ?></label></th>
				<td>
					<input type="text" name="gallery_access_code" id="gallery_access_code" class="regular-text" value="<?php echo esc_attr( $access_code ); ?>" />
				</td>
			</tr>
			<?php if ( $post->post_status === 'publish' && $access_type === 'magic_link' ) : ?>
			<tr>
				<th><label><?php esc_html_e( 'Magic Link URL', 'chitramaya-gallery' ); ?></label></th>
				<td>
					<input type="text" class="regular-text" readonly value="<?php echo esc_url( add_query_arg( 'token', $access_code, get_permalink( $post->ID ) ) ); ?>" />
				</td>
			</tr>
			<?php endif; ?>
			<tr>
				<th><?php esc_html_e( 'Protection', 'chitramaya-gallery' ); ?></th>
				<td>
					<label>
						<input type="checkbox" name="gallery_disable_right_click" value="1" <?php checked( $disable_right_click, '1' ); ?> />
						<?php esc_html_e( 'Disable Right-Click', 'chitramaya-gallery' ); ?>
					</label><br>
					<label>
						<input type="checkbox" name="gallery_disable_drag" value="1" <?php checked( $disable_drag, '1' ); ?> />
						<?php esc_html_e( 'Disable Image Dragging', 'chitramaya-gallery' ); ?>
					</label>
				</td>
			</tr>
		</table>
		<?php
	}

	public function save_meta( $post_id ) {
		if ( ! isset( $_POST['gallery_meta_nonce'] ) || ! wp_verify_nonce( $_POST['gallery_meta_nonce'], 'gallery_save_meta' ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$fields = array(
			'gallery_layout'              => '_gallery_layout',
			'gallery_client_name'         => '_gallery_client_name',
			'gallery_client_email'        => '_gallery_client_email',
			'gallery_access_type'         => '_gallery_access_type',
			'gallery_access_code'         => '_gallery_access_code',
			'gallery_columns'             => '_gallery_columns',
		);

		foreach ( $fields as $post_key => $meta_key ) {
			if ( isset( $_POST[ $post_key ] ) ) {
				update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $post_key ] ) ) );
			}
		}

		$disable_right_click = isset( $_POST['gallery_disable_right_click'] ) ? '1' : '0';
		update_post_meta( $post_id, '_gallery_disable_right_click', $disable_right_click );

		$disable_drag = isset( $_POST['gallery_disable_drag'] ) ? '1' : '0';
		update_post_meta( $post_id, '_gallery_disable_drag', $disable_drag );
	}
}
