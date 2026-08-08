<?php
/**
 * Front Page Template — Astrix Media (Home V8)
 *
 * Assembly only. Every section lives in template-parts/sections/ as a
 * self-contained partial, so sections can be reordered, disabled, or reused on
 * other templates without touching a monolithic file.
 *
 * To hide a section: comment out its line below, or set its flag to false in
 * $sections. To reorder: move the line.
 */

get_header();

/**
 * Homepage section order.
 *
 * slug => enabled
 * Disabled sections stay in the codebase and can be switched back on instantly.
 */
$sections = array(
  'intro-gate'      => true,   // 6-hour localStorage intro overlay
  'hero'            => true,   // Prologue · The Belief
  'challenge'       => true,   // Ch1 · Where Strategy Meets Story (video bg)
  'invisible'       => true,   // Ch2 · Why Businesses Stay Invisible
  'connection'      => true,   // Ch2b · The Missing Connection (thread SVG)
  'engine'          => false,  // Ch3 · Transformation Engine (Hidden per PPTX Slide 11)
  'ecosystems'      => true,   // Ch4 · What We Build
  'stack'           => true,   // Ch5 · The Stack
  'transformations' => true,   // Ch6 · Transformations, Not Portfolios
  'knowledge'       => true,   // Ch7 · Knowledge & Recognition
  'spinner'         => true,   // Animated Astrix mark
  'epilogue'        => true,   // Epilogue · The Discovery Session
);

/** Allow a child theme or future ACF toggles to override visibility. */
$sections = apply_filters('astrix_homepage_sections', $sections);

foreach ($sections as $slug => $enabled) {
  if ($enabled) {
    get_template_part('template-parts/sections/' . $slug);
  }
}

get_footer();

