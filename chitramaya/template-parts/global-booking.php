<?php
/**
 * Global Booking Overlay (Phase 3 UI Engine)
 */
?>
<!-- Booking Modal Overlay -->
<div class="booking-overlay" id="bookingOverlay" aria-hidden="true">
    <div class="booking-container">
        <button class="booking-close" id="bookingClose" aria-label="Close Booking Form">CLOS[X]</button>
        
        <div class="booking-content">
            
            <!-- Step 1: The Segmentation (Micro-commitment) -->
            <div class="booking-step is-active" id="bookingStep1">
                <h2 class="booking-heading">I AM INQUIRING AS A...</h2>
                <div class="booking-options">
                    <button type="button" class="booking-choice-btn brut-btn" data-type="brand">BRAND / AGENCY</button>
                    <button type="button" class="booking-choice-btn brut-btn" data-type="individual">PRIVATE INDIVIDUAL</button>
                </div>
            </div>

            <!-- Step 2: The Morphing Form -->
            <div class="booking-step" id="bookingStep2">
                <form id="chitramayaBookingForm" class="booking-form">
                    <!-- Hidden fields for security and logic -->
                    <input type="hidden" name="action" value="submit_chitramaya_booking">
                    <input type="hidden" name="inquiry_type" id="inquiryType" value="">
                    
                    <!-- Global Fields -->
                    <div class="form-group">
                        <label for="client_name">YOUR NAME</label>
                        <input type="text" name="client_name" id="client_name" required placeholder="John Doe">
                    </div>
                    <div class="form-group">
                        <label for="client_email">EMAIL ADDRESS</label>
                        <input type="email" name="client_email" id="client_email" required placeholder="john@example.com">
                    </div>

                    <!-- Dynamic Brand Fields -->
                    <div class="dynamic-fields brand-fields" style="display: none;">
                        <div class="form-group">
                            <label for="brand_name">BRAND OR AGENCY NAME</label>
                            <input type="text" name="brand_name" id="brand_name">
                        </div>
                        <div class="form-group">
                            <label for="project_type">PROJECT CATEGORY</label>
                            <select name="project_type" id="project_type">
                                <option value="Commercial Photography">Commercial Photography</option>
                                <option value="Architecture">Architecture</option>
                                <option value="Brand Identity">Brand Identity Design</option>
                                <option value="Podcast/Studio Rental">Podcast/Studio Rental</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="timeline">DESIRED TIMELINE</label>
                            <input type="text" name="timeline" id="timeline" placeholder="e.g., Q3 2026">
                        </div>
                    </div>

                    <!-- Dynamic Individual Fields -->
                    <div class="dynamic-fields individual-fields" style="display: none;">
                        <div class="form-group">
                            <label for="event_type">EVENT TYPE</label>
                            <select name="event_type" id="event_type">
                                <option value="Wedding / Milestone">Wedding / Milestone</option>
                                <option value="Maternity / Baby">Maternity / Baby</option>
                                <option value="Private Portrait">Private Portrait</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="event_date">EVENT DATE</label>
                            <input type="date" name="event_date" id="event_date">
                        </div>
                        <div class="form-group">
                            <label for="location">LOCATION / VENUE</label>
                            <input type="text" name="location" id="location" placeholder="City or specific venue">
                        </div>
                    </div>
                    
                    <!-- Submit / Feedback -->
                    <button type="submit" class="submit-btn brut-btn">SUBMIT INQUIRY</button>
                    <div id="bookingFeedback" class="booking-feedback"></div>
                </form>
            </div>
            
        </div>
    </div>
</div>
