<?php
/**
 * Gallery Instagram Class.
 *
 * @package Chitramaya_Gallery
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Gallery_Instagram {

	/**
	 * Init function.
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_shortcode( 'chitramaya_instagram', array( $this, 'render_shortcode' ) );
	}

	/**
	 * Add settings page.
	 */
	public function add_settings_page() {
		add_submenu_page(
			'edit.php?post_type=chitramaya_gallery',
			esc_html__( 'Instagram Settings', 'chitramaya-gallery' ),
			esc_html__( 'Instagram Settings', 'chitramaya-gallery' ),
			'manage_options',
			'chitramaya-instagram-settings',
			array( $this, 'render_settings_page' )
		);
	}

	/**
	 * Register settings.
	 */
	public function register_settings() {
		register_setting( 'chitramaya_instagram_options', 'chitramaya_ig_access_token', array(
			'type'              => 'string',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => '',
		) );
	}

	/**
	 * Render settings page.
	 */
	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Instagram Settings', 'chitramaya-gallery' ); ?></h1>
			<p><?php esc_html_e( 'Enter your long-lived Instagram Graph API access token to enable the Instagram feed.', 'chitramaya-gallery' ); ?></p>
			<form action="options.php" method="post">
				<?php
				settings_fields( 'chitramaya_instagram_options' );
				do_settings_sections( 'chitramaya_instagram_options' );
				$token = get_option( 'chitramaya_ig_access_token' );
				?>
				<table class="form-table">
					<tr>
						<th scope="row"><label for="chitramaya_ig_access_token"><?php esc_html_e( 'Access Token', 'chitramaya-gallery' ); ?></label></th>
						<td>
							<input type="text" name="chitramaya_ig_access_token" id="chitramaya_ig_access_token" value="<?php echo esc_attr( $token ); ?>" class="regular-text">
						</td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

	/**
	 * Fetch feed.
	 *
	 * @return array
	 */
	private function fetch_feed() {
		$feed = get_transient( 'chitramaya_ig_feed' );
		if ( false !== $feed ) {
			return $feed;
		}

		$token = get_option( 'chitramaya_ig_access_token' );
		if ( empty( $token ) ) {
			return array();
		}

		$url = add_query_arg( array(
			'fields'       => 'id,media_url,permalink,caption,media_type',
			'access_token' => $token,
		), 'https://graph.instagram.com/me/media' );

		$response = wp_remote_get( esc_url_raw( $url ) );

		if ( is_wp_error( $response ) ) {
			return array();
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );

		if ( ! isset( $data['data'] ) ) {
			return array();
		}

		set_transient( 'chitramaya_ig_feed', $data['data'], 12 * HOUR_IN_SECONDS );

		return $data['data'];
	}

	/**
	 * Render shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	public function render_shortcode( $atts ) {
		$atts = shortcode_atts( array(
			'limit'   => 6,
			'columns' => 3,
		), $atts, 'chitramaya_instagram' );

		$limit   = intval( $atts['limit'] );
		$columns = intval( $atts['columns'] );
		$feed    = $this->fetch_feed();

		if ( empty( $feed ) ) {
			return '';
		}

		$feed = array_slice( $feed, 0, $limit );

		ob_start();
		?>
		<div class="chitramaya-instagram-feed" style="display: grid; grid-template-columns: repeat(<?php echo esc_attr( $columns ); ?>, 1fr); gap: 15px;">
			<?php foreach ( $feed as $item ) : ?>
				<?php if ( 'IMAGE' === $item['media_type'] || 'CAROUSEL_ALBUM' === $item['media_type'] ) : ?>
					<a href="<?php echo esc_url( $item['permalink'] ); ?>" target="_blank" rel="noopener noreferrer" class="ig-item" style="display: block; aspect-ratio: 1/1; overflow: hidden;">
						<img src="<?php echo esc_url( $item['media_url'] ); ?>" alt="<?php echo esc_attr( isset( $item['caption'] ) ? $item['caption'] : 'Instagram photo' ); ?>" style="width: 100%; height: 100%; object-fit: cover;">
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<?php
		return ob_get_clean();
	}
}
