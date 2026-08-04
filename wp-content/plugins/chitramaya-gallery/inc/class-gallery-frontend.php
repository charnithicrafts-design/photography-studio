<?php
/**
 * Gallery Frontend Class.
 *
 * @package Chitramaya_Gallery
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Gallery_Frontend {

	/**
	 * Init function.
	 */
	public function init() {
		add_shortcode( 'chitramaya_gallery', array( $this, 'render_shortcode' ) );
		add_filter( 'template_include', array( $this, 'template_override' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Override template for single gallery.
	 *
	 * @param string $template The template path.
	 * @return string
	 */
	public function template_override( $template ) {
		if ( is_singular( 'chitramaya_gallery' ) ) {
			$custom_template = plugin_dir_path( dirname( __FILE__ ) ) . 'templates/single-gallery.php';
			if ( file_exists( $custom_template ) ) {
				return $custom_template;
			}
		}
		return $template;
	}

	/**
	 * Render shortcode.
	 *
	 * @param array $atts Shortcode attributes.
	 * @return string
	 */
	public function render_shortcode( $atts ) {
		$atts = shortcode_atts( array(
			'id' => 0,
		), $atts, 'chitramaya_gallery' );

		$post_id = intval( $atts['id'] );
		if ( ! $post_id || 'chitramaya_gallery' !== get_post_type( $post_id ) ) {
			return '';
		}

		$photos_json    = get_post_meta( $post_id, '_gallery_photos', true );
		$photos         = json_decode( $photos_json, true );
		$layout_type    = get_post_meta( $post_id, '_gallery_layout', true );
		$columns        = get_post_meta( $post_id, '_gallery_columns', true );
		$no_right_click = get_post_meta( $post_id, '_gallery_protection_right_click', true ) === 'yes' ? '1' : '0';
		$no_drag        = get_post_meta( $post_id, '_gallery_protection_drag', true ) === 'yes' ? '1' : '0';

		if ( empty( $layout_type ) ) {
			$layout_type = 'masonry';
		}
		if ( empty( $columns ) ) {
			$columns = '3';
		}

		if ( ! is_array( $photos ) || empty( $photos ) ) {
			return '<p>' . esc_html__( 'No photos found in this gallery.', 'chitramaya-gallery' ) . '</p>';
		}

		$classes = 'chitramaya-gallery-container layout-' . esc_attr( $layout_type );

		ob_start();
		?>
		<div class="<?php echo esc_attr( $classes ); ?>" 
			data-layout="<?php echo esc_attr( $layout_type ); ?>" 
			data-columns="<?php echo esc_attr( $columns ); ?>" 
			data-no-right-click="<?php echo esc_attr( $no_right_click ); ?>" 
			data-no-drag="<?php echo esc_attr( $no_drag ); ?>">
			
			<div class="chitramaya-gallery-inner" style="<?php 
				if ( 'grid' === $layout_type || 'masonry' === $layout_type ) {
					if ( 'grid' === $layout_type ) {
						echo 'display: grid; grid-template-columns: repeat(' . esc_attr( $columns ) . ', 1fr); gap: 15px;';
					} else {
						echo 'column-count: ' . esc_attr( $columns ) . '; column-gap: 15px;';
					}
				} elseif ( 'slider' === $layout_type ) {
					echo 'display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: 15px;';
				}
			?>">
				<?php foreach ( $photos as $photo ) : 
					$img_url = isset( $photo['url'] ) ? $photo['url'] : '';
					$caption = isset( $photo['caption'] ) ? $photo['caption'] : '';
					if ( empty( $img_url ) ) {
						continue;
					}
					?>
					<figure class="gallery-item" style="<?php 
						if ( 'masonry' === $layout_type ) {
							echo 'break-inside: avoid; margin-bottom: 15px;';
						} elseif ( 'slider' === $layout_type ) {
							echo 'scroll-snap-align: start; flex: 0 0 auto; width: 100%; max-width: 600px;';
						}
					?>">
						<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $caption ); ?>" style="width: 100%; height: auto; display: block;">
						<?php if ( ! empty( $caption ) ) : ?>
							<figcaption><?php echo esc_html( $caption ); ?></figcaption>
						<?php endif; ?>
					</figure>
				<?php endforeach; ?>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Enqueue assets.
	 */
	public function enqueue_assets() {
		if ( is_singular( 'chitramaya_gallery' ) ) {
			wp_enqueue_style( 'chitramaya-gallery-css', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/css/gallery.css', array(), '1.0.0' );
			wp_enqueue_script( 'chitramaya-gallery-protection', plugin_dir_url( dirname( __FILE__ ) ) . 'assets/js/gallery-protection.js', array(), '1.0.0', true );
		}
	}
}
