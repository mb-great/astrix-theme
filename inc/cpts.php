<?php
/**
 * Custom Post Types for editable repeating content.
 * Each maps to a homepage section that used to be a hardcoded PHP array.
 */

function astrix_register_cpts() {

  register_post_type('case_study', array(
    'labels' => array(
      'name' => 'Case Studies',
      'singular_name' => 'Case Study',
      'add_new_item' => 'Add New Case Study',
      'edit_item' => 'Edit Case Study',
    ),
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-chart-line',
    'supports' => array('title', 'thumbnail', 'page-attributes'),
    'rewrite' => array('slug' => 'case-studies'),
  ));

  register_post_type('engine_stage', array(
    'labels' => array(
      'name' => 'Engine Stages',
      'singular_name' => 'Engine Stage',
      'add_new_item' => 'Add New Engine Stage',
      'edit_item' => 'Edit Engine Stage',
    ),
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-randomize',
    'supports' => array('title', 'page-attributes'),
  ));

  register_post_type('ecosystem', array(
    'labels' => array(
      'name' => 'Ecosystems',
      'singular_name' => 'Ecosystem',
      'add_new_item' => 'Add New Ecosystem',
      'edit_item' => 'Edit Ecosystem',
    ),
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-networking',
    'supports' => array('title', 'page-attributes'),
  ));

  register_post_type('tech_capability', array(
    'labels' => array(
      'name' => 'Tech Capabilities',
      'singular_name' => 'Tech Capability',
      'add_new_item' => 'Add New Tech Capability',
      'edit_item' => 'Edit Tech Capability',
    ),
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-admin-generic',
    'supports' => array('title', 'page-attributes'),
  ));

}
add_action('init', 'astrix_register_cpts');
