<?php
/**
 * Astrix Block Styles.
 */

if (!defined('ABSPATH')) {
  exit;
}

function astrix_register_block_styles() {
  register_block_style(
    'core/group',
    array(
      'name'  => 'astrix-luxury-card',
      'label' => __('Astrix Luxury Card', 'astrix'),
    )
  );

  register_block_style(
    'core/button',
    array(
      'name'  => 'astrix-pill-cta',
      'label' => __('Astrix Pill CTA', 'astrix'),
    )
  );
}
add_action('init', 'astrix_register_block_styles');
