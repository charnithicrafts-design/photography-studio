<?php
/**
 * External Asset Link Verifier
 * Adds a diagnostic tool under the Media tab to asynchronously verify external image URLs.
 */

// 1. Add Submenu Page under 'Media' (upload.php)
add_action('admin_menu', 'chitramaya_add_verifier_menu');
function chitramaya_add_verifier_menu() {
    add_submenu_page(
        'upload.php',
        'Asset Link Verifier',
        'Link Verifier',
        'manage_options',
        'chitramaya-image-verifier',
        'chitramaya_render_verifier_page'
    );
}

// 2. Render Page
function chitramaya_render_verifier_page() {
    if ( !current_user_can('manage_options') ) return;

    global $wpdb;
    // Sweep wp_postmeta for anything that looks like an external image URL
    $results = $wpdb->get_results("
        SELECT pm.post_id, pm.meta_key, pm.meta_value, p.post_title 
        FROM {$wpdb->postmeta} pm 
        JOIN {$wpdb->posts} p ON pm.post_id = p.ID 
        WHERE pm.meta_value LIKE 'http%' 
        AND p.post_status = 'publish' 
        AND (pm.meta_value LIKE '%.jpg%' OR pm.meta_value LIKE '%.png%' OR pm.meta_value LIKE '%.webp%' OR pm.meta_value LIKE '%unsplash%')
        ORDER BY p.post_title ASC
        LIMIT 200
    ");

    // Sweep Active Theme Files for Hardcoded URLs
    $theme_dir = get_stylesheet_directory();
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($theme_dir));
    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $content = file_get_contents($file->getPathname());
            if (preg_match_all('/https?:\/\/[^\s\'"]+(?:unsplash\.com|\.jpg|\.png|\.webp)[^\s\'"]*/i', $content, $matches)) {
                foreach ($matches[0] as $url) {
                    $url = esc_url_raw($url);
                    $obj = new stdClass();
                    $obj->post_id = 0;
                    $obj->post_title = 'Theme: ' . basename($file->getPathname());
                    $obj->meta_key = 'hardcoded_in_file';
                    $obj->meta_value = $url;
                    $obj->edit_link = admin_url('theme-editor.php?file=' . basename($file->getPathname()) . '&theme=' . get_stylesheet());
                    $results[] = $obj;
                }
            }
        }
    }
    
    // De-duplicate results by URL
    $unique_results = [];
    $seen = [];
    foreach ($results as $r) {
        if (!in_array($r->meta_value, $seen)) {
            $seen[] = $r->meta_value;
            // Give DB results standard edit link if not defined
            if (!isset($r->edit_link)) {
                $r->edit_link = get_edit_post_link($r->post_id);
            }
            $unique_results[] = $r;
        }
    }
    $results = $unique_results;
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">External Asset Link Verifier</h1>
        <p>This diagnostic tool scans your active Pages for external image links (like Unsplash placeholders or CDN assets in ACF) and verifies their HTTP status in real-time. This prevents broken images from reaching the frontend.</p>
        
        <style>
            .verifier-preview { width: 60px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; background: #f0f0f0; }
            .verifier-status { display: inline-flex; align-items: center; gap: 8px; font-weight: 600; }
            .status-ok { color: #00a32a; }
            .status-error { color: #d63638; }
            .verifier-url { width: 100%; font-family: monospace; font-size: 11px; padding: 4px 8px; color: #555; background: #f9f9f9; border: 1px solid #ddd; }
        </style>

        <table class="wp-list-table widefat fixed striped table-view-list">
            <thead>
                <tr>
                    <th style="width: 80px;">Preview</th>
                    <th>Image Asset URL</th>
                    <th>Source Page</th>
                    <th>Meta Key</th>
                    <th style="width: 140px;">HTTP Status</th>
                    <th style="width: 100px;">Action</th>
                </tr>
            </thead>
            <tbody id="verifier-table-body">
                <?php if(empty($results)): ?>
                    <tr><td colspan="6">No external links found in postmeta. Your media appears to be exclusively local.</td></tr>
                <?php else: ?>
                    <?php foreach($results as $index => $row): ?>
                        <tr class="verify-row" data-url="<?php echo esc_attr($row->meta_value); ?>">
                            <td>
                                <!-- We add a lazy loading and error fallback to the preview itself just in case -->
                                <img src="<?php echo esc_url($row->meta_value); ?>" class="verifier-preview" loading="lazy" onerror="this.style.display='none'">
                            </td>
                            <td><input type="text" class="verifier-url" readonly value="<?php echo esc_attr($row->meta_value); ?>" onclick="this.select();"></td>
                            <td><strong><a href="<?php echo esc_url($row->edit_link); ?>"><?php echo esc_html($row->post_title); ?></a></strong></td>
                            <td><code><?php echo esc_html($row->meta_key); ?></code></td>
                            <td class="status-cell">
                                <div class="verifier-status">
                                    <span class="spinner is-active" style="float:none; margin:0;"></span> <span>Scanning...</span>
                                </div>
                            </td>
                            <td><a href="<?php echo esc_url($row->edit_link); ?>" class="button button-small">Edit Code</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script>
    jQuery(document).ready(function($){
        // We use a small queue to prevent flooding the server with 200 AJAX requests instantly
        var queue = [];
        $('.verify-row').each(function(){
            queue.push($(this));
        });

        function processQueue() {
            if(queue.length === 0) return;
            var $row = queue.shift();
            var url = $row.data('url');
            var $statusCell = $row.find('.status-cell');
            
            $.post(ajaxurl, {
                action: 'chitramaya_verify_url',
                url: url
            }, function(response) {
                if(response.success) {
                    if(response.data.code == 200) {
                        $statusCell.html('<span class="verifier-status status-ok"><span class="dashicons dashicons-yes"></span> 200 OK</span>');
                    } else {
                        $statusCell.html('<span class="verifier-status status-error"><span class="dashicons dashicons-warning"></span> ' + response.data.code + ' Broken</span>');
                    }
                } else {
                    $statusCell.html('<span class="verifier-status status-error">Check Failed</span>');
                }
                processQueue(); // process next
            }).fail(function() {
                $statusCell.html('<span class="verifier-status status-error">Network Error</span>');
                processQueue(); // process next even if failed
            });
        }

        // Start processing 3 concurrently
        processQueue();
        processQueue();
        processQueue();
    });
    </script>
    <?php
}

// 3. AJAX Endpoint for Status Verification
add_action('wp_ajax_chitramaya_verify_url', 'chitramaya_ajax_verify_url');
function chitramaya_ajax_verify_url() {
    $url = isset($_POST['url']) ? esc_url_raw($_POST['url']) : '';
    if(empty($url)) {
        wp_send_json_error(['message' => 'No URL provided']);
    }
    
    // Attempt a lightweight HEAD request first
    $response = wp_remote_head($url, ['timeout' => 5, 'redirection' => 2]);
    
    // Some strict CDNs (like Imgix/Unsplash) reject HEAD requests with 403 or 405, or we hit a redirect limits.
    // If we get an error or a 4xx/5xx code, fallback to a standard GET request to be absolutely certain before marking it broken.
    if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) >= 400 ) {
        $response = wp_remote_get($url, ['timeout' => 7, 'redirection' => 2]);
    }
    
    if ( is_wp_error( $response ) ) {
        wp_send_json_success(['code' => 'Timeout']);
    } else {
        wp_send_json_success(['code' => wp_remote_retrieve_response_code( $response )]);
    }
}
