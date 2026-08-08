<?php
/**
 * Section: Stack
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Chapter Five · The Stack (Technology matrix) ── -->
<section id="stack" style="position: relative; overflow: hidden; background: linear-gradient(150deg, #2A2019, #17130F 62%); color: #F5F1EA;" data-screen-label="Chapter Five · The Stack">
  <div style="position: absolute; inset: 0; z-index: 0; pointer-events: none; background: radial-gradient(90% 120% at 84% 0%, rgba(197,106,55,0.22), rgba(197,106,55,0) 55%);"></div>
  <div class="ax-grain-layer"></div>
  <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/celebration-labour-day-with-monochrome-view-woman-working-her-job-ef340072.webp'); ?>" alt="" aria-hidden="true" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.07; z-index: 0; pointer-events: none;">
  <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-02.webp'); ?>" alt="" aria-hidden="true" style="position: absolute; right: clamp(20px, 4vw, 56px); bottom: clamp(20px, 4vw, 56px); width: clamp(80px, 10vw, 150px); opacity: 0.08; z-index: 0; pointer-events: none;">
  
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px);">
    
    <div class="sticky-col" data-reveal style="grid-column: 1 / span 4; position: sticky; top: 12vh; align-self: start; display: flex; flex-direction: column; gap: 22px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: rgba(245,241,234,0.6); text-transform: uppercase;"><?php echo esc_html(astrix_field('ch5_eyebrow', $front_id)); ?></span>
      </div>
      <h2 style="margin: 0; font-weight: 600; font-size: clamp(32px, 4vw, 58px); line-height: 1.05; letter-spacing: -0.035em;"><?php echo wp_kses_post(astrix_field('ch5_headline', $front_id)); ?></h2>
      <p style="margin: 0; font-size: 15px; line-height: 1.7; color: rgba(245,241,234,0.68); max-width: 38ch; text-wrap: pretty;"><?php echo esc_html(astrix_field('ch5_body', $front_id)); ?></p>
      
      <div data-reveal class="ax-frame" style="border-radius: 4px; aspect-ratio: 1.3;">
        <img loading="lazy" decoding="async" class="ax-photo" style="animation: kenburns 26s ease-in-out infinite alternate;" src="<?php echo esc_url($theme_uri . '/assets/deck-03.webp'); ?>" alt="Engineering as half the argument">
        <div class="ax-grain-layer"></div>
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 14px; border: 1px solid rgba(245,241,234,0.22);"></div>
      </div>
    </div>

    <div style="grid-column: 6 / span 7; display: flex; flex-direction: column;">
      <?php
      $tech_posts = astrix_items('tech_capability', array('subtitle', 'items'));
      foreach ($tech_posts as $tech_post):
        $tech_items = array_filter(array_map('trim', explode("\n", $tech_post['items'])));
      ?>
      <div data-reveal style="display: grid; grid-template-columns: minmax(150px, 1fr) 2.2fr; gap: clamp(16px, 3vw, 36px); padding: clamp(26px, 4vh, 38px) 0; border-top: 1px solid rgba(245,241,234,0.14);">
        <div style="display: flex; flex-direction: column; gap: 8px;">
          <h3 style="margin: 0; font-size: clamp(17px, 1.7vw, 22px); font-weight: 600; letter-spacing: -0.02em;"><?php echo esc_html($tech_post['title']); ?></h3>
        </div>
        <div style="display: flex; flex-direction: column; gap: 14px;">
          <div style="display: flex; flex-wrap: wrap; gap: 8px;">
            <?php foreach ($tech_items as $item): ?>
            <span style="font-size: 12px; font-weight: 500; letter-spacing: 0.04em; color: rgba(245,241,234,0.85); border: 1px solid rgba(245,241,234,0.22); border-radius: 100px; padding: 7px 14px;"><?php echo esc_html($item); ?></span>
            <?php endforeach; ?>
          </div>
          <p style="margin: 0; font-size: 13.5px; line-height: 1.6; color: rgba(245,241,234,0.55); max-width: 44ch;"><?php echo esc_html($tech_post['subtitle']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
      <div style="border-top: 1px solid rgba(245,241,234,0.14);"></div>
    </div>

  </div>
</section>
