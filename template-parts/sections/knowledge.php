<?php
/**
 * Section: Knowledge
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Chapter Seven · Knowledge & Recognition ── -->
<section id="knowledge" style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Seven · Knowledge & Recognition">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(80px, 13vh, 160px) clamp(28px, 5vw, 72px); align-items: start;">
    
    <div data-reveal style="grid-column: 1 / span 4; display: flex; flex-direction: column; gap: 22px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo wp_kses_post(astrix_field('ch7_eyebrow', $front_id)); ?></span>
      </div>
      <h2 style="margin: 0; font-weight: 600; font-size: clamp(30px, 3.6vw, 54px); line-height: 1.06; letter-spacing: -0.032em;"><?php echo wp_kses_post(astrix_field('ch7_headline', $front_id)); ?></h2>
      <p style="margin: 0; font-size: 15px; line-height: 1.68; color: #7A6F63; max-width: 36ch;"><?php echo esc_html(astrix_field('ch7_body', $front_id)); ?></p>
      

      <div style="display: flex; flex-direction: column; gap: 14px; margin-top: 4px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: 16px;">
        <span style="font-size: 10.5px; letter-spacing: 0.28em; text-transform: uppercase; color: #B3A794; font-weight: 500;">Recognitions | News</span>
        <a href="<?php echo esc_url('https://theentrepreneurstories.com/how-astrix-media-group-is-redefining-modern-brand-building-through-strategy-creativity-performance/'); ?>" target="_blank" rel="noopener" class="ax-underline-dark" style="display: inline-flex; align-items: flex-start; gap: 8px; font-size: 13.5px; line-height: 1.5; font-weight: 500; color: #211C17; border: none; border-bottom: 1px solid #C9BFAE; padding: 4px 0; transition: border-color 0.3s ease;"><?php echo esc_html('The Entrepreneur Stories — How Astrix Media Group is redefining modern brand building'); ?> <span>↗</span></a>
        <a href="<?php echo esc_url('https://thebusinessstories.com/how-astrix-media-group-is-redefining-modern-brand-building-through-strategy-creativity-performance/'); ?>" target="_blank" rel="noopener" class="ax-underline-dark" style="display: inline-flex; align-items: flex-start; gap: 8px; font-size: 13.5px; line-height: 1.5; font-weight: 500; color: #211C17; border: none; border-bottom: 1px solid #C9BFAE; padding: 4px 0; transition: border-color 0.3s ease;"><?php echo esc_html('The Business Stories — How Astrix Media Group is redefining modern brand building'); ?> <span>↗</span></a>
      </div>
    </div>

    <a href="<?php echo esc_url(home_url('/perspective')); ?>" data-reveal style="grid-column: 6 / span 4; display: flex; flex-direction: column; gap: 18px; border-top: 1px solid rgba(33,28,23,0.14); padding-top: clamp(24px, 4vh, 36px);">
      <span style="font-size: 12px; letter-spacing: 0.14em; text-transform: uppercase; color: #9A8E7D;"><?php echo esc_html(astrix_field('essay_kicker', $front_id)); ?></span>
      <h3 style="margin: 0; font-weight: 600; font-size: clamp(26px, 3vw, 46px); line-height: 1.08; letter-spacing: -0.028em; max-width: 20ch; text-wrap: balance;"><?php echo wp_kses_post(astrix_field('essay_headline', $front_id)); ?></h3>
      <span style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; color: #211C17;">Read the essay <span>↗</span></span>
    </a>

    <div data-reveal class="ax-frame" style="grid-column: 10 / span 3; border-radius: 4px; aspect-ratio: 0.67;">
      <img loading="lazy" decoding="async" class="ax-photo" style="filter: grayscale(0.1) contrast(1.0) saturate(1.05); animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/side-view-man-posing-with-sunflowers-610791cf.webp'); ?>" alt="Publishing as practice">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 14px; border: 1px solid rgba(245,241,234,0.22);"></div>
    </div>
  </div>
</section>
