<?php
/**
 * Global Footer
 * Elegant, structured footer for Chithramaya Creatives.
 */
?>
<style>
  .global-footer {
    background-color: var(--wp--preset--color--chitramaya-base-dark, #0a0806);
    color: var(--wp--preset--color--chitramaya-text-light, #fdfbf7);
    padding: 8rem 2rem 2rem;
    font-family: var(--font-sans, 'Inter', sans-serif);
    position: relative;
    z-index: 10;
  }
  .global-footer-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 4rem;
    max-width: 1400px;
    margin: 0 auto;
  }
  @media (min-width: 768px) {
    .global-footer-grid {
      grid-template-columns: auto auto auto;
      justify-content: space-between;
      gap: 4rem;
    }
  }
  .footer-brand h2 {
    font-family: var(--font-serif, 'EB Garamond', serif);
    font-size: clamp(2rem, 5vw, 3rem);
    font-style: italic;
    margin-bottom: 1rem;
    line-height: 1;
    font-weight: 400;
  }
  .footer-brand p {
    color: rgba(255,255,255,0.6);
    line-height: 1.6;
    max-width: 400px;
    font-size: 1.1rem;
  }
  .footer-column h3 {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    margin-bottom: 1.5rem;
    color: var(--wp--preset--color--chitramaya-accent-vibrant, #c48b5e);
  }
  .footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  .footer-column a {
    color: #fff;
    text-decoration: none;
    transition: opacity 0.3s ease;
    font-size: 0.95rem;
  }
  .footer-column a:hover {
    opacity: 0.6;
  }
  .footer-bottom {
    margin-top: 6rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: center;
    justify-content: space-between;
    font-size: 0.8rem;
    color: rgba(255,255,255,0.4);
    max-width: 1400px;
    margin-left: auto;
    margin-right: auto;
  }
  @media (min-width: 768px) {
    .footer-bottom {
      flex-direction: row;
    }
  }
</style>

<footer class="global-footer">
  <div class="global-footer-grid">
    <div class="footer-brand">
      <h2>Chithramaya Creatives</h2>
      <p>An archivist of human experience. We preserve fleeting, powerful moments and immortalize them in a timeless, cinematic form.</p>
    </div>
    
    <div class="footer-column">
      <h3>The Archives</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>">Corporate & Brand Identity</a></li>
        <li><a href="<?php echo esc_url(home_url('/commercial')); ?>">Commercial Campaigns</a></li>
        <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>">Weddings & Cultural Milestones</a></li>
        <li><a href="<?php echo esc_url(home_url('/brand-design')); ?>">Brand Design</a></li>
        <li><a href="<?php echo esc_url(home_url('/podcast-interview')); ?>">Podcast & Interview</a></li>
        <li><a href="<?php echo esc_url(home_url('/maternity')); ?>">Maternity & Bump-to-Baby</a></li>
        <li><a href="<?php echo esc_url(home_url('/thalam-baby')); ?>">Newborn, Infant & Toddler</a></li>
      </ul>
    </div>
    
    <div class="footer-column">
      <h3>Connect</h3>
      <ul>
        <li><a href="mailto:sriramsridharan.designer@gmail.com">sriramsridharan.designer@gmail.com</a></li>
        <li><a href="https://wa.me/918098014123" target="_blank" rel="noopener noreferrer">+91 80980 14123 (WhatsApp)</a></li>
        <li style="margin-top: 1.5rem;"><a href="https://www.instagram.com/chithramaya_creatives/" target="_blank" rel="noopener noreferrer">Instagram</a></li>
      </ul>
    </div>
  </div>
  
  <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Chithramaya Creatives. All rights reserved.</span>
    <span style="text-align: right;">Designed with intent by CharNithi Software Crafts.<br>Select photography generously provided by creators on <a href="https://unsplash.com/?utm_source=chitramaya_creatives&utm_medium=referral" target="_blank" rel="noopener noreferrer" style="text-decoration: underline;">Unsplash</a>.</span>
  </div>
  
  <!-- WHATSAPP FLOATING CTA -->
  <a href="https://wa.me/918098014123?text=Hi%2C%20I%27m%20interested%20in%20booking%20a%20session%20at%20Chithramaya%20Creatives."
    class="whatsapp-fab" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    <span>Chat with us</span>
  </a>
</footer>

<script>
  // Global WhatsApp CTA Router
  document.addEventListener('DOMContentLoaded', () => {
    const bookingBtns = document.querySelectorAll('[data-trigger="booking"]');
    bookingBtns.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        
        let msg = "Hi! I'd like to speak with a Creative Director about an upcoming project.";
        const path = window.location.pathname;
        const id = btn.id;
        
        if (btn.hasAttribute('data-wa-msg')) {
           msg = btn.getAttribute('data-wa-msg');
        } else if (path.includes('brand-design') || path.includes('drawer-brand')) {
           msg = "Hi! I'm interested in commissioning a Brand Design project with Chithramaya. I'd love to discuss building my brand's visual identity.";
        } else if (path.includes('commercial')) {
           msg = "Hi! I'm interested in booking a Commercial Campaign shoot. I'd love to discuss the creative direction and timelines.";
        } else if (path.includes('corporate')) {
           msg = "Hi! I'm looking to commission a Corporate & Brand Identity project to elevate my brand's visual assets.";
        } else if (path.includes('events-portrait')) {
           msg = "Hi! I'd like to check availability and reserve a date for an upcoming Event/Portrait session.";
        } else if (path.includes('podcast')) {
           msg = "Hi! I'm interested in booking the Thalam Podcast Studio for an upcoming recording session.";
        } else if (path.includes('maternity') || path.includes('thalam-baby')) {
           msg = "Hi! I'd like to book a Maternity/Bump-to-Baby session to document my family's journey.";
        } else if (path.includes('thalam-studio')) {
           if (id === 'cta-ad-shoots') {
             msg = "Hi! I'm interested in booking the Thalam Studio for a Commercial Ad Shoot.";
           } else if (id === 'cta-podcast') {
             msg = "Hi! I'm interested in booking the Thalam Podcast Studio for an upcoming recording session.";
           } else if (id === 'cta-product') {
             msg = "Hi! I'm interested in booking the Thalam Studio for a Product Photography shoot.";
           } else if (id === 'cta-food') {
             msg = "Hi! I'm interested in booking the Thalam Studio for a Food & Beverage shoot.";
           } else {
             msg = "Hi! I'm interested in renting the Thalam Studio space.";
           }
        } else if (path.includes('production') || path.includes('chitramaya-landing') || path === '/' || path === '') {
           msg = "Hi! I'd like to speak with a Creative Director about an upcoming project.";
        }
        
        const whatsappUrl = 'https://wa.me/918098014123?text=' + encodeURIComponent(msg);
        window.open(whatsappUrl, '_blank');
      });
    });
  });
</script>
