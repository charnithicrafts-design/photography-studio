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
	<style>
		:root {
			--bg: #1C1917;
			--accent: #A96F44;
			--text: #FFFFFF;
			--text-dim: #A8A29E;
			--surface: #292524;
			--surface-hover: #44403C;
			--success: #22c55e;
			--danger: #ef4444;
			--font-serif: 'EB Garamond', serif;
			--font-sans: 'Inter', sans-serif;
		}
		
		* { box-sizing: border-box; margin: 0; padding: 0; }
		
		body {
			background-color: var(--bg);
			color: var(--text);
			font-family: var(--font-sans);
			line-height: 1.5;
			-webkit-font-smoothing: antialiased;
		}

		/* Typography */
		h1, h2, h3 { font-family: var(--font-serif); font-weight: 600; }
		button { font-family: var(--font-sans); cursor: pointer; border: none; outline: none; }

		/* Login Screen */
		.login-wrapper {
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			padding: 20px;
		}
		.login-card {
			background: var(--surface);
			padding: 40px;
			border-radius: 8px;
			text-align: center;
			max-width: 400px;
			width: 100%;
			box-shadow: 0 10px 30px rgba(0,0,0,0.5);
		}
		.login-card h1 { font-size: 2rem; margin-bottom: 10px; color: var(--accent); }
		.login-card p { margin-bottom: 24px; color: var(--text-dim); }
		.login-input {
			width: 100%; padding: 12px; margin-bottom: 20px;
			background: var(--bg); border: 1px solid var(--surface-hover);
			color: var(--text); border-radius: 4px; font-size: 1rem; text-align: center;
			letter-spacing: 2px;
		}
		.login-input:focus { border-color: var(--accent); outline: none; }
		.btn {
			background: var(--accent); color: white; padding: 10px 24px;
			border-radius: 9999px; font-weight: 600; transition: opacity 0.2s;
			display: inline-block; text-decoration: none;
		}
		.btn:hover { opacity: 0.9; }
		.btn:disabled { opacity: 0.5; cursor: not-allowed; }

		/* App Layout */
		.app-container { display: none; flex-direction: column; height: 100vh; overflow: hidden; }
		
		/* Header */
		.header {
			display: flex; justify-content: space-between; align-items: center;
			padding: 16px 24px; background: var(--bg); border-bottom: 1px solid var(--surface);
			z-index: 10;
		}
		.header-logo { font-size: 0.875rem; font-weight: 600; letter-spacing: 2px; color: var(--text-dim); }
		.header-title { font-family: var(--font-serif); font-size: 1.25rem; }
		
		/* Progress Bar */
		.progress-bar-container {
			background: var(--surface); padding: 12px 24px; position: sticky; top: 0; z-index: 9;
			display: flex; flex-direction: column; gap: 8px; border-bottom: 1px solid var(--surface-hover);
		}
		.progress-text { display: flex; justify-content: space-between; font-size: 0.875rem; }
		.progress-track { height: 6px; background: var(--surface-hover); border-radius: 3px; overflow: hidden; }
		.progress-fill { height: 100%; background: var(--accent); transition: width 0.3s ease; }
		.progress-bar-container.over-quota .progress-fill { background: var(--danger); }
		.progress-bar-container.over-quota .progress-text { color: var(--danger); }

		/* Controls */
		.controls-bar {
			display: flex; justify-content: space-between; padding: 16px 24px;
			background: var(--bg); align-items: center;
		}
		.filter-tabs { display: flex; gap: 16px; }
		.filter-tab { background: none; color: var(--text-dim); font-size: 0.875rem; padding-bottom: 4px; border-bottom: 2px solid transparent; }
		.filter-tab.active { color: var(--text); border-bottom-color: var(--accent); font-weight: 600; }
		
		.mode-switcher { display: flex; background: var(--surface); border-radius: 4px; padding: 2px; }
		.mode-btn { background: none; color: var(--text-dim); padding: 4px 12px; border-radius: 2px; font-size: 0.875rem; }
		.mode-btn.active { background: var(--surface-hover); color: var(--text); }

		/* Grid Mode */
		.grid-container {
			flex: 1; overflow-y: auto; padding: 24px;
			display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;
		}
		@media (max-width: 1024px) { .grid-container { grid-template-columns: repeat(3, 1fr); } }
		@media (max-width: 768px) { .grid-container { grid-template-columns: repeat(2, 1fr); padding: 12px; gap: 12px; } }
		
		.grid-item { position: relative; aspect-ratio: 2/3; overflow: hidden; border-radius: 4px; cursor: pointer; background: var(--surface); }
		.grid-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease; }
		.grid-item:hover img { transform: scale(1.05); }
		
		.badge {
			position: absolute; top: 8px; right: 8px; width: 24px; height: 24px;
			border-radius: 50%; display: flex; align-items: center; justify-content: center;
			font-size: 12px; background: rgba(0,0,0,0.5); border: 2px solid rgba(255,255,255,0.2);
			color: transparent; transition: all 0.2s;
		}
		.grid-item[data-status="selected"] .badge { background: var(--success); border-color: var(--success); color: white; }
		.grid-item[data-status="selected"] .badge::after { content: '✓'; }
		.grid-item[data-status="rejected"] .badge { background: var(--danger); border-color: var(--danger); color: white; }
		.grid-item[data-status="rejected"] .badge::after { content: '✕'; }
		.grid-item[data-status="rejected"] img { opacity: 0.5; }
		
		.note-icon {
			position: absolute; bottom: 8px; left: 8px; background: rgba(0,0,0,0.6);
			padding: 4px; border-radius: 4px; display: none;
		}
		.grid-item[data-has-note="true"] .note-icon { display: block; }

		/* Focus Mode */
		.focus-container {
			display: none; flex: 1; flex-direction: column; background: var(--bg); position: relative;
		}
		.focus-image-wrapper {
			flex: 1; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;
		}
		.focus-image {
			max-width: 100%; max-height: 100%; object-fit: contain; transition: opacity 0.2s;
			position: absolute; opacity: 0;
		}
		.focus-image.active { opacity: 1; position: relative; }
		
		.focus-toolbar {
			background: var(--surface); padding: 16px 24px; display: flex; flex-direction: column; gap: 16px;
			border-top: 1px solid var(--surface-hover);
		}
		.focus-actions { display: flex; justify-content: space-between; align-items: center; }
		.action-btns { display: flex; gap: 12px; }
		.action-btn { padding: 8px 16px; border-radius: 4px; font-weight: 600; font-size: 0.875rem; display: flex; align-items: center; gap: 8px; }
		.action-btn.btn-select { background: rgba(34, 197, 94, 0.2); color: var(--success); border: 1px solid var(--success); }
		.action-btn.btn-reject { background: rgba(239, 68, 68, 0.2); color: var(--danger); border: 1px solid var(--danger); }
		.action-btn.btn-undo { background: var(--surface-hover); color: var(--text); border: 1px solid var(--text-dim); }
		
		.action-btn:hover { filter: brightness(1.2); }
		.action-btn[data-active="true"].btn-select { background: var(--success); color: white; }
		.action-btn[data-active="true"].btn-reject { background: var(--danger); color: white; }

		.focus-note { width: 100%; background: var(--bg); border: 1px solid var(--surface-hover); color: var(--text); padding: 12px; border-radius: 4px; resize: vertical; min-height: 60px; font-family: var(--font-sans); }

		/* Modal */
		.modal-overlay {
			position: fixed; top: 0; left: 0; width: 100%; height: 100%;
			background: rgba(0,0,0,0.8); z-index: 100; display: none;
			align-items: center; justify-content: center; backdrop-filter: blur(4px);
		}
		.modal-content {
			background: var(--surface); border-radius: 8px; width: 90%; max-width: 600px;
			max-height: 90vh; overflow-y: auto; padding: 32px;
		}
		.modal-title { font-family: var(--font-serif); font-size: 1.5rem; margin-bottom: 16px; color: var(--accent); }
		.modal-text { margin-bottom: 24px; color: var(--text-dim); }
		.modal-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(80px, 1fr)); gap: 8px; margin-bottom: 24px; }
		.modal-grid img { width: 100%; aspect-ratio: 1; object-fit: cover; border-radius: 4px; }
		.modal-actions { display: flex; justify-content: flex-end; gap: 16px; }
		.btn-outline { background: transparent; border: 1px solid var(--text-dim); color: var(--text); padding: 10px 24px; border-radius: 9999px; }

		.saving-indicator {
			position: fixed; bottom: 24px; right: 24px; background: var(--accent); color: white;
			padding: 8px 16px; border-radius: 9999px; font-size: 0.875rem; z-index: 50;
			opacity: 0; transition: opacity 0.3s; pointer-events: none;
		}
		.saving-indicator.show { opacity: 1; }

		/* Submitted State overlay */
		.submitted-overlay {
			position: fixed; top: 0; left: 0; width: 100%; height: 100%;
			background: rgba(28, 25, 23, 0.95); z-index: 200; display: none;
			flex-direction: column; align-items: center; justify-content: center; text-align: center;
		}
		.submitted-overlay h1 { font-family: var(--font-serif); font-size: 3rem; color: var(--accent); margin-bottom: 16px; }
	</style>
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
		// --- CONFIG ---
		const API_URL = '<?php echo esc_url( rest_url( 'chitramaya/v1/proofing' ) ); ?>';
		const SESSION_ID = <?php echo intval( $post_id ); ?>;
		const TOKEN = '<?php echo esc_js( $token ); ?>';

		// --- STATE ---
		let state = {
			photos: [],
			quota: 0,
			status: 'in_review',
			currentMode: 'grid', // grid | focus
			currentFilter: 'all', // all | selected | rejected | unreviewed
			focusIndex: 0,
			saveTimeout: null,
			isSaving: false
		};

		// --- DOM ELEMENTS ---
		const appEl = document.getElementById('app');
		const gridView = document.getElementById('grid-view');
		const focusView = document.getElementById('focus-view');
		const focusImageWrapper = document.getElementById('focus-image-wrapper');
		const progStatus = document.getElementById('progress-status');
		const progPercent = document.getElementById('progress-percent');
		const progFill = document.getElementById('progress-fill');
		const progContainer = document.getElementById('progress-container');
		const filterTabs = document.querySelectorAll('.filter-tab');
		const modeBtns = document.querySelectorAll('.mode-btn');
		const btnSubmitModal = document.getElementById('btn-submit-modal');
		const savingInd = document.getElementById('saving-indicator');
		const submittedOverlay = document.getElementById('submitted-overlay');

		// Focus elements
		const btnSelect = document.getElementById('btn-select');
		const btnReject = document.getElementById('btn-reject');
		const btnUndo = document.getElementById('btn-undo');
		const btnPrev = document.getElementById('btn-prev');
		const btnNext = document.getElementById('btn-next');
		const focusCounter = document.getElementById('focus-counter');
		const focusNote = document.getElementById('focus-note');

		// Modal elements
		const submitModal = document.getElementById('submit-modal');
		const modalSummary = document.getElementById('modal-summary');
		const modalGrid = document.getElementById('modal-grid');
		const btnModalCancel = document.getElementById('btn-modal-cancel');
		const btnModalConfirm = document.getElementById('btn-modal-confirm');

		// --- INIT ---
		async function init() {
			try {
				const response = await fetch(`${API_URL}/session/${SESSION_ID}?token=${TOKEN}`);
				const data = await response.json();
				
				if (data.status === 'submitted') {
					showSubmittedOverlay();
					return;
				}

				state.photos = data.photos || [];
				state.quota = data.quota || 30;
				state.status = data.status || 'in_review';

				appEl.style.display = 'flex';
				render();
				setupEventListeners();

			} catch (error) {
				console.error('Error loading session:', error);
				alert('Failed to load session data. Please refresh.');
			}
		}

		// --- RENDER ---
		function render() {
			updateProgress();
			
			if (state.currentMode === 'grid') {
				gridView.style.display = 'grid';
				focusView.style.display = 'none';
				document.getElementById('controls-bar').style.display = 'flex';
				renderGrid();
			} else {
				gridView.style.display = 'none';
				focusView.style.display = 'flex';
				document.getElementById('controls-bar').style.display = 'none';
				renderFocus();
			}
		}

		function updateProgress() {
			const total = state.photos.length;
			const selectedCount = state.photos.filter(p => p.status === 'selected').length;
			const reviewedCount = state.photos.filter(p => p.status !== 'unreviewed').length;
			const percent = total > 0 ? Math.round((selectedCount / state.quota) * 100) : 0;
			
			progStatus.textContent = `Selected: ${selectedCount} / ${state.quota} included photos`;
			progPercent.textContent = `${percent}% (Reviewed: ${reviewedCount}/${total})`;
			
			progFill.style.width = `${Math.min(percent, 100)}%`;
			
			if (selectedCount > state.quota) {
				progContainer.classList.add('over-quota');
			} else {
				progContainer.classList.remove('over-quota');
			}

			if (selectedCount > 0) {
				btnSubmitModal.removeAttribute('disabled');
			} else {
				btnSubmitModal.setAttribute('disabled', 'true');
			}
		}

		function getFilteredPhotos() {
			if (state.currentFilter === 'all') return state.photos;
			return state.photos.filter(p => p.status === state.currentFilter);
		}

		function renderGrid() {
			const filtered = getFilteredPhotos();
			gridView.innerHTML = '';
			
			filtered.forEach(photo => {
				const item = document.createElement('div');
				item.className = 'grid-item';
				item.dataset.id = photo.id;
				item.dataset.status = photo.status;
				item.dataset.hasNote = photo.note ? 'true' : 'false';
				
				item.innerHTML = `
					<img src="${photo.url}" loading="lazy" alt="Photo">
					<div class="badge"></div>
					<div class="note-icon">📝</div>
				`;
				
				item.addEventListener('click', () => {
					cyclePhotoStatus(photo.id);
				});
				
				gridView.appendChild(item);
			});
		}

		function renderFocus() {
			const filtered = getFilteredPhotos();
			if (filtered.length === 0) {
				focusImageWrapper.innerHTML = '<p style="color:var(--text-dim);">No photos in this view.</p>';
				return;
			}
			
			if (state.focusIndex >= filtered.length) state.focusIndex = 0;
			if (state.focusIndex < 0) state.focusIndex = filtered.length - 1;
			
			const currentPhoto = filtered[state.focusIndex];
			
			focusImageWrapper.innerHTML = `<img src="${currentPhoto.url}" class="focus-image active">`;
			
			// Preload next
			if (state.focusIndex + 1 < filtered.length) {
				const nextImg = new Image();
				nextImg.src = filtered[state.focusIndex + 1].url;
			}

			focusCounter.textContent = `Image ${state.focusIndex + 1} of ${filtered.length}`;
			focusNote.value = currentPhoto.note || '';
			
			btnSelect.dataset.active = currentPhoto.status === 'selected';
			btnReject.dataset.active = currentPhoto.status === 'rejected';
		}

		// --- ACTIONS ---
		function cyclePhotoStatus(id) {
			const photo = state.photos.find(p => p.id === id);
			if (!photo) return;
			
			if (photo.status === 'unreviewed') photo.status = 'selected';
			else if (photo.status === 'selected') photo.status = 'rejected';
			else photo.status = 'unreviewed';
			
			triggerSave();
			render();
		}

		function setFocusPhotoStatus(status) {
			const filtered = getFilteredPhotos();
			if (filtered.length === 0) return;
			const photo = filtered[state.focusIndex];
			
			photo.status = status;
			triggerSave();
			
			if (status === 'selected' || status === 'rejected') {
				// Auto-advance
				setTimeout(() => {
					navigateFocus(1);
				}, 150);
			} else {
				render();
			}
		}

		function navigateFocus(dir) {
			const filtered = getFilteredPhotos();
			if (filtered.length <= 1) return;
			
			state.focusIndex += dir;
			if (state.focusIndex >= filtered.length) state.focusIndex = 0;
			if (state.focusIndex < 0) state.focusIndex = filtered.length - 1;
			
			renderFocus();
		}

		// --- SYNC ---
		function triggerSave() {
			// Local storage backup
			localStorage.setItem(`proofing_${SESSION_ID}`, JSON.stringify(state.photos));
			
			// Debounced API save
			clearTimeout(state.saveTimeout);
			savingInd.classList.add('show');
			savingInd.textContent = 'Saving...';
			
			state.saveTimeout = setTimeout(async () => {
				try {
					const response = await fetch(`${API_URL}/save`, {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({
							session_id: SESSION_ID,
							token: TOKEN,
							photos: state.photos
						})
					});
					
					if (response.ok) {
						savingInd.textContent = 'Saved';
						setTimeout(() => savingInd.classList.remove('show'), 2000);
					}
				} catch (e) {
					savingInd.textContent = 'Save Failed - Retrying...';
					savingInd.style.background = 'var(--danger)';
				}
			}, 2000);
		}

		// --- EVENT LISTENERS ---
		function setupEventListeners() {
			// Filters
			filterTabs.forEach(tab => {
				tab.addEventListener('click', (e) => {
					filterTabs.forEach(t => t.classList.remove('active'));
					e.target.classList.add('active');
					state.currentFilter = e.target.dataset.filter;
					state.focusIndex = 0;
					render();
				});
			});

			// Modes
			modeBtns.forEach(btn => {
				btn.addEventListener('click', (e) => {
					modeBtns.forEach(b => b.classList.remove('active'));
					e.target.classList.add('active');
					state.currentMode = e.target.dataset.mode;
					render();
				});
			});

			// Focus Actions
			btnSelect.addEventListener('click', () => setFocusPhotoStatus('selected'));
			btnReject.addEventListener('click', () => setFocusPhotoStatus('rejected'));
			btnUndo.addEventListener('click', () => setFocusPhotoStatus('unreviewed'));
			btnPrev.addEventListener('click', () => navigateFocus(-1));
			btnNext.addEventListener('click', () => navigateFocus(1));
			
			focusNote.addEventListener('input', (e) => {
				const filtered = getFilteredPhotos();
				if (filtered.length > 0) {
					filtered[state.focusIndex].note = e.target.value;
					triggerSave();
				}
			});

			// Keyboard
			document.addEventListener('keydown', (e) => {
				if (submitModal.style.display === 'flex') return;
				
				// Ignore if typing in note
				if (document.activeElement === focusNote) return;

				if (e.key === 'g' || e.key === 'G') {
					document.querySelector('[data-mode="grid"]').click();
				} else if (e.key === 'f' || e.key === 'F') {
					document.querySelector('[data-mode="focus"]').click();
				}

				if (state.currentMode === 'focus') {
					if (e.key === 'ArrowRight') navigateFocus(1);
					else if (e.key === 'ArrowLeft') navigateFocus(-1);
					else if (e.key === 's' || e.key === 'S') setFocusPhotoStatus('selected');
					else if (e.key === 'r' || e.key === 'R') setFocusPhotoStatus('rejected');
					else if (e.key === 'u' || e.key === 'U') setFocusPhotoStatus('unreviewed');
				}
			});

			// Swipe support
			let touchStartX = 0;
			let touchEndX = 0;
			focusImageWrapper.addEventListener('touchstart', e => { touchStartX = e.changedTouches[0].screenX; });
			focusImageWrapper.addEventListener('touchend', e => {
				touchEndX = e.changedTouches[0].screenX;
				if (touchEndX < touchStartX - 50) navigateFocus(1); // Swipe left -> next
				if (touchEndX > touchStartX + 50) navigateFocus(-1); // Swipe right -> prev
			});

			// Modal
			btnSubmitModal.addEventListener('click', openModal);
			btnModalCancel.addEventListener('click', () => { submitModal.style.display = 'none'; });
			btnModalConfirm.addEventListener('click', submitFinal);
		}

		function openModal() {
			const selected = state.photos.filter(p => p.status === 'selected');
			let summaryText = `You have selected <strong>${selected.length}</strong> photos (${state.quota} included in package).`;
			
			if (selected.length > state.quota) {
				const extra = selected.length - state.quota;
				summaryText += `<br><span style="color:var(--danger)">Note: You have ${extra} additional photos at extra charge.</span>`;
			}
			
			modalSummary.innerHTML = summaryText;
			
			modalGrid.innerHTML = '';
			selected.forEach(p => {
				modalGrid.innerHTML += `<img src="${p.url}">`;
			});
			
			submitModal.style.display = 'flex';
		}

		async function submitFinal() {
			btnModalConfirm.disabled = true;
			btnModalConfirm.textContent = 'Submitting...';
			
			try {
				// Flush any pending saves
				if (state.saveTimeout) {
					clearTimeout(state.saveTimeout);
					await fetch(`${API_URL}/save`, {
						method: 'POST',
						headers: { 'Content-Type': 'application/json' },
						body: JSON.stringify({ session_id: SESSION_ID, token: TOKEN, photos: state.photos })
					});
				}

				const response = await fetch(`${API_URL}/submit`, {
					method: 'POST',
					headers: { 'Content-Type': 'application/json' },
					body: JSON.stringify({ session_id: SESSION_ID, token: TOKEN })
				});
				
				if (response.ok) {
					submitModal.style.display = 'none';
					showSubmittedOverlay();
				}
			} catch (e) {
				alert('Error submitting. Please try again.');
				btnModalConfirm.disabled = false;
				btnModalConfirm.textContent = 'Confirm & Submit';
			}
		}

		function showSubmittedOverlay() {
			appEl.style.display = 'none';
			submittedOverlay.style.display = 'flex';
		}

		// Boot
		init();
	</script>
<?php endif; ?>
</body>
</html>
