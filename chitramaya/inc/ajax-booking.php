<?php
// Handle AJAX Form Submission for Bookings
add_action('wp_ajax_nopriv_submit_chitramaya_booking', 'handle_chitramaya_booking_submission');
add_action('wp_ajax_submit_chitramaya_booking', 'handle_chitramaya_booking_submission');

function handle_chitramaya_booking_submission() {
    // 1. Verify Nonce for Security
    if ( ! isset( $_POST['booking_nonce'] ) || ! wp_verify_nonce( $_POST['booking_nonce'], 'chitramaya_booking_action' ) ) {
        wp_send_json_error( array( 'message' => 'Security verification failed. Please refresh and try again.' ) );
    }

    // 2. Sanitize Global Fields
    $type = sanitize_text_field($_POST['inquiry_type']); // 'brand' or 'individual'
    $name = sanitize_text_field($_POST['client_name']);
    $email = sanitize_email($_POST['client_email']);
    
    if ( empty($name) || empty($email) ) {
        wp_send_json_error( array( 'message' => 'Name and Email are strictly required.' ) );
    }

    // 3. Format beautiful HTML payload for the client's dashboard editor
    $content = "<h2>Inquiry Details</h2>";
    $content .= "<p><strong>Classification:</strong> " . ucfirst($type) . "</p>";
    $content .= "<p><strong>Email:</strong> <a href='mailto:" . esc_attr($email) . "'>" . esc_html($email) . "</a></p><hr/>";
    
    // 4. Sanitize Specific Flow Fields
    if ($type === 'brand') {
        $content .= "<p><strong>Brand Name:</strong> " . sanitize_text_field($_POST['brand_name']) . "</p>";
        $content .= "<p><strong>Project Category:</strong> " . sanitize_text_field($_POST['project_type']) . "</p>";
        $content .= "<p><strong>Desired Timeline:</strong> " . sanitize_text_field($_POST['timeline']) . "</p>";
    } else {
        $content .= "<p><strong>Event Type:</strong> " . sanitize_text_field($_POST['event_type']) . "</p>";
        $content .= "<p><strong>Event Date:</strong> " . sanitize_text_field($_POST['event_date']) . "</p>";
        $content .= "<p><strong>Location/Venue:</strong> " . sanitize_text_field($_POST['location']) . "</p>";
    }

    $post_title = $name . ' - ' . ucfirst($type) . ' Inquiry';
    
    // 5. Insert into Database as Private Post
    $post_id = wp_insert_post(array(
        'post_title'    => $post_title,
        'post_content'  => $content,
        'post_type'     => 'chitramaya_lead',
        'post_status'   => 'private', // Ensures it never leaks to public sitemaps
    ));

    if ( is_wp_error($post_id) ) {
        wp_send_json_error( array( 'message' => 'Database error. Our systems are currently unable to save the inquiry.' ) );
    }

    // (Optional Future Expansion: Trigger email using wp_mail to admin)

    wp_send_json_success( array( 'message' => 'Your inquiry has been secured. The studio will review and contact you shortly.' ) );
}
