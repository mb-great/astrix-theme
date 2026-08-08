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
  
  <!-- Favicons & Apple Touch Icon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon-32.png'); ?>">
  <link rel="icon" type="image/png" sizes="192x192" href="<?php echo esc_url(get_template_directory_uri() . '/assets/favicon-192.png'); ?>">
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/apple-touch-icon.png'); ?>">

  
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
  $astrix_obj_id   = get_queried_object_id();
  $astrix_url      = $astrix_is_front ? home_url('/') : get_permalink();
  if (!$astrix_url) { $astrix_url = home_url(add_query_arg(array(), $GLOBALS['wp']->request)); }

  // Check custom editable SEO meta from page/theme settings
  $custom_title = $astrix_obj_id ? get_post_meta($astrix_obj_id, 'astrix_seo_title', true) : '';
  $custom_desc  = $astrix_obj_id ? get_post_meta($astrix_obj_id, 'astrix_seo_desc', true) : '';
  $custom_og    = $astrix_obj_id ? get_post_meta($astrix_obj_id, 'astrix_og_image', true) : '';

  $astrix_default_desc = 'Astrix Media integrates strategy, brand, experience, technology and growth into one connected engine. Not an agency, a business transformation partner.';
  $astrix_desc = $custom_desc ? $custom_desc : $astrix_default_desc;
  if (!$custom_desc && !$astrix_is_front && is_singular()) {
    $excerpt = trim(preg_replace('/\s+/', ' ', wp_strip_all_tags(get_the_excerpt())));
    if (mb_strlen($excerpt) >= 60) { $astrix_desc = $excerpt; }
  }
  $astrix_desc = trim(preg_replace('/\s+/', ' ', $astrix_desc));
  if (mb_strlen($astrix_desc) > 200) { $astrix_desc = mb_substr($astrix_desc, 0, 197) . '…'; }

  $astrix_title = $custom_title ? $custom_title : ($astrix_is_front
    ? 'Astrix Media: Growth is a business systems challenge.'
    : wp_get_document_title());

  // 1200x630 card with fallback to default asset
  $astrix_og_image = $custom_og ? $custom_og : (get_template_directory_uri() . '/assets/og-image.jpg');

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
get_template_part('template-parts/header/site-header');

