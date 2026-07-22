<?php
$content = file_get_contents('/home/charlie/Games/Projects/chitramaya/chitramaya/template-thalam.php');

// Replace CSS
$old_css = <<<EOD
    .hero { display: flex; flex-direction: column; min-height: calc(100vh - 80px); border-bottom: var(--rule); }
    .hero-left { padding: 3rem 1.5rem; display: flex; flex-direction: column; justify-content: space-between; border-bottom: var(--rule); }
    .hero-tag { font-size: 0.68rem; letter-spacing: 0.22em; color: var(--mid-grey); text-transform: uppercase; border: var(--rule-light); display: inline-block; padding: 0.4rem 0.8rem; margin-bottom: 3rem; }
    .hero-headline { font-weight: 700; font-size: clamp(3rem, 7vw, 7.5rem); line-height: 0.9; letter-spacing: -0.04em; text-transform: uppercase; }
    .hero-headline .accent-word { color: var(--accent); }
    .hero-body { margin-top: 3rem; }
    .hero-body p { font-size: 0.9rem; line-height: 1.8; color: var(--mid-grey); max-width: 420px; margin-bottom: 2.5rem; }
    .hero-ctas { display: flex; flex-direction: column; gap: 0.75rem; }
    .btn-primary { display: inline-flex; align-items: center; justify-content: space-between; background: var(--accent); color: var(--bg-light); font-family: var(--font-mono); font-weight: 700; font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 1.1rem 1.75rem; transition: background 0.2s; }
    .btn-primary:hover { background: var(--text-dark); }
    .btn-ghost { display: inline-flex; align-items: center; justify-content: space-between; border: var(--rule-light); color: var(--text-dark); font-family: var(--font-mono); font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 1.1rem 1.75rem; transition: all 0.2s; }
    .btn-ghost:hover { border-color: var(--text-dark); background: rgba(28,25,23,0.04); }
    .hero-right { position: relative; overflow: hidden; }
    .hero-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
    .hero-right:hover .hero-img { transform: scale(1.02); }
    .hero-img-caption { position: absolute; bottom: 2rem; right: 2rem; font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(28,25,23,0.6); }
EOD;

$new_css = <<<EOD
    .hero { position: relative; height: 100vh; width: 100%; overflow: hidden; cursor: crosshair; border-bottom: none; }
    .hero-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 50%; transform: scale(1.04); transition: transform 12s cubic-bezier(0.25,0.46,0.45,0.94); }
    .hero.loaded .hero-img { transform: scale(1.0); }
    .hero-overlay { display: block; position: absolute; inset: 0; background: linear-gradient(to right, rgba(10,10,10,0.8) 0%, rgba(10,10,10,0.4) 40%, transparent 100%); z-index: 1; pointer-events: none; }
    .hero-grain { position: absolute; inset: 0; opacity: 0.04; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E"); pointer-events: none; z-index: 2; }
    .hero-cursor-glow { position: absolute; width: 400px; height: 400px; border-radius: 50%; background: radial-gradient(circle, rgba(200,169,110,0.08) 0%, transparent 70%); pointer-events: none; transform: translate(-50%, -50%); transition: opacity 0.3s; opacity: 0; z-index: 3; }
    .hero-content { position: absolute; top: 50%; left: 1.5rem; right: 1.5rem; transform: translateY(-50%); display: flex; flex-direction: column; gap: 1.2rem; z-index: 4; }
    .hero-tag { font-size: 0.65rem; letter-spacing: 0.22em; color: var(--accent); text-transform: uppercase; margin-bottom: 0.5rem; display: block; text-shadow: 0 2px 10px rgba(0,0,0,0.5); }
    .hero-headline { font-family: var(--font-sans); font-weight: 900; font-size: clamp(3.5rem, 10vw, 7rem); line-height: 0.88; letter-spacing: -0.04em; text-transform: uppercase; color: var(--bg-light); text-shadow: 0 4px 24px rgba(0,0,0,0.5); }
    .hero-headline .accent-word { font-family: var(--font-serif); font-style: italic; font-weight: 400; color: var(--accent); letter-spacing: 0.02em; line-height: 1.5; text-transform: none; text-shadow: none; display: inline-block; }
    .hero-body { margin-top: 0.5rem; }
    .hero-body p { font-family: var(--font-sans); font-size: 0.85rem; line-height: 1.6; color: rgba(255,255,255,0.75); max-width: 480px; margin-bottom: 2rem; text-shadow: 0 2px 10px rgba(0,0,0,0.5); }
    .hero-ctas { display: flex; flex-direction: column; gap: 0.75rem; }
    .btn-primary { display: inline-flex; align-items: center; justify-content: center; background: var(--accent); color: var(--bg-light); font-family: var(--font-mono); font-weight: 700; font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 1.1rem 1.75rem; transition: background 0.2s; border: 1px solid var(--accent); border-radius: 50px; }
    .btn-primary:hover { background: var(--text-dark); border-color: var(--text-dark); }
    .btn-ghost { display: inline-flex; align-items: center; justify-content: center; background: transparent; border: 1px solid rgba(255,255,255,0.3); color: var(--bg-light); font-family: var(--font-mono); font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 1.1rem 1.75rem; transition: all 0.2s; border-radius: 50px; }
    .btn-ghost:hover { border-color: var(--bg-light); background: rgba(255,255,255,0.05); }
EOD;

$content = str_replace($old_css, $new_css, $content);

// Replace Media Queries for Hero
$old_mq = <<<EOD
      .hero { grid-template-columns: 1fr 1fr; display: grid; }
      .hero-left { padding: 4rem 3rem; border-right: var(--rule); border-bottom: none; }
EOD;

$new_mq = <<<EOD
      .hero-content { left: 3rem; max-width: 800px; }
      .hero-ctas { flex-direction: row; }
EOD;

$content = str_replace($old_mq, $new_mq, $content);

// Replace HTML
$old_html = <<<EOD
  <section class="hero" id="hero">
    <div class="hero-left">
      <div>
        <div class="hero-tag"><?php echo esc_html( get_field('thalam_hero_tag') ?: 'Production Hub // ' ); ?></div>
        <h1 class="hero-headline"><?php echo wp_kses_post( get_field('thalam_hero_headline') ?: 'We<br><span class="accent-word">Execute.</span><br>You<br>Deliver.' ); ?></h1>
      </div>
      <div class="hero-body">
        <p><?php echo wp_kses_post( get_field('thalam_hero_body') ?: 'Thalam is the operational studio of Chitramaya Creatives — specialising in ad shoots and baby photography. Controlled light. Real moments. Zero friction from brief to delivery.' ); ?></p>
        <div class="hero-ctas">
          <a href="#services" class="btn-primary">View All Services →</a>
          <a href="#booking" class="btn-ghost">Book a Session →</a>
        </div>
      </div>
    </div>
    <div class="hero-right">
      <img class="hero-img"
        src="<?php echo esc_url( get_field('thalam_hero_img_url') ?: 'https://images.unsplash.com/photo-1664817550969-5e76adc4a3fe?w=1600&q=90&auto=format&fit=crop' ); ?>"
        alt="Top-down view of professional photography gear, Sony Alpha and Canon lenses — Thalam Studio.">
      <div class="hero-img-caption">Thalam Studio · </div>
    </div>
  </section>
EOD;

$new_html = <<<EOD
  <section class="hero" id="hero">
    <div class="hero-cursor-glow" id="hero-glow"></div>
    <img class="hero-img"
      src="<?php echo esc_url( get_field('thalam_hero_img_url') ?: 'https://images.unsplash.com/photo-1664817550969-5e76adc4a3fe?w=2400&q=90&auto=format&fit=crop' ); ?>"
      alt="Top-down view of professional photography gear — Thalam Studio."
      loading="eager"
      onload="this.closest('.hero').classList.add('loaded')">
    <div class="hero-overlay"></div>
    <div class="hero-grain"></div>
    <div class="hero-content">
      <div class="hero-tag"><?php echo esc_html( get_field('thalam_hero_tag') ?: 'Production Hub // ' ); ?></div>
      <h1 class="hero-headline"><?php echo wp_kses_post( get_field('thalam_hero_headline') ?: 'We<br><span class="accent-word">Execute.</span><br>You<br>Deliver.' ); ?></h1>
      <div class="hero-body">
        <p><?php echo wp_kses_post( get_field('thalam_hero_body') ?: 'Thalam is the operational studio of Chitramaya Creatives — specialising in ad shoots and baby photography. Controlled light. Real moments. Zero friction from brief to delivery.' ); ?></p>
        <div class="hero-ctas">
          <a href="#services" class="btn-primary">View All Services →</a>
          <a href="#booking" class="btn-ghost">Book a Session →</a>
        </div>
      </div>
    </div>
  </section>
EOD;

$content = str_replace($old_html, $new_html, $content);

// Add Script for Cursor Glow
$old_footer = "  <?php wp_footer(); ?>\n</body>";
$new_footer = <<<EOD
  <script>
    const hero = document.getElementById('hero');
    const glow = document.getElementById('hero-glow');
    if (hero && glow) {
      hero.addEventListener('mousemove', (e) => {
        const rect = hero.getBoundingClientRect();
        glow.style.left = (e.clientX - rect.left) + 'px';
        glow.style.top = (e.clientY - rect.top) + 'px';
        glow.style.opacity = '1';
      });
      hero.addEventListener('mouseleave', () => { glow.style.opacity = '0'; });
    }
  </script>
  <?php wp_footer(); ?>
</body>
EOD;

$content = str_replace($old_footer, $new_footer, $content);

file_put_contents('/home/charlie/Games/Projects/chitramaya/chitramaya/template-thalam.php', $content);
echo "Successfully updated template-thalam.php\n";
?>
