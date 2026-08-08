<?php
/**
 * Section: Hero
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Prologue · The Belief (Hero Section) ── -->
<div id="hero" style="min-height: 100vh; background: #F5F1EA; overflow: hidden; position: relative;" data-screen-label="Prologue · The Belief">
  <canvas id="hero-canvas" style="position: absolute; inset: 0; width: 100%; height: 100%; display: block; opacity: 0; animation: fadeIn 2.4s ease 0.5s forwards;"></canvas>

  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(40px, 7vh, 90px) clamp(28px, 5vw, 72px) 0; align-items: center;">
    <div style="grid-column: 1 / span 7; display: flex; flex-direction: column; gap: clamp(26px, 3.6vh, 40px);">
      <div style="display: flex; align-items: center; gap: 14px; opacity: 0; animation: riseIn 1s cubic-bezier(0.16, 1, 0.3, 1) 0.35s forwards;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(astrix_field('hero_eyebrow', $front_id)); ?></span>
      </div>
      <h1 style="margin: 0; font-weight: 600; font-size: clamp(42px, 5.2vw, 88px); line-height: 1.03; letter-spacing: -0.035em; max-width: 15ch; text-wrap: balance;">
        <span style="display: block; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 0.5s forwards;"><?php echo esc_html(astrix_field('hero_h1_line1', $front_id)); ?></span>
        <span style="display: block; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 0.68s forwards;"><?php echo esc_html(astrix_field('hero_h1_line2', $front_id)); ?> <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; letter-spacing: -0.01em; color: #C56A37;"><?php echo esc_html(astrix_field('hero_h1_emphasis', $front_id)); ?></em> <?php echo esc_html(astrix_field('hero_h1_line2_end', $front_id)); ?></span>
      </h1>
      <div style="opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 0.9s forwards; display: flex; flex-direction: column; gap: 16px;">
        <p style="margin: 0; font-size: clamp(17px, 1.5vw, 21px); line-height: 1.5; font-weight: 500; color: #211C17; max-width: 46ch;"><?php echo esc_html(astrix_field('hero_para', $front_id)); ?></p>
      </div>
      <div style="display: flex; align-items: center; gap: 28px; flex-wrap: wrap; opacity: 0; animation: riseIn 1.1s cubic-bezier(0.16, 1, 0.3, 1) 1.1s forwards;">
        <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: linear-gradient(135deg, #2A2019, #1A1611); color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;">
          Let's Connect! <span style="font-size: 15px;">→</span>
        </a>
      </div>
    </div>
    <div class="ax-frame" style="grid-column: 8 / span 5; align-self: stretch; border-radius: 4px; min-height: clamp(360px, 62vh, 660px); opacity: 0; animation: fadeIn 1.6s ease 0.7s forwards;">
      <?php
      $hero_img = astrix_field('hero_image', $front_id);
      $hero_img_src = $hero_img ? $hero_img : ($theme_uri . '/assets/deck-01-hero.webp');
      ?>
      <img loading="eager" fetchpriority="high" decoding="async" class="ax-photo" style="animation: kenburns 22s ease-in-out infinite alternate; object-position: center center;" src="<?php echo esc_url($hero_img_src); ?>" alt="Astrix — one integrated system, every part load-bearing">


      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 18px; border: 1px solid rgba(245,241,234,0.24);"></div>
      <span class="ax-word" style="left: 22px; bottom: 68px; font-size: clamp(46px, 5vw, 84px); color: rgba(245,241,234,0.16);">System</span>
      <div style="position: absolute; left: 26px; right: 26px; bottom: 24px; z-index: 3; display: flex; align-items: center; gap: 10px;">
        <span style="width: 18px; height: 1px; background: #C56A37;"></span>
        <p style="margin: 0; font-family: 'Instrument Serif', serif; font-style: italic; font-size: clamp(16px, 1.3vw, 20px); line-height: 1.25; color: #F5F1EA;">One engine. Every part load-bearing.</p>
      </div>
    </div>
  </div>

  <div class="hero-foot" style="position: relative; z-index: 2; display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; padding: clamp(24px, 4vh, 50px) clamp(28px, 5vw, 72px) 30px; opacity: 0; animation: fadeIn 1.4s ease 1.5s forwards;">
    <div class="hero-disciplines" style="display: flex; gap: clamp(14px, 2.2vw, 36px); flex-wrap: wrap; font-size: 11px; letter-spacing: 0.18em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">
      <span>Strategy</span><span>Brand</span><span>Experience</span><span>Technology</span><span>Growth</span><span>AI</span>
    </div>
    <div class="hero-scroll-cue" style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
      <span style="font-size: 10px; letter-spacing: 0.26em; color: #9A8E7D; text-transform: uppercase;">Scroll</span>
      <span style="width: 1px; height: 34px; background: #C0B4A2; display: block; animation: cueDrop 2.6s cubic-bezier(0.65, 0, 0.35, 1) 2s infinite;"></span>
    </div>
  </div>
</div>

