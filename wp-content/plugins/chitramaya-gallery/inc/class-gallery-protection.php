<?php
/**
 * Gallery Protection Class.
 *
 * @package Chitramaya_Gallery
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Gallery_Protection {

	/**
	 * Init function.
	 */
	public function init() {
		add_action( 'template_redirect', array( $this, 'check_access' ), 1 );
	}

	/**
	 * Check access.
	 */
	public function check_access() {
		if ( ! is_singular( 'chitramaya_gallery' ) ) {
			return;
		}

		$post_id     = get_the_ID();
		$access_type = get_post_meta( $post_id, '_gallery_access_type', true );
		$access_code = get_post_meta( $post_id, '_gallery_access_code', true );

		if ( 'public' === $access_type || empty( $access_type ) ) {
			return; // Allow access.
		}

		$cookie_name = 'chitramaya_gallery_access_' . $post_id;

		if ( 'password' === $access_type ) {
			if ( isset( $_POST['gallery_password'] ) && sanitize_text_field( wp_unslash( $_POST['gallery_password'] ) ) === $access_code ) {
				setcookie( $cookie_name, md5( $access_code ), time() + DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
				wp_safe_redirect( get_permalink( $post_id ) );
				exit;
			}

			if ( isset( $_COOKIE[ $cookie_name ] ) && md5( $access_code ) === $_COOKIE[ $cookie_name ] ) {
				return; // Allow access.
			}

			$this->load_access_gate( $access_type );
		}

		if ( 'magic_link' === $access_type ) {
			if ( isset( $_GET['token'] ) && sanitize_text_field( wp_unslash( $_GET['token'] ) ) === $access_code ) {
				setcookie( $cookie_name, md5( $access_code ), time() + DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
				wp_safe_redirect( remove_query_arg( 'token' ) );
				exit;
			}

			if ( isset( $_COOKIE[ $cookie_name ] ) && md5( $access_code ) === $_COOKIE[ $cookie_name ] ) {
				return; // Allow access.
			}

			$this->load_access_gate( $access_type );
		}
	}

	/**
	 * Load access gate template.
	 *
	 * @param string $access_type The access type.
	 */
	private function load_access_gate( $access_type ) {
		$template_path = plugin_dir_path( dirname( __FILE__ ) ) . 'templates/gallery-access-gate.php';
		if ( file_exists( $template_path ) ) {
			set_query_var( 'gallery_access_type', $access_type );
			load_template( $template_path );
			exit;
		}
	}
}
