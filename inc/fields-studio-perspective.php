<?php
/**
 * Editable copy for the Studio (/studio) and Perspective (/perspective) pages.
 *
 * Two halves, both required:
 *   1. astrix_studio_perspective_defaults() is merged into the
 *      'astrix_fallback_fields' filter, so astrix_field() keeps returning the
 *      original baked-in copy when ACF is deactivated or a field is left blank.
 *   2. Two ACF local field groups give wp-admin the matching inputs.
 *
 * LOCATION RULES — why 'page' (by ID) and not only 'page_template':
 * page-studio.php / page-perspective.php are resolved by WordPress's slug-based
 * template hierarchy (page-{slug}.php). The Studio and Perspective pages carry
 * NO _wp_page_template meta — verified against this install — so ACF's
 * page_template rule (which reads that meta and otherwise sees 'default')
 * never matches and the field group would be invisible in wp-admin.
 * We therefore resolve the page by slug at acf/init and target it by ID, and
 * OR in the page_template rule as a second group so the fields also appear if
 * an editor ever assigns the template explicitly via Page Attributes (both
 * files do carry a "Template Name" header).
 *
 * NEVER declare get_field() here — ACF defines it on a later hook and a shim
 * fatals the site. Templates read copy through astrix_field() only.
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Baked-in copy for both pages. Values are byte-for-byte the strings that used
 * to be hardcoded in the templates — do not "tidy" the punctuation.
 */
function astrix_studio_perspective_defaults() {
  return array(

    // ─────────────────────────── STUDIO ───────────────────────────

    // Hero
    'studio_hero_eyebrow'          => 'Who We Are',
    'studio_hero_h1_line1'         => 'We exist to make good businesses',
    'studio_hero_h1_line2'         => 'impossible to',
    'studio_hero_h1_emphasis'      => 'overlook.',
    'studio_hero_para'             => "Astrix is a brand, creative and growth studio built around one belief: businesses don't grow because they speak louder — they grow because people choose them.",

    // Dark belief statement band
    'studio_statement_eyebrow'     => 'Our Belief',
    'studio_statement_text'        => "Astrix doesn't create content. Astrix creates",
    'studio_statement_emphasis'    => 'preference.',

    // Why We Exist / convictions
    'studio_convictions_eyebrow'   => 'Why We Exist',
    'studio_convictions_headline'  => 'Three convictions we build on.',
    'studio_conviction_1_title'    => 'Value that isn’t understood rarely gets chosen.',
    'studio_conviction_1_body'     => 'Most businesses don’t have a quality problem. They have a clarity problem. We exist to close the distance between the value a company creates and the value its market actually perceives.',
    'studio_conviction_2_title'    => 'Attention is cheap. Preference is earned.',
    'studio_conviction_2_body'     => 'Anyone can buy a moment of visibility. We build the understanding, trust and memory that make a brand the default choice — long after the campaign ends.',
    'studio_conviction_3_title'    => 'Brands are built by systems, not campaigns.',
    'studio_conviction_3_body'     => 'One-off wins fade. We design connected systems across strategy, story, experience and growth so that being chosen compounds into momentum.',

    // How We Think / principles
    'studio_principles_eyebrow'    => 'How We Think',
    'studio_principles_headline'   => 'Principles before',
    'studio_principles_emphasis'   => 'process.',
    'studio_principle_1_title'     => 'Strategy leads the work.',
    'studio_principle_1_body'      => 'We define the ground you win on before a single pixel is drawn. Direction first, decoration never.',
    'studio_principle_2_title'     => 'Less, but sharper.',
    'studio_principle_2_body'      => 'We remove everything that doesn’t earn its place. Clarity is a design decision, not an afterthought.',
    'studio_principle_3_title'     => 'One team, one standard.',
    'studio_principle_3_body'      => 'Brand, creative, experience and growth sit under one roof — so coherence is never lost in a handoff.',
    'studio_principle_4_title'     => 'Accountable to outcomes.',
    'studio_principle_4_body'      => 'We translate stories people remember into growth people can measure. Impressions aren’t the goal; preference is.',

    // Founders
    'studio_founders_eyebrow'      => 'The Founders',
    'studio_founders_headline'     => 'Two disciplines. One table.',
    'studio_founders_intro'        => 'Astrix was founded on a simple pairing — a strategist who protects the idea, and a builder who protects the outcome. You work with both.',
    'studio_founder_1_name'        => 'Bhupesh Kaushal',
    'studio_founder_1_role'        => 'Co-Founder & Creative Strategist',
    'studio_founder_1_bio'         => 'Bhupesh sets the direction — the positioning, the narrative and the creative standard that make a brand impossible to overlook. He protects the idea from the moment it’s born to the moment it ships.',
    'studio_founder_2_name'        => 'Sunny Sehgal',
    'studio_founder_2_role'        => 'Co-Founder & Business Head',
    'studio_founder_2_bio'         => 'Sunny turns direction into results — owning growth, partnerships and delivery. He protects the outcome, making sure the work doesn’t just look right, but moves the numbers that matter.',

    // How We Work / journey
    'studio_journey_eyebrow'       => 'How We Work',
    'studio_journey_headline'      => 'A partnership, in',
    'studio_journey_emphasis'      => 'four movements.',
    'studio_journey_1_step'        => 'Move 01',
    'studio_journey_1_title'       => 'Listen',
    'studio_journey_1_body'        => 'We start with your goals, not our services. A sharp diagnosis of where you are and where preference is leaking.',
    'studio_journey_2_step'        => 'Move 02',
    'studio_journey_2_title'       => 'Position',
    'studio_journey_2_body'        => 'We define the ownable ground you win on — the reason to be chosen before anyone compares price.',
    'studio_journey_3_step'        => 'Move 03',
    'studio_journey_3_title'       => 'Build',
    'studio_journey_3_body'        => 'Strategy becomes story, identity, experience and growth — one connected system, made with care.',
    'studio_journey_4_step'        => 'Move 04',
    'studio_journey_4_title'       => 'Compound',
    'studio_journey_4_body'        => 'We measure, learn and sharpen — turning first wins into durable, compounding momentum.',

    // Good To Know / FAQ
    'studio_faq_eyebrow'           => 'Good To Know',
    'studio_faq_headline'          => 'Questions, answered.',
    'studio_faq_1_q'               => 'What does Astrix actually do?',
    'studio_faq_1_a'               => 'We build preference. Across strategy, creative, digital experience and growth, we make the value a business creates impossible to overlook — and easy to choose.',
    'studio_faq_2_q'               => 'How is a studio different from an agency?',
    'studio_faq_2_a'               => 'Agencies staff a brief. A studio holds a standard. The same senior team stays with the work end to end, so nothing is handed off and nothing loses coherence between what you say and what people choose.',
    'studio_faq_3_q'               => 'Do you only work with big brands?',
    'studio_faq_3_a'               => 'No. We work with ambitious businesses that know they’re better than their reputation — from funded startups to established companies ready to be chosen, not just seen.',
    'studio_faq_4_q'               => 'Where are you based?',
    'studio_faq_4_a'               => 'We work from India with brands worldwide, across time zones. Distance has never been the thing that decides whether work is good.',

    // Stats
    'studio_stat_1_value'          => '60',
    'studio_stat_1_suffix'         => '+',
    'studio_stat_1_label'          => 'Brands guided from overlooked to chosen.',
    'studio_stat_2_value'          => '4',
    'studio_stat_2_suffix'         => '',
    'studio_stat_2_label'          => 'Connected disciplines under one roof.',
    'studio_stat_3_value'          => '12',
    'studio_stat_3_suffix'         => 'yrs',
    'studio_stat_3_label'          => 'Of combined craft across strategy and growth.',

    // CTA
    'studio_cta_eyebrow'           => 'Work With The Studio',
    'studio_cta_headline'          => "Let's build the brand people",
    'studio_cta_emphasis'          => 'choose.',
    'studio_cta_primary_label'     => 'Start a Conversation',
    'studio_cta_secondary_label'   => 'See the Work',

    // ───────────────────────── PERSPECTIVE ─────────────────────────

    // Header
    'perspective_eyebrow'              => 'Perspective',
    'perspective_h1'                   => 'Ideas on being',
    'perspective_h1_emphasis'          => 'chosen.',
    'perspective_intro'                => 'Sharp, useful thinking on brand, clarity and growth. No fluff, no buzzwords — one idea worth your time.',

    // Featured essay
    'perspective_featured_badge'       => "Editor's Pick",
    'perspective_featured_kicker'      => 'Strategy · 8 min read',
    'perspective_featured_headline'    => 'Attention is cheap. Preference is the only',
    'perspective_featured_emphasis'    => 'moat.',
    'perspective_featured_excerpt'     => "Ad budgets buy reach. They don't buy the thing that actually protects a business: being the name people reach for without thinking. Here's how preference is built.",
    'perspective_featured_cta'         => 'Read the essay',

    // Topic filter
    'perspective_topics_label'         => 'Topics',

    // Post grid
    'perspective_post_1_read'          => '6 min read',
    'perspective_post_1_title'         => 'The Clarity Gap™: why great businesses go unnoticed.',
    'perspective_post_1_excerpt'       => 'The distance between value created and value understood — and how to close it.',
    'perspective_post_2_read'          => '4 min read',
    'perspective_post_2_title'         => 'Stop being louder. Start being clearer.',
    'perspective_post_2_excerpt'       => 'Volume is a tax. Clarity is an asset. A short case for restraint.',
    'perspective_post_3_read'          => '7 min read',
    'perspective_post_3_title'         => 'What AI can’t do for your brand — yet.',
    'perspective_post_3_excerpt'       => 'Where automation compounds, and where judgement still wins.',
    'perspective_post_4_read'          => '5 min read',
    'perspective_post_4_title'         => 'The economics of being remembered.',
    'perspective_post_4_excerpt'       => 'Why memory is the cheapest growth channel you’re not investing in.',
    'perspective_post_5_read'          => '4 min read',
    'perspective_post_5_title'         => 'Design is how trust feels.',
    'perspective_post_5_excerpt'       => 'Every interaction is a promise. Here’s how to keep it.',
    'perspective_post_6_read'          => '6 min read',
    'perspective_post_6_title'         => 'From campaign to compounding.',
    'perspective_post_6_excerpt'       => 'How to turn a one-off spike into a durable growth system.',

    // Free resources
    'perspective_resources_eyebrow'    => 'Free Resources',
    'perspective_resources_headline'   => 'Deeper reads,',
    'perspective_resources_emphasis'   => 'on us.',
    'perspective_resources_intro'      => 'Guides, reports and frameworks we use with clients — no gate, no fluff.',
    'perspective_download_1_title'     => 'The Preference Playbook',
    'perspective_download_1_meta'      => 'Guide · 24 pages · PDF',
    'perspective_download_2_title'     => 'Brand Clarity Audit Framework',
    'perspective_download_2_meta'      => 'Worksheet · 6 pages · PDF',
    'perspective_download_3_title'     => 'State of Being Chosen 2026',
    'perspective_download_3_meta'      => 'Report · 40 pages · PDF',

    // Newsletter
    'perspective_newsletter_eyebrow'          => 'The Preference Letter',
    'perspective_newsletter_headline'         => 'One idea worth your time.',
    'perspective_newsletter_emphasis'         => 'Monthly.',
    'perspective_newsletter_body'             => 'A short letter on brand, clarity and growth. No noise. Unsubscribe anytime.',
    'perspective_newsletter_thanks'           => 'Thank you. Watch your inbox —',
    'perspective_newsletter_thanks_emphasis'  => 'we keep it worth opening.',
    'perspective_newsletter_cta'              => 'Subscribe →',
    'perspective_newsletter_note'             => 'Join 4,000+ founders and marketers.',
  );
}

/**
 * Feed the defaults to astrix_field() without touching inc/fallback-content.php.
 */
add_filter('astrix_fallback_fields', function ($fields) {
  return array_merge($fields, astrix_studio_perspective_defaults());
});

add_action('acf/init', function () {

  if (!function_exists('acf_add_local_field_group')) return;

  $defaults = astrix_studio_perspective_defaults();

  // Field builder. Placeholder shows the baked-in copy so an empty box in
  // wp-admin reads as "still using the default" rather than "page is blank".
  $f = function ($name, $label, $type = 'text', $rows = 3) use ($defaults) {
    $field = array(
      'key'         => 'field_' . $name,
      'label'       => $label,
      'name'        => $name,
      'type'        => $type,
      'placeholder' => isset($defaults[$name]) ? $defaults[$name] : '',
    );
    if ($type === 'textarea') {
      $field['rows']      = $rows;
      // Store/print exactly what was typed — no auto <br> / <p>, which would
      // change the rendered bytes the moment someone saves a value.
      $field['new_lines'] = '';
    }
    return $field;
  };

  /**
   * Location rules for a slug-resolved page template.
   * See the file header for why the page ID rule is the one that actually works.
   */
  $location_for = function ($slug, $template_file) {
    $groups = array();
    $page   = get_page_by_path($slug);
    if ($page) {
      $groups[] = array(array('param' => 'page', 'operator' => '==', 'value' => (string) $page->ID));
    }
    // Always present, so the group is never location-less (which would show it
    // on every screen) and so an explicitly assigned template still matches.
    $groups[] = array(array('param' => 'page_template', 'operator' => '==', 'value' => $template_file));
    return $groups;
  };

  // ── Studio page ──
  acf_add_local_field_group(array(
    'key'    => 'group_studio_page',
    'title'  => 'Studio Page Content',
    'fields' => array(
      $f('studio_hero_eyebrow', 'Hero Eyebrow'),
      $f('studio_hero_h1_line1', 'Hero Headline Line 1'),
      $f('studio_hero_h1_line2', 'Hero Headline Line 2 (before italic word)'),
      $f('studio_hero_h1_emphasis', 'Hero Headline Italic Word'),
      $f('studio_hero_para', 'Hero Paragraph', 'textarea', 3),

      $f('studio_statement_eyebrow', 'Belief Band Eyebrow'),
      $f('studio_statement_text', 'Belief Band Statement (before italic word)', 'textarea', 2),
      $f('studio_statement_emphasis', 'Belief Band Italic Word'),

      $f('studio_convictions_eyebrow', 'Why We Exist Eyebrow'),
      $f('studio_convictions_headline', 'Why We Exist Headline'),
      $f('studio_conviction_1_title', 'Conviction 1 Title'),
      $f('studio_conviction_1_body', 'Conviction 1 Body', 'textarea', 3),
      $f('studio_conviction_2_title', 'Conviction 2 Title'),
      $f('studio_conviction_2_body', 'Conviction 2 Body', 'textarea', 3),
      $f('studio_conviction_3_title', 'Conviction 3 Title'),
      $f('studio_conviction_3_body', 'Conviction 3 Body', 'textarea', 3),

      $f('studio_principles_eyebrow', 'Principles Eyebrow'),
      $f('studio_principles_headline', 'Principles Headline (before italic word)'),
      $f('studio_principles_emphasis', 'Principles Headline Italic Word'),
      $f('studio_principle_1_title', 'Principle 1 Title'),
      $f('studio_principle_1_body', 'Principle 1 Body', 'textarea', 2),
      $f('studio_principle_2_title', 'Principle 2 Title'),
      $f('studio_principle_2_body', 'Principle 2 Body', 'textarea', 2),
      $f('studio_principle_3_title', 'Principle 3 Title'),
      $f('studio_principle_3_body', 'Principle 3 Body', 'textarea', 2),
      $f('studio_principle_4_title', 'Principle 4 Title'),
      $f('studio_principle_4_body', 'Principle 4 Body', 'textarea', 2),

      $f('studio_founders_eyebrow', 'Founders Eyebrow'),
      $f('studio_founders_headline', 'Founders Headline'),
      $f('studio_founders_intro', 'Founders Intro', 'textarea', 3),
      $f('studio_founder_1_name', 'Founder 1 Name'),
      $f('studio_founder_1_role', 'Founder 1 Role'),
      $f('studio_founder_1_bio', 'Founder 1 Bio', 'textarea', 3),
      $f('studio_founder_2_name', 'Founder 2 Name'),
      $f('studio_founder_2_role', 'Founder 2 Role'),
      $f('studio_founder_2_bio', 'Founder 2 Bio', 'textarea', 3),

      $f('studio_journey_eyebrow', 'How We Work Eyebrow'),
      $f('studio_journey_headline', 'How We Work Headline (before italic words)'),
      $f('studio_journey_emphasis', 'How We Work Headline Italic Words'),
      $f('studio_journey_1_step', 'Move 1 Label'),
      $f('studio_journey_1_title', 'Move 1 Title'),
      $f('studio_journey_1_body', 'Move 1 Body', 'textarea', 2),
      $f('studio_journey_2_step', 'Move 2 Label'),
      $f('studio_journey_2_title', 'Move 2 Title'),
      $f('studio_journey_2_body', 'Move 2 Body', 'textarea', 2),
      $f('studio_journey_3_step', 'Move 3 Label'),
      $f('studio_journey_3_title', 'Move 3 Title'),
      $f('studio_journey_3_body', 'Move 3 Body', 'textarea', 2),
      $f('studio_journey_4_step', 'Move 4 Label'),
      $f('studio_journey_4_title', 'Move 4 Title'),
      $f('studio_journey_4_body', 'Move 4 Body', 'textarea', 2),

      $f('studio_faq_eyebrow', 'FAQ Eyebrow'),
      $f('studio_faq_headline', 'FAQ Headline'),
      $f('studio_faq_1_q', 'FAQ 1 Question'),
      $f('studio_faq_1_a', 'FAQ 1 Answer', 'textarea', 3),
      $f('studio_faq_2_q', 'FAQ 2 Question'),
      $f('studio_faq_2_a', 'FAQ 2 Answer', 'textarea', 3),
      $f('studio_faq_3_q', 'FAQ 3 Question'),
      $f('studio_faq_3_a', 'FAQ 3 Answer', 'textarea', 3),
      $f('studio_faq_4_q', 'FAQ 4 Question'),
      $f('studio_faq_4_a', 'FAQ 4 Answer', 'textarea', 3),

      $f('studio_stat_1_value', 'Stat 1 Number (digits only — it counts up)'),
      $f('studio_stat_1_suffix', 'Stat 1 Suffix'),
      $f('studio_stat_1_label', 'Stat 1 Label'),
      $f('studio_stat_2_value', 'Stat 2 Number (digits only — it counts up)'),
      $f('studio_stat_2_suffix', 'Stat 2 Suffix'),
      $f('studio_stat_2_label', 'Stat 2 Label'),
      $f('studio_stat_3_value', 'Stat 3 Number (digits only — it counts up)'),
      $f('studio_stat_3_suffix', 'Stat 3 Suffix'),
      $f('studio_stat_3_label', 'Stat 3 Label'),

      $f('studio_cta_eyebrow', 'CTA Eyebrow'),
      $f('studio_cta_headline', 'CTA Headline (before italic word)'),
      $f('studio_cta_emphasis', 'CTA Headline Italic Word'),
      $f('studio_cta_primary_label', 'CTA Primary Button Label'),
      $f('studio_cta_secondary_label', 'CTA Secondary Link Label'),
    ),
    'location'              => $location_for('studio', 'page-studio.php'),
    'menu_order'            => 0,
    'position'              => 'normal',
    'style'                 => 'default',
    'label_placement'       => 'top',
    'hide_on_screen'        => array('the_content'),
    'active'                => true,
    'description'           => 'Copy for the /studio page. Leave a field blank to keep the built-in default.',
  ));

  // ── Perspective page ──
  acf_add_local_field_group(array(
    'key'    => 'group_perspective_page',
    'title'  => 'Perspective Page Content',
    'fields' => array(
      $f('perspective_eyebrow', 'Header Eyebrow'),
      $f('perspective_h1', 'Header Headline (before italic word)'),
      $f('perspective_h1_emphasis', 'Header Headline Italic Word'),
      $f('perspective_intro', 'Header Intro', 'textarea', 3),

      $f('perspective_featured_badge', 'Featured Badge'),
      $f('perspective_featured_kicker', 'Featured Kicker'),
      $f('perspective_featured_headline', 'Featured Headline (before italic word)'),
      $f('perspective_featured_emphasis', 'Featured Headline Italic Word'),
      $f('perspective_featured_excerpt', 'Featured Excerpt', 'textarea', 3),
      $f('perspective_featured_cta', 'Featured Link Label'),

      $f('perspective_topics_label', 'Topic Filter Label'),

      $f('perspective_post_1_read', 'Post 1 Read Time'),
      $f('perspective_post_1_title', 'Post 1 Title'),
      $f('perspective_post_1_excerpt', 'Post 1 Excerpt', 'textarea', 2),
      $f('perspective_post_2_read', 'Post 2 Read Time'),
      $f('perspective_post_2_title', 'Post 2 Title'),
      $f('perspective_post_2_excerpt', 'Post 2 Excerpt', 'textarea', 2),
      $f('perspective_post_3_read', 'Post 3 Read Time'),
      $f('perspective_post_3_title', 'Post 3 Title'),
      $f('perspective_post_3_excerpt', 'Post 3 Excerpt', 'textarea', 2),
      $f('perspective_post_4_read', 'Post 4 Read Time'),
      $f('perspective_post_4_title', 'Post 4 Title'),
      $f('perspective_post_4_excerpt', 'Post 4 Excerpt', 'textarea', 2),
      $f('perspective_post_5_read', 'Post 5 Read Time'),
      $f('perspective_post_5_title', 'Post 5 Title'),
      $f('perspective_post_5_excerpt', 'Post 5 Excerpt', 'textarea', 2),
      $f('perspective_post_6_read', 'Post 6 Read Time'),
      $f('perspective_post_6_title', 'Post 6 Title'),
      $f('perspective_post_6_excerpt', 'Post 6 Excerpt', 'textarea', 2),

      $f('perspective_resources_eyebrow', 'Resources Eyebrow'),
      $f('perspective_resources_headline', 'Resources Headline (before italic words)'),
      $f('perspective_resources_emphasis', 'Resources Headline Italic Words'),
      $f('perspective_resources_intro', 'Resources Intro', 'textarea', 2),
      $f('perspective_download_1_title', 'Download 1 Title'),
      $f('perspective_download_1_meta', 'Download 1 Meta'),
      $f('perspective_download_2_title', 'Download 2 Title'),
      $f('perspective_download_2_meta', 'Download 2 Meta'),
      $f('perspective_download_3_title', 'Download 3 Title'),
      $f('perspective_download_3_meta', 'Download 3 Meta'),

      $f('perspective_newsletter_eyebrow', 'Newsletter Eyebrow'),
      $f('perspective_newsletter_headline', 'Newsletter Headline (before italic word)'),
      $f('perspective_newsletter_emphasis', 'Newsletter Headline Italic Word'),
      $f('perspective_newsletter_body', 'Newsletter Body', 'textarea', 2),
      $f('perspective_newsletter_thanks', 'Newsletter Thank-You (before highlight)'),
      $f('perspective_newsletter_thanks_emphasis', 'Newsletter Thank-You Highlight'),
      $f('perspective_newsletter_cta', 'Newsletter Button Label'),
      $f('perspective_newsletter_note', 'Newsletter Small Print'),
    ),
    'location'              => $location_for('perspective', 'page-perspective.php'),
    'menu_order'            => 0,
    'position'              => 'normal',
    'style'                 => 'default',
    'label_placement'       => 'top',
    'hide_on_screen'        => array('the_content'),
    'active'                => true,
    'description'           => 'Copy for the /perspective page. Leave a field blank to keep the built-in default.',
  ));

});
