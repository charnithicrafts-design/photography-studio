<?php
/**
 * Global Full-Screen Reveal Navigation
 * Mobile-first stacked layout, Desktop split-screen brutalist hover reveal.
 */
?>
<!-- The Header Bar (Always visible) -->
<header class="site-header">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">Chitramaya Creatives</a>
    <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="globalNav">
        <span class="nav-toggle-text">Menu</span>
    </button>
</header>

<!-- The Full-Screen Reveal Menu -->
<div class="global-nav" id="globalNav" aria-hidden="true">
    <div class="global-nav-container">
        
        <!-- Left Column: Primary Horizontals -->
        <div class="nav-horizontals">
            <button class="nav-horizontal-item is-active" data-target="panel-1">BRAND & CORPORATE</button>
            <button class="nav-horizontal-item" data-target="panel-2">COMMERCIAL PHOTOGRAPHY</button>
            <button class="nav-horizontal-item" data-target="panel-3">EVENTS & PORTRAIT</button>
            <button class="nav-horizontal-item" data-target="panel-4">PODCAST & INTERVIEW</button>
            <button class="nav-horizontal-item" data-target="panel-5">BRAND DESIGN</button>
        </div>

        <!-- Right Column: Vertical Sub-services -->
        <div class="nav-verticals">
            
            <!-- Panel 1 -->
            <div class="nav-panel is-active" id="panel-1">
                <a href="<?php echo esc_url(home_url('/corporate-brand')); ?>" class="nav-panel-title">Brand & Corporate Overview &rarr;</a>
                <ul class="nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-1">Executive Headshots & Portraits</a></li>
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-2">Website & Team Photography</a></li>
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-3">Corporate Video & Profile</a></li>
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-4">Product Launches & Seminars</a></li>
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-5">Brand Ads & TVC</a></li>
                </ul>
                <div class="nav-hook">
                    Humanizing your brand and capturing your corporate culture. We build trust and credibility with authentic, high-quality visuals of your team, infrastructure, and corporate events.
                </div>
            </div>

            <!-- Panel 2 -->
            <div class="nav-panel" id="panel-2">
                <a href="<?php echo esc_url(home_url('/commercial')); ?>" class="nav-panel-title">Commercial Photography Overview &rarr;</a>
                <ul class="nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-1">OOH Marketing Collaterals</a></li>
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-2">E-commerce & Product</a></li>
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-3">Food & Lifestyle</a></li>
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-4">Architecture & 360 Photography</a></li>
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-5">Social Media & PR Campaigns</a></li>
                </ul>
                <div class="nav-hook">
                    Purpose-driven visuals designed to influence consumer perception. From clean clinical products to real-life lifestyle scenarios, we architect images that sell.
                </div>
            </div>

            <!-- Panel 3 -->
            <div class="nav-panel" id="panel-3">
                <a href="<?php echo esc_url(home_url('/events-portrait')); ?>" class="nav-panel-title">Events & Portrait Overview &rarr;</a>
                <ul class="nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/maternity')); ?>">Maternity & Bump-to-Baby</a></li>
                    <li><a href="<?php echo esc_url(home_url('/thalam-baby')); ?>">Newborn, Infant & Toddler</a></li>
                    <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>">Weddings & Destination Celebrations</a></li>
                    <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>">Generational & Cultural Milestones</a></li>
                    <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>">The Grand Family Heirloom</a></li>
                </ul>
                <div class="nav-hook">
                    Preserving the human milestone. We create a timeless, emotional archive of the people you love the most, from the first breath to grand generational gatherings.
                </div>
            </div>

            <!-- Panel 4 -->
            <div class="nav-panel" id="panel-4">
                <a href="<?php echo esc_url(home_url('/podcast-interview')); ?>" class="nav-panel-title">Podcast & Interview Overview &rarr;</a>
                <ul class="nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Studio & Production Services</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Content & Media Distribution</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Photography & Branding Assets</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Multi-Camera & Lighting Setups</a></li>
                </ul>
                <div class="nav-hook">
                    Comprehensive content creation solutions combining audio, visual, and branding elements. We ensure your podcast not only sounds professional but looks visually compelling.
                </div>
            </div>

            <!-- Panel 5 -->
            <div class="nav-panel" id="panel-5">
                <a href="<?php echo esc_url(home_url('/brand-design')); ?>" class="nav-panel-title">Brand Design Overview &rarr;</a>
                <ul class="nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>">Logo & Core Identity Systems</a></li>
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>">OOH Campaigns & Installation Design</a></li>
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>">Product Design & Tactile Packaging</a></li>
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>">Marketing Collaterals & Posters</a></li>
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>">Comprehensive Brand Guidelines</a></li>
                </ul>
                <div class="nav-hook">
                    Identity is a strategic weapon. By translating a brand’s mission into tangible visual assets, we don't just design graphics; we architect lasting market recognition.
                </div>
            </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('navToggle');
    const nav = document.getElementById('globalNav');
    const body = document.body;
    const items = document.querySelectorAll('.nav-horizontal-item');
    const panels = document.querySelectorAll('.nav-panel');

    // Toggle Menu Open/Close
    toggle.addEventListener('click', () => {
        const isOpen = nav.getAttribute('aria-hidden') === 'false';
        nav.setAttribute('aria-hidden', isOpen ? 'true' : 'false');
        toggle.setAttribute('aria-expanded', !isOpen);
        body.style.overflow = isOpen ? '' : 'hidden'; // Prevent background scrolling
        toggle.querySelector('.nav-toggle-text').innerText = isOpen ? 'Menu' : 'Close';
    });

    // Handle Hover (Desktop) & Tap (Mobile)
    items.forEach(item => {
        item.addEventListener('mouseenter', () => activatePanel(item));
        item.addEventListener('click', () => activatePanel(item));
    });

    function activatePanel(activeItem) {
        const targetId = activeItem.getAttribute('data-target');
        
        // Instant CSS class swap (Zero transitions)
        items.forEach(i => i.classList.remove('is-active'));
        panels.forEach(p => p.classList.remove('is-active'));
        
        activeItem.classList.add('is-active');
        document.getElementById(targetId).classList.add('is-active');
    }

    // Auto-close menu when clicking a link (vital for smooth anchor scrolling)
    const navLinks = document.querySelectorAll('#globalNav a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            nav.setAttribute('aria-hidden', 'true');
            toggle.setAttribute('aria-expanded', 'false');
            body.style.overflow = '';
            toggle.querySelector('.nav-toggle-text').innerText = 'Menu';
        });
    });
});
</script>
