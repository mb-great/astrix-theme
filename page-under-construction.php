<?php
/**
 * Template Name: Under Construction
 * Ported from ref/Astrix Page Under Construction.dc.html — with shared header/footer added
 * (the original V8 reference is a standalone page with no nav/footer; this project's
 * convention keeps header/footer on every page, so that's added here deliberately).
 */
// Keep unbuilt pages out of the index. The V8 reference set
// <meta name="robots" content="noindex, follow"> and the original port dropped it —
// without this, every "coming soon" placeholder gets indexed as thin content.
// Must be registered BEFORE get_header(), since wp_head() fires inside it.
add_filter('wp_robots', function ($robots) {
  $robots['noindex'] = true;
  $robots['follow']  = true;
  return $robots;
});

get_header();
$theme_uri = get_template_directory_uri();
$page_label = get_the_title() ?: 'This page';
?>

<div style="background: #F5F1EA; min-height: 70vh; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: clamp(48px,8vh,110px) clamp(28px,5vw,72px); gap: clamp(26px,4vh,44px);">

  <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix Media" style="width: 40px; height: 40px; object-fit: contain; animation: axSpin 16s linear infinite;">

  <div style="display: flex; align-items: center; gap: 14px;">
    <span style="width: 22px; height: 1px; background: #C56A37;"></span>
    <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;"><?php echo esc_html($page_label); ?> · In progress</span>
    <span style="width: 22px; height: 1px; background: #C56A37;"></span>
  </div>

  <h1 style="margin: 0; font-weight: 600; font-size: clamp(42px,7vw,116px); line-height: 0.98; letter-spacing: -0.04em; max-width: 13ch;">Still being <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">built.</em></h1>

  <p style="margin: 0; max-width: 46ch; font-size: clamp(16px,1.4vw,19px); line-height: 1.62; color: #7A6F63; text-wrap: pretty;">We're writing this section properly rather than filling it with placeholder copy. It lands with the next release.</p>

  <div style="width: 100%; max-width: 380px; display: flex; flex-direction: column; gap: 10px;">
    <div style="position: relative; height: 3px; border-radius: 100px; background: rgba(33,28,23,0.10); overflow: hidden;">
      <div style="position: absolute; inset: 0; width: 62%; background: #C56A37; border-radius: 100px;"></div>
      <div style="position: absolute; inset: 0; background: linear-gradient(90deg, rgba(245,241,234,0), rgba(245,241,234,0.75), rgba(245,241,234,0)); animation: axSweep 2.4s ease-in-out infinite;"></div>
    </div>
    <div style="display: flex; align-items: baseline; justify-content: space-between; gap: 12px;">
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">Writing &amp; art direction</span>
      <span style="font-size: 11px; letter-spacing: 0.24em; text-transform: uppercase; color: #9A8E7D; font-weight: 500;">Live shortly</span>
    </div>
  </div>

  <a href="<?php echo esc_url(home_url('/')); ?>" class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: #211C17; color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; white-space: nowrap; transition: box-shadow 0.35s ease;"><span>←</span> Back to home</a>

</div>

<style>
@keyframes axSweep { 0% { transform: translateX(-100%); } 100% { transform: translateX(100%); } }
@keyframes axSpin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
</style>

<?php
get_footer();
