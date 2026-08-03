<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;
$post_id = $post->ID;

// Validate access code
$access_code = get_post_meta( $post_id, '_proofing_access_code', true );
$cookie_name = 'chitramaya_proofing_' . $post_id;
$is_authenticated = false;
$token = '';

if ( isset( $_GET['token'] ) && $_GET['token'] === $access_code ) {
	$is_authenticated = true;
	$token = sanitize_text_field( $_GET['token'] );
	// Set cookie for 30 days
	setcookie( $cookie_name, $token, time() + ( 86400 * 30 ), '/' );
} elseif ( isset( $_COOKIE[ $cookie_name ] ) && $_COOKIE[ $cookie_name ] === $access_code ) {
	$is_authenticated = true;
	$token = sanitize_text_field( $_COOKIE[ $cookie_name ] );
} elseif ( isset( $_POST['access_code'] ) && sanitize_text_field( $_POST['access_code'] ) === $access_code ) {
	$is_authenticated = true;
	$token = sanitize_text_field( $_POST['access_code'] );
	setcookie( $cookie_name, $token, time() + ( 86400 * 30 ), '/' );
	// Redirect to avoid form resubmission
	wp_redirect( get_permalink( $post_id ) );
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo esc_html( $post->post_title ); ?> - Chithramaya Photo Proofing</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;600&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo esc_url( CHITRAMAYA_PROOFING_URL . 'assets/css/proofing.css' ); ?>">
</head>
<body>

<?php if ( ! $is_authenticated ) : ?>
	<div class="login-wrapper">
		<div class="login-card">
			<h1>Enter Your Access Code</h1>
			<p>Please enter the 8-character access code provided by your photographer.</p>
			<form method="POST">
				<input type="text" name="access_code" class="login-input" placeholder="e.g. A1B2C3D4" required autocomplete="off">
				<button type="submit" class="btn" style="width: 100%;">View Photos</button>
			</form>
		</div>
	</div>
<?php else : ?>

	<div class="app-container" id="app">
		<!-- Header -->
		<header class="header">
			<div class="header-logo">CHITHRAMAYA CREATIVES</div>
			<div class="header-title"><?php echo esc_html( $post->post_title ); ?></div>
			<button class="btn" id="btn-submit-modal" disabled>Submit Selection</button>
		</header>

		<!-- Progress Bar -->
		<div class="progress-bar-container" id="progress-container">
			<div class="progress-text">
				<span id="progress-status">Loading session data...</span>
				<span id="progress-percent">0%</span>
			</div>
			<div class="progress-track">
				<div class="progress-fill" id="progress-fill" style="width: 0%"></div>
			</div>
		</div>

		<!-- Controls -->
		<div class="controls-bar" id="controls-bar">
			<div class="filter-tabs" id="filter-tabs">
				<button class="filter-tab active" data-filter="all">All</button>
				<button class="filter-tab" data-filter="selected">Selected</button>
				<button class="filter-tab" data-filter="rejected">Rejected</button>
				<button class="filter-tab" data-filter="unreviewed">Unreviewed</button>
			</div>
			<div class="mode-switcher">
				<button class="mode-btn active" data-mode="grid">Grid (G)</button>
				<button class="mode-btn" data-mode="focus">Focus (F)</button>
			</div>
		</div>

		<!-- Grid Mode -->
		<div class="grid-container" id="grid-view"></div>

		<!-- Focus Mode -->
		<div class="focus-container" id="focus-view">
			<div class="focus-image-wrapper" id="focus-image-wrapper">
				<!-- Images injected via JS -->
			</div>
			<div class="focus-toolbar">
				<div class="focus-actions">
					<div id="focus-counter" style="color: var(--text-dim); font-size: 0.875rem;"></div>
					<div class="action-btns">
						<button class="action-btn btn-undo" id="btn-undo">Undo (U)</button>
						<button class="action-btn btn-reject" id="btn-reject">✕ Reject (R)</button>
						<button class="action-btn btn-select" id="btn-select">✓ Select (S)</button>
					</div>
					<div class="nav-btns" style="display: flex; gap: 8px;">
						<button class="btn-outline" id="btn-prev" style="padding: 8px 16px;">←</button>
						<button class="btn-outline" id="btn-next" style="padding: 8px 16px;">→</button>
					</div>
				</div>
				<textarea class="focus-note" id="focus-note" placeholder="Add a note for this photo (optional)..."></textarea>
			</div>
		</div>
	</div>

	<!-- Submit Modal -->
	<div class="modal-overlay" id="submit-modal">
		<div class="modal-content">
			<h2 class="modal-title">Review & Submit</h2>
			<p class="modal-text" id="modal-summary"></p>
			<div class="modal-grid" id="modal-grid"></div>
			<div class="modal-actions">
				<button class="btn-outline" id="btn-modal-cancel">Cancel</button>
				<button class="btn" id="btn-modal-confirm">Confirm & Submit</button>
			</div>
		</div>
	</div>

	<div class="submitted-overlay" id="submitted-overlay">
		<h1>Thank You!</h1>
		<p style="color: var(--text-dim); font-size: 1.25rem;">Your selection has been successfully submitted to Chithramaya Creatives.</p>
	</div>

	<div class="saving-indicator" id="saving-indicator">Saving...</div>

	<script>
		// Setup configuration for external JS
		window.ChitramayaProofing = {
			API_URL: '<?php echo esc_url( rest_url( 'chitramaya/v1/proofing' ) ); ?>',
			SESSION_ID: <?php echo intval( $post_id ); ?>,
			TOKEN: '<?php echo esc_js( $token ); ?>'
		};
	</script>
	<script src="<?php echo esc_url( CHITRAMAYA_PROOFING_URL . 'assets/js/proofing-engine.js' ); ?>"></script>

<?php endif; ?>
</body>
</html>
