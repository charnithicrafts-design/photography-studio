<?php
/**
 * Global Footer — Chithramaya Creatives
 * Standardized 8pt Grid & Brand-Compliant Navy Anchor
 */
?>
<style>
  .c-global-footer {
    background-color: var(--color-dark, #171E4A);
    color: var(--color-white, #FFFFFF);
    padding: var(--space-10, 80px) var(--space-4, 32px) var(--space-4, 32px);
    font-family: var(--font-primary, 'Lato', sans-serif);
    position: relative;
    z-index: 20;
    border-top: 1px solid rgba(255, 255, 255, 0.12);
  }

  .c-footer-container {
    max-width: 1360px;
    margin: 0 auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: var(--space-8, 64px);
  }

  .c-footer-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6, 48px);
  }

  @media (min-width: 900px) {
    .c-footer-grid {
      grid-template-columns: 1.4fr 1.1fr 1.1fr;
      gap: var(--space-8, 64px);
    }
  }

  /* Column 1: Brand & Studio Vision */
  .c-footer-brand {
    display: flex;
    flex-direction: column;
    gap: var(--space-2, 16px);
  }

  .c-footer-logo {
    font-family: var(--font-serif, 'Roboto Slab', serif);
    font-size: clamp(1.5rem, 2.5vw, 2.25rem);
    font-weight: 700;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: var(--color-white, #FFFFFF);
    line-height: 1.1;
    margin: 0;
  }

  .c-footer-tagline {
    font-family: var(--font-serif, 'Roboto Slab', serif);
    font-size: 1.125rem;
    font-weight: 400;
    color: var(--color-accent, #35A248);
    margin: 0;
    line-height: var(--lh-snug, 1.25);
  }

  .c-footer-desc {
    color: rgba(255, 255, 255, 0.72);
    font-size: 0.9375rem; /* 15px */
    line-height: var(--lh-relaxed, 1.75);
    margin: 0;
    max-width: 440px;
  }

  .c-footer-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-1, 8px);
    padding: var(--space-1, 8px) var(--space-2, 16px);
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: var(--radius-md, 16px);
    font-size: 0.8125rem; /* 13px */
    color: rgba(255, 255, 255, 0.85);
    width: fit-content;
    margin-top: var(--space-1, 8px);
  }

  .c-footer-badge-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--color-accent, #35A248);
  }

  /* Columns 2 & 3 Headers & Lists */
  .c-footer-col {
    display: flex;
    flex-direction: column;
    gap: var(--space-3, 24px);
  }

  .c-footer-col-title {
    font-family: var(--font-primary, 'Lato', sans-serif);
    font-size: 0.8125rem; /* 13px */
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.14em;
    color: var(--color-accent, #35A248);
    margin: 0;
  }

  .c-footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: var(--space-2, 16px);
  }

  .c-footer-links a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    font-size: 0.9375rem; /* 15px */
    line-height: var(--lh-normal, 1.5);
    transition: color 0.2s ease, transform 0.2s ease;
    display: inline-block;
    width: fit-content;
  }

  .c-footer-links a:hover {
    color: var(--color-accent, #35A248);
    transform: translateX(4px);
  }

  .c-footer-contact-item {
    display: flex;
    flex-direction: column;
    gap: var(--space-0-5, 4px);
  }

  .c-footer-contact-label {
    font-size: 0.75rem; /* 12px */
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: rgba(255, 255, 255, 0.45);
  }

  .c-footer-contact-val {
    color: rgba(255, 255, 255, 0.9);
    font-size: 0.9375rem; /* 15px */
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .c-footer-contact-val:hover {
    color: var(--color-accent, #35A248);
  }

  .c-footer-cta-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-1, 8px);
    background: var(--color-accent, #35A248);
    color: var(--color-dark, #171E4A);
    font-family: var(--font-primary, 'Lato', sans-serif);
    font-size: 0.9375rem; /* 15px */
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    padding: var(--space-2, 16px) var(--space-3, 24px);
    border-radius: var(--radius-pill, 40px);
    text-decoration: none;
    min-height: var(--min-touch-target, 48px);
    transition: all 0.2s ease;
    width: fit-content;
    margin-top: var(--space-1, 8px);
    border: none;
    cursor: pointer;
  }

  .c-footer-cta-btn:hover {
    background: var(--color-yellow, #FAB417);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(53, 162, 72, 0.25);
  }

  /* Bottom Bar */
  .c-footer-bottom {
    padding-top: var(--space-4, 32px);
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    flex-direction: column;
    gap: var(--space-2, 16px);
    align-items: flex-start;
    justify-content: space-between;
    font-size: 0.8125rem; /* 13px */
    color: rgba(255, 255, 255, 0.45);
    line-height: var(--lh-normal, 1.5);
  }

  @media (min-width: 768px) {
    .c-footer-bottom {
      flex-direction: row;
      align-items: center;
    }
  }

  .c-footer-bottom a {
    color: rgba(255, 255, 255, 0.65);
    text-decoration: none;
    transition: color 0.2s ease;
  }

  .c-footer-bottom a:hover {
    color: var(--color-accent, #35A248);
  }

  /* WhatsApp Floating Action Button (Fitts's Law Target) */
  .c-whatsapp-fab {
    position: fixed;
    bottom: var(--space-3, 24px);
    right: var(--space-3, 24px);
    z-index: 999;
    display: inline-flex;
    align-items: center;
    gap: var(--space-1, 8px);
    background: #25D366;
    color: #FFFFFF;
    padding: var(--space-1, 8px) var(--space-3, 24px) var(--space-1, 8px) var(--space-2, 16px);
    border-radius: var(--radius-pill, 40px);
    font-size: 0.875rem; /* 14px */
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 6px 24px rgba(37, 211, 102, 0.35);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    min-height: var(--min-touch-target, 48px);
  }

  .c-whatsapp-fab:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 10px 32px rgba(37, 211, 102, 0.45);
    color: #FFFFFF;
  }

  .c-whatsapp-fab svg {
    width: 24px;
    height: 24px;
    fill: currentColor;
    flex-shrink: 0;
  }
</style>

<footer class="c-global-footer">
  <div class="c-footer-container">
    <div class="c-footer-grid">
      
      <!-- 01: Brand & Studio Profile -->
      <div class="c-footer-brand">
        <h2 class="c-footer-logo">Chithramaya Creatives</h2>
        <p class="c-footer-tagline">Visual storytelling with a human pulse.</p>
        <p class="c-footer-desc">
          A visual direction and photography studio based in Tiruchirappalli (Trichy), Tamil Nadu. Led by founder and visual director Sriram Sridharan.
        </p>
        <div class="c-footer-badge">
          <span class="c-footer-badge-dot"></span>
          <span>Thalam Studio — Production &amp; Podcast Suites</span>
        </div>
      </div>
      
      <!-- 02: Studio Disciplines -->
      <div class="c-footer-col">
        <h3 class="c-footer-col-title">[ Studio Disciplines ]</h3>
        <ul class="c-footer-links">
          <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>">Brand &amp; Corporate Photography</a></li>
          <li><a href="<?php echo esc_url(home_url('/commercial')); ?>">Commercial &amp; Product Campaigns</a></li>
          <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>">Events &amp; Heritage Portraits</a></li>
          <li><a href="<?php echo esc_url(home_url('/thalam-studio')); ?>">Thalam Production Studio</a></li>
          <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Podcast &amp; Interview Suites</a></li>
          <li><a href="<?php echo esc_url(home_url('/maternity')); ?>">Maternity &amp; Milestone Art</a></li>
          <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>">Brand Design Systems</a></li>
        </ul>
      </div>
      
      <!-- 03: Direct Connect & Studio Specs -->
      <div class="c-footer-col">
        <h3 class="c-footer-col-title">[ Studio Coordinates ]</h3>
        <div class="c-footer-contact-item">
          <span class="c-footer-contact-label">Direct Email</span>
          <a href="mailto:sriramsridharan.designer@gmail.com" class="c-footer-contact-val">sriramsridharan.designer@gmail.com</a>
        </div>
        <div class="c-footer-contact-item">
          <span class="c-footer-contact-label">Studio Phone / WhatsApp</span>
          <a href="https://wa.me/918098014123" target="_blank" rel="noopener noreferrer" class="c-footer-contact-val">+91 80980 14123</a>
        </div>
        <div class="c-footer-contact-item">
          <span class="c-footer-contact-label">Facility Location</span>
          <span class="c-footer-contact-val">Tiruchirappalli (Trichy), Tamil Nadu, India</span>
        </div>
        <div class="c-footer-contact-item">
          <span class="c-footer-contact-label">Visual Journal</span>
          <a href="https://www.instagram.com/chithramaya_creatives/" target="_blank" rel="noopener noreferrer" class="c-footer-contact-val">Instagram @chithramaya_creatives</a>
        </div>
        
        <button class="c-footer-cta-btn" data-trigger="booking">
          Bring us the story. &rarr;
        </button>
      </div>

    </div>
    
    <!-- Bottom Legal Bar -->
    <div class="c-footer-bottom">
      <span>&copy; <?php echo date('Y'); ?> Chithramaya Creatives. All rights reserved.</span>
      <span>Visual Direction by Sriram Sridharan &middot; Crafted with intent by CharNithi Software Crafts</span>
    </div>
  </div>

  <!-- WhatsApp Floating Action Button (Fitts's Law Compliant) -->
  <a href="https://wa.me/918098014123?text=Hi%2C%20I%27m%20interested%20in%20discussing%20a%20project%20with%20Chithramaya%20Creatives."
    class="c-whatsapp-fab" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    <span>Chat with us</span>
  </a>
</footer>

<script>
  // Global Contextual WhatsApp Booking Router
  document.addEventListener('DOMContentLoaded', () => {
    const bookingTriggers = document.querySelectorAll('[data-trigger="booking"]');
    bookingTriggers.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        
        let msg = "Hi Sriram! I'm interested in discussing a project with Chithramaya Creatives.";
        const path = window.location.pathname;
        const id = btn.id;
        
        if (btn.hasAttribute('data-wa-msg')) {
           msg = btn.getAttribute('data-wa-msg');
        } else if (path.includes('brand-design') || path.includes('drawer-brand')) {
           msg = "Hi Sriram! I'd like to discuss Brand Design and visual identity systems for my brand.";
        } else if (path.includes('commercial')) {
           msg = "Hi Sriram! I'd like to commission a Commercial Photography campaign.";
        } else if (path.includes('corporate')) {
           msg = "Hi Sriram! I'm interested in booking Brand & Corporate Identity photography.";
        } else if (path.includes('events-portrait')) {
           msg = "Hi Sriram! I'd like to check availability for an upcoming Event & Portrait session.";
        } else if (path.includes('podcast')) {
           msg = "Hi Sriram! I'd like to book the Thalam Podcast & Interview Studio.";
        } else if (path.includes('maternity')) {
           msg = "Hi Sriram! I'd like to reserve a Maternity & Milestone photography session.";
        } else if (path.includes('thalam-baby')) {
           msg = "Hi Sriram! I'd like to book a Thalam Baby portrait session.";
        } else if (path.includes('thalam-studio')) {
           msg = "Hi Sriram! I'm interested in booking the Thalam Production Studio facility.";
        }
        
        const whatsappUrl = 'https://wa.me/918098014123?text=' + encodeURIComponent(msg);
        window.open(whatsappUrl, '_blank');
      });
    });
  });
</script>
