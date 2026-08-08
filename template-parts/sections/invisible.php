<?php
/**
 * Section: Invisible
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Chapter Two · Why Businesses Stay Invisible ── -->
<section style="position: relative; background: #F5F1EA; overflow: hidden;" data-screen-label="Chapter Two · Why Businesses Stay Invisible">
  <div style="position: absolute; top: 0; left: 0; right: 0; height: 220px; background: linear-gradient(rgba(26,22,17,0.55), rgba(245,241,234,0)); z-index: 1; pointer-events: none;"></div>
  <div class="grid-12" style="position: relative; z-index: 2; display: grid; grid-template-columns: repeat(12, 1fr); gap: 24px; padding: clamp(120px, 20vh, 220px) clamp(28px, 5vw, 72px) clamp(70px, 11vh, 130px);">
    <div data-reveal style="grid-column: 1 / span 12; display: flex; align-items: center; gap: 14px;">
      <span style="width: 22px; height: 1px; background: #C56A37;"></span>
      <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html(astrix_field('ch2_eyebrow', $front_id)); ?></span>
    </div>
    <h2 data-reveal style="grid-column: 1 / span 11; margin: clamp(24px, 3vh, 40px) 0 clamp(40px, 7vh, 80px); font-weight: 600; font-size: clamp(38px, 5.4vw, 88px); line-height: 1.04; letter-spacing: -0.035em;"><?php echo wp_kses_post(astrix_field('ch2_headline', $front_id)); ?></h2>
    
    <?php /* Deck slide 7: two images reduced to one (Image 02), repositioned to span
             the full column instead of the previous 5-col + offset 5-col pair.

             Deck slide 12: the subject was being cropped from below. Image 02 is 3:2
             (1800x1202) and sits high in its own frame, so a 16/7 letterbox with
             object-fit: cover trimmed roughly a sixth off each end. Widened to 16/9
             and anchored to the top so the figure and the full star keep their feet.
             max-width is required alongside min-height + aspect-ratio: Blink turns
             that min-height back into a minimum WIDTH and overflows the page. */ ?>
    <div data-reveal class="ax-frame" style="grid-column: 1 / span 12; border-radius: 4px; aspect-ratio: 16/9; min-height: clamp(280px, 46vh, 560px); max-width: 100%;">
      <img class="ax-photo" style="animation: kenburns 26s ease-in-out infinite alternate; object-position: center top;" src="<?php echo esc_url($theme_uri . '/assets/deck-02-invisible.webp'); ?>" alt="Seen clearly, and therefore chosen">
      <div class="ax-grain-layer"></div>
      <div style="position: absolute; inset: 0; z-index: 3; pointer-events: none; margin: 16px; border: 1px solid rgba(245,241,234,0.20);"></div>
      <span class="ax-word" style="left: 20px; bottom: 14px; font-size: clamp(36px, 4vw, 68px); color: rgba(245,241,234,0.16);">Noise</span>
    </div>

    <div data-reveal style="grid-column: 2 / span 10; margin: clamp(60px, 10vh, 130px) 0 0;">
      <p style="margin: 0; font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; font-size: clamp(30px, 4.4vw, 66px); line-height: 1.16; letter-spacing: -0.01em; color: #211C17; max-width: 20ch; text-wrap: balance;"><?php echo wp_kses_post(astrix_field('ch2_pullquote', $front_id)); ?></p>
    </div>

    <?php /* Deck slide 8: the fragmented-efforts line was replaced by the new pullquote
             copy; this CTA is the second half of that note — a route to Contact. */ ?>
    <div data-reveal style="grid-column: 2 / span 10; margin: clamp(34px, 5vh, 56px) 0 0;">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: #211C17; color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; white-space: nowrap; transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s ease;"><?php echo esc_html("Let's Connect!"); ?> <span style="font-size: 15px;">→</span></a>
    </div>
  </div>
</section>
