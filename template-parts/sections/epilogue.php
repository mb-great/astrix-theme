<?php
/**
 * Section: Epilogue
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Epilogue · Let's Talk (CTA) ── -->
<section id="contact" style="position: relative;" data-screen-label="Epilogue · Let&#039;s Talk">
  <div style="position: relative; z-index: 2; background: linear-gradient(150deg, #2A2019, #17130F 60%); color: #F5F1EA; overflow: hidden;">
    <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(90% 120% at 88% 0%, rgba(197,106,55,0.28), rgba(197,106,55,0) 55%);"></div>
    
    <div class="grid-12" style="position: relative; z-index: 1; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 16vh, 170px) clamp(28px, 5vw, 72px);">
      <div data-reveal style="grid-column: 1 / span 7; display: flex; flex-direction: column; gap: clamp(28px, 5vh, 48px);">
        <span style="font-size: 11.5px; letter-spacing: 0.32em; color: #9A8E7D; text-transform: uppercase; font-weight: 500;"><?php echo esc_html(astrix_field('epilogue_eyebrow', $front_id)); ?></span>
        <p style="margin: 0; font-size: clamp(34px, 4.6vw, 68px); line-height: 1.08; letter-spacing: -0.03em; font-weight: 500; max-width: 18ch; text-wrap: balance;"><?php echo wp_kses_post(astrix_field('epilogue_headline', $front_id)); ?></p>
        <p style="margin: 0; font-size: clamp(20px, 2.1vw, 28px); line-height: 1.55; color: rgba(245,241,234,0.85); max-width: 48ch;"><?php echo esc_html(astrix_field('epilogue_body', $front_id)); ?></p>
        <div style="display: flex; align-items: center; gap: 28px; flex-wrap: wrap; margin-top: 8px;">
          <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-light" style="display: inline-flex; align-items: center; gap: 12px; background: #F5F1EA; color: #211C17; font-size: 15px; font-weight: 500; padding: 16px 32px; border-radius: 100px; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;">
            Let's Connect! <span style="font-size: 15px;">→</span>
          </a>
          <a href="mailto:<?php echo esc_attr(astrix_setting('email')); ?>" class="ax-underline-light" style="display: inline-flex; align-items: center; gap: 10px; font-size: clamp(20px, 2.1vw, 28px); font-weight: 500; color: #F5F1EA; padding: 6px 0; border: none; border-bottom: 1px solid rgba(245,241,234,0.35); transition: border-color 0.3s ease;">
            <?php echo esc_html(astrix_setting('email')); ?>
          </a>
        </div>
      </div>

      <div data-reveal class="ax-frame" style="grid-column: 9 / span 4; border-radius: 4px; aspect-ratio: 0.78; min-height: clamp(320px, 46vh, 540px);">
        <img loading="lazy" decoding="async" class="ax-photo" style="filter: grayscale(0.05) contrast(1.02) saturate(1.05); animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/magnific_a-burnt-orange-umbrella-s_kLCvZVE16B-f346e31a.webp'); ?>" alt="The one the crowd notices">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 16px; border: 1px solid rgba(245,241,234,0.22);"></div>
        <span class="ax-word" style="left: 20px; bottom: 14px; font-size: clamp(36px, 4vw, 64px); color: rgba(245,241,234,0.22);">Chosen</span>
      </div>
    </div>
  </div>
</section>
