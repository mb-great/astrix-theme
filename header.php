<?php
/**
 * Header template for Astrix Media
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <script>document.documentElement.className += ' js';</script>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
  
  <meta name="description" content="Astrix Media integrates strategy, brand, experience, technology and growth into one connected engine. Not an agency, a business transformation partner.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/')); ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Astrix Media: Growth is a systems problem.">
  <meta property="og:description" content="Strategy, brand, technology and marketing, built as one engine. The Astrix Transformation Engine.">
  <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Astrix Media",
    "url": "https://astrixmedia.in",
    "slogan": "Growth is a systems problem.",
    "description": "A business transformation partner that integrates strategy, brand, experience, technology and growth into one connected ecosystem.",
    "foundingLocation": "India",
    "areaServed": "Global",
    "email": "info@astrixmedia.in",
    "knowsAbout": [
      "Business Transformation",
      "Brand Strategy",
      "UI/UX Design",
      "Front-end Engineering",
      "Back-end Engineering",
      "SEO",
      "Performance Marketing",
      "Marketing Automation",
      "AI Integration",
      "Analytics"
    ]
  }
  </script>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
wp_body_open();
$theme_uri = get_template_directory_uri();
global $astrix_nav_active;
$astrix_nav_active = isset($astrix_nav_active) ? $astrix_nav_active : '';
$astrix_nav_class = function ($key) use ($astrix_nav_active) {
  return 'axnav-link' . ($astrix_nav_active === $key ? ' axnav-on' : '');
};
?>
<nav class="main-nav" style="position: relative; z-index: 3; display: flex; align-items: center; justify-content: space-between; padding: 34px clamp(28px, 5vw, 72px); background: #F5F1EA;">
  <a href="<?php echo esc_url(home_url('/')); ?>" style="display: flex; align-items: center; gap: 12px;">
    <img src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix" style="width: 26px; height: 26px; display: block; object-fit: contain;">
    <span style="font-weight: 700; font-size: 17px; letter-spacing: 0.22em; color: #211C17;">ASTRIX</span>
    <span style="width: 1px; height: 14px; background: #D6CDBE; display: block;"></span>
    <span style="font-size: 10px; letter-spacing: 0.28em; color: #9A8E7D; font-weight: 500;">MEDIA</span>
  </a>
  <div class="nav-links" style="display: flex; gap: clamp(20px, 3vw, 44px); align-items: center; font-size: 13.5px; font-weight: 500; letter-spacing: 0.02em;">
    <a href="<?php echo esc_url(home_url('/work')); ?>" class="<?php echo esc_attr($astrix_nav_class('work')); ?>">Work</a>
    <a href="<?php echo esc_url(home_url('/services')); ?>" class="<?php echo esc_attr($astrix_nav_class('services')); ?>">What We Do</a>
    <a href="<?php echo esc_url(home_url('/perspective')); ?>" class="<?php echo esc_attr($astrix_nav_class('perspective')); ?>">Insights</a>
    <a href="<?php echo esc_url(home_url('/studio')); ?>" class="<?php echo esc_attr($astrix_nav_class('studio')); ?>">Who We Are</a>
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="axnav-cta" data-magnetic>Book a Discovery Session</a>
  </div>

  <button id="nav-burger" class="nav-burger" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="nav-sheet">
    <span></span><span></span>
  </button>
</nav>

<!-- ── Mobile full-screen menu (≤900px) ── -->
<div id="nav-sheet" class="nav-sheet" role="dialog" aria-modal="true" aria-label="Site menu">
  <div class="nav-sheet-top">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-sheet-brand">
      <img src="<?php echo esc_url($theme_uri . '/assets/Astrix Logo-01.webp'); ?>" alt="Astrix" width="26" height="26">
      <span>ASTRIX</span>
    </a>
    <button id="nav-close" class="nav-close" type="button" aria-label="Close menu">&times;</button>
  </div>
  <nav class="nav-sheet-links" aria-label="Mobile">
    <a href="<?php echo esc_url(home_url('/work')); ?>">Work</a>
    <a href="<?php echo esc_url(home_url('/services')); ?>">What We Do</a>
    <a href="<?php echo esc_url(home_url('/perspective')); ?>">Insights</a>
    <a href="<?php echo esc_url(home_url('/studio')); ?>">Who We Are</a>
  </nav>
  <div class="nav-sheet-foot">
    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="nav-sheet-cta">Book a Discovery Session <span>&rarr;</span></a>
    <a href="mailto:info@astrixmedia.in" class="nav-sheet-mail">info@astrixmedia.in</a>
  </div>
</div>
