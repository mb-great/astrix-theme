<?php
/**
 * Section: Transformations
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Chapter Six · Transformations, Not Portfolios ── -->
<section id="work" style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Six · Transformations">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px) clamp(50px, 8vh, 90px);">
    <?php /* Temporarily disabled per request (2026-08-07) — mobile layout issue, kept in place for re-enable, not deleted. Flip `false` to `true` to restore. */ ?>
    <?php if (false): ?>
    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px; margin-bottom: clamp(30px, 5vh, 50px);">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(astrix_field('ch6_eyebrow', $front_id)); ?></span>
    </div>

    <?php
    $proof_posts = astrix_items(
      'case_study',
      array('client', 'from_text', 'to_text', 'metric', 'metric_label'),
      array('meta_query' => array(array('key' => 'show_on_homepage', 'value' => '1', 'compare' => '=')))
    );
    foreach ($proof_posts as $proof_post):
    ?>
    <a href="<?php echo esc_url(home_url('/work')); ?>" data-reveal class="proof-grid" style="grid-column: 1 / span 12; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: clamp(20px, 3vw, 48px); align-items: center; padding: clamp(30px, 5vh, 48px) 0; border-top: 1px solid rgba(33,28,23,0.12);">
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <span style="font-size: 12px; letter-spacing: 0.14em; text-transform: uppercase; color: #9A8E7D;"><?php echo esc_html($proof_post['client']); ?></span>
      </div>
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="font-size: 14px; color: #7A6F63;"><?php echo esc_html($proof_post['from_text']); ?></span>
        <span style="color: #C56A37; font-size: 16px;">→</span>
        <span style="font-size: 14px; font-weight: 500; color: #211C17;"><?php echo esc_html($proof_post['to_text']); ?></span>
      </div>
      <div style="display: flex; align-items: center; justify-content: flex-end; gap: clamp(20px, 3vw, 40px);">
        <div style="display: flex; flex-direction: column; gap: 2px; text-align: right;">
          <span style="font-size: clamp(24px, 2.4vw, 36px); font-weight: 600; letter-spacing: -0.03em; color: #C56A37;"><?php echo esc_html($proof_post['metric']); ?></span>
          <span style="font-size: 12px; color: #9A8E7D;"><?php echo esc_html($proof_post['metric_label']); ?></span>
        </div>
        <span style="font-size: 15px; color: #B3A794;">↗</span>
      </div>
    </a>
    <?php endforeach; ?>
    <div style="grid-column: 1 / span 12; border-top: 1px solid rgba(33,28,23,0.12);"></div>
    <?php endif; ?>

    <!-- 3-Column Progression Imagery -->
    <div data-reveal style="grid-column: 1 / span 4; margin-top: clamp(28px, 4vh, 48px); display: flex; flex-direction: column; gap: 10px;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.15; max-width: 100%;">
        <img loading="lazy" decoding="async" class="ax-photo" style="animation: kenburns 27s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/deck-04-before.webp'); ?>" alt="Before: a business as silhouette">
        <div class="ax-grain-layer"></div>
      </div>
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">01 · Before</span>
    </div>

    <div data-reveal style="grid-column: 5 / span 4; margin-top: clamp(28px, 4vh, 48px); display: flex; flex-direction: column; gap: 10px;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.15; max-width: 100%;">
        <img loading="lazy" decoding="async" class="ax-photo" style="animation: kenburns 25s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/urban-double-exposure-collage-concept-8aae1a3e.webp'); ?>" alt="Insight: structure where there was silhouette">
        <div class="ax-grain-layer"></div>
      </div>
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D;">02 · Insight</span>
    </div>

    <div data-reveal style="grid-column: 9 / span 4; margin-top: clamp(28px, 4vh, 48px); display: flex; flex-direction: column; gap: 10px;">
      <div class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.15; max-width: 100%;">
        <img loading="lazy" decoding="async" class="ax-photo" style="filter: grayscale(0) contrast(1.02) saturate(1.05); object-position: center center; animation: kenburns 24s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/anaglyph-effect-man-with-arrow-f809dd38.webp'); ?>" alt="Impact: momentum, in motion">
        <div class="ax-grain-layer"></div>
        <span class="ax-word" style="left: 16px; bottom: 12px; font-size: clamp(28px, 3vw, 48px); color: rgba(245,241,234,0.2);">Momentum</span>
      </div>
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #C56A37;">03 · Impact</span>
    </div>

    <div data-reveal style="grid-column: 1 / span 12; display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; margin-top: clamp(20px, 3vh, 32px);">
      <a href="<?php echo esc_url(home_url('/work')); ?>" class="ax-underline-dark" style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; border: none; border-bottom: 1px solid #C9BFAE; padding: 6px 0; transition: border-color 0.3s ease;">All transformations →</a>
      <span style="font-size: 11px; letter-spacing: 0.28em; color: #9A8E7D; text-transform: uppercase;">The thinking behind the work</span>
    </div>

    <div data-reveal style="grid-column: 1 / span 12; display: flex; justify-content: flex-start; margin-top: clamp(24px, 4vh, 40px);">
      <a href="<?php echo esc_url(home_url('/services')); ?>" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: #211C17; color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; white-space: nowrap; transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;"><?php echo esc_html('Explore Our Services'); ?> <span style="font-size: 15px;">→</span></a>
    </div>
  </div>
</section>
