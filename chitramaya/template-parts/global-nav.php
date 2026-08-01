<?php
/**
 * Global Full-Screen Reveal Navigation
 * Accordion Dropdown on Mobile (Fitts's Law + Proximity Fix)
 * Brutalist Split-Screen Hover on Desktop.
 */
?>
<style>
/* Encapsulated Nav Styles to override old style.css conflicts */
.site-header { position: fixed; top: 0; left: 0; right: 0; z-index: 10000; display: flex; justify-content: space-between; align-items: center; padding: 1.5rem; mix-blend-mode: difference; }
.nav-logo { font-weight: 900; font-size: 1rem; letter-spacing: 0.05em; text-transform: uppercase; text-decoration: none; color: #fff !important; z-index: 10001; }
.nav-toggle { background: transparent; border: none; color: #fff !important; font-family: var(--font-sans, 'Inter', sans-serif); font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; z-index: 10001; padding: 0.5rem; outline: none; font-weight: 900; }

.c-global-nav { position: fixed; inset: 0; background: #E3DAC9; /* Thalam Studio Golden Light */ color: #111; z-index: 9999; display: flex; flex-direction: column; overflow-y: auto; opacity: 0; pointer-events: none; transition: opacity 0.2s ease; }
.c-global-nav[aria-hidden="false"] { opacity: 1; pointer-events: auto; }

.c-nav-container { padding: 8rem 1.5rem 4rem; display: flex; flex-direction: column; min-height: 100vh; position: relative; }

/* Accordion Group */
.c-nav-group { border-bottom: 2px solid rgba(0,0,0,0.1); }
.c-nav-group:first-child { border-top: 2px solid rgba(0,0,0,0.1); }

/* Modular Scale: Primary Items */
.c-nav-btn { background: transparent; border: none; color: #444; font-family: 'Inter', sans-serif; font-size: clamp(2rem, 8vw, 3.5rem); font-weight: 900; text-align: left; padding: 1.5rem 0; cursor: pointer; width: 100%; display: flex; justify-content: space-between; align-items: center; transition: color 0.2s, transform 0.2s; text-transform: uppercase; line-height: 1; letter-spacing: -0.02em; }
.c-nav-btn[aria-expanded="true"] { color: #111; }
.c-nav-btn:hover { color: #111; transform: translateX(10px); }

/* Vibrant Active States - Unified to Chitramaya Camel */
.c-nav-btn[aria-expanded="true"] { color: #A96F44; }

.c-nav-icon { font-weight: 400; font-size: 2rem; transition: transform 0.3s; color: inherit; }
.c-nav-btn[aria-expanded="true"] .c-nav-icon { transform: rotate(45deg); color: #A96F44; }

/* Modular Scale: Sub Items */
.c-nav-panel { display: none; padding: 0 0 2rem 1rem; }
.c-nav-btn[aria-expanded="true"] + .c-nav-panel { display: block; }

.c-nav-panel-title { display: inline-block; font-family: 'Inter', sans-serif; font-weight: 900; font-size: 1rem; letter-spacing: 0.05em; text-transform: uppercase; color: #111; text-decoration: none; margin-bottom: 1.5rem; border-bottom: 2px solid #A96F44; padding-bottom: 0.25rem; }
.c-nav-grid { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1.25rem; }
.c-nav-grid a { font-family: 'Inter', sans-serif; font-size: clamp(1.2rem, 4vw, 1.5rem); font-weight: 700; text-transform: capitalize; color: #111; text-decoration: underline; text-decoration-color: transparent; text-underline-offset: 4px; transition: text-decoration-color 0.2s; opacity: 1; }
.c-nav-grid a:hover { text-decoration-color: #A96F44; }

.c-nav-hook { margin-top: 2rem; font-family: 'Inter', sans-serif; font-size: 0.95rem; line-height: 1.6; color: #222; font-weight: 400; max-width: 400px; border-left: 4px solid #A96F44; padding-left: 1rem; }

/* DESKTOP SPLIT SCREEN (Brutalist Hover) */
@media (min-width: 992px) {
    .c-global-nav { overflow: hidden; }
    .c-nav-container { flex-direction: column; justify-content: center; padding: 0 3rem; width: 50vw; }
    .c-nav-group { border-bottom: none; }
    .c-nav-group:first-child { border-top: none; }
    
    .c-nav-btn { font-size: clamp(3rem, 5vw, 5rem); padding: 1.5rem 0; }
    .c-nav-icon { display: none; }
    
    .c-nav-panel { position: fixed; top: 0; right: 0; width: 50vw; height: 100vh; background: #E3DAC9; border-left: 2px solid rgba(0,0,0,0.1); padding: 6rem 4rem; display: none; flex-direction: column; justify-content: center; box-shadow: -20px 0 50px rgba(0,0,0,0.1); }
    .c-nav-btn[aria-expanded="true"] + .c-nav-panel { display: flex; }
    
    .c-nav-panel-title { font-size: 1.25rem; margin-bottom: 2rem; }
    .c-nav-grid a { font-size: 1.5rem; }
    .c-nav-hook { font-size: 1.1rem; margin-top: 3rem; max-width: 500px; }
}
</style>

<header class="site-header">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">Chitramaya Creatives</a>
    <button class="nav-toggle" id="cNavToggle" aria-expanded="false" aria-controls="cGlobalNav">
        <span class="nav-toggle-text">Menu</span>
    </button>
</header>

<div class="c-global-nav" id="cGlobalNav" aria-hidden="true">
    <div class="c-nav-container">
        
        <!-- Panel 1 -->
        <div class="c-nav-group">
            <button class="c-nav-btn" aria-expanded="true" aria-controls="panel-1">
                BRAND & CORPORATE <span class="c-nav-icon">+</span>
            </button>
            <div class="c-nav-panel" id="panel-1">
                <a href="<?php echo esc_url(home_url('/corporate-brand')); ?>" class="c-nav-panel-title">Corporate Overview &rarr;</a>
                <ul class="c-nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-1">Executive Headshots</a></li>
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-2">Website & Team Photography</a></li>
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-3">Corporate Video Profile</a></li>
                    <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>#service-4">Product Launches</a></li>
                </ul>
                <div class="c-nav-hook">Building trust with authentic, high-quality visual profiles of your leadership and infrastructure.</div>
            </div>
        </div>

        <!-- Panel 2 -->
        <div class="c-nav-group">
            <button class="c-nav-btn" aria-expanded="false" aria-controls="panel-2">
                COMMERCIAL <span class="c-nav-icon">+</span>
            </button>
            <div class="c-nav-panel" id="panel-2">
                <a href="<?php echo esc_url(home_url('/commercial')); ?>" class="c-nav-panel-title">Commercial Overview &rarr;</a>
                <ul class="c-nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-1">OOH Marketing Collaterals</a></li>
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-2">E-commerce & Product</a></li>
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-3">Food & Lifestyle</a></li>
                    <li><a href="<?php echo esc_url(home_url('/commercial')); ?>#service-4">Architecture & 360</a></li>
                </ul>
                <div class="c-nav-hook">Purpose-driven visuals engineered to influence consumer perception and drive action.</div>
            </div>
        </div>

        <!-- Panel 3 -->
        <div class="c-nav-group">
            <button class="c-nav-btn" aria-expanded="false" aria-controls="panel-3">
                EVENTS & PORTRAIT <span class="c-nav-icon">+</span>
            </button>
            <div class="c-nav-panel" id="panel-3">
                <a href="<?php echo esc_url(home_url('/events-portrait')); ?>" class="c-nav-panel-title">Events Overview &rarr;</a>
                <ul class="c-nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/maternity')); ?>">Maternity & Bump-to-Baby</a></li>
                    <li><a href="<?php echo esc_url(home_url('/thalam-baby')); ?>">Newborn & Infant</a></li>
                    <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>#service-4">Weddings & Celebrations</a></li>
                    <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>#service-3">Cultural Milestones</a></li>
                </ul>
                <div class="c-nav-hook">Preserving the human milestone with a cinematic, deeply emotional editorial eye.</div>
            </div>
        </div>

        <!-- Panel 4 -->
        <div class="c-nav-group">
            <button class="c-nav-btn" aria-expanded="false" aria-controls="panel-4">
                THALAM STUDIO <span class="c-nav-icon">+</span>
            </button>
            <div class="c-nav-panel" id="panel-4">
                <a href="<?php echo esc_url(home_url('/thalam-studio')); ?>" class="c-nav-panel-title">Thalam Studio Facility &rarr;</a>
                <ul class="c-nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Podcast & Interview</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>#production">Studio & Production</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>#media">Content & Media</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>#branding">Photography & Branding</a></li>
                </ul>
                <div class="c-nav-hook">A comprehensive content creation environment combining pristine audio, cinematic multi-camera visuals, and cohesive branding.</div>
            </div>
        </div>

        <!-- Panel 5 -->
        <div class="c-nav-group">
            <button class="c-nav-btn" aria-expanded="false" aria-controls="panel-5">
                BRAND DESIGN <span class="c-nav-icon">+</span>
            </button>
            <div class="c-nav-panel" id="panel-5">
                <a href="<?php echo esc_url(home_url('/brand-design')); ?>" class="c-nav-panel-title">Design Overview &rarr;</a>
                <ul class="c-nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>#identity">Core Identity</a></li>
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>#physical">Physical Presence</a></li>
                    <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>#campaign">Campaign & Distribution</a></li>
                </ul>
                <div class="c-nav-hook">Translating mission into tangible assets. We architect visual recognition and structural brand identity.</div>
            </div>
        </div>


    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('cNavToggle');
    const nav = document.getElementById('cGlobalNav');
    const body = document.body;
    const btns = document.querySelectorAll('.c-nav-btn');

    // Toggle Menu Open/Close
    toggle.addEventListener('click', () => {
        const isOpen = nav.getAttribute('aria-hidden') === 'false';
        nav.setAttribute('aria-hidden', isOpen ? 'true' : 'false');
        toggle.setAttribute('aria-expanded', !isOpen);
        body.style.overflow = isOpen ? '' : 'hidden'; 
        toggle.querySelector('.nav-toggle-text').innerText = isOpen ? 'Menu' : 'Close';
    });

    // Accordion / Hover Logic
    btns.forEach(btn => {
        const handleActivate = () => {
            // Close all others
            btns.forEach(b => {
                if(b !== btn) b.setAttribute('aria-expanded', 'false');
            });
            // On desktop, it acts as tabs (one is always open). On mobile, it acts as toggle accordion.
            const isDesktop = window.innerWidth >= 992;
            if (isDesktop) {
                btn.setAttribute('aria-expanded', 'true');
            } else {
                const current = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', !current);
            }
        };

        btn.addEventListener('click', handleActivate);
        // Removed mouseenter event to prevent accidental hover activations on desktop
    });

    // Auto-close menu when clicking a link
    const navLinks = document.querySelectorAll('.c-global-nav a');
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
