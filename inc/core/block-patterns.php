<?php
/**
 * Astrix Block Patterns & Categories Registration.
 *
 * Registers pattern categories matching modern WordPress Block Theme standards.
 */

if (!defined('ABSPATH')) {
  exit;
}

function astrix_register_pattern_categories() {
  $categories = array(
    'astrix'         => array('label' => __('Astrix Sections & Slides', 'astrix')),
    'astrix-pages'   => array('label' => __('Astrix Page Templates', 'astrix')),
    'astrix-headers' => array('label' => __('Astrix Headers', 'astrix')),
    'astrix-footers' => array('label' => __('Astrix Footers', 'astrix')),
    'astrix-custom'  => array('label' => __('Astrix Custom <div> & Code Blocks', 'astrix')),
  );

  foreach ($categories as $name => $properties) {
    if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
      register_block_pattern_category($name, $properties);
    }
  }
}
add_action('init', 'astrix_register_pattern_categories', 9);
