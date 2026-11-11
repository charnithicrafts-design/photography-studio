<?php
/**
 * Global Full-Screen Reveal Navigation
 * Editorial Warm Brutalism
 * Simple Inline Accordion
 */
?>
<style>
/* Encapsulated Nav Styles — Strict Brand Typography System */
.site-header { 
  position: fixed; 
  top: 0; 
  left: 0; 
  right: 0; 
  z-index: 10000; 
  display: flex; 
  justify-content: space-between; 
  align-items: center; 
  padding: var(--space-3, 24px) var(--space-4, 32px); 
  mix-blend-mode: difference; 
}
.nav-logo { 
  font-family: var(--font-primary, 'Lato', sans-serif); 
  font-weight: 900; 
  font-size: var(--type-body, 0.9375rem); 
  letter-spacing: 0.1em; 
  text-transform: uppercase; 
  text-decoration: none; 
  color: #fff !important; 
  z-index: 10001; 
}
.nav-toggle { 
  background: transparent; 
  border: none; 
  color: #fff !important; 
  font-family: var(--font-primary, 'Lato', sans-serif); 
  font-size: var(--type-micro, 0.6875rem); 
  letter-spacing: 0.12em; 
  text-transform: uppercase; 
  cursor: pointer; 
  z-index: 10001; 
  padding: 0.5rem; 
  outline: none; 
  font-weight: 700; 
  min-height: var(--min-touch-target, 48px); 
  display: inline-flex; 
  align-items: center; 
  justify-content: flex-end; 
  transition: transform 0.2s, opacity 0.2s; 
}
.nav-toggle:hover { 
  opacity: 0.8;
  transform: scale(1.05); 
}

.c-global-nav { 
  position: fixed; 
  inset: 0; 
  background: var(--color-bg, #F7F4ED); 
  color: var(--color-dark, #171E4A); 
  z-index: 9999; 
  display: flex; 
  flex-direction: column; 
  overflow-y: auto; 
  opacity: 0; 
  pointer-events: none; 
  transition: opacity 0.4s ease; 
}
.c-global-nav[aria-hidden="false"] { 
  opacity: 1; 
  pointer-events: auto; 
}

.c-nav-container { 
  padding: clamp(8rem, 20vh, 12rem) calc(var(--space-4, 32px) + 0.5rem) var(--space-8, 64px) var(--space-4, 32px); 
  display: flex; 
  flex-direction: column; 
  align-items: flex-end; 
  justify-content: flex-start; 
  min-height: 100vh; 
  position: relative; 
  gap: var(--space-4, 32px); 
  width: 100%; 
  box-sizing: border-box; 
}

@media (min-width: 992px) {
  .site-header {
    padding: var(--space-3, 24px) var(--space-6, 48px);
  }
  .c-nav-container {
    padding-right: calc(var(--space-6, 48px) + 0.5rem);
    padding-left: var(--space-6, 48px);
  }
}

/* Core Links & Accordion Toggles — Display Scale (32-40pt / Lato Black 900) */
.c-nav-link, 
.c-nav-btn { 
  background: transparent; 
  border: none; 
  color: var(--color-dark, #171E4A); 
  font-family: var(--font-primary, 'Lato', sans-serif); 
  font-size: var(--type-display, clamp(2.5rem, 4vw, 3.25rem)); 
  font-weight: 900; 
  text-align: right; 
  cursor: pointer; 
  display: block; 
  text-decoration: none; 
  text-transform: none; 
  line-height: 1.05; 
  letter-spacing: -0.01em; 
  transition: color 0.22s ease; 
  width: 100%; 
}
.c-nav-link:hover, 
.c-nav-btn:hover { 
  color: var(--color-accent, #35A248); 
}

.c-nav-btn { 
  display: flex; 
  justify-content: flex-end; 
  align-items: center; 
  gap: var(--space-2, 16px); 
}
.c-nav-btn[aria-expanded="true"] { 
  color: var(--color-accent, #35A248); 
}

.c-nav-icon { 
  font-family: var(--font-primary, 'Lato', sans-serif); 
  font-size: clamp(1.5rem, 2.5vw, 2rem); 
  font-weight: 300; 
  transition: transform 0.3s ease; 
  font-style: normal; 
  line-height: 1; 
}
.c-nav-btn[aria-expanded="true"] .c-nav-icon { 
  transform: rotate(45deg); 
}

/* Submenu Panel (Inline Accordion) — Subhead Scale (11-14pt / Lato Bold 700) */
.c-nav-group { 
  width: 100%; 
  display: flex; 
  flex-direction: column; 
  align-items: center; 
}
.c-nav-panel { 
  display: none; 
  overflow: hidden; 
  padding-top: var(--space-2, 16px); 
  margin-bottom: var(--space-2, 16px); 
  width: 100%; 
}
.c-nav-btn[aria-expanded="true"] + .c-nav-panel { 
  display: block; 
  animation: slideDown 0.3s ease-out forwards; 
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-8px); }
    to { opacity: 1; transform: translateY(0); }
}

.c-nav-grid { 
  list-style: none; 
  padding: 0; 
  margin: 0; 
  display: flex; 
  flex-direction: column; 
  align-items: flex-end; 
  gap: var(--space-2, 16px); 
}
.c-nav-grid a { 
  font-family: var(--font-primary, 'Lato', sans-serif); 
  font-size: var(--type-subhead, clamp(0.9375rem, 1.2vw, 1.125rem)); 
  font-weight: 700; 
  text-transform: none; 
  letter-spacing: 0.08em; 
  color: var(--color-dark, #171E4A); 
  text-decoration: none; 
  transition: color 0.2s ease; 
}
.c-nav-grid a:hover { 
  color: var(--color-accent, #35A248); 
}
</style>

<header class="site-header">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-logo">Chithramaya Creatives</a>
    <button class="nav-toggle" id="cNavToggle" aria-expanded="false" aria-controls="cGlobalNav">
        <span class="nav-toggle-text">Menu</span>
    </button>
</header>

<nav class="c-global-nav" id="cGlobalNav" aria-hidden="true">
    <div class="c-nav-container">
        
        <!-- Direct Links -->
        <a href="<?php echo esc_url(home_url('/corporate-brand')); ?>" class="c-nav-link">Brand & Corporate</a>
        
        <a href="<?php echo esc_url(home_url('/commercial')); ?>" class="c-nav-link">Commercial</a>
        
        <a href="<?php echo esc_url(home_url('/events-portrait')); ?>" class="c-nav-link">Events & Portraits</a>
        
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
</nav>

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
