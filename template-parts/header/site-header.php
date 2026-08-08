<?php
/**
 * Site Header template part.
 * Displays top navigation bar, logo, and mobile navigation sheet.
 */
if (!defined('ABSPATH')) {
  exit;
}

$theme_uri = get_template_directory_uri();
global $astrix_nav_active;
$astrix_nav_active = isset($astrix_nav_active) ? $astrix_nav_active : '';
?>
<nav class="main-nav" style="position: relative; z-index: 3; display: flex; align-items: center; justify-content: space-between; padding: 28px clamp(28px, 5vw, 72px); background: #F5F1EA;">
  <a href="<?php echo esc_url(home_url('/')); ?>" style="display: flex; align-items: center; gap: 14px;">
    <img loading="eager" fetchpriority="high" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix" style="width: clamp(66px, 6.9vw, 88px); height: clamp(66px, 6.9vw, 88px); display: block; object-fit: contain;">
    <span style="font-weight: 700; font-size: clamp(20px, 2.1vw, 26px); letter-spacing: 0.22em; color: #211C17;">ASTRIX</span>
    <span style="width: 1px; height: 16px; background: #D6CDBE; display: block;"></span>
    <span style="font-size: clamp(12px, 1.2vw, 15px); letter-spacing: 0.28em; color: #9A8E7D; font-weight: 500;">MEDIA</span>
  </a>
  <div class="nav-links" style="display: flex; gap: clamp(20px, 3vw, 44px); align-items: center; font-size: 13.5px; font-weight: 500; letter-spacing: 0.02em;">
    <?php astrix_primary_nav(); ?>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="axnav-cta" data-magnetic>Let's Connect!</a>
  </div>

  <button id="nav-burger" class="nav-burger" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="nav-sheet">
    <span></span><span></span>
  </button>
</nav>

<!-- ── Mobile full-screen menu (≤900px) ── -->
<div id="nav-sheet" class="nav-sheet" role="dialog" aria-modal="true" aria-label="Site menu">
  <div class="nav-sheet-top">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-sheet-brand">
      <img loading="lazy" decoding="async" src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix" width="58" height="58">
      <span>ASTRIX</span>
    </a>
    <button id="nav-close" class="nav-close" type="button" aria-label="Close menu">&times;</button>
  </div>
  <nav class="nav-sheet-links" aria-label="Mobile">
    <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
    <a href="<?php echo esc_url(home_url('/services')); ?>">Our Services</a>
    <a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Our Expertise</a>
    <a href="<?php echo esc_url(home_url('/our-clients')); ?>">Our Clients</a>
    <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact</a>
  </nav>
  <div class="nav-sheet-foot">
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-sheet-cta">Let's Connect! <span>&rarr;</span></a>
    <a href="mailto:<?php echo esc_attr(astrix_setting('email')); ?>" class="nav-sheet-mail"><?php echo esc_html(astrix_setting('email')); ?></a>
  </div>
</div>
