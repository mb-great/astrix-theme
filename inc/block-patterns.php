<?php
/**
 * Astrix Gutenberg Block Patterns.
 *
 * Registers complete div-level section patterns in the Block Editor inserter under "Astrix Sections".
 * Each pattern can be inserted, edited at the div / HTML level, reordered, or removed.
 */

if (!defined('ABSPATH')) {
  exit;
}

add_action('init', function () {
  if (!function_exists('register_block_pattern_category') || !function_exists('register_block_pattern')) {
    return;
  }

  register_block_pattern_category('astrix_sections', array(
    'label' => 'Astrix Sections & Custom HTML Blocks',
  ));

  $theme_uri = get_template_directory_uri();

  // Pattern 0: Custom 12-Column HTML Container
  register_block_pattern('astrix/custom-html-container', array(
    'title'       => 'Astrix — 12-Column Custom HTML Container',
    'categories'  => array('astrix_sections'),
    'description' => 'A blank Astrix branded 12-column grid container ready for custom HTML, divs, and embeds.',
    'content'     => '<!-- wp:html -->
<section class="astrix-custom-block" style="position: relative; background: #F5F1EA; color: #211C17; padding: clamp(60px, 10vh, 120px) clamp(28px, 5vw, 72px);">
  <div class="grid-12" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
    <div style="grid-column: 1 / span 12;">
      <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 24px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Custom Section</span>
      </div>
      <h2 style="font-size: clamp(32px, 4vw, 56px); font-weight: 600; line-height: 1.1; margin: 0 0 20px;">Your Custom Headline Here</h2>
      <p style="font-size: 16px; line-height: 1.7; color: #3A3229; max-width: 60ch;">Add any custom HTML, embed widgets, or div structures inside this Astrix luxury grid container.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->',
  ));

  // Pattern 1: Hero Transformation Section
  register_block_pattern('astrix/hero-section', array(
    'title'       => 'Astrix — Prologue / Hero Section',
    'categories'  => array('astrix_sections'),
    'description' => 'Full-bleed luxury hero section with dual typography and CTA.',
    'content'     => '<!-- wp:html -->
<div id="hero" style="min-height: 100vh; background: #F5F1EA; overflow: hidden; position: relative;" data-screen-label="Prologue · The Belief">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(40px, 7vh, 90px) clamp(28px, 5vw, 72px) 0; align-items: center;">
    <div style="grid-column: 1 / span 7; display: flex; flex-direction: column; gap: clamp(26px, 3.6vh, 40px);">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">A Business Transformation Partner</span>
      </div>
      <h1 style="margin: 0; font-weight: 600; font-size: clamp(42px, 5.2vw, 88px); line-height: 1.03; letter-spacing: -0.035em; max-width: 15ch;">
        <span style="display: block;">Where strategy meets story.</span>
        <span style="display: block;">Built as <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">one.</em></span>
      </h1>
      <p style="margin: 0; font-size: clamp(17px, 1.5vw, 21px); line-height: 1.5; font-weight: 500; color: #211C17; max-width: 46ch;">Strategy, brand, technology and marketing were never meant to operate in separate rooms. At Astrix, we bring them together as one connected growth ecosystem.</p>
      <div>
        <a href="/contact" class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: linear-gradient(135deg, #2A2019, #1A1611); color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; text-decoration: none;">
          Let\'s Connect! <span>→</span>
        </a>
      </div>
    </div>
    <div class="ax-frame" style="grid-column: 8 / span 5; align-self: stretch; border-radius: 4px; min-height: clamp(360px, 62vh, 660px); position: relative; overflow: hidden;">
      <img class="ax-photo" style="width: 100%; height: 100%; object-fit: cover;" src="' . esc_url($theme_uri . '/assets/deck-01-hero.webp') . '" alt="Astrix Hero">
      <div class="ax-grain-layer"></div>
    </div>
  </div>
</div>
<!-- /wp:html -->',
  ));

  // Pattern 2: Chapter 1 — Where Strategy Meets Story
  register_block_pattern('astrix/challenge-section', array(
    'title'       => 'Astrix — Chapter 1: The Challenge',
    'categories'  => array('astrix_sections'),
    'description' => 'Dark cinematic section highlighting the fragmentation problem.',
    'content'     => '<!-- wp:html -->
<section style="position: relative; background: #1A1611; color: #F5F1EA; overflow: hidden; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px);">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
    <div style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px;">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: rgba(245,241,234,0.6); text-transform: uppercase;">Chapter One · The Challenge</span>
    </div>
    <h2 style="grid-column: 1 / span 11; font-weight: 600; font-size: clamp(38px, 5.4vw, 88px); line-height: 1.04; letter-spacing: -0.035em; margin: 30px 0;">
      Strategy without craft goes unnoticed.<br>
      Craft without engineering won\'t scale.<br>
      Growth without brand burns cash.
    </h2>
    <div style="grid-column: 1 / span 8;">
      <p style="font-size: clamp(17px, 1.5vw, 21px); line-height: 1.5; color: rgba(245,241,234,0.75);">When strategy, creative, digital and growth operate in silos, momentum leaks at every seam. Astrix unites them under a single discipline.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->',
  ));

  // Pattern 3: Chapter 2 — Invisible Pullquote & Letterbox
  register_block_pattern('astrix/invisible-section', array(
    'title'       => 'Astrix — Chapter 2: Invisible & Letterbox Image',
    'categories'  => array('astrix_sections'),
    'description' => 'Light narrative section with 16:9 cinematic photo and luxury pullquote.',
    'content'     => '<!-- wp:html -->
<section style="position: relative; background: #F5F1EA; overflow: hidden; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px);">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
    <div style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px;">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Chapter Two · Why Businesses Stay Invisible</span>
    </div>
    <h2 style="grid-column: 1 / span 11; font-weight: 600; font-size: clamp(38px, 5.4vw, 88px); line-height: 1.04; letter-spacing: -0.035em; margin: 24px 0 40px;">
      Great work nobody knows about isn\'t rare. It\'s the default.
    </h2>
    <div class="ax-frame" style="grid-column: 1 / span 12; border-radius: 4px; aspect-ratio: 16/9; min-height: 320px; position: relative; overflow: hidden;">
      <img class="ax-photo" style="width: 100%; height: 100%; object-fit: cover;" src="' . esc_url($theme_uri . '/assets/deck-02-invisible.webp') . '" alt="Astrix Chapter 2">
      <div class="ax-grain-layer"></div>
    </div>
    <div style="grid-column: 2 / span 10; margin-top: 60px;">
      <p style="margin: 0; font-family: \'Instrument Serif\', serif; font-style: italic; font-size: clamp(30px, 4.4vw, 66px); line-height: 1.16; color: #211C17;">The gap between an extraordinary product and market preference is rarely quality. It is almost always narrative, presence, and distribution.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->',
  ));

  // Pattern 4: Chapter 4 — What We Build (Ecosystems)
  register_block_pattern('astrix/ecosystems-section', array(
    'title'       => 'Astrix — Chapter 4: What We Build (4 Pillars)',
    'categories'  => array('astrix_sections'),
    'description' => 'Interactive 4-column service ecosystem grid.',
    'content'     => '<!-- wp:html -->
<section style="position: relative; background: #F5F1EA; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px);">
  <div class="grid-12" style="display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px;">
    <div style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px; margin-bottom: 20px;">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Chapter Four · What We Build</span>
    </div>
    <h2 style="grid-column: 1 / span 10; font-size: clamp(36px, 4.5vw, 72px); font-weight: 600; line-height: 1.05; margin: 0 0 50px;">Four interconnected disciplines. One compound return.</h2>
    
    <div style="grid-column: 1 / span 3; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 24px;">
      <span style="font-size: 11px; letter-spacing: 0.2em; color: #C56A37; text-transform: uppercase; font-weight: 600;">01 · Foundation</span>
      <h3 style="font-size: 24px; font-weight: 600; margin: 12px 0 10px;">Brand Strategy</h3>
      <p style="font-size: 14px; line-height: 1.6; color: #7A6F63;">Positioning, narrative, naming, and identity systems that give a business clear market preference.</p>
    </div>
    
    <div style="grid-column: 4 / span 3; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 24px;">
      <span style="font-size: 11px; letter-spacing: 0.2em; color: #C56A37; text-transform: uppercase; font-weight: 600;">02 · Expression</span>
      <h3 style="font-size: 24px; font-weight: 600; margin: 12px 0 10px;">Creative Studio</h3>
      <p style="font-size: 14px; line-height: 1.6; color: #7A6F63;">Art direction, high-craft campaigns, film, and content that earn attention honestly.</p>
    </div>
    
    <div style="grid-column: 7 / span 3; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 24px;">
      <span style="font-size: 11px; letter-spacing: 0.2em; color: #C56A37; text-transform: uppercase; font-weight: 600;">03 · Engine</span>
      <h3 style="font-size: 24px; font-weight: 600; margin: 12px 0 10px;">Digital Experience</h3>
      <p style="font-size: 14px; line-height: 1.6; color: #7A6F63;">High-performance digital products and websites where clarity is the interface.</p>
    </div>
    
    <div style="grid-column: 10 / span 3; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 24px;">
      <span style="font-size: 11px; letter-spacing: 0.2em; color: #C56A37; text-transform: uppercase; font-weight: 600;">04 · Scale</span>
      <h3 style="font-size: 24px; font-weight: 600; margin: 12px 0 10px;">AI Growth Systems</h3>
      <p style="font-size: 14px; line-height: 1.6; color: #7A6F63;">Intelligent growth engines, attribution, and lifecycle systems that compound over time.</p>
    </div>
  </div>
</section>
<!-- /wp:html -->',
  ));

  // Pattern 5: Epilogue / Conversion Session
  register_block_pattern('astrix/epilogue-section', array(
    'title'       => 'Astrix — Epilogue & Conversation CTA',
    'categories'  => array('astrix_sections'),
    'description' => 'Dark luxury conversion banner with coffee conversation prompt.',
    'content'     => '<!-- wp:html -->
<section style="position: relative; background: #211C17; color: #F5F1EA; padding: clamp(90px, 15vh, 160px) clamp(28px, 5vw, 72px); overflow: hidden;">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; align-items: center;">
    <div style="grid-column: 1 / span 7; display: flex; flex-direction: column; gap: 24px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: rgba(245,241,234,0.6); text-transform: uppercase;">Let\'s Talk</span>
      </div>
      <h2 style="font-size: clamp(38px, 5vw, 76px); font-weight: 600; line-height: 1.05; margin: 0;">
        Let\'s have a coffee <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">together.</em>
      </h2>
      <p style="font-size: 16.5px; line-height: 1.65; color: rgba(245,241,234,0.75); max-width: 46ch; margin: 0;">
        Every business starts with an idea. But ironically, plenty of great ones stay a well-kept secret. Tell us where you want to go.
      </p>
      <div style="margin-top: 10px;">
        <a href="/contact" class="ax-cta-light" style="display: inline-flex; align-items: center; gap: 12px; background: #F5F1EA; color: #211C17; font-size: 14.5px; font-weight: 600; padding: 16px 32px; border-radius: 100px; text-decoration: none;">
          Start a Conversation <span>→</span>
        </a>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->',
  ));
});
