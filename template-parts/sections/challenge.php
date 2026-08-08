<?php
/**
 * Section: Challenge
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Chapter One · Where Strategy Meets Story (Video Background) ── -->
<div class="ax-frame" style="position: relative; color: #F5F1EA; min-height: clamp(520px, 78vh, 760px); display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; align-items: end; padding: clamp(70px, 12vh, 130px) clamp(28px, 5vw, 72px);" data-screen-label="Chapter One · The Modern Business Challenge">
  <video id="ch1-video" class="ax-photo" src="<?php echo esc_url($theme_uri . '/assets/456247_Bangkok_Thailand_1280x720.mp4'); ?>" autoplay muted loop playsinline webkit-playsinline="true" preload="auto" style="position: absolute; inset: 0; z-index: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 40%; filter: grayscale(0.5) contrast(1.05) brightness(0.9) saturate(0.85);"></video>
  <div style="position: absolute; inset: 0; z-index: 1; pointer-events: none; background: linear-gradient(130deg, rgba(197,106,55,0.34), rgba(150,78,42,0.14) 52%, rgba(30,22,16,0.28));"></div>
  <div style="position: absolute; inset: 0; z-index: 2; pointer-events: none; background: linear-gradient(180deg, rgba(23,19,15,0) 34%, rgba(23,19,15,0.5) 70%, rgba(23,19,15,0.86));"></div>
  <div class="ax-grain-layer"></div>
  <?php /* Deck slide 6: the "Terrain" display word is replaced by the Astrix mark,
           faded to a watermark. Decorative only — no alt text, aria-hidden, and it
           keeps the word's old slot in the DOM so the copy below (also z-index 3 but
           later in source order) still paints on top of it. Sized with plain
           width/height:auto rather than aspect-ratio: pairing aspect-ratio with a
           height makes Blink transfer that height back into a minimum WIDTH and
           overflow the viewport. */ ?>
  <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-02.webp'); ?>" alt="" aria-hidden="true" style="position: absolute; z-index: 3; pointer-events: none; user-select: none; right: clamp(28px, 5vw, 72px); top: clamp(48px, 10vh, 110px); width: clamp(240px, 38vw, 560px); height: auto; max-width: 100%; opacity: 0.08;">
  <div style="position: relative; z-index: 3; grid-column: 1 / span 10; display: flex; flex-direction: column; gap: 24px;">
    <span style="font-size: 11.5px; letter-spacing: 0.32em; color: rgba(245,241,234,0.7); text-transform: uppercase; font-weight: 500;"><?php echo esc_html(astrix_field('ch1_eyebrow', $front_id)); ?></span>
    <p style="margin: 0; font-size: clamp(28px, 3.6vw, 54px); line-height: 1.18; letter-spacing: -0.025em; font-weight: 500; max-width: 24ch; text-wrap: balance;"><?php echo wp_kses_post(astrix_field('ch1_headline', $front_id)); ?></p>
  </div>
</div>
