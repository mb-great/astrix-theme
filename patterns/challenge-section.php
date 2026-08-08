<?php
/**
 * Title: Slide 6: Chapter 1 (Video Background Challenge)
 * Slug: astrix/challenge-section
 * Categories: astrix
 * Inserter: true
 */
$theme_uri = get_template_directory_uri();
?>
<!-- wp:html -->
<section class="sec-challenge-wrap" style="position:relative;background:#1A1611;color:#F5F1EA;min-height:clamp(520px,78vh,760px);display:grid;grid-template-columns:repeat(12,1fr);gap:24px;align-items:end;padding:clamp(80px,14vh,150px) clamp(28px,5vw,72px);overflow:hidden;">
  <video id="ch1-video" class="ax-photo" src="<?php echo esc_url($theme_uri . '/assets/456247_Bangkok_Thailand_1280x720.mp4'); ?>" autoplay muted loop playsinline webkit-playsinline="true" preload="auto" style="position:absolute;inset:0;z-index:0;width:100%;height:100%;object-fit:cover;object-position:center 40%;filter:grayscale(0.5) contrast(1.05) brightness(0.9) saturate(0.85);"></video>
  
  <div style="position:absolute;inset:0;z-index:1;pointer-events:none;background:linear-gradient(130deg, rgba(197,106,55,0.34), rgba(150,78,42,0.14) 52%, rgba(30,22,16,0.28));"></div>
  <div style="position:absolute;inset:0;z-index:2;pointer-events:none;background:linear-gradient(180deg, rgba(23,19,15,0) 34%, rgba(23,19,15,0.5) 70%, rgba(23,19,15,0.86));"></div>
  <div class="ax-grain-layer" style="position:absolute;inset:0;z-index:3;pointer-events:none;opacity:0.5;background-image:radial-gradient(rgba(255,255,255,0.06) 0.5px, transparent 0.6px), radial-gradient(rgba(0,0,0,0.05) 0.5px, transparent 0.6px);background-size:3px 3px, 4px 4px;"></div>
  
  <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-02.webp'); ?>" alt="" aria-hidden="true" style="position:absolute;z-index:3;pointer-events:none;user-select:none;right:clamp(28px,5vw,72px);top:clamp(48px,10vh,110px);width:clamp(240px,38vw,560px);height:auto;max-width:100%;opacity:0.08;">
  
  <div style="position:relative;z-index:4;grid-column:1 / span 10;display:flex;flex-direction:column;gap:20px;max-width:1440px;margin:0 auto;width:100%;">
    <div style="display:inline-flex;align-items:center;gap:12px;">
      <span style="display:inline-block;width:22px;height:1px;background:#C56A37;"></span>
      <span style="font-size:11.5px;letter-spacing:0.32em;color:rgba(245,241,234,0.7);text-transform:uppercase;font-weight:500;">Chapter One · The Modern Business Challenge</span>
    </div>
    
    <h2 style="margin:0;font-size:clamp(30px,4.2vw,62px);line-height:1.15;letter-spacing:-0.03em;font-weight:500;max-width:26ch;color:#F5F1EA;">
      Your customer meets you in twenty places before they ever <em style="font-family:'Instrument Serif',serif;font-style:italic;font-weight:400;color:#F5F1EA;">meet you.</em>
    </h2>
  </div>
</section>
<!-- /wp:html -->
