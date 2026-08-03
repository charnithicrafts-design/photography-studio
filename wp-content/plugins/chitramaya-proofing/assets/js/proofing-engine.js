// =====================================================
// CHITHRAMAYA PHOTO PROOFING ENGINE v2.0
// Split-Screen Focus Culler + Masonry Grid
// =====================================================

// --- STATE ---
const state = {
	photos:        [],
	quota:         30,
	status:        'in_review',
	currentMode:   'focus',   // 'focus' | 'grid'
	currentFilter: 'all',     // 'all' | 'selected' | 'rejected' | 'unreviewed'
	focusIndex:    0,
	saveTimeout:   null,
};

// --- DOM REFS ---
const appEl               = document.getElementById('app');
const cullerView          = document.getElementById('culler-view');
const gridView            = document.getElementById('grid-view');
const filterBar           = document.getElementById('filter-bar');
const filterTabs          = document.querySelectorAll('.filter-tab');
const viewBtns            = document.querySelectorAll('.view-btn');
const btnSubmitModal      = document.getElementById('btn-submit-modal');
const savingInd           = document.getElementById('saving-indicator');
const submittedOverlay    = document.getElementById('submitted-overlay');
const progressFillBar     = document.getElementById('progress-fill-bar');

// Quota Ring
const quotaRingFill       = document.getElementById('quota-ring-fill');
const quotaSelectedCount  = document.getElementById('quota-selected-count');
const quotaTotalCount     = document.getElementById('quota-total-count');

// Focus Culler
const stageImage          = document.getElementById('stage-image');
const stageImageArea      = document.getElementById('stage-image-area');
const stageStatusBadge    = document.getElementById('stage-status-badge');
const filmstripTrack      = document.getElementById('filmstrip-track');
const panelCounter        = document.getElementById('panel-counter');
const panelFilename       = document.getElementById('panel-filename');
const btnSelect           = document.getElementById('btn-select');
const btnReject           = document.getElementById('btn-reject');
const btnUndo             = document.getElementById('btn-undo');
const btnPrev             = document.getElementById('stage-prev');
const btnNext             = document.getElementById('stage-next');
const focusNote           = document.getElementById('focus-note');

// Modal
const submitModal         = document.getElementById('submit-modal');
const modalSummary        = document.getElementById('modal-summary');
const modalGrid           = document.getElementById('modal-grid');
const btnModalCancel      = document.getElementById('btn-modal-cancel');
const btnModalConfirm     = document.getElementById('btn-modal-confirm');

// --- INIT ---
async function init() {
	try {
		const res  = await fetch(`${ChitramayaProofing.API_URL}/session/${ChitramayaProofing.SESSION_ID}?token=${ChitramayaProofing.TOKEN}`);
		const data = await res.json();

		if (data.status === 'submitted') { showSubmittedOverlay(); return; }

		state.photos = data.photos || [];
		state.quota  = data.quota  || 30;
		state.status = data.status || 'in_review';

		appEl.style.display = 'flex';
		quotaTotalCount.textContent = state.quota;

		setupEventListeners();
		setMode('focus');

	} catch (err) {
		console.error('Proofing load error:', err);
		alert('Failed to load session. Please refresh the page.');
	}
}

// =====================================================
// RENDER ROUTER
// =====================================================
function render() {
	updateQuotaRing();
	updateTabCounts();

	if (state.currentMode === 'focus') {
		renderCuller();
	} else {
		renderGrid();
	}
}

// =====================================================
// QUOTA RING + PROGRESS STRIP
// =====================================================
function updateQuotaRing() {
	const selected = state.photos.filter(p => p.status === 'selected').length;
	const reviewed = state.photos.filter(p => p.status !== 'unreviewed').length;
	const total    = state.photos.length;

	quotaSelectedCount.textContent = selected;

	// Ring circumference = 2 * π * r = 2 * 3.14159 * 24 ≈ 150.8
	const CIRC = 150.8;
	const pct  = Math.min(selected / state.quota, 1);
	quotaRingFill.style.strokeDashoffset = CIRC - (pct * CIRC);

	if (selected > state.quota) {
		quotaRingFill.classList.add('over-quota');
	} else {
		quotaRingFill.classList.remove('over-quota');
	}

	// Progress strip shows % reviewed
	const reviewedPct = total > 0 ? Math.round((reviewed / total) * 100) : 0;
	progressFillBar.style.width = reviewedPct + '%';

	// Submit button
	if (selected > 0) {
		btnSubmitModal.removeAttribute('disabled');
		if (selected >= state.quota) {
			btnSubmitModal.classList.add('quota-reached');
		} else {
			btnSubmitModal.classList.remove('quota-reached');
		}
	} else {
		btnSubmitModal.setAttribute('disabled', 'true');
		btnSubmitModal.classList.remove('quota-reached');
	}

	// Update filter bar progress label
	const progressLabel = document.getElementById('progress-label');
	if (progressLabel) progressLabel.textContent = `${reviewedPct}% reviewed`;
}

function updateTabCounts() {
	const all        = state.photos.length;
	const selected   = state.photos.filter(p => p.status === 'selected').length;
	const rejected   = state.photos.filter(p => p.status === 'rejected').length;
	const unreviewed = state.photos.filter(p => p.status === 'unreviewed').length;

	document.getElementById('count-all').textContent        = all;
	document.getElementById('count-selected').textContent   = selected;
	document.getElementById('count-rejected').textContent   = rejected;
	document.getElementById('count-unreviewed').textContent = unreviewed;
}

// =====================================================
// MODE SWITCHER
// =====================================================
function setMode(mode) {
	state.currentMode = mode;

	viewBtns.forEach(btn => {
		btn.classList.toggle('active', btn.dataset.mode === mode);
	});

	if (mode === 'focus') {
		cullerView.style.display = 'flex';
		gridView.style.display   = 'none';
		filterBar.style.display  = 'none';
		render();
	} else {
		cullerView.style.display = 'none';
		gridView.style.display   = 'block';
		filterBar.style.display  = 'flex';
		render();
	}
}

// =====================================================
// FOCUS CULLER RENDER
// =====================================================
function renderCuller() {
	const photos = getFilteredPhotos();

	if (photos.length === 0) {
		stageImage.src = '';
		stageImage.alt = 'No photos';
		panelCounter.textContent = '0 / 0';
		panelFilename.textContent = '';
		filmstripTrack.innerHTML = '<p style="color:var(--text-faint);font-size:0.8rem;padding:16px;">No photos in this filter.</p>';
		return;
	}

	// Clamp index
	if (state.focusIndex >= photos.length) state.focusIndex = photos.length - 1;
	if (state.focusIndex < 0) state.focusIndex = 0;

	const photo = photos[state.focusIndex];

	// Update image with crossfade
	if (stageImage.src !== photo.url) {
		stageImage.classList.add('transitioning');
		setTimeout(() => {
			stageImage.src = photo.url;
			stageImage.onload = () => stageImage.classList.remove('transitioning');
		}, 80);
	}

	// Status badge
	stageStatusBadge.className = 'stage-status-badge';
	if (photo.status === 'selected') {
		stageStatusBadge.textContent = '✓ SELECTED';
		stageStatusBadge.classList.add('show-selected');
	} else if (photo.status === 'rejected') {
		stageStatusBadge.textContent = '✕ REJECTED';
		stageStatusBadge.classList.add('show-rejected');
	}

	// Panel info
	panelCounter.textContent  = `${state.focusIndex + 1} / ${photos.length}`;
	panelFilename.textContent = photo.filename || '';

	// Action card active states
	btnSelect.classList.toggle('active-state', photo.status === 'selected');
	btnReject.classList.toggle('active-state', photo.status === 'rejected');

	// Note
	focusNote.value = photo.note || '';

	// Filmstrip
	renderFilmstrip(photos, photo);

	// Preload adjacent
	preloadAdjacent(photos);
}

function renderFilmstrip(photos, activePhoto) {
	// Diff-based update: only re-render if needed
	const existing = filmstripTrack.querySelectorAll('.filmstrip-thumb');

	if (existing.length !== photos.length) {
		filmstripTrack.innerHTML = '';
		photos.forEach((p, idx) => {
			const thumb = document.createElement('div');
			thumb.className = 'filmstrip-thumb';
			thumb.dataset.id = p.id;
			thumb.dataset.status = p.status;
			thumb.innerHTML = `<img src="${p.url}" loading="lazy" alt="">
				${p.status === 'selected' ? '<div class="filmstrip-status sel">✓</div>' : ''}
				${p.status === 'rejected' ? '<div class="filmstrip-status rej">✕</div>' : ''}`;
			thumb.addEventListener('click', () => {
				state.focusIndex = idx;
				renderCuller();
			});
			filmstripTrack.appendChild(thumb);
		});
	} else {
		// Just update status badges and active class
		existing.forEach((el, idx) => {
			const p = photos[idx];
			el.dataset.status = p.status;
			const statusEl = el.querySelector('.filmstrip-status');
			if (statusEl) el.removeChild(statusEl);
			if (p.status === 'selected') el.insertAdjacentHTML('beforeend', '<div class="filmstrip-status sel">✓</div>');
			if (p.status === 'rejected') el.insertAdjacentHTML('beforeend', '<div class="filmstrip-status rej">✕</div>');
		});
	}

	// Sync active highlight
	const thumbEls = filmstripTrack.querySelectorAll('.filmstrip-thumb');
	thumbEls.forEach((el, idx) => {
		el.classList.toggle('active', photos[idx].id === activePhoto.id);
	});

	// Scroll active thumb into view
	const activeThumb = filmstripTrack.querySelector('.filmstrip-thumb.active');
	if (activeThumb) {
		activeThumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
	}
}

function preloadAdjacent(photos) {
	[-1, 1, 2].forEach(offset => {
		const idx = state.focusIndex + offset;
		if (idx >= 0 && idx < photos.length) {
			const img = new Image();
			img.src = photos[idx].url;
		}
	});
}

// =====================================================
// MASONRY GRID RENDER
// =====================================================
function renderGrid() {
	const photos = getFilteredPhotos();
	gridView.innerHTML = '';

	photos.forEach(photo => {
		const item = document.createElement('div');
		item.className    = 'grid-item';
		item.dataset.id   = photo.id;
		item.dataset.status  = photo.status;
		item.dataset.hasNote = photo.note ? 'true' : 'false';

		item.innerHTML = `
			<img src="${photo.url}" loading="lazy" alt="${photo.filename || 'Photo'}">
			<div class="grid-badge"></div>
			<div class="grid-note-icon">📝</div>
		`;

		item.addEventListener('click', () => {
			cyclePhotoStatus(photo.id);
		});

		// Double-click jumps to Focus view on this photo
		item.addEventListener('dblclick', () => {
			const filtered = getFilteredPhotos();
			state.focusIndex = filtered.findIndex(p => p.id === photo.id);
			if (state.focusIndex < 0) state.focusIndex = 0;
			setMode('focus');
		});

		gridView.appendChild(item);
	});
}

// =====================================================
// PHOTO ACTIONS
// =====================================================
function getFilteredPhotos() {
	if (state.currentFilter === 'all') return state.photos;
	return state.photos.filter(p => p.status === state.currentFilter);
}

function findPhotoById(id) {
	return state.photos.find(p => p.id === id);
}

function cyclePhotoStatus(id) {
	const photo = findPhotoById(id);
	if (!photo) return;

	if (photo.status === 'unreviewed') photo.status = 'selected';
	else if (photo.status === 'selected') photo.status = 'rejected';
	else photo.status = 'unreviewed';

	triggerSave();
	render();
}

function setFocusStatus(status) {
	const photos = getFilteredPhotos();
	if (!photos.length) return;
	const photo = photos[state.focusIndex];
	photo.status = status;
	triggerSave();

	// Auto-advance after select/reject
	if (status === 'selected' || status === 'rejected') {
		setTimeout(() => navigateFocus(1), 150);
	} else {
		renderCuller();
	}
}

function navigateFocus(dir) {
	const photos = getFilteredPhotos();
	if (photos.length <= 1) return;
	state.focusIndex = (state.focusIndex + dir + photos.length) % photos.length;
	renderCuller();
}

// =====================================================
// SAVE / SYNC
// =====================================================
function triggerSave() {
	// Optimistic local backup
	try {
		localStorage.setItem(`proofing_${ChitramayaProofing.SESSION_ID}`, JSON.stringify(state.photos));
	} catch (e) {}

	clearTimeout(state.saveTimeout);
	savingInd.textContent = 'Saving…';
	savingInd.classList.add('show');

	state.saveTimeout = setTimeout(async () => {
		try {
			const res = await fetch(`${ChitramayaProofing.API_URL}/save`, {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({
					session_id: ChitramayaProofing.SESSION_ID,
					token:      ChitramayaProofing.TOKEN,
					photos:     state.photos
				})
			});
			if (res.ok) {
				savingInd.textContent = '✓ Saved';
				setTimeout(() => savingInd.classList.remove('show'), 1800);
			}
		} catch (e) {
			savingInd.textContent = '⚠ Save failed – retrying…';
			savingInd.style.color = 'var(--danger)';
		}
	}, 1500);
}

// =====================================================
// EVENT LISTENERS
// =====================================================
function setupEventListeners() {

	// View mode switcher
	viewBtns.forEach(btn => {
		btn.addEventListener('click', () => setMode(btn.dataset.mode));
	});

	// Filter tabs
	filterTabs.forEach(tab => {
		tab.addEventListener('click', () => {
			filterTabs.forEach(t => t.classList.remove('active'));
			tab.classList.add('active');
			state.currentFilter = tab.dataset.filter;
			state.focusIndex = 0;
			render();
		});
	});

	// Focus Culler actions
	btnSelect.addEventListener('click', () => setFocusStatus('selected'));
	btnReject.addEventListener('click', () => setFocusStatus('rejected'));
	btnUndo.addEventListener('click',   () => setFocusStatus('unreviewed'));
	btnPrev.addEventListener('click',   () => navigateFocus(-1));
	btnNext.addEventListener('click',   () => navigateFocus(1));

	// Note input
	focusNote.addEventListener('input', e => {
		const photos = getFilteredPhotos();
		if (photos.length > 0) {
			const photo = findPhotoById(photos[state.focusIndex].id);
			if (photo) photo.note = e.target.value;
			triggerSave();
		}
	});

	// Keyboard shortcuts
	document.addEventListener('keydown', e => {
		if (submitModal.style.display === 'flex') return;
		if (document.activeElement === focusNote) return;

		switch (e.key) {
			case 'g': case 'G': setMode('grid');  break;
			case 'f': case 'F': setMode('focus'); break;
		}

		if (state.currentMode === 'focus') {
			switch (e.key) {
				case 'ArrowRight': case 'ArrowDown': navigateFocus(1);  break;
				case 'ArrowLeft':  case 'ArrowUp':   navigateFocus(-1); break;
				case 's': case 'S': case '1':        setFocusStatus('selected');   break;
				case 'r': case 'R': case '2':        setFocusStatus('rejected');   break;
				case 'u': case 'U': case '3':        setFocusStatus('unreviewed'); break;
			}
		}
	});

	// Swipe support (mobile)
	let touchStartX = 0;
	stageImageArea.addEventListener('touchstart', e => { touchStartX = e.changedTouches[0].screenX; });
	stageImageArea.addEventListener('touchend',   e => {
		const dx = e.changedTouches[0].screenX - touchStartX;
		if (dx < -50) navigateFocus(1);
		if (dx >  50) navigateFocus(-1);
	});

	// Submit modal
	btnSubmitModal.addEventListener('click', openModal);
	btnModalCancel.addEventListener('click', () => { submitModal.style.display = 'none'; });
	btnModalConfirm.addEventListener('click', submitFinal);
}

// =====================================================
// MODAL
// =====================================================
function openModal() {
	const selected = state.photos.filter(p => p.status === 'selected');
	let txt = `You've selected <strong>${selected.length}</strong> photo${selected.length !== 1 ? 's' : ''} <span style="color:var(--text-faint)">(${state.quota} included in your package)</span>.`;

	if (selected.length > state.quota) {
		const extra = selected.length - state.quota;
		txt += `<br><span style="color:var(--danger)">⚠ ${extra} additional photo${extra > 1 ? 's' : ''} will be charged separately.</span>`;
	}

	modalSummary.innerHTML = txt;
	modalGrid.innerHTML    = '';
	selected.forEach(p => {
		modalGrid.innerHTML += `<img src="${p.url}" alt="${p.filename || ''}">`;
	});

	submitModal.style.display = 'flex';
}

async function submitFinal() {
	btnModalConfirm.disabled    = true;
	btnModalConfirm.textContent = 'Submitting…';

	try {
		// Flush pending save first
		clearTimeout(state.saveTimeout);
		await fetch(`${ChitramayaProofing.API_URL}/save`, {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify({ session_id: ChitramayaProofing.SESSION_ID, token: ChitramayaProofing.TOKEN, photos: state.photos })
		});

		const res = await fetch(`${ChitramayaProofing.API_URL}/submit`, {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify({ session_id: ChitramayaProofing.SESSION_ID, token: ChitramayaProofing.TOKEN })
		});

		if (res.ok) {
			submitModal.style.display = 'none';
			showSubmittedOverlay();
		} else {
			throw new Error('Server error');
		}
	} catch (e) {
		alert('Error submitting. Please try again.');
		btnModalConfirm.disabled    = false;
		btnModalConfirm.textContent = 'Confirm & Submit →';
	}
}

function showSubmittedOverlay() {
	appEl.style.display = 'none';
	submittedOverlay.style.display = 'flex';
}

// =====================================================
// BOOT
// =====================================================
init();
