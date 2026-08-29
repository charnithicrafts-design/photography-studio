<?php
/**
 * Global Full-Screen Reveal Navigation
 * Editorial Warm Brutalism
 * Simple Inline Accordion
 */
?>
<style>
/* Encapsulated Nav Styles */
.site-header { position: fixed; top: 0; left: 0; right: 0; z-index: 10000; display: flex; justify-content: space-between; align-items: center; padding: 1.5rem; mix-blend-mode: difference; }
.nav-logo { font-family: var(--font-serif, 'Roboto Slab', serif); font-weight: 400; font-size: 1.25rem; letter-spacing: 0.05em; text-transform: uppercase; text-decoration: none; color: #fff !important; z-index: 10001; }
.nav-toggle { background: transparent; border: none; color: #fff !important; font-family: var(--font-primary, 'Lato', sans-serif); font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; cursor: pointer; z-index: 10001; padding: 0.5rem; outline: none; font-weight: 900; transition: transform 0.2s; }
.nav-toggle:hover { transform: scale(1.05); }

.c-global-nav { position: fixed; inset: 0; background: var(--color-bg, #F7F4ED); color: var(--color-dark, #171E4A); z-index: 9999; display: flex; flex-direction: column; overflow-y: auto; opacity: 0; pointer-events: none; transition: opacity 0.4s ease; }
.c-global-nav[aria-hidden="false"] { opacity: 1; pointer-events: auto; }

.c-nav-container { padding: clamp(10rem, 25vh, 15rem) 1.5rem 4rem; display: flex; flex-direction: column; align-items: flex-end; justify-content: flex-start; min-height: 100vh; position: relative; gap: 1.5rem; max-width: 1200px; margin: 0 auto; width: 100%; }

/* Core Links & Accordion Toggles */
.c-nav-link, .c-nav-btn { background: transparent; border: none; color: var(--color-dark, #171E4A); font-family: var(--font-serif, 'Roboto Slab', serif); font-size: clamp(1.75rem, 7vw, 4.5rem); font-weight: 400; text-align: right; cursor: pointer; display: block; text-decoration: none; text-transform: uppercase; line-height: 1.2; letter-spacing: -0.02em; transition: color 0.3s; width: 100%; }
.c-nav-link:hover, .c-nav-btn:hover { color: var(--color-accent, #35A248); }

.c-nav-btn { display: flex; justify-content: flex-end; align-items: center; gap: 1rem; }
.c-nav-btn[aria-expanded="true"] { color: var(--color-accent, #35A248); }

.c-nav-icon { font-family: var(--font-sans, 'Inter', sans-serif); font-size: clamp(1.75rem, 7vw, 4.5rem); font-weight: 300; transition: transform 0.4s ease; font-style: normal; line-height: 1; }
.c-nav-btn[aria-expanded="true"] .c-nav-icon { transform: rotate(45deg); }

/* Submenu Panel (Inline Accordion) */
.c-nav-group { width: 100%; display: flex; flex-direction: column; align-items: center; }
.c-nav-panel { display: none; overflow: hidden; padding-top: 1.5rem; margin-bottom: 1rem; width: 100%; }
.c-nav-btn[aria-expanded="true"] + .c-nav-panel { display: block; animation: slideDown 0.4s ease-out forwards; }

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.c-nav-grid { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; align-items: flex-end; gap: 1rem; }
.c-nav-grid a { font-family: var(--font-sans, 'Inter', sans-serif); font-size: clamp(1rem, 2vw, 1.25rem); font-weight: 400; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-dark, #2A2724); text-decoration: none; transition: color 0.2s; }
.c-nav-grid a:hover { color: var(--accent, #C06547); }
</style>

<header class="site-header">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">Chithramaya Creatives</a>
    <button class="nav-toggle" id="cNavToggle" aria-expanded="false" aria-controls="cGlobalNav">
        <span class="nav-toggle-text">Menu</span>
    </button>
</header>

<div class="c-global-nav" id="cGlobalNav" aria-hidden="true">
    <div class="c-nav-container">
        
        <!-- Direct Links -->
        <a href="<?php echo esc_url(home_url('/corporate-brand')); ?>" class="c-nav-link">Brand & Corporate</a>
        
        <a href="<?php echo esc_url(home_url('/commercial')); ?>" class="c-nav-link">Commercial</a>
        
        <a href="<?php echo esc_url(home_url('/events-portrait')); ?>" class="c-nav-link">Events & Portrait</a>
        
        <!-- Simple Accordion -->
        <div class="c-nav-group">
            <button class="c-nav-btn accordion-toggle" aria-expanded="false" aria-controls="panel-thalam">
                Thalam Studio <span class="c-nav-icon">+</span>
            </button>
            <div class="c-nav-panel" id="panel-thalam">
                <ul class="c-nav-grid">
                    <li><a href="<?php echo esc_url(home_url('/thalam-studio')); ?>">Thalam Studio Facility</a></li>
                    <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Podcast & Interview</a></li>
                    <li><a href="<?php echo esc_url(home_url('/thalam-studio')); ?>#services">Photography & Branding</a></li>
                </ul>
            </div>
        </div>

        <!-- Direct Link -->
        <a href="<?php echo esc_url(home_url('/brand-design')); ?>" class="c-nav-link">Brand Design</a>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.getElementById('cNavToggle');
    const nav = document.getElementById('cGlobalNav');
    const body = document.body;
    const accordions = document.querySelectorAll('.accordion-toggle');

    // Toggle Menu Open/Close
    toggle.addEventListener('click', () => {
        const isOpen = nav.getAttribute('aria-hidden') === 'false';
        nav.setAttribute('aria-hidden', isOpen ? 'true' : 'false');
        toggle.setAttribute('aria-expanded', !isOpen);
        body.style.overflow = isOpen ? '' : 'hidden'; 
        toggle.querySelector('.nav-toggle-text').innerText = isOpen ? 'Menu' : 'Close';
    });

    // Simple Inline Accordion Logic
    accordions.forEach(btn => {
        btn.addEventListener('click', () => {
            const current = btn.getAttribute('aria-expanded') === 'true';
            
            // Close all other accordions (if any)
            accordions.forEach(b => b.setAttribute('aria-expanded', 'false'));
            
            // Toggle clicked
            btn.setAttribute('aria-expanded', !current);
        });
    });

    // Auto-close menu when clicking a link (unless it's an accordion toggle)
    const navLinks = document.querySelectorAll('.c-global-nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            nav.setAttribute('aria-hidden', 'true');
            toggle.setAttribute('aria-expanded', 'false');
            body.style.overflow = '';
            toggle.querySelector('.nav-toggle-text').innerText = 'Menu';
            
            // Reset accordions
            accordions.forEach(b => b.setAttribute('aria-expanded', 'false'));
        });
    });
});
</script>
