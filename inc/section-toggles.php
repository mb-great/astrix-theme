<?php
/**
 * Homepage section visibility, editable from wp-admin.
 *
 * front-page.php declares the section order and exposes
 * apply_filters('astrix_homepage_sections', $sections). This binds ACF true/false
 * fields to that seam so the client can show/hide any section themselves —
 * e.g. deck slide 11 ("hide the Transformation Engine, I'll send new HTML")
 * becomes a checkbox instead of a deploy.
 *
 * Degrades safely: with ACF absent, or a field never saved, the section stays
 * VISIBLE. Failure mode is "shows too much", never "homepage silently empties".
 */

if (!defined('ABSPATH')) {
  exit;
}

/** Human labels for the admin UI. Keys must match front-page.php's $sections. */
function astrix_section_labels() {
  return array(
    'intro-gate'      => '6-hour intro animation',
    'hero'            => 'Hero — Growth isn\'t a marketing problem',
    'challenge'       => 'Where Strategy Meets Story (video)',
    'invisible'       => 'To be chosen is to be seen clearly',
    'connection'      => 'Not Under One Roof, Built as One',
    'engine'          => 'The Transformation Engine',
    'ecosystems'      => 'What We Build — ecosystems grid',
    'stack'           => 'The Stack — technology matrix',
    'transformations' => 'Transformations, Not Portfolios',
    'knowledge'       => 'Knowledge & Recognition',
    'spinner'         => 'Spinning Astrix mark',
    'epilogue'        => 'Let\'s have a coffee together (CTA)',
  );
}

/** Register the checkboxes on the front page. */
add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) {
    return;
  }

  $fields = array(
    array(
      'key'     => 'field_sections_notice',
      'label'   => '',
      'name'    => '',
      'type'    => 'message',
      'message' => 'Turn homepage sections on or off. Hidden sections stay in the site and can be switched back on at any time — nothing is deleted.',
    ),
  );

  $position = 0;
  foreach (astrix_section_labels() as $slug => $label) {
    $position += 10; // gaps of 10 so a section can be slotted between two others
    $name = str_replace('-', '_', $slug);

    $fields[] = array(
      'key'           => 'field_show_' . $name,
      'label'         => $label,
      'name'          => 'show_' . $name,
      'type'          => 'true_false',
      'ui'            => 1,
      'ui_on_text'    => 'Shown',
      'ui_off_text'   => 'Hidden',
      'default_value' => 1,
      'wrapper'       => array('width' => '60'),
    );

    $fields[] = array(
      'key'           => 'field_order_' . $name,
      'label'         => 'Position',
      'name'          => 'order_' . $name,
      'type'          => 'number',
      'default_value' => $position,
      'placeholder'   => $position,
      'min'           => 0,
      'step'          => 1,
      'instructions'  => 'Lower numbers appear higher up the page.',
      'wrapper'       => array('width' => '40'),
    );
  }

  acf_add_local_field_group(array(
    'key'      => 'group_homepage_sections',
    'title'    => 'Homepage Sections — show / hide and reorder',
    'fields'   => $fields,
    'location' => array(array(array('param' => 'page_type', 'operator' => '==', 'value' => 'front_page'))),
    'menu_order' => -1, // sits above the content fields
  ));
});

/**
 * Apply the toggles.
 *
 * Only an explicit, saved "off" hides a section. Missing field, missing ACF, or
 * an unsaved page all leave the section visible — the safe direction.
 */
add_filter('astrix_homepage_sections', function ($sections) {
  if (!function_exists('get_field')) {
    return $sections; // ACF not active — ship everything
  }

  $front_id = (int) get_option('page_on_front');
  if (!$front_id) {
    return $sections;
  }

  $position = 0;
  $order    = array();

  foreach ($sections as $slug => $enabled) {
    $position += 10;
    $name = str_replace('-', '_', $slug);

    $value = get_field('show_' . $name, $front_id);
    // Strict false only. null/'' (never saved) must NOT hide anything.
    if ($value === false || $value === 0 || $value === '0') {
      $sections[$slug] = false;
    }

    // Placement. A blank/unsaved position keeps the section where the code put
    // it, so a half-filled screen can never scramble the page.
    $saved = get_field('order_' . $name, $front_id);
    $order[$slug] = is_numeric($saved) ? (float) $saved : $position;
  }

  // Stable sort: equal positions keep their original order rather than
  // shuffling unpredictably (uasort alone is not stable for ties).
  $tiebreak = array_flip(array_keys($sections));
  uksort($sections, function ($a, $b) use ($order, $tiebreak) {
    if ($order[$a] === $order[$b]) {
      return $tiebreak[$a] <=> $tiebreak[$b];
    }
    return $order[$a] <=> $order[$b];
  });

  return $sections;
});
