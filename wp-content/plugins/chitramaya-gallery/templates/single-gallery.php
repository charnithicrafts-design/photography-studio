<?php
/**
 * Single Gallery Template.
 *
 * @package Chitramaya_Gallery
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_id        = get_the_ID();
$client_name    = get_post_meta( $post_id, '_gallery_client_name', true );
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
$photo_count = is_array( $photos ) ? count( $photos ) : 0;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<style>
		body {
			background-color: #0d0d0d;
			color: #e8e0d4;
			font-family: 'Inter', sans-serif;
			margin: 0;
			padding: 0;
		}
		.gallery-header {
			text-align: center;
			padding: 40px 20px;
			border-bottom: 1px solid rgba(200, 169, 126, 0.2);
		}
		.gallery-title {
			font-size: 2.5rem;
			color: #c8a97e;
			margin: 0 0 10px 0;
			font-weight: 300;
		}
		.gallery-meta {
			font-size: 1rem;
			color: rgba(232, 224, 212, 0.7);
		}
		.gallery-wrap {
			padding: 40px 20px;
			max-width: 1400px;
			margin: 0 auto;
		}
		/* Lightbox */
		.lightbox {
			display: none;
			position: fixed;
			z-index: 9999;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-color: rgba(13, 13, 13, 0.95);
			align-items: center;
			justify-content: center;
		}
		.lightbox.active {
			display: flex;
		}
		.lightbox img {
			max-height: 90vh;
			max-width: 90vw;
			object-fit: contain;
		}
		.lightbox-close, .lightbox-prev, .lightbox-next {
			position: absolute;
			background: none;
			border: none;
			color: #c8a97e;
			font-size: 2rem;
			cursor: pointer;
			padding: 20px;
			z-index: 10000;
		}
		.lightbox-close { top: 10px; right: 10px; }
		.lightbox-prev { left: 10px; top: 50%; transform: translateY(-50%); }
		.lightbox-next { right: 10px; top: 50%; transform: translateY(-50%); }
		.gallery-item {
			cursor: pointer;
		}
	</style>
</head>
<body <?php body_class(); ?>>
	<div class="gallery-header">
		<h1 class="gallery-title"><?php the_title(); ?></h1>
		<div class="gallery-meta">
			<?php if ( ! empty( $client_name ) ) : ?>
				<span class="client-name"><?php echo esc_html( $client_name ); ?></span> &bull; 
			<?php endif; ?>
			<span class="photo-count"><?php printf( _n( '%s Photo', '%s Photos', $photo_count, 'chitramaya-gallery' ), number_format_i18n( $photo_count ) ); ?></span>
		</div>
	</div>

	<div class="gallery-wrap">
		<div class="chitramaya-gallery-container layout-<?php echo esc_attr( $layout_type ); ?>" 
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
				<?php if ( is_array( $photos ) && ! empty( $photos ) ) : ?>
					<?php foreach ( $photos as $index => $photo ) : 
						$img_url = isset( $photo['url'] ) ? $photo['url'] : '';
						$caption = isset( $photo['caption'] ) ? $photo['caption'] : '';
						if ( empty( $img_url ) ) {
							continue;
						}
						?>
						<figure class="gallery-item" data-index="<?php echo esc_attr( $index ); ?>" data-src="<?php echo esc_url( $img_url ); ?>" style="<?php 
							if ( 'masonry' === $layout_type ) {
								echo 'break-inside: avoid; margin-bottom: 15px; margin-top: 0; margin-left: 0; margin-right: 0;';
							} elseif ( 'slider' === $layout_type ) {
								echo 'scroll-snap-align: start; flex: 0 0 auto; width: 100%; max-width: 600px; margin: 0;';
							} else {
								echo 'margin: 0;';
							}
						?>">
							<img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $caption ); ?>" style="width: 100%; height: auto; display: block; border-radius: 4px;">
							<?php if ( ! empty( $caption ) ) : ?>
								<figcaption style="padding-top: 8px; font-size: 0.85rem; color: #a0a0a0; text-align: center;"><?php echo esc_html( $caption ); ?></figcaption>
							<?php endif; ?>
						</figure>
					<?php endforeach; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'No photos found.', 'chitramaya-gallery' ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- Lightbox HTML -->
	<div class="lightbox" id="gallery-lightbox">
		<button class="lightbox-close" id="lightbox-close">&times;</button>
		<button class="lightbox-prev" id="lightbox-prev">&lsaquo;</button>
		<img src="" alt="" id="lightbox-img">
		<button class="lightbox-next" id="lightbox-next">&rsaquo;</button>
	</div>

	<?php wp_footer(); ?>
	
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		const items = document.querySelectorAll('.gallery-item');
		const lightbox = document.getElementById('gallery-lightbox');
		const lightboxImg = document.getElementById('lightbox-img');
		const closeBtn = document.getElementById('lightbox-close');
		const prevBtn = document.getElementById('lightbox-prev');
		const nextBtn = document.getElementById('lightbox-next');
		let currentIndex = 0;
		
		const photos = [];
		items.forEach((item, index) => {
			photos.push(item.dataset.src);
			item.addEventListener('click', () => {
				currentIndex = index;
				openLightbox();
			});
		});

		function openLightbox() {
			if (!photos.length) return;
			lightboxImg.src = photos[currentIndex];
			lightbox.classList.add('active');
			document.body.style.overflow = 'hidden';
		}

		function closeLightbox() {
			lightbox.classList.remove('active');
			document.body.style.overflow = '';
		}

		function showPrev() {
			currentIndex = (currentIndex > 0) ? currentIndex - 1 : photos.length - 1;
			lightboxImg.src = photos[currentIndex];
		}

		function showNext() {
			currentIndex = (currentIndex < photos.length - 1) ? currentIndex + 1 : 0;
			lightboxImg.src = photos[currentIndex];
		}

		closeBtn.addEventListener('click', closeLightbox);
		prevBtn.addEventListener('click', (e) => { e.stopPropagation(); showPrev(); });
		nextBtn.addEventListener('click', (e) => { e.stopPropagation(); showNext(); });
		lightbox.addEventListener('click', (e) => {
			if(e.target === lightbox) closeLightbox();
		});

		document.addEventListener('keydown', (e) => {
			if(!lightbox.classList.contains('active')) return;
			if(e.key === 'Escape') closeLightbox();
			if(e.key === 'ArrowLeft') showPrev();
			if(e.key === 'ArrowRight') showNext();
		});
	});
	</script>
</body>
</html>
