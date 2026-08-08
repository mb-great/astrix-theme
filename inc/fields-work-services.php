<?php
/**
 * Editable copy for the Work and Services page templates.
 *
 * Two halves, both required:
 *   1. acf/init  — registers the wp-admin field groups (code-registered, so they
 *                  ship with the theme instead of living only in the DB).
 *   2. filter    — registers the baked-in defaults through 'astrix_fallback_fields'
 *                  so every string still renders with ACF deactivated or with the
 *                  fields never filled in.
 *
 * NEVER declare get_field() here. ACF defines it on a later hook than theme
 * functions.php, so a function_exists() shim declares first and ACF then fatals
 * with "Cannot redeclare get_field()". Always read through astrix_field().
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Resolve a page ID from its slug, for ACF location rules.
 *
 * Why this exists: page-work.php / page-services.php are *slug-based* templates
 * (WordPress's page-{slug}.php hierarchy). The Work and Services pages carry no
 * _wp_page_template meta — verified on this install — so ACF's 'page_template'
 * location rule reads 'default' and never matches. Targeting the page by ID is
 * what actually works. The 'page_template' rule is still registered as a second
 * (OR'd) location group, so the groups also appear if an editor explicitly picks
 * the "Work" / "Services" template from the Page Attributes box.
 */
function astrix_ws_page_id($slug) {
  static $cache = array();
  if (!isset($cache[$slug])) {
    $page = get_page_by_path($slug);
    $cache[$slug] = ($page instanceof WP_Post) ? (int) $page->ID : 0;
  }
  return $cache[$slug];
}

/**
 * Build an OR'd ACF location: "this page template" OR "this specific page".
 */
function astrix_ws_location($template, $slug) {
  $location = array(
    array(array('param' => 'page_template', 'operator' => '==', 'value' => $template)),
  );

  $page_id = astrix_ws_page_id($slug);
  if ($page_id) {
    $location[] = array(array('param' => 'page', 'operator' => '==', 'value' => (string) $page_id));
  }

  return $location;
}

add_action('acf/init', function () {

  if (!function_exists('acf_add_local_field_group')) return;

  // ── Work page (page-work.php) ──
  acf_add_local_field_group(array(
    'key' => 'group_work_content',
    'title' => 'Work Page Content',
    'fields' => array(
      array('key' => 'field_wk_hero_eyebrow', 'label' => 'Header Eyebrow', 'name' => 'work_hero_eyebrow', 'type' => 'text'),
      array('key' => 'field_wk_hero_headline', 'label' => 'Header Headline', 'name' => 'work_hero_headline', 'type' => 'textarea', 'rows' => 2, 'instructions' => 'Inline HTML allowed (e.g. the italic &lt;em&gt; accent word).'),
      array('key' => 'field_wk_hero_intro', 'label' => 'Header Intro Paragraph', 'name' => 'work_hero_intro', 'type' => 'textarea', 'rows' => 3),

      array('key' => 'field_wk_feat_badge', 'label' => 'Featured Case · Badge', 'name' => 'work_featured_badge', 'type' => 'text'),
      array('key' => 'field_wk_feat_word', 'label' => 'Featured Case · Watermark Word', 'name' => 'work_featured_word', 'type' => 'text', 'instructions' => 'Large translucent word over the image.'),
      array('key' => 'field_wk_feat_client', 'label' => 'Featured Case · Client · Industry', 'name' => 'work_featured_client', 'type' => 'text'),
      array('key' => 'field_wk_feat_headline', 'label' => 'Featured Case · Headline', 'name' => 'work_featured_headline', 'type' => 'textarea', 'rows' => 2, 'instructions' => 'Inline HTML allowed.'),
      array('key' => 'field_wk_feat_body', 'label' => 'Featured Case · Body', 'name' => 'work_featured_body', 'type' => 'textarea', 'rows' => 3),
      array('key' => 'field_wk_feat_stat1_value', 'label' => 'Featured Case · Stat 1 Value', 'name' => 'work_featured_stat1_value', 'type' => 'text'),
      array('key' => 'field_wk_feat_stat1_label', 'label' => 'Featured Case · Stat 1 Label', 'name' => 'work_featured_stat1_label', 'type' => 'text'),
      array('key' => 'field_wk_feat_stat2_value', 'label' => 'Featured Case · Stat 2 Value', 'name' => 'work_featured_stat2_value', 'type' => 'text'),
      array('key' => 'field_wk_feat_stat2_label', 'label' => 'Featured Case · Stat 2 Label', 'name' => 'work_featured_stat2_label', 'type' => 'text'),

      array('key' => 'field_wk_filter_label', 'label' => 'Filter Bar Label', 'name' => 'work_filter_label', 'type' => 'text'),

      array('key' => 'field_wk_cta_eyebrow', 'label' => 'CTA Eyebrow', 'name' => 'work_cta_eyebrow', 'type' => 'text'),
      array('key' => 'field_wk_cta_headline', 'label' => 'CTA Headline', 'name' => 'work_cta_headline', 'type' => 'textarea', 'rows' => 2, 'instructions' => 'Inline HTML allowed.'),
      array('key' => 'field_wk_cta_button', 'label' => 'CTA Button Label', 'name' => 'work_cta_button', 'type' => 'text', 'instructions' => 'The trailing arrow is added by the template.'),
    ),
    'location' => astrix_ws_location('page-work.php', 'work'),
    'menu_order' => 0,
    'position' => 'normal',
  ));

  // ── Services page (page-services.php) ──
  acf_add_local_field_group(array(
    'key' => 'group_services_content',
    'title' => 'Services Page Content',
    'fields' => array(
      array('key' => 'field_sv_hero_eyebrow', 'label' => 'Header Eyebrow', 'name' => 'services_hero_eyebrow', 'type' => 'text'),
      array('key' => 'field_sv_hero_headline', 'label' => 'Header Headline', 'name' => 'services_hero_headline', 'type' => 'textarea', 'rows' => 3, 'instructions' => 'Inline HTML allowed (&lt;br&gt; line break and the italic &lt;em&gt; accent word).'),
      array('key' => 'field_sv_hero_intro', 'label' => 'Header Intro Paragraph', 'name' => 'services_hero_intro', 'type' => 'textarea', 'rows' => 3),

      array('key' => 'field_sv_trusted_label', 'label' => 'Trust Bar · Label', 'name' => 'services_trusted_label', 'type' => 'text'),
      array('key' => 'field_sv_trusted_logo_1', 'label' => 'Trust Bar · Client 1', 'name' => 'services_trusted_logo_1', 'type' => 'text'),
      array('key' => 'field_sv_trusted_logo_2', 'label' => 'Trust Bar · Client 2', 'name' => 'services_trusted_logo_2', 'type' => 'text'),
      array('key' => 'field_sv_trusted_logo_3', 'label' => 'Trust Bar · Client 3', 'name' => 'services_trusted_logo_3', 'type' => 'text'),
      array('key' => 'field_sv_trusted_stat_value', 'label' => 'Trust Bar · Stat Value', 'name' => 'services_trusted_stat_value', 'type' => 'text'),
      array('key' => 'field_sv_trusted_stat_label', 'label' => 'Trust Bar · Stat Label', 'name' => 'services_trusted_stat_label', 'type' => 'text'),

      array('key' => 'field_sv_process_eyebrow', 'label' => 'How We Work · Eyebrow', 'name' => 'services_process_eyebrow', 'type' => 'text'),
      array('key' => 'field_sv_process_headline', 'label' => 'How We Work · Headline', 'name' => 'services_process_headline', 'type' => 'textarea', 'rows' => 2, 'instructions' => 'Inline HTML allowed.'),

      array('key' => 'field_sv_industries_eyebrow', 'label' => 'Industries · Eyebrow', 'name' => 'services_industries_eyebrow', 'type' => 'text'),
      array('key' => 'field_sv_industries_headline', 'label' => 'Industries · Headline', 'name' => 'services_industries_headline', 'type' => 'textarea', 'rows' => 2, 'instructions' => 'Inline HTML allowed.'),
      array('key' => 'field_sv_industries_body', 'label' => 'Industries · Body', 'name' => 'services_industries_body', 'type' => 'textarea', 'rows' => 3),

      array('key' => 'field_sv_faq_eyebrow', 'label' => 'FAQ · Eyebrow', 'name' => 'services_faq_eyebrow', 'type' => 'text'),
      array('key' => 'field_sv_faq_headline', 'label' => 'FAQ · Headline', 'name' => 'services_faq_headline', 'type' => 'text'),

      array('key' => 'field_sv_cta_eyebrow', 'label' => 'CTA Eyebrow', 'name' => 'services_cta_eyebrow', 'type' => 'text'),
      array('key' => 'field_sv_cta_headline', 'label' => 'CTA Headline', 'name' => 'services_cta_headline', 'type' => 'textarea', 'rows' => 2, 'instructions' => 'Inline HTML allowed.'),
      array('key' => 'field_sv_cta_button_primary', 'label' => 'CTA Primary Button Label', 'name' => 'services_cta_button_primary', 'type' => 'text', 'instructions' => 'The trailing arrow is added by the template.'),
      array('key' => 'field_sv_cta_button_secondary', 'label' => 'CTA Secondary Link Label', 'name' => 'services_cta_button_secondary', 'type' => 'text'),
    ),
    'location' => astrix_ws_location('page-services.php', 'services'),
    'menu_order' => 0,
    'position' => 'normal',
  ));

});

/**
 * Baked-in defaults — byte-for-byte the strings that used to be hardcoded in
 * page-work.php and page-services.php. Keep these in sync with the templates.
 */
add_filter('astrix_fallback_fields', function ($fields) {
  $em_accent = "font-family: 'Instrument Serif', serif; font-style: italic; font-weight: 400; color: #C56A37;";

  return array_merge($fields, array(

    // ── Work ──
    'work_hero_eyebrow'         => 'Selected Work',
    'work_hero_headline'        => 'Proof, not <em style="' . $em_accent . '">promises.</em>',
    'work_hero_intro'           => "A selection of brands we've moved from overlooked to chosen — across strategy, creative, experience and growth.",

    'work_featured_badge'       => 'Featured Case',
    'work_featured_word'        => 'Meridian',
    'work_featured_client'      => 'Meridian Financial · Fintech',
    'work_featured_headline'    => 'From overlooked to the category <em style="' . $em_accent . '">default.</em>',
    'work_featured_body'        => 'A full reposition, identity and growth system that turned a quiet challenger into the name buyers shortlist first.',
    'work_featured_stat1_value' => '+240%',
    'work_featured_stat1_label' => 'Qualified pipeline',
    'work_featured_stat2_value' => '3.1×',
    'work_featured_stat2_label' => 'Brand recall',

    'work_filter_label'         => 'Filter',

    'work_cta_eyebrow'          => 'Your Brand, Next',
    'work_cta_headline'         => 'The next case study could be <em style="' . $em_accent . '">yours.</em>',
    'work_cta_button'           => 'Start a Conversation',

    // ── Services ──
    'services_hero_eyebrow'         => 'What We Do',
    'services_hero_headline'        => "We don't sell services.<br>We sell <em style=\"" . $em_accent . "\">outcomes.</em>",
    'services_hero_intro'           => 'Four connected disciplines, one roof, one outcome — preference. Nothing is handed off, so nothing loses coherence between what you say and what people choose.',

    'services_trusted_label'      => 'Trusted by',
    'services_trusted_logo_1'     => 'CLIENT ONE',
    'services_trusted_logo_2'     => 'CLIENT TWO',
    'services_trusted_logo_3'     => 'CLIENT THREE',
    'services_trusted_stat_value' => '+184%',
    'services_trusted_stat_label' => 'qualified pipeline, 9 months →',

    'services_process_eyebrow'  => 'How We Work',
    'services_process_headline' => 'One system, <em style="' . $em_accent . '">four moves.</em>',

    'services_industries_eyebrow'  => 'Industries',
    'services_industries_headline' => 'Built for brands that want to be first <em style="' . $em_accent . '">choice.</em>',
    'services_industries_body'     => 'We work across categories where perception decides the winner — where being understood matters as much as being good.',

    'services_faq_eyebrow'  => 'Good To Know',
    'services_faq_headline' => 'How engagements work.',

    'services_cta_eyebrow'          => 'Ready When You Are',
    'services_cta_headline'         => 'Tell us what you want to be known <em style="' . $em_accent . '">for.</em>',
    'services_cta_button_primary'   => 'Start a Conversation',
    'services_cta_button_secondary' => 'See the Work',
  ));
});
