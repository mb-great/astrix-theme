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
  
  <?php
  /**
   * Per-page SEO/social meta.
   *
   * These were previously hardcoded to the homepage on EVERY template, which
   * self-canonicalised all six subpages to "/" and made every share card
   * identical. Now derived from the queried object, falling back to the site
   * defaults on the front page and on archives.
   */
  $astrix_is_front = is_front_page();
  $astrix_url      = $astrix_is_front ? home_url('/') : get_permalink();
  if (!$astrix_url) { $astrix_url = home_url(add_query_arg(array(), $GLOBALS['wp']->request)); }

  $astrix_default_desc = 'Astrix Media integrates strategy, brand, experience, technology and growth into one connected engine. Not an agency, a business transformation partner.';
  $astrix_desc = $astrix_default_desc;
  if (!$astrix_is_front && is_singular()) {
    // These pages are built by PHP templates and mostly carry no post_content,
    // so get_the_excerpt() returns a stub like "Work" — worse for search results
    // than the site default. Only take an excerpt with real substance in it.
    $excerpt = trim(preg_replace('/\s+/', ' ', wp_strip_all_tags(get_the_excerpt())));
    if (mb_strlen($excerpt) >= 60) { $astrix_desc = $excerpt; }
  }
  $astrix_desc = trim(preg_replace('/\s+/', ' ', $astrix_desc));
  if (mb_strlen($astrix_desc) > 200) { $astrix_desc = mb_substr($astrix_desc, 0, 197) . '…'; }

  $astrix_title = $astrix_is_front
    ? 'Astrix Media: Growth is a business systems challenge.'
    : wp_get_document_title();

  // 1200x630 card. A square favicon here would be cropped badly by most platforms.
  $astrix_og_image = get_template_directory_uri() . '/assets/og-image.jpg';
  ?>
  <meta name="description" content="<?php echo esc_attr($astrix_desc); ?>">
  <?php /* No rel=canonical here — WordPress core's rel_canonical() already emits a
           correct per-page one via wp_head(). Adding our own produced duplicates. */ ?>
  <meta property="og:type" content="<?php echo $astrix_is_front ? 'website' : 'article'; ?>">
  <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
  <meta property="og:title" content="<?php echo esc_attr($astrix_title); ?>">
  <meta property="og:description" content="<?php echo esc_attr($astrix_desc); ?>">
  <meta property="og:url" content="<?php echo esc_url($astrix_url); ?>">
  <meta property="og:image" content="<?php echo esc_url($astrix_og_image); ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="Astrix Media — strategy, brand, technology and growth as one connected system.">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo esc_attr($astrix_title); ?>">
  <meta name="twitter:description" content="<?php echo esc_attr($astrix_desc); ?>">
  <meta name="twitter:image" content="<?php echo esc_url($astrix_og_image); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Astrix Media",
    "url": "https://astrixmedia.in",
    "slogan": "Growth is a business systems challenge.",
    "description": "A business transformation partner that integrates strategy, brand, experience, technology and growth into one connected ecosystem.",
    "foundingLocation": "India",
    "areaServed": "Global",
    "email": "<?php echo esc_js(astrix_setting('email')); ?>",
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
