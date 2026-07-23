document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('bookingOverlay');
    const closeBtn = document.getElementById('bookingClose');
    const step1 = document.getElementById('bookingStep1');
    const step2 = document.getElementById('bookingStep2');
    const choiceBtns = document.querySelectorAll('.booking-choice-btn');
    const inquiryTypeInput = document.getElementById('inquiryType');
    const brandFields = document.querySelector('.brand-fields');
    const individualFields = document.querySelector('.individual-fields');
    const form = document.getElementById('chitramayaBookingForm');
    const feedback = document.getElementById('bookingFeedback');

    if(!overlay || !form) return;

    // Open Overlay (Listen globally for any trigger element)
    document.body.addEventListener('click', (e) => {
        const trigger = e.target.closest('[data-trigger="booking"]');
        if (trigger) {
            e.preventDefault();
            overlay.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            
            // Push Analytics State (Foot-in-the-door start)
            history.pushState(null, '', '?booking=start');
        }
    });

    // Close Overlay
    closeBtn.addEventListener('click', () => {
        overlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        
        // Remove booking params from URL without reloading
        const url = new URL(window.location);
        url.search = '';
        history.pushState(null, '', url.toString());
        
        // Reset form state after transition completes
        setTimeout(() => {
            step2.classList.remove('is-active');
            step1.classList.add('is-active');
            form.reset();
            feedback.innerHTML = '';
            feedback.className = 'booking-feedback';
        }, 300);
    });

    // Handle Segmentation Choice
    choiceBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const type = btn.getAttribute('data-type');
            inquiryTypeInput.value = type;
            
            // Push Analytics State (Tracking which funnel they entered)
            history.pushState(null, '', `?booking=${type}`);
            
            if (type === 'brand') {
                brandFields.style.display = 'block';
                brandFields.querySelectorAll('input, select').forEach(el => el.setAttribute('required', 'true'));
                individualFields.style.display = 'none';
                individualFields.querySelectorAll('input, select').forEach(el => el.removeAttribute('required'));
            } else {
                individualFields.style.display = 'block';
                individualFields.querySelectorAll('input, select').forEach(el => el.setAttribute('required', 'true'));
                brandFields.style.display = 'none';
                brandFields.querySelectorAll('input, select').forEach(el => el.removeAttribute('required'));
            }
            
            step1.classList.remove('is-active');
            step2.classList.add('is-active');
        });
    });

    // Handle AJAX Submission
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const submitBtn = form.querySelector('.submit-btn');
        submitBtn.innerText = 'TRANSMITTING...';
        submitBtn.disabled = true;
        
        const formData = new FormData(form);
        formData.append('booking_nonce', chitramayaAjax.nonce);
        
        try {
            const response = await fetch(chitramayaAjax.ajaxurl, {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            
            if (result.success) {
                feedback.className = 'booking-feedback success';
                feedback.innerText = result.data.message;
                form.reset();
                submitBtn.innerText = 'SUBMIT INQUIRY';
                
                // Track successful conversion
                history.pushState(null, '', '?booking=success');
                
                setTimeout(() => closeBtn.click(), 3000);
            } else {
                feedback.className = 'booking-feedback error';
                feedback.innerText = result.data.message || 'Verification failed.';
                submitBtn.innerText = 'SUBMIT INQUIRY';
                submitBtn.disabled = false;
            }
        } catch (error) {
            feedback.className = 'booking-feedback error';
            feedback.innerText = 'Network error. Please try again.';
            submitBtn.innerText = 'SUBMIT INQUIRY';
            submitBtn.disabled = false;
        }
    });
});
