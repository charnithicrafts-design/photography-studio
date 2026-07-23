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
            <button class="nav-horizontal-item is-active" data-target="panel-1">COMMERCIAL & BRAND</button>
            <button class="nav-horizontal-item" data-target="panel-2">EVENTS & PORTRAIT</button>
            <button class="nav-horizontal-item" data-target="panel-3">TALAM STUDIO SPACE</button>
            <button class="nav-horizontal-item" data-target="panel-4">THE WORKFLOW</button>
            <button class="nav-horizontal-item" data-target="panel-5">BRAND DESIGN</button>
        </div>

        <!-- Right Column: Vertical Sub-services -->
        <div class="nav-verticals">
            
            <!-- Panel 1 -->
            <div class="nav-panel is-active" id="panel-1">
                <ul class="nav-grid">
                    <li><a href="#work">Executive Portfolios & Team Identity</a></li>
                    <li><a href="#work">Workspace & Cinematic Culture</a></li>
                    <li><a href="#work">E-Commerce & Product Catalogues</a></li>
                    <li><a href="#work">Events, Seminars & Brand Launches</a></li>
                    <li><a href="#work">Corporate Film & Brand TVCs</a></li>
                </ul>
                <div class="nav-hook">
                    Engineering visual authority. Every frame is calibrated to command respect, build profound trust, and assert your market dominance.
                </div>
            </div>

            <!-- Panel 2 -->
            <div class="nav-panel" id="panel-2">
                <ul class="nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/thalam-baby')); ?>">Maternity & Bump-to-Baby</a></li>
                    <li><a href="<?php echo esc_url(home_url('/thalam-baby')); ?>">Newborn, Infant & Toddler</a></li>
                    <li><a href="#events">Weddings & Destination Celebrations</a></li>
                    <li><a href="#events">Generational & Cultural Milestones</a></li>
                    <li><a href="#events">The Grand Family Heirloom</a></li>
                </ul>
                <div class="nav-hook">
                    Preserving the human milestone. We create a timeless, emotional archive of the people you love the most.
                </div>
            </div>

            <!-- Panel 3 -->
            <div class="nav-panel" id="panel-3">
                <ul class="nav-grid">
                    <li><a href="#thalam">The Studio Space & Engineering</a></li>
                    <li><a href="#thalam">Content Editing & Distribution</a></li>
                    <li><a href="#thalam">Podcast Branding & Asset Creation</a></li>
                </ul>
                <div class="nav-hook">
                    The theater of dialogue. Fusing broadcast-grade audio engineering with cinematic visual production to elevate your media property.
                </div>
            </div>

            <!-- Panel 4 -->
            <div class="nav-panel" id="panel-4">
                <ul class="nav-grid">
                    <li><a href="#process">1. Initial Consultation</a></li>
                    <li><a href="#process">2. Pre-Production & Light Architecture</a></li>
                    <li><a href="#process">3. The Execution</a></li>
                    <li><a href="#process">4. Zero-Latency CDN Delivery</a></li>
                </ul>
                <div class="nav-hook">
                    From initial consultation to zero-latency CDN delivery. See exactly how we execute.
                </div>
            </div>

            <!-- Panel 5 -->
            <div class="nav-panel" id="panel-5">
                <ul class="nav-grid">
                    <li><a href="#brand">Logo & Core Identity Systems</a></li>
                    <li><a href="#brand">OOH Campaigns & Installation Design</a></li>
                    <li><a href="#brand">Product Design & Tactile Packaging</a></li>
                    <li><a href="#brand">Marketing Collaterals & Posters</a></li>
                    <li><a href="#brand">Comprehensive Brand Guidelines</a></li>
                </ul>
                <div class="nav-hook">
                    Identity is not merely an aesthetic; it is a strategic weapon. We do not just design graphics; we architect lasting recognition.
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
});
</script>

<?php require_once get_stylesheet_directory() . '/template-parts/global-booking.php'; ?>
