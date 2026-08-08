<?php
/**
 * Astrix Gutenberg Block Patterns.
 *
 * Registers ready-to-use section patterns in the Block Editor inserter under "Astrix Sections".
 */

if (!defined('ABSPATH')) {
  exit;
}

add_action('init', function () {
  if (!function_exists('register_block_pattern_category') || !function_exists('register_block_pattern')) {
    return;
  }

  register_block_pattern_category('astrix_sections', array(
    'label' => 'Astrix Sections',
  ));

  // Pattern 1: Astrix Hero Section
  register_block_pattern('astrix/hero-section', array(
    'title'       => 'Astrix — Hero Transformation Section',
    'categories'  => array('astrix_sections'),
    'description' => 'Full-bleed luxury hero section with dual typography and CTA.',
    'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"clamp(60px,10vh,120px)","bottom":"clamp(60px,10vh,120px)","left":"clamp(24px,5vw,72px)","right":"clamp(24px,5vw,72px)"}},"color":{"background":"#f5f1ea","text":"#211c17"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:#f5f1ea;color:#211c17;padding-top:clamp(60px,10vh,120px);padding-right:clamp(24px,5vw,72px);padding-bottom:clamp(60px,10vh,120px);padding-left:clamp(24px,5vw,72px)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"0.28em","textTransform":"uppercase","fontSize":"12px"}},"textColor":"lapis"} -->
<p class="has-lapis-color has-text-color" style="font-size:12px;letter-spacing:0.28em;text-transform:uppercase">A Business Transformation Partner</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"clamp(40px,5vw,80px)","lineHeight":"1.05"}}} -->
<h1 class="wp-block-heading" style="font-size:clamp(40px,5vw,80px);line-height:1.05">Where Strategy Meets Story.<br>Built as <em>One.</em></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","lineHeight":"1.6"}}} -->
<p style="font-size:18px;line-height:1.6">Strategy, brand, technology and marketing were never meant to operate in separate rooms. At Astrix, we bring them together as one connected growth ecosystem.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#211c17","text":"#f5f1ea"},"border":{"radius":"100px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" href="/contact" style="border-radius:100px;background-color:#211c17;color:#f5f1ea">Let\'s Connect! →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
  ));

  // Pattern 2: Epilogue / Let's Talk
  register_block_pattern('astrix/epilogue-section', array(
    'title'       => 'Astrix — Epilogue & Conversation CTA',
    'categories'  => array('astrix_sections'),
    'description' => 'Dark luxury conversion banner with coffee conversation prompt.',
    'content'     => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"clamp(60px,10vh,100px)","bottom":"clamp(60px,10vh,100px)","left":"clamp(24px,5vw,72px)","right":"clamp(24px,5vw,72px)"}},"color":{"background":"#211c17","text":"#f5f1ea"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-text-color has-background" style="background-color:#211c17;color:#f5f1ea;padding-top:clamp(60px,10vh,100px);padding-right:clamp(24px,5vw,72px);padding-bottom:clamp(60px,10vh,100px);padding-left:clamp(24px,5vw,72px)"><!-- wp:paragraph {"style":{"typography":{"letterSpacing":"0.28em","textTransform":"uppercase","fontSize":"11.5px"}},"textColor":"lapis"} -->
<p class="has-lapis-color has-text-color" style="font-size:11.5px;letter-spacing:0.28em;text-transform:uppercase">Let\'s Talk</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(36px,4.5vw,72px)","lineHeight":"1.08"}}} -->
<h2 class="wp-block-heading" style="font-size:clamp(36px,4.5vw,72px);line-height:1.08">Let\'s have a coffee <em>together.</em></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"16px","lineHeight":"1.6"}}} -->
<p style="font-size:16px;line-height:1.6">Every business starts with an idea. But ironically, plenty of great ones stay a well-kept secret. Tell us where you want to go.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"color":{"background":"#c56a37","text":"#f5f1ea"},"border":{"radius":"100px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-color has-background wp-element-button" href="/contact" style="border-radius:100px;background-color:#c56a37;color:#f5f1ea">Start a Conversation →</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
  ));
});
