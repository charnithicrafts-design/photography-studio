<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Chitramaya_Proofing_Uploader {

	public function init() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'wp_ajax_chitramaya_upload_photo', array( $this, 'ajax_upload_photo' ) );
		add_action( 'wp_ajax_chitramaya_scan_directory', array( $this, 'ajax_scan_directory' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	public function add_meta_box() {
		add_meta_box(
			'proofing_session_upload',
			__( 'Upload Proofing Photos', 'chitramaya-proofing' ),
			array( $this, 'render_meta_box' ),
			'proofing_session',
			'normal',
			'default'
		);
	}

	public function render_meta_box( $post ) {
		$upload_dir = wp_upload_dir();
		$session_dir = $upload_dir['basedir'] . '/proofing-sessions/' . $post->ID;
		$upload_nonce = wp_create_nonce( 'upload_photo_nonce' );
		$scan_nonce   = wp_create_nonce( 'scan_dir_nonce' );
		?>
		<style>
			#proofing-drop-zone {
				border: 2px dashed #c3c4c7;
				border-radius: 6px;
				padding: 32px 20px;
				text-align: center;
				cursor: pointer;
				background: #f9f9f9;
				transition: background 0.2s, border-color 0.2s;
				margin-bottom: 12px;
			}
			#proofing-drop-zone.dragover { background: #e8f0fe; border-color: #2271b1; }
			#proofing-drop-zone p { margin: 6px 0; color: #646970; font-size: 13px; }
			#proofing-drop-zone .drop-icon { font-size: 36px; margin-bottom: 8px; }
			#proofing-upload-progress { display: none; margin-top: 10px; }
			#proofing-upload-bar-wrap { background: #e0e0e0; border-radius: 4px; height: 8px; margin-top: 6px; overflow: hidden; }
			#proofing-upload-bar { height: 100%; background: #2271b1; width: 0%; transition: width 0.2s; }
			#proofing-upload-status { font-size: 12px; color: #646970; margin-top: 4px; }
			#proofing-thumb-strip { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 10px; }
			#proofing-thumb-strip img { width: 64px; height: 64px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
		</style>

		<div id="proofing-drop-zone">
			<div class="drop-icon">📸</div>
			<p><strong>Drag &amp; drop photos here</strong> to upload</p>
			<p>or <label for="proofing-file-input" style="color:#2271b1;cursor:pointer;">click to browse files</label></p>
			<p style="font-size:11px;">Accepted: .jpg, .jpeg, .png, .webp (Auto-converts to optimized WebP in your browser!)</p>
			<input type="file" id="proofing-file-input" accept=".jpg,.jpeg,.png,.webp" multiple style="display:none;">
		</div>

		<div id="proofing-upload-progress">
			<div id="proofing-upload-bar-wrap"><div id="proofing-upload-bar"></div></div>
			<div id="proofing-upload-status">Uploading 0 / 0...</div>
		</div>

		<div id="proofing-thumb-strip"></div>

		<hr style="margin: 16px 0;">
		<p style="margin-bottom: 6px;">Or upload via FTP to <code><?php echo esc_html( $session_dir ); ?></code> and scan:</p>
		<button type="button" class="button" id="proofing-scan-btn"
			data-post_id="<?php echo esc_attr( $post->ID ); ?>"
			data-nonce="<?php echo esc_attr( $scan_nonce ); ?>">Scan Directory</button>
		<span id="proofing-scan-result" style="margin-left: 10px;"></span>
		<p id="proofing-photo-count" class="description" style="margin-top:6px;">
			<?php
			$photos_json = get_post_meta( $post->ID, '_proofing_photos_json', true );
			$photos = json_decode( $photos_json, true );
			$count = is_array( $photos ) ? count( $photos ) : 0;
			echo esc_html( $count ) . ' photo(s) currently in session.';
			?>
		</p>

		<input type="hidden" id="proofing-upload-nonce" value="<?php echo esc_attr( $upload_nonce ); ?>">
		<input type="hidden" id="proofing-post-id" value="<?php echo esc_attr( $post->ID ); ?>">
		<?php
	}

	public function admin_scripts( $hook ) {
		global $post_type;
		if ( $post_type === 'proofing_session' ) {
			add_action( 'admin_footer', array( $this, 'client_side_optimization_js' ) );
		}
	}

	public function client_side_optimization_js() {
		?>
		<script src="https://cdn.jsdelivr.net/npm/browser-image-compression@2.0.2/dist/browser-image-compression.js"></script>
		<script>
		jQuery(document).ready(function($) {

			// --- Scan Directory (no page reload) ---
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
						if (response.data.total !== undefined) {
							$('#proofing-photo-count').text(response.data.total + ' photo(s) currently in session.');
						}
					} else {
						$('#proofing-scan-result').css('color', 'red').text(response.data.message || 'Error scanning directory');
					}
				});
			});

			// --- Client-Side Browser Image Optimization & Upload ---
			var dropZone    = $('#proofing-drop-zone');
			var fileInput   = $('#proofing-file-input');
			var uploadNonce = $('#proofing-upload-nonce').val();
			var postId      = $('#proofing-post-id').val();
			var maxDim      = 2048; // Max width/height for proofing

			dropZone.on('click', function(e) { 
				if (e.target.id !== 'proofing-file-input' && e.target.tagName !== 'LABEL') {
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
				
				$('#proofing-upload-progress').show();
				updateBar(0, total);

				// Process sequentially via high-quality Web Worker
				for (var i = 0; i < files.length; i++) {
					var file = files[i];
					$('#proofing-upload-status').text('Optimizing ' + file.name + '...');
					
					try {
						// Use browser-image-compression (preserves EXIF, rotation, multi-step scaling)
						var options = {
							maxSizeMB: 1.5,
							maxWidthOrHeight: maxDim,
							useWebWorker: true,
							fileType: 'image/webp',
							initialQuality: 0.95
						};
						
						var optimizedBlob = await imageCompression(file, options);
						var originalName = file.name.replace(/\.[^/.]+$/, "") + ".webp";
						var optimizedFile = new File([optimizedBlob], originalName, { type: 'image/webp' });
						
						$('#proofing-upload-status').text('Uploading ' + (done+1) + ' / ' + total + '...');
						await uploadFile(optimizedFile);
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
					fd.append('action',  'chitramaya_upload_photo');
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
								$('#proofing-thumb-strip').append($('<img>').attr({src: res.data.url, title: res.data.filename}));
								$('#proofing-photo-count').text(res.data.total_count + ' photo(s) currently in session.');
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
				$('#proofing-upload-bar').css('width', pct + '%');
				$('#proofing-upload-status').text('Uploading ' + done + ' / ' + total + '...');
			}

			function finishUpload(errors) {
				$('#proofing-upload-bar').css('width', '100%');
				if (errors.length) {
					$('#proofing-upload-status').css('color','red').text('Done with errors: ' + errors.join('; '));
				} else {
					$('#proofing-upload-status').css('color','green').text('All files optimized and uploaded successfully!');
					setTimeout(function() { $('#proofing-upload-progress').fadeOut(); }, 3000);
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
		$session_dir = $upload_dir['basedir'] . '/proofing-sessions/' . $post_id;
		$session_url = $upload_dir['baseurl'] . '/proofing-sessions/' . $post_id;

		if ( ! file_exists( $session_dir ) ) wp_mkdir_p( $session_dir );

		$overrider = function( $dirs ) use ( $session_dir, $session_url ) {
			$dirs['path']   = $session_dir;
			$dirs['url']    = $session_url;
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

		$photos_json = get_post_meta( $post_id, '_proofing_photos_json', true );
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
				'status'   => 'unreviewed',
				'note'     => '',
			);
			update_post_meta( $post_id, '_proofing_photos_json', wp_json_encode( $existing ) );
		}

		wp_send_json_success( array( 'filename' => $filename, 'url' => $url, 'total_count' => count( $existing ) ) );
	}

	public function ajax_scan_directory() {
		check_ajax_referer( 'scan_dir_nonce', 'nonce' );
		if ( ! current_user_can( 'edit_posts' ) ) wp_send_json_error( array( 'message' => 'Permission denied.' ) );
		
		$post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0;
		if ( ! $post_id ) wp_send_json_error( array( 'message' => 'Invalid post ID.' ) );

		$upload_dir = wp_upload_dir();
		$session_dir = $upload_dir['basedir'] . '/proofing-sessions/' . $post_id;
		$session_url = $upload_dir['baseurl'] . '/proofing-sessions/' . $post_id;

		if ( ! file_exists( $session_dir ) ) wp_mkdir_p( $session_dir );

		$files = glob( $session_dir . '/*.{jpg,jpeg,png,webp}', GLOB_BRACE );
		$photos_json = get_post_meta( $post_id, '_proofing_photos_json', true );
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
						'url'      => $session_url . '/' . $filename,
						'status'   => 'unreviewed',
						'note'     => ''
					);
					$added_count++;
				}
			}
		}

		update_post_meta( $post_id, '_proofing_photos_json', wp_json_encode( $new_photos ) );
		wp_send_json_success( array(
			'message' => sprintf( 'Found %d files. %d new files added.', count( $files ), $added_count ),
			'total'   => count( $new_photos ),
		) );
	}
}
