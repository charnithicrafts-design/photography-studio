<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Gallery_Uploader {

	public function init() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'wp_ajax_chitramaya_gallery_upload_photo', array( $this, 'ajax_upload_photo' ) );
		add_action( 'wp_ajax_chitramaya_gallery_scan_directory', array( $this, 'ajax_scan_directory' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	public function add_meta_box() {
		add_meta_box(
			'gallery_upload',
			__( 'Upload Gallery Photos', 'chitramaya-gallery' ),
			array( $this, 'render_meta_box' ),
			'chitramaya_gallery',
			'normal',
			'default'
		);
	}

	public function render_meta_box( $post ) {
		$upload_dir  = wp_upload_dir();
		$gallery_dir = $upload_dir['basedir'] . '/gallery-photos/' . $post->ID;
		$upload_nonce = wp_create_nonce( 'upload_photo_nonce' );
		$scan_nonce   = wp_create_nonce( 'scan_dir_nonce' );
		?>
		<style>
			#gallery-drop-zone {
				border: 2px dashed #c3c4c7;
				border-radius: 6px;
				padding: 32px 20px;
				text-align: center;
				cursor: pointer;
				background: #f9f9f9;
				transition: background 0.2s, border-color 0.2s;
				margin-bottom: 12px;
			}
			#gallery-drop-zone.dragover { background: #e8f0fe; border-color: #2271b1; }
			#gallery-drop-zone p { margin: 6px 0; color: #646970; font-size: 13px; }
			#gallery-drop-zone .drop-icon { font-size: 36px; margin-bottom: 8px; }
			#gallery-upload-progress { display: none; margin-top: 10px; }
			#gallery-upload-bar-wrap { background: #e0e0e0; border-radius: 4px; height: 8px; margin-top: 6px; overflow: hidden; }
			#gallery-upload-bar { height: 100%; background: #2271b1; width: 0%; transition: width 0.2s; }
			#gallery-upload-status { font-size: 12px; color: #646970; margin-top: 4px; }
			
			/* Thumbnail Grid with Drag handle hint */
			#gallery-thumb-strip { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; }
			.gallery-thumb-wrap { position: relative; width: 100px; height: 100px; }
			.gallery-thumb-wrap img { width: 100%; height: 100%; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
			.gallery-drag-handle { 
				position: absolute; top: 4px; right: 4px; background: rgba(255,255,255,0.8); 
				border-radius: 3px; cursor: move; padding: 2px 4px; font-size: 12px; 
			}
		</style>

		<div id="gallery-drop-zone">
			<div class="drop-icon">📸</div>
			<p><strong>Drag &amp; drop photos here</strong> to upload</p>
			<p>or <label for="gallery-file-input" style="color:#2271b1;cursor:pointer;">click to browse files</label></p>
			<p style="font-size:11px;">Accepted: .jpg, .jpeg, .png, .webp (Auto-converts to optimized WebP in your browser!)</p>
			<input type="file" id="gallery-file-input" accept=".jpg,.jpeg,.png,.webp" multiple style="display:none;">
		</div>

		<div id="gallery-upload-progress">
			<div id="gallery-upload-bar-wrap"><div id="gallery-upload-bar"></div></div>
			<div id="gallery-upload-status">Uploading 0 / 0...</div>
		</div>

		<div id="gallery-thumb-strip">
			<?php
			$photos_json = get_post_meta( $post->ID, '_gallery_photos_json', true );
			$photos = json_decode( $photos_json, true );
			if ( is_array( $photos ) ) {
				foreach ( $photos as $photo ) {
					echo '<div class="gallery-thumb-wrap">';
					echo '<span class="gallery-drag-handle" title="Drag to reorder">☰</span>';
					echo '<img src="' . esc_url( $photo['url'] ) . '" title="' . esc_attr( $photo['filename'] ) . '">';
					echo '</div>';
				}
			}
			?>
		</div>

		<hr style="margin: 16px 0;">
		<p style="margin-bottom: 6px;">Or upload via FTP to <code><?php echo esc_html( $gallery_dir ); ?></code> and scan:</p>
		<button type="button" class="button" id="gallery-scan-btn"
			data-post_id="<?php echo esc_attr( $post->ID ); ?>"
			data-nonce="<?php echo esc_attr( $scan_nonce ); ?>">Scan Directory</button>
		<span id="gallery-scan-result" style="margin-left: 10px;"></span>
		<p id="gallery-photo-count" class="description" style="margin-top:6px;">
			<?php
			$count = is_array( $photos ) ? count( $photos ) : 0;
			echo esc_html( $count ) . ' photo(s) currently in gallery.';
			?>
		</p>

		<input type="hidden" id="gallery-upload-nonce" value="<?php echo esc_attr( $upload_nonce ); ?>">
		<input type="hidden" id="gallery-post-id" value="<?php echo esc_attr( $post->ID ); ?>">
		<?php
	}

	public function admin_scripts( $hook ) {
		global $post_type;
		if ( $post_type === 'chitramaya_gallery' ) {
			add_action( 'admin_footer', array( $this, 'client_side_optimization_js' ) );
		}
	}

	public function client_side_optimization_js() {
		// Include JSquash from proofing plugin if it exists
		$proofing_path = WP_PLUGIN_DIR . '/chitramaya-proofing/chitramaya-proofing.php';
		$has_optimizer = file_exists( $proofing_path );
		if ( $has_optimizer ) {
			$module_url = plugins_url( 'assets/js/dist/optimizer.mjs', $proofing_path );
			?>
			<script type="module" src="<?php echo esc_url( $module_url ); ?>"></script>
			<?php
		}
		?>
		<script>
		jQuery(document).ready(function($) {
			var hasOptimizer = <?php echo $has_optimizer ? 'true' : 'false'; ?>;

			// --- Scan Directory (no page reload) ---
			$('#gallery-scan-btn').on('click', function(e) {
				e.preventDefault();
				var btn = $(this);
				var post_id = btn.data('post_id');
				var nonce = btn.data('nonce');
				btn.prop('disabled', true).text('Scanning...');
				$('#gallery-scan-result').text('');

				$.post(ajaxurl, {
					action: 'chitramaya_gallery_scan_directory',
					post_id: post_id,
					nonce: nonce
				}, function(response) {
					btn.prop('disabled', false).text('Scan Directory');
					if (response.success) {
						$('#gallery-scan-result').css('color', 'green').text(response.data.message);
						if (response.data.total !== undefined) {
							$('#gallery-photo-count').text(response.data.total + ' photo(s) currently in gallery.');
						}
						location.reload(); // Refresh to see thumbnails
					} else {
						$('#gallery-scan-result').css('color', 'red').text(response.data.message || 'Error scanning directory');
					}
				});
			});

			// --- Client-Side Browser Image Optimization & Upload ---
			var dropZone    = $('#gallery-drop-zone');
			var fileInput   = $('#gallery-file-input');
			var uploadNonce = $('#gallery-upload-nonce').val();
			var postId      = $('#gallery-post-id').val();

			dropZone.on('click', function(e) { 
				if (e.target.id !== 'gallery-file-input' && e.target.tagName !== 'LABEL') {
					fileInput.trigger('click'); 
				}
			});
			fileInput.on('change', function() { processFiles(this.files); });

			dropZone.on('dragover dragenter', function(e) {
				e.preventDefault();
				$(this).addClass('dragover');
			}).on('dragleave drop', function(e) {
				e.preventDefault();
				$(this).removeClass('dragover');
				if (e.type === 'drop') processFiles(e.originalEvent.dataTransfer.files);
			});

			async function processFiles(files) {
				if (!files || !files.length) return;
				var total = files.length;
				var done = 0;
				var errors = [];
				
				$('#gallery-upload-progress').show();
				updateBar(0, total);

				for (var i = 0; i < files.length; i++) {
					var file = files[i];
					$('#gallery-upload-status').text('Processing ' + file.name + '...');
					
					try {
						var fileToUpload = file;
						if (hasOptimizer && file.type.match(/image\/(jpeg|png|webp)/i)) {
							// Wait for the ES module to load and attach jsquashCompress
							if (typeof window.jsquashCompress !== 'function') {
								await new Promise(r => setTimeout(r, 1000));
							}
							if (typeof window.jsquashCompress === 'function') {
								var optimizedBlob = await window.jsquashCompress(file, function(statusText) {
									$('#gallery-upload-status').text(statusText + ' (' + file.name + ')');
								});
								var originalName = file.name.replace(/\.[^/.]+$/, "") + ".webp";
								fileToUpload = new File([optimizedBlob], originalName, { type: 'image/webp' });
							}
						}
						
						$('#gallery-upload-status').text('Uploading ' + (done+1) + ' / ' + total + '...');
						await uploadFile(fileToUpload);
						done++;
						updateBar(done, total);
					} catch (err) {
						done++;
						errors.push(file.name + ': ' + err.message);
						updateBar(done, total);
					}
				}

				finishUpload(errors);
			}

			function uploadFile(file) {
				return new Promise((resolve, reject) => {
					var fd = new FormData();
					fd.append('action',  'chitramaya_gallery_upload_photo');
					fd.append('nonce',   uploadNonce);
					fd.append('post_id', postId);
					fd.append('photo',   file);

					$.ajax({
						url: ajaxurl,
						type: 'POST',
						data: fd,
						processData: false,
						contentType: false,
						success: function(res) {
							if (res.success) {
								var thumbHtml = '<div class="gallery-thumb-wrap">' +
									'<span class="gallery-drag-handle" title="Drag to reorder">☰</span>' +
									'<img src="' + res.data.url + '" title="' + res.data.filename + '">' +
									'</div>';
								$('#gallery-thumb-strip').append(thumbHtml);
								$('#gallery-photo-count').text(res.data.total_count + ' photo(s) currently in gallery.');
								resolve(res);
							} else {
								reject(new Error(res.data.message || 'Upload failed'));
							}
						},
						error: function() { reject(new Error('Server error')); }
					});
				});
			}

			function updateBar(done, total) {
				var pct = total > 0 ? Math.round((done / total) * 100) : 0;
				$('#gallery-upload-bar').css('width', pct + '%');
				$('#gallery-upload-status').text('Uploading ' + done + ' / ' + total + '...');
			}

			function finishUpload(errors) {
				$('#gallery-upload-bar').css('width', '100%');
				if (errors.length) {
					$('#gallery-upload-status').css('color','red').text('Done with errors: ' + errors.join('; '));
				} else {
					$('#gallery-upload-status').css('color','green').text('All files processed and uploaded successfully!');
					setTimeout(function() { $('#gallery-upload-progress').fadeOut(); }, 3000);
				}
				fileInput.val('');
			}

		});
		</script>
		<?php
	}

	public function ajax_upload_photo() {
		check_ajax_referer( 'upload_photo_nonce', 'nonce' );
		if ( ! current_user_can( 'edit_posts' ) ) wp_send_json_error( array( 'message' => 'Permission denied.' ) );
		
		$post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
		if ( ! $post_id ) wp_send_json_error( array( 'message' => 'Invalid post ID.' ) );
		if ( empty( $_FILES['photo'] ) ) wp_send_json_error( array( 'message' => 'No file received.' ) );

		$upload_dir  = wp_upload_dir();
		$gallery_dir = $upload_dir['basedir'] . '/gallery-photos/' . $post_id;
		$gallery_url = $upload_dir['baseurl'] . '/gallery-photos/' . $post_id;

		if ( ! file_exists( $gallery_dir ) ) wp_mkdir_p( $gallery_dir );

		$overrider = function( $dirs ) use ( $gallery_dir, $gallery_url ) {
			$dirs['path']   = $gallery_dir;
			$dirs['url']    = $gallery_url;
			$dirs['subdir'] = '';
			return $dirs;
		};
		add_filter( 'upload_dir', $overrider );

		$overrides = array(
			'test_form'   => false,
			'mimes'       => array( 'webp' => 'image/webp', 'jpg|jpeg' => 'image/jpeg', 'png' => 'image/png' ),
		);

		$file = $_FILES['photo'];
		$result = wp_handle_upload( $file, $overrides );
		remove_filter( 'upload_dir', $overrider );

		if ( isset( $result['error'] ) ) wp_send_json_error( array( 'message' => $result['error'] ) );

		$filename = basename( $result['file'] );
		$url      = $result['url'];

		$photos_json = get_post_meta( $post_id, '_gallery_photos_json', true );
		$existing    = json_decode( $photos_json, true );
		if ( ! is_array( $existing ) ) $existing = array();

		$existing_map = array();
		foreach ( $existing as $p ) {
			if ( isset( $p['filename'] ) ) $existing_map[ $p['filename'] ] = true;
		}

		if ( ! isset( $existing_map[ $filename ] ) ) {
			$existing[] = array(
				'id'       => md5( $filename . time() ),
				'filename' => $filename,
				'url'      => $url,
				'caption'  => '',
			);
			update_post_meta( $post_id, '_gallery_photos_json', wp_json_encode( $existing ) );
		}

		wp_send_json_success( array( 'filename' => $filename, 'url' => $url, 'total_count' => count( $existing ) ) );
	}

	public function ajax_scan_directory() {
		check_ajax_referer( 'scan_dir_nonce', 'nonce' );
		if ( ! current_user_can( 'edit_posts' ) ) wp_send_json_error( array( 'message' => 'Permission denied.' ) );
		
		$post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
		if ( ! $post_id ) wp_send_json_error( array( 'message' => 'Invalid post ID.' ) );

		$upload_dir = wp_upload_dir();
		$gallery_dir = $upload_dir['basedir'] . '/gallery-photos/' . $post_id;
		$gallery_url = $upload_dir['baseurl'] . '/gallery-photos/' . $post_id;

		if ( ! file_exists( $gallery_dir ) ) wp_mkdir_p( $gallery_dir );

		$files = glob( $gallery_dir . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE );
		$photos_json = get_post_meta( $post_id, '_gallery_photos_json', true );
		$existing_photos = json_decode( $photos_json, true );
		if ( ! is_array( $existing_photos ) ) $existing_photos = array();

		$existing_map = array();
		foreach ( $existing_photos as $p ) {
			if ( isset( $p['filename'] ) ) $existing_map[ $p['filename'] ] = $p;
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
						'url'      => $gallery_url . '/' . $filename,
						'caption'  => '',
					);
					$added_count++;
				}
			}
		}

		update_post_meta( $post_id, '_gallery_photos_json', wp_json_encode( $new_photos ) );
		wp_send_json_success( array(
			'message' => sprintf( 'Found %d files. %d new files added.', count( $files ), $added_count ),
			'total'   => count( $new_photos ),
		) );
	}
}
