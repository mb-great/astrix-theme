<?php
/**
 * Section: Spinner
 * Self-contained — safe to reorder, disable, or reuse on other templates.
 */
if (!defined('ABSPATH')) { exit; }
$theme_uri = get_template_directory_uri();
$front_id  = (int) get_option('page_on_front');
?>
<!-- ── Animated Spinning Astrix Mark ── -->
<div data-reveal style="display: flex; align-items: center; justify-content: center; padding: clamp(44px, 7vh, 84px) 0; background: #F5F1EA;">
  <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="" aria-hidden="true" data-spin style="width: 54px; height: 54px; object-fit: contain; transform: rotate(-60deg); transition: transform 1.4s cubic-bezier(0.16,1,0.3,1);">
</div>
