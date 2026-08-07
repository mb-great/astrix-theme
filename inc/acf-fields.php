<?php
/**
 * ACF field groups, registered in code so they ship with the theme
 * (not stored only in the DB, which wouldn't survive a fresh install).
 */

add_action('acf/init', function () {

  if (!function_exists('acf_add_local_field_group')) return;

  // ── Case Study (Work page grid + homepage transformation rows) ──
  acf_add_local_field_group(array(
    'key' => 'group_case_study',
    'title' => 'Case Study Details',
    'fields' => array(
      array('key' => 'field_cs_client', 'label' => 'Client · Industry', 'name' => 'client', 'type' => 'text', 'instructions' => 'e.g. "Meridian Financial · Fintech"'),
      array('key' => 'field_cs_from', 'label' => 'From', 'name' => 'from_text', 'type' => 'text', 'instructions' => 'e.g. "Quiet challenger"'),
      array('key' => 'field_cs_to', 'label' => 'To', 'name' => 'to_text', 'type' => 'text', 'instructions' => 'e.g. "Category default"'),
      array('key' => 'field_cs_metric', 'label' => 'Metric', 'name' => 'metric', 'type' => 'text', 'instructions' => 'e.g. "+240%"'),
      array('key' => 'field_cs_metric_label', 'label' => 'Metric Label', 'name' => 'metric_label', 'type' => 'text', 'instructions' => 'e.g. "Qualified pipeline"'),
      array('key' => 'field_cs_tag', 'label' => 'Tag / Badge', 'name' => 'tag', 'type' => 'select', 'choices' => array('Brand' => 'Brand', 'Creative' => 'Creative', 'Digital' => 'Digital', 'Performance' => 'Performance')),
      array('key' => 'field_cs_body', 'label' => 'Body (featured card only)', 'name' => 'body', 'type' => 'textarea', 'rows' => 3),
      array('key' => 'field_cs_featured', 'label' => 'Featured on Work page', 'name' => 'featured', 'type' => 'true_false', 'ui' => 1),
      array('key' => 'field_cs_show_home', 'label' => 'Show on homepage', 'name' => 'show_on_homepage', 'type' => 'true_false', 'ui' => 1),
    ),
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'case_study'))),
  ));

  // ── Engine Stage (homepage 7-stage accordion) ──
  acf_add_local_field_group(array(
    'key' => 'group_engine_stage',
    'title' => 'Engine Stage Details',
    'fields' => array(
      array('key' => 'field_es_tag', 'label' => 'Tagline', 'name' => 'tag', 'type' => 'text', 'instructions' => 'e.g. "Evidence before opinion"'),
      array('key' => 'field_es_line', 'label' => 'Description', 'name' => 'line', 'type' => 'textarea', 'rows' => 3),
      array('key' => 'field_es_caps', 'label' => 'Capabilities (one per line)', 'name' => 'capabilities', 'type' => 'textarea', 'rows' => 4),
    ),
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'engine_stage'))),
  ));

  // ── Ecosystem (homepage "what we build" grid) ──
  acf_add_local_field_group(array(
    'key' => 'group_ecosystem',
    'title' => 'Ecosystem Details',
    'fields' => array(
      array('key' => 'field_eco_numeral', 'label' => 'Numeral', 'name' => 'numeral', 'type' => 'text', 'instructions' => 'e.g. "i", "ii", "iii"'),
      array('key' => 'field_eco_parts', 'label' => 'Parts', 'name' => 'parts', 'type' => 'text', 'instructions' => 'e.g. "Positioning · identity · launch site · go-to-market campaign"'),
    ),
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'ecosystem'))),
  ));

  // ── Tech Capability (homepage Stack section groups) ──
  acf_add_local_field_group(array(
    'key' => 'group_tech_capability',
    'title' => 'Tech Capability Details',
    'fields' => array(
      array('key' => 'field_tc_subtitle', 'label' => 'Subtitle', 'name' => 'subtitle', 'type' => 'text', 'instructions' => 'e.g. "What your customers touch"'),
      array('key' => 'field_tc_items', 'label' => 'Items (one per line)', 'name' => 'items', 'type' => 'textarea', 'rows' => 4),
    ),
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => 'tech_capability'))),
  ));

  // ── Homepage singular fields (hero, chapter copy) — attached to the front page ──
  acf_add_local_field_group(array(
    'key' => 'group_homepage_content',
    'title' => 'Homepage Content',
    'fields' => array(
      array('key' => 'field_hp_hero_eyebrow', 'label' => 'Hero Eyebrow', 'name' => 'hero_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_hero_h1_line1', 'label' => 'Hero Headline Line 1', 'name' => 'hero_h1_line1', 'type' => 'text'),
      array('key' => 'field_hp_hero_h1_line2', 'label' => 'Hero Headline Line 2 (before emphasis word)', 'name' => 'hero_h1_line2', 'type' => 'text'),
      array('key' => 'field_hp_hero_h1_emphasis', 'label' => 'Hero Headline Emphasis Word', 'name' => 'hero_h1_emphasis', 'type' => 'text'),
      array('key' => 'field_hp_hero_h1_line2_end', 'label' => 'Hero Headline Line 2 (after emphasis word)', 'name' => 'hero_h1_line2_end', 'type' => 'text'),
      array('key' => 'field_hp_hero_para', 'label' => 'Hero Paragraph', 'name' => 'hero_para', 'type' => 'textarea', 'rows' => 2),
      array('key' => 'field_hp_ch1_eyebrow', 'label' => 'Chapter One Eyebrow', 'name' => 'ch1_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_ch1_headline', 'label' => 'Chapter One Headline', 'name' => 'ch1_headline', 'type' => 'textarea', 'rows' => 2),
      array('key' => 'field_hp_ch2_eyebrow', 'label' => 'Chapter Two Eyebrow', 'name' => 'ch2_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_ch2_headline', 'label' => 'Chapter Two Headline', 'name' => 'ch2_headline', 'type' => 'textarea', 'rows' => 2),
      array('key' => 'field_hp_ch2_pullquote', 'label' => 'Chapter Two Pull Quote', 'name' => 'ch2_pullquote', 'type' => 'textarea', 'rows' => 2),
      array('key' => 'field_hp_ch3_eyebrow', 'label' => 'Chapter Three Eyebrow', 'name' => 'ch3_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_ch3_headline', 'label' => 'Chapter Three Headline', 'name' => 'ch3_headline', 'type' => 'text'),
      array('key' => 'field_hp_ch3_body', 'label' => 'Chapter Three Body', 'name' => 'ch3_body', 'type' => 'text'),
      array('key' => 'field_hp_ch4_eyebrow', 'label' => 'Chapter Four Eyebrow', 'name' => 'ch4_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_ch4_headline', 'label' => 'Chapter Four Headline', 'name' => 'ch4_headline', 'type' => 'text'),
      array('key' => 'field_hp_ch4_body', 'label' => 'Chapter Four Body', 'name' => 'ch4_body', 'type' => 'textarea', 'rows' => 2),
      array('key' => 'field_hp_ch5_eyebrow', 'label' => 'Chapter Five Eyebrow', 'name' => 'ch5_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_ch5_headline', 'label' => 'Chapter Five Headline', 'name' => 'ch5_headline', 'type' => 'text'),
      array('key' => 'field_hp_ch5_body', 'label' => 'Chapter Five Body', 'name' => 'ch5_body', 'type' => 'textarea', 'rows' => 2),
      array('key' => 'field_hp_ch6_eyebrow', 'label' => 'Chapter Six Eyebrow', 'name' => 'ch6_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_ch7_eyebrow', 'label' => 'Chapter Seven Eyebrow', 'name' => 'ch7_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_ch7_headline', 'label' => 'Chapter Seven Headline', 'name' => 'ch7_headline', 'type' => 'text'),
      array('key' => 'field_hp_ch7_body', 'label' => 'Chapter Seven Body', 'name' => 'ch7_body', 'type' => 'textarea', 'rows' => 2),
      array('key' => 'field_hp_essay_kicker', 'label' => 'Essay Kicker', 'name' => 'essay_kicker', 'type' => 'text'),
      array('key' => 'field_hp_essay_headline', 'label' => 'Essay Headline', 'name' => 'essay_headline', 'type' => 'text'),
      array('key' => 'field_hp_epilogue_eyebrow', 'label' => 'Epilogue Eyebrow', 'name' => 'epilogue_eyebrow', 'type' => 'text'),
      array('key' => 'field_hp_epilogue_headline', 'label' => 'Epilogue Headline', 'name' => 'epilogue_headline', 'type' => 'text'),
      array('key' => 'field_hp_epilogue_body', 'label' => 'Epilogue Body', 'name' => 'epilogue_body', 'type' => 'textarea', 'rows' => 2),
    ),
    'location' => array(array(array('param' => 'page_type', 'operator' => '==', 'value' => 'front_page'))),
  ));

});
