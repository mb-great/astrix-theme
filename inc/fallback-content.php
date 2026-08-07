<?php
/**
 * Standalone-safety layer.
 *
 * The theme must render correctly with NO plugins and NO imported content —
 * upload the zip, activate, done. ACF and the seeded CPT posts are optional
 * upgrades that switch on wp-admin editing; they are not requirements.
 *
 * Two mechanisms:
 *   1. get_field() shim   — if ACF is absent, return baked-in copy instead of
 *                           fataling. WordPress loads plugins before themes, so
 *                           when ACF IS active it already defined get_field()
 *                           and the function_exists() guard skips this shim.
 *   2. astrix_items()     — returns CPT posts when they exist, otherwise the
 *                           baked-in arrays, so sections never render empty.
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Baked-in homepage copy. Mirrors the values seeded into ACF.
 */
function astrix_fallback_fields() {
  return array(
    'hero_eyebrow'       => 'A Business Transformation Partner',
    'hero_h1_line1'      => "Growth isn't a marketing problem.",
    'hero_h1_line2'      => "It's a",
    'hero_h1_emphasis'   => 'systems',
    'hero_h1_line2_end'  => 'problem.',
    'hero_para'          => 'Strategy, brand, technology and marketing were never meant to live in separate rooms.',

    'ch1_eyebrow'        => 'The Modern Business Challenge',
    'ch1_headline'       => 'Your customer meets you in twenty places before they ever <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400;">meet you.</em>',

    'ch2_eyebrow'        => 'Why Businesses Stay Invisible',
    'ch2_headline'       => 'Why good businesses stay <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">invisible.</em>',
    'ch2_pullquote'      => 'Fragmented effort reads as a fragmented <span style="color: #C56A37;">business.</span>',

    'ch3_eyebrow'        => 'The Engine',
    'ch3_headline'       => 'The Astrix Transformation Engine',
    'ch3_body'           => 'Seven stages. Every capability inside. Select one.',

    'ch4_eyebrow'        => 'What We Build',
    'ch4_headline'       => 'Not services. Working <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">ecosystems.</em>',
    'ch4_body'           => 'Every engagement leaves a system that runs, not a folder of deliverables.',

    'ch5_eyebrow'        => 'The Stack',
    'ch5_headline'       => 'Technology, translated into <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">business.</em>',
    'ch5_body'           => 'Most agencies hide the engineering. We consider it half the argument.',

    'ch6_eyebrow'        => 'Transformations, Not Portfolios',

    'ch7_eyebrow'        => 'Knowledge &amp; Recognition',
    'ch7_headline'       => 'We publish what we <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">practise.</em>',
    'ch7_body'           => 'No gated PDFs, no hot takes. One idea worth your time, monthly.',

    'essay_kicker'       => 'Strategy · 8 min read',
    'essay_headline'     => 'Attention is cheap. Preference is the only <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">moat.</em>',

    'epilogue_eyebrow'   => 'The Discovery Session',
    'epilogue_headline'  => 'Bring us your business, not a <em style="font-family: \'Instrument Serif\', serif; font-style: italic; font-weight: 400; color: #C56A37;">brief.</em>',
    'epilogue_body'      => 'Forty-five minutes. An honest read on where growth is leaking. No pitch, no deck.',
  );
}

/**
 * Read a homepage field.
 *
 * NEVER declare get_field() ourselves. ACF defines it in
 * includes/api/api-template.php on a LATER hook than theme functions.php, so a
 * `if (!function_exists('get_field'))` shim here declares first and then ACF
 * fatals with "Cannot redeclare get_field()". Verified the hard way 2026-08-07.
 *
 * Correct pattern: check function_exists at CALL time and fall back to baked-in
 * copy — covers both "ACF missing" and "ACF present but field empty (content
 * never imported)".
 */
function astrix_field($selector, $post_id = null) {
  $value = function_exists('get_field') ? get_field($selector, $post_id) : '';
  if ($value !== '' && $value !== null && $value !== false) {
    return $value;
  }
  $defaults = astrix_fallback_fields();
  return isset($defaults[$selector]) ? $defaults[$selector] : '';
}

/**
 * Baked-in repeating content, keyed by post type.
 */
function astrix_fallback_items($post_type) {
  $data = array(
    'engine_stage' => array(
      array('title' => 'Discover', 'tag' => 'Evidence before opinion', 'line' => 'We start by knowing more than the room, about your buyers, your category, and where value is leaking.', 'capabilities' => "Research\nCustomer insight\nMarket & competitor analysis\nBusiness audit"),
      array('title' => 'Define', 'tag' => 'Decide the ground you win on', 'line' => 'Positioning is a decision, not a document. We make it, with you, before anything gets made.', 'capabilities' => "Positioning\nBrand strategy\nMessaging\nBusiness direction"),
      array('title' => 'Design', 'tag' => 'Make the strategy visible', 'line' => 'Identity, experience and content that carry the decision into the world, recognisably, everywhere.', 'capabilities' => "Identity\nUI/UX & experience design\nCampaigns\nContent & packaging"),
      array('title' => 'Develop', 'tag' => 'Engineer it for real life', 'line' => 'The design becomes software, fast, accessible, maintainable, and owned by your team.', 'capabilities' => "Websites & web apps\nFront-end engineering\nBack-end & APIs\nCommerce & CMS"),
      array('title' => 'Deploy', 'tag' => 'Reach the right people', 'line' => 'Distribution designed like the product: deliberate channels, native messages, honest budgets.', 'capabilities' => "SEO\nGoogle & Meta ads\nSocial & content distribution\nEmail & lifecycle"),
      array('title' => 'Optimise', 'tag' => 'Let the data argue', 'line' => 'One version of the truth, then relentless small corrections, the unglamorous part that compounds.', 'capabilities' => "Analytics\nConversion optimisation\nAutomation\nCRM & journeys"),
      array('title' => 'Scale', 'tag' => 'Compound what works', 'line' => 'AI and automation applied where they multiply judgement, not replace it.', 'capabilities' => "AI integration\nMarketing automation\nPerformance intelligence\nContinuous innovation"),
    ),
    'ecosystem' => array(
      array('title' => 'Brand Launch Ecosystem', 'numeral' => 'i', 'parts' => 'Positioning · identity · launch site · go-to-market campaign'),
      array('title' => 'Digital Growth Ecosystem', 'numeral' => 'ii', 'parts' => 'SEO architecture · paid media · content engine · analytics'),
      array('title' => 'Commerce Ecosystem', 'numeral' => 'iii', 'parts' => 'Storefront · CRO · lifecycle & email · fulfilment integrations'),
      array('title' => 'Lead Generation Ecosystem', 'numeral' => 'iv', 'parts' => 'Landing systems · performance ads · CRM · automation'),
      array('title' => 'AI Marketing Ecosystem', 'numeral' => 'v', 'parts' => 'AI integrations · workflow automation · performance intelligence'),
      array('title' => 'Corporate Brand Ecosystem', 'numeral' => 'vi', 'parts' => 'Employer brand · communications · digital headquarters'),
    ),
    'tech_capability' => array(
      array('title' => 'Experience Engineering', 'subtitle' => 'What your customers touch', 'items' => "Front-end engineering\nDesign systems\nWeb performance"),
      array('title' => 'Platform Engineering', 'subtitle' => 'What holds it all up', 'items' => "Back-end & APIs\nCMS & headless architecture\nCloud infrastructure"),
      array('title' => 'Growth Infrastructure', 'subtitle' => 'What makes it findable', 'items' => "SEO architecture\nAnalytics\nMarketing automation"),
      array('title' => 'Applied Intelligence', 'subtitle' => 'What compounds it', 'items' => "AI integrations\nPersonalisation\nPerformance intelligence"),
    ),
    'case_study' => array(
      array('title' => 'From overlooked to the category default.', 'client' => 'Meridian Financial · Fintech', 'from_text' => 'Quiet challenger', 'to_text' => 'Category default', 'metric' => '+240%', 'metric_label' => 'Qualified pipeline'),
      array('title' => 'A platform that sells itself.', 'client' => 'Atlas Logistics · B2B', 'from_text' => 'Manual quoting', 'to_text' => 'Self-serve pipeline', 'metric' => '+68%', 'metric_label' => 'Conversion'),
      array('title' => 'Growth that compounds quietly.', 'client' => 'Northwind · SaaS', 'from_text' => 'Paid-spend treadmill', 'to_text' => 'Organic engine', 'metric' => '−38%', 'metric_label' => 'Acquisition cost'),
    ),
  );
  return isset($data[$post_type]) ? $data[$post_type] : array();
}

/**
 * Return normalised rows for a repeating section.
 *
 * Uses real CPT posts when present (so wp-admin edits win), otherwise the
 * baked-in defaults. Callers get plain arrays either way, so templates don't
 * branch on whether the CMS content exists.
 */
function astrix_items($post_type, $field_keys = array(), $args = array()) {
  $rows = array();

  if (post_type_exists($post_type)) {
    $query_args = array_merge(array(
      'post_type'   => $post_type,
      'numberposts' => -1,
      'orderby'     => 'menu_order',
      'order'       => 'ASC',
    ), $args);

    foreach (get_posts($query_args) as $post) {
      $row = array('title' => get_the_title($post));
      foreach ($field_keys as $key) {
        $row[$key] = function_exists('get_field') ? (string) get_field($key, $post->ID) : '';
      }
      $rows[] = $row;
    }
  }

  return empty($rows) ? astrix_fallback_items($post_type) : $rows;
}
