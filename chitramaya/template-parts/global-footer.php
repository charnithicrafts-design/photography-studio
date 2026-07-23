<?php
/**
 * Global Footer
 * Elegant, structured footer for Chitramaya Creatives.
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
      grid-template-columns: 2fr 1fr 1fr;
      gap: 2rem;
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
      <h2>Chitramaya Creatives</h2>
      <p>An archivist of human experience. We preserve fleeting, powerful moments and immortalize them in a timeless, cinematic form.</p>
    </div>
    
    <div class="footer-column">
      <h3>The Archives</h3>
      <ul>
        <li><a href="<?php echo esc_url(home_url('/corporate-brand')); ?>">Corporate & Brand Identity</a></li>
        <li><a href="<?php echo esc_url(home_url('/commercial')); ?>">Commercial Campaigns</a></li>
        <li><a href="<?php echo esc_url(home_url('/events-portrait')); ?>">Weddings & Cultural Milestones</a></li>
        <li><a href="<?php echo esc_url(home_url('/production-brand-design')); ?>">Production & Assets</a></li>
        <li><a href="<?php echo esc_url(home_url('/maternity')); ?>">Maternity & Bump-to-Baby</a></li>
        <li><a href="<?php echo esc_url(home_url('/thalam-baby')); ?>">Newborn, Infant & Toddler</a></li>
      </ul>
    </div>
    
    <div class="footer-column">
      <h3>Connect</h3>
      <ul>
        <li><a href="mailto:studio@chitramaya.com">studio@chitramaya.com</a></li>
        <li><a href="#">+91 98765 43210 (WhatsApp)</a></li>
        <li style="margin-top: 1.5rem;"><a href="#" target="_blank">Instagram</a></li>
        <li><a href="#" target="_blank">LinkedIn</a></li>
      </ul>
    </div>
  </div>
  
  <div class="footer-bottom">
    <span>&copy; <?php echo date('Y'); ?> Chitramaya Creatives. All rights reserved.</span>
    <span>Designed with intent by CharNithi Software Crafts.</span>
  </div>
</footer>
