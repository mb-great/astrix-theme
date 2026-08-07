<?php
/**
 * 404 Template for Astrix Media
 */
get_header();
$theme_uri = get_template_directory_uri();
?>

<div style="background: #F5F1EA; min-height: 70vh; width: 100%; box-sizing: border-box; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding: clamp(48px,8vh,110px) clamp(28px,5vw,72px); gap: clamp(26px,4vh,44px); position: relative; overflow: hidden;">

  <span style="position: absolute; top: 8%; left: 50%; transform: translateX(-50%); font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; font-size: clamp(80px,34vw,440px); line-height: 1; color: rgba(33,28,23,0.04); user-select: none; pointer-events: none; white-space: nowrap;">404</span>

  <img src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix Media" style="position: relative; width: 40px; height: 40px; object-fit: contain;">

  <div style="position: relative; display: flex; align-items: center; gap: 14px;">
    <span style="width: 22px; height: 1px; background: #C56A37;"></span>
    <span style="font-size: 11.5px; letter-spacing: 0.32em; font-weight: 500; color: #7A6F63; text-transform: uppercase;">Page Not Found</span>
    <span style="width: 22px; height: 1px; background: #C56A37;"></span>
  </div>

  <h1 style="position: relative; margin: 0; font-weight: 600; font-size: clamp(34px,7vw,104px); line-height: 1.05; letter-spacing: -0.04em; max-width: 18ch; text-wrap: balance;">This page isn't part of the <em style="font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;">system.</em></h1>

  <p style="position: relative; margin: 0; width: 100%; max-width: 46ch; box-sizing: border-box; font-size: clamp(16px,1.4vw,19px); line-height: 1.62; color: #7A6F63; text-wrap: pretty;">The link may be broken, or the page has moved. Everything that matters is one click from home.</p>

  <div style="position: relative; width: 100%; max-width: 460px; box-sizing: border-box; display: flex; align-items: center; gap: 20px; flex-wrap: wrap; justify-content: center;">
    <a href="<?php echo esc_url(home_url('/')); ?>" data-magnetic class="ax-cta-dark" style="display: inline-flex; align-items: center; gap: 12px; background: linear-gradient(135deg, #2A2019, #1A1611); color: #F5F1EA; font-size: 14.5px; font-weight: 500; padding: 16px 30px; border-radius: 100px; white-space: nowrap; transition: transform 0.35s cubic-bezier(0.16,1,0.3,1), box-shadow 0.35s ease;"><span>←</span> Back to home</a>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="ax-underline-dark" style="display: inline-flex; align-items: center; gap: 10px; font-size: 14.5px; font-weight: 500; color: #211C17; border: none; border-bottom: 1px solid #C9BFAE; padding: 6px 0; transition: border-color 0.3s ease;">Talk to us instead →</a>
  </div>

</div>

<?php
get_footer();
