<?php
/**
 * Section: Ecosystems
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Chapter Four · What We Build (Working Ecosystems) ── -->
<section style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Four · What We Build">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(70px, 11vh, 130px) clamp(28px, 5vw, 72px);">
    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: flex-end; justify-content: space-between; gap: 24px; flex-wrap: wrap; margin-bottom: clamp(36px, 6vh, 64px);">
      <div style="display: flex; flex-direction: column; gap: 24px;">
        <div style="display: flex; align-items: center; gap: 14px;">
          <span style="width: 22px; height: 1px; background: #C56A37;"></span>
          <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(astrix_field('ch4_eyebrow', $front_id)); ?></span>
        </div>
        <h2 style="margin: 0; font-weight: 600; font-size: clamp(34px, 4.4vw, 66px); line-height: 1.04; letter-spacing: -0.035em; max-width: 17ch;"><?php echo wp_kses_post(astrix_field('ch4_headline', $front_id)); ?></h2>
      </div>
      <p style="margin: 0; max-width: 36ch; font-size: 15px; line-height: 1.68; color: #7A6F63;"><?php echo esc_html(astrix_field('ch4_body', $front_id)); ?></p>
    </div>

    <div data-reveal class="ax-frame" style="grid-column: 1 / span 12; border-radius: 4px; aspect-ratio: 16/6; min-height: 240px; margin-bottom: clamp(24px, 4vh, 44px);">
      <img loading="lazy" decoding="async" class="ax-photo" style="object-position: center 62%; filter: grayscale(0.1) contrast(1.0) saturate(1.05); animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/geometric-paper-shapes-coral-background-f9c5fe8a.webp'); ?>" alt="One sheet, deliberately folded">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 16px; border: 1px solid rgba(245,241,234,0.24);"></div>
      <span class="ax-word" style="left: 20px; bottom: 14px; font-size: clamp(36px, 4vw, 64px); color: rgba(245,241,234,0.2);">Craft</span>
    </div>

    <div class="eco-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: rgba(33,28,23,0.10);">
      <?php
      $ecosystem_posts = astrix_items('ecosystem', array('numeral', 'parts'));
      foreach ($ecosystem_posts as $eco_post):
      ?>
      <div data-reveal class="ax-eco-card" style="background: #F5F1EA; padding: clamp(28px, 4.4vh, 44px) clamp(22px, 2.4vw, 34px); display: flex; flex-direction: column; gap: 14px; min-height: 220px; transition: background 0.4s ease;">
        <span style="font-family: 'Instrument Serif', serif; font-style: italic; font-size: 22px; color: #C56A37;"><?php echo esc_html($eco_post['numeral']); ?></span>
        <h3 style="margin: 0; font-size: clamp(19px, 1.9vw, 24px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html($eco_post['title']); ?></h3>
        <p style="margin: 0; font-size: 13.5px; line-height: 1.62; color: #7A6F63; text-wrap: pretty;"><?php echo esc_html($eco_post['parts']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>

    <div data-reveal style="grid-column: 1 / span 12; display: flex; justify-content: center; margin-top: clamp(34px, 5vh, 56px);">
      <a href="<?php echo esc_url(home_url('/services')); ?>" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: #211C17; color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 32px; border-radius: 100px; white-space: nowrap; transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;">
        <?php echo esc_html('Explore Our Services'); ?> <span style="font-size: 15px;">→</span>
      </a>
    </div>
  </div>
</section>
