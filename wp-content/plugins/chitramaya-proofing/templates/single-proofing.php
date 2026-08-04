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
	setcookie( $cookie_name, $token, time() + ( 86400 * 30 ), '/' );
} elseif ( isset( $_COOKIE[ $cookie_name ] ) && $_COOKIE[ $cookie_name ] === $access_code ) {
	$is_authenticated = true;
	$token = sanitize_text_field( $_COOKIE[ $cookie_name ] );
} elseif ( isset( $_POST['access_code'] ) && sanitize_text_field( $_POST['access_code'] ) === $access_code ) {
	$is_authenticated = true;
	$token = sanitize_text_field( $_POST['access_code'] );
	setcookie( $cookie_name, $token, time() + ( 86400 * 30 ), '/' );
	wp_redirect( get_permalink( $post_id ) );
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo esc_html( $post->post_title ); ?> — Chithramaya Photo Proofing</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo esc_url( CHITRAMAYA_PROOFING_URL . 'assets/css/proofing.css' ); ?>">
</head>
<body>

<?php if ( ! $is_authenticated ) : ?>
	<div class="login-wrapper">
		<div class="login-card">
			<div class="login-logo">CHITHRAMAYA CREATIVES</div>
			<h1>Your Photos Are Ready</h1>
			<p>Enter the access code provided by your photographer to begin reviewing your collection.</p>
			<form method="POST">
				<input type="text" name="access_code" class="login-input" placeholder="Access Code" required autocomplete="off">
				<button type="submit" class="btn" style="width:100%;justify-content:center;">View Photos →</button>
			</form>
		</div>
	</div>
<?php else : ?>

	<div class="app-container" id="app">

		<!-- ===== HEADER ===== -->
		<header class="header" id="main-header">
			<div class="header-left">
				<div class="header-logo">CHITHRAMAYA CREATIVES</div>
				<div class="header-title"><?php echo esc_html( $post->post_title ); ?></div>
			</div>
			<div class="header-center">
				<!-- Circular Progress Ring -->
				<div class="quota-ring-wrapper" id="quota-ring-wrapper" title="Photos selected vs. package quota">
					<svg class="quota-ring" viewBox="0 0 60 60" width="60" height="60">
						<circle class="quota-ring-bg" cx="30" cy="30" r="24" />
						<circle class="quota-ring-fill" id="quota-ring-fill" cx="30" cy="30" r="24"
							stroke-dasharray="150.8" stroke-dashoffset="150.8" />
					</svg>
					<div class="quota-ring-label">
						<span id="quota-selected-count">0</span>
						<span class="quota-divider">/</span>
						<span id="quota-total-count">–</span>
					</div>
				</div>
			</div>
			<div class="header-right">
				<div class="view-switcher" id="view-switcher">
					<button class="view-btn active" data-mode="focus" id="btn-focus-mode" title="Focus Culler (F)">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18M15 8h3M15 12h3M15 16h3"/></svg>
						<span>Cull</span>
					</button>
					<button class="view-btn" data-mode="grid" id="btn-grid-mode" title="Grid View (G)">
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
						<span>Grid</span>
					</button>
				</div>
				<button class="btn btn-submit" id="btn-submit-modal" disabled>Submit Selection</button>
			</div>
		</header>

		<!-- ===== PROGRESS BAR ===== -->
		<div class="progress-strip" id="progress-strip">
			<div class="progress-fill-bar" id="progress-fill-bar" style="width:0%"></div>
		</div>

		<!-- ===== FILTER BAR (Grid mode only) ===== -->
		<div class="filter-bar" id="filter-bar" style="display:none">
			<div class="filter-tabs" id="filter-tabs">
				<button class="filter-tab active" data-filter="all">All <span class="tab-count" id="count-all">0</span></button>
				<button class="filter-tab" data-filter="selected">Selected <span class="tab-count" id="count-selected">0</span></button>
				<button class="filter-tab" data-filter="rejected">Rejected <span class="tab-count" id="count-rejected">0</span></button>
				<button class="filter-tab" data-filter="unreviewed">Unreviewed <span class="tab-count" id="count-unreviewed">0</span></button>
			</div>
			<div class="filter-bar-right">
				<span class="progress-label" id="progress-label">0% reviewed</span>
			</div>
		</div>

		<!-- ===== FOCUS CULLER (Default primary view) ===== -->
		<div class="culler-container" id="culler-view">

			<!-- Left: Photo Stage -->
			<div class="stage-left" id="stage-left">
				<div class="stage-image-area" id="stage-image-area">
					<img class="stage-image" id="stage-image" src="" alt="Photo" />
					<div class="stage-status-badge" id="stage-status-badge"></div>
					<button class="stage-nav-btn stage-prev" id="stage-prev" title="Previous (←)">&#8592;</button>
					<button class="stage-nav-btn stage-next" id="stage-next" title="Next (→)">&#8594;</button>
				</div>

				<!-- Filmstrip -->
				<div class="filmstrip" id="filmstrip">
					<div class="filmstrip-track" id="filmstrip-track"></div>
				</div>
			</div>

			<!-- Right: Action Panel -->
			<div class="panel-right" id="panel-right">

				<div class="panel-photo-info">
					<div class="panel-counter" id="panel-counter">– / –</div>
					<div class="panel-filename" id="panel-filename"></div>
				</div>

				<div class="action-cards">
					<button class="action-card action-select" id="btn-select" title="Select this photo">
						<div class="action-icon">✓</div>
						<div class="action-label">Keep</div>
						<div class="action-key">S</div>
					</button>
					<button class="action-card action-reject" id="btn-reject" title="Reject this photo">
						<div class="action-icon">✕</div>
						<div class="action-label">Reject</div>
						<div class="action-key">R</div>
					</button>
				</div>

				<button class="action-undo" id="btn-undo">↩ Undo / Unmark  <kbd>U</kbd></button>

				<div class="notes-section">
					<label class="notes-label">Note for photographer</label>
					<textarea class="focus-note" id="focus-note" placeholder="e.g. 'I love the lighting here but prefer less crop'…"></textarea>
				</div>

				<div class="hotkey-legend">
					<div class="legend-title">Keyboard Shortcuts</div>
					<div class="legend-grid">
						<kbd>S</kbd><span>Keep / Select</span>
						<kbd>R</kbd><span>Reject</span>
						<kbd>U</kbd><span>Undo</span>
						<kbd>←</kbd><span>Previous</span>
						<kbd>→</kbd><span>Next</span>
						<kbd>G</kbd><span>Grid View</span>
						<kbd>F</kbd><span>Cull View</span>
					</div>
				</div>
			</div>
		</div>

		<!-- ===== MASONRY GRID VIEW ===== -->
		<div class="grid-container" id="grid-view" style="display:none"></div>

	</div><!-- /.app-container -->

	<!-- ===== SUBMIT MODAL ===== -->
	<div class="modal-overlay" id="submit-modal">
		<div class="modal-content">
			<h2 class="modal-title">Review &amp; Submit</h2>
			<p class="modal-text" id="modal-summary"></p>
			<div class="modal-grid" id="modal-grid"></div>
			<div class="modal-actions">
				<button class="btn-outline" id="btn-modal-cancel">Go Back</button>
				<button class="btn" id="btn-modal-confirm">Confirm &amp; Submit →</button>
			</div>
		</div>
	</div>

	<!-- ===== SUBMITTED GALLERY VIEW ===== -->
	<div class="submitted-gallery-view" id="submitted-gallery-view" style="display:none">
		<div class="submitted-banner">
			<h2>Your Selection is Confirmed!</h2>
			<p>Thank you for submitting your photos. We've received your selection and will process it shortly.</p>
			<p class="reselect-text">Changed your mind or missed something? <button class="btn-outline" id="btn-request-reselect">Request Reselection</button></p>
		</div>
		<div class="submitted-gallery-grid" id="submitted-gallery-grid"></div>
	</div>

	<div class="saving-indicator" id="saving-indicator">Saving…</div>

	<script>
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
