<?php
/**
 * Astrix Media — Pure Block Theme (Full Site Editing / FSE)
 *
 * Built on modern WordPress Block Theme standards matching SaasLauncher / Invopilot.
 */

if (!defined('ABSPATH')) {
  exit;
}

define('ASTRIX_VERSION', '8.0.0');
define('ASTRIX_DIR', trailingslashit(get_template_directory()));
define('ASTRIX_URL', trailingslashit(get_template_directory_uri()));

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function astrix_support() {
  add_theme_support('automatic-feed-links');
  add_theme_support('wp-block-styles');
  add_theme_support('post-thumbnails');
  add_theme_support('align-wide');
  add_theme_support('editor-styles');
  add_editor_style('style.css');

  // Register custom logo support
  add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 100,
    'flex-height' => true,
    'flex-width'  => true,
  ));

  load_theme_textdomain('astrix', get_template_directory());
}
add_action('after_setup_theme', 'astrix_support');

/**
 * Enqueue Styles & Scripts for Frontend.
 */
function astrix_styles() {
  $style_path = get_stylesheet_directory() . '/style.css';
  $version = file_exists($style_path) ? filemtime($style_path) : ASTRIX_VERSION;

  // Google Fonts: Geist Sans & Instrument Serif
  wp_enqueue_style(
    'astrix-google-fonts',
    'https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap',
    array(),
    null
  );

  // Main Theme CSS
  wp_enqueue_style('astrix-style', get_stylesheet_uri(), array(), $version);

  // Frontend Dynamic Scripts & Micro-interactions
  $script_path = get_template_directory() . '/js/astrix-home.js';
  if (file_exists($script_path)) {
    wp_enqueue_script(
      'astrix-scripts',
      get_template_directory_uri() . '/js/astrix-home.js',
      array('jquery'),
      filemtime($script_path),
      true
    );

    wp_localize_script('astrix-scripts', 'astrixData', array(
      'ajaxUrl'   => admin_url('admin-ajax.php'),
      'leadNonce' => wp_create_nonce('astrix_lead_nonce'),
      'homeUrl'   => home_url('/'),
    ));
  }
}
add_action('wp_enqueue_scripts', 'astrix_styles');

/**
 * Enqueue Assets for Block Editor (Backend).
 */
function astrix_block_assets() {
  wp_enqueue_style(
    'astrix-editor-google-fonts',
    'https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap',
    array(),
    null
  );
}
add_action('enqueue_block_assets', 'astrix_block_assets');

/**
 * Load Core Modules.
 */
require_once get_template_directory() . '/inc/core/block-patterns.php';
require_once get_template_directory() . '/inc/core/block-style.php';
require_once get_template_directory() . '/inc/cpts.php';
require_once get_template_directory() . '/inc/leads.php';
