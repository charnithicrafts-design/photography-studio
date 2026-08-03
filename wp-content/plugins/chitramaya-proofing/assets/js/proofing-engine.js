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
		const response = await fetch(`${ChitramayaProofing.API_URL}/session/${ChitramayaProofing.SESSION_ID}?token=${ChitramayaProofing.TOKEN}`);
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
	localStorage.setItem(`proofing_${ChitramayaProofing.SESSION_ID}`, JSON.stringify(state.photos));
	
	// Debounced API save
	clearTimeout(state.saveTimeout);
	savingInd.classList.add('show');
	savingInd.textContent = 'Saving...';
	
	state.saveTimeout = setTimeout(async () => {
		try {
			const response = await fetch(`${ChitramayaProofing.API_URL}/save`, {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({
					session_id: ChitramayaProofing.SESSION_ID,
					token: ChitramayaProofing.TOKEN,
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
			await fetch(`${ChitramayaProofing.API_URL}/save`, {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({ session_id: ChitramayaProofing.SESSION_ID, token: ChitramayaProofing.TOKEN, photos: state.photos })
			});
		}

		const response = await fetch(`${ChitramayaProofing.API_URL}/submit`, {
			method: 'POST',
			headers: { 'Content-Type': 'application/json' },
			body: JSON.stringify({ session_id: ChitramayaProofing.SESSION_ID, token: ChitramayaProofing.TOKEN })
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
