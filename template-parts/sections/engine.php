<?php
/**
 * Section: Engine
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Chapter Three · The Transformation Engine™ ── -->
<section id="engine" style="position: relative; background: #F5F1EA; overflow: hidden; border-top: 1px solid rgba(33,28,23,0.04);" data-screen-label="Chapter Three · The Transformation Engine">
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(90px, 15vh, 180px) clamp(28px, 5vw, 72px) clamp(70px, 11vh, 130px); align-items: start;">
    
    <div style="grid-column: 1 / span 5; display: flex; flex-direction: column; gap: clamp(24px, 4vh, 40px);">
      <div data-reveal style="display: flex; align-items: center; gap: 14px;">
        <span style="width: 22px; height: 1px; background: #C56A37;"></span>
        <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(astrix_field('ch3_eyebrow', $front_id)); ?></span>
      </div>
      <h2 data-reveal style="margin: 0; font-weight: 600; font-size: clamp(38px, 4.6vw, 72px); line-height: 1.04; letter-spacing: -0.035em;"><?php echo esc_html(astrix_field('ch3_headline', $front_id)); ?><span style="font-size: 0.34em; font-weight: 500; vertical-align: super; color: #9A8E7D;">™</span></h2>
      <p data-reveal style="margin: 0; font-size: 15.5px; line-height: 1.72; color: #7A6F63; max-width: 46ch; text-wrap: pretty;"><?php echo esc_html(astrix_field('ch3_body', $front_id)); ?></p>
      
      <div data-reveal class="ax-frame" style="border-radius: 4px; aspect-ratio: 16/7;">
        <img loading="lazy" decoding="async" class="ax-photo" style="filter: grayscale(0.2) contrast(1.0) brightness(1.05);" src="<?php echo esc_url($theme_uri . '/assets/crumpled-papers-with-directional-arrows-pointing-toward-light-bulb-white-background-777d965a.webp'); ?>" alt="Iteration becoming an idea">
        <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 12px; border: 1px solid rgba(33,28,23,0.08);"></div>
      </div>

      <!-- 7 Stages Accordion -->
      <div data-reveal style="display: flex; flex-direction: column;">
        <?php
        $stage_posts = astrix_items('engine_stage', array('tag', 'line', 'capabilities'));
        foreach ($stage_posts as $i => $stage_post):
          $caps_lines = array_filter(array_map('trim', explode("\n", $stage_post['capabilities'])));
        ?>
        <div class="stage-item" style="border-top: 1px solid rgba(33,28,23,0.10);">
          <button class="stage-btn" type="button">
            <div style="display: grid; grid-template-columns: 40px 1fr auto; gap: 18px; align-items: baseline; padding: clamp(16px, 2.4vh, 22px) 0;">
              <span class="stage-num" style="font-size: 11.5px; font-weight: 600; letter-spacing: 0.1em; color: <?php echo $i === 0 ? '#C56A37' : '#B3A794'; ?>;"><?php echo esc_html(sprintf('%02d', $i + 1)); ?></span>
              <div style="display: flex; align-items: baseline; gap: 14px; flex-wrap: wrap;">
                <span class="stage-name" style="font-size: clamp(19px, 1.9vw, 25px); font-weight: 600; letter-spacing: -0.02em; color: <?php echo $i === 0 ? '#C56A37' : '#211C17'; ?>; transition: color 0.3s ease;"><?php echo esc_html($stage_post['title']); ?></span>
                <span style="font-size: 12.5px; color: #9A8E7D;"><?php echo esc_html($stage_post['tag']); ?></span>
              </div>
              <span class="stage-icon" style="font-size: 18px; color: #C56A37; transition: transform 0.3s ease; display: inline-block;">+</span>
            </div>
          </button>
          <div class="stage-body" style="max-height: <?php echo $i === 0 ? '220px' : '0px'; ?>; overflow: hidden; transition: max-height 0.5s cubic-bezier(0.16,1,0.3,1);">
            <div style="display: flex; flex-direction: column; gap: 12px; padding: 0 0 22px 58px;">
              <p style="margin: 0; font-size: 14.5px; line-height: 1.6; color: #3A3229; max-width: 44ch;"><?php echo esc_html($stage_post['line']); ?></p>
              <p style="margin: 0; font-size: 13px; line-height: 1.8; color: #7A6F63;"><?php echo esc_html(implode('  ·  ', $caps_lines)); ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
        <div style="border-top: 1px solid rgba(33,28,23,0.10);"></div>
      </div>
    </div>

    <!-- Right Live Ecosystem Canvas (Sticky) -->
    <div class="sticky-col" data-reveal style="grid-column: 7 / span 6; position: sticky; top: 10vh; align-self: start;">
      <div style="position: relative; border: 1px solid rgba(33,28,23,0.10); border-radius: 4px; background: linear-gradient(150deg, #F5F1EA, #EFE9DF); overflow: hidden;">
        <canvas id="eco-canvas" data-logo-src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" style="display: block; width: 100%; height: clamp(480px, 76vh, 820px);"></canvas>
        <span style="position: absolute; left: 20px; top: 16px; font-size: 10px; letter-spacing: 0.28em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">The ecosystem, live</span>
        <span style="position: absolute; right: 20px; bottom: 14px; font-size: 10px; letter-spacing: 0.2em; text-transform: uppercase; color: #B3A794;">Hover a stage</span>
      </div>
    </div>
  </div>
</section>
