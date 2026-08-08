<?php
/**
 * Astrix Media Theme Functions
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

require_once get_template_directory() . '/inc/theme-settings.php';   // global text/contact values — no plugin needed
require_once get_template_directory() . '/inc/fallback-content.php'; // must load first — defines astrix_field()
require_once get_template_directory() . '/inc/cpts.php';
require_once get_template_directory() . '/inc/acf-fields.php';
require_once get_template_directory() . '/inc/nav.php';            // editable menus + mega-menu walker
require_once get_template_directory() . '/inc/section-toggles.php';
require_once get_template_directory() . '/inc/leads.php';
require_once get_template_directory() . '/inc/admin-editor.php';

require_once get_template_directory() . '/inc/block-patterns.php';

function astrix_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 100,
    'flex-height' => true,
    'flex-width'  => true,
  ));

  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script'
  ));
}
add_action('after_setup_theme', 'astrix_theme_setup');

function astrix_enqueue_scripts() {
  // Version = file modification time, so every edit automatically busts
  // browser/mobile-Safari cache instead of silently serving stale CSS/JS
  // under a version string ('8.0.0') that never changed.
  $style_path = get_stylesheet_directory() . '/style.css';
  $script_path = get_template_directory() . '/js/astrix-home.js';

  wp_enqueue_style(
    'astrix-style',
    get_stylesheet_uri(),
    array(),
    file_exists($style_path) ? filemtime($style_path) : '8.0.0'
  );

  wp_enqueue_script(
    'astrix-home-script',
    get_template_directory_uri() . '/js/astrix-home.js',
    array(),
    file_exists($script_path) ? filemtime($script_path) : '8.0.0',
    true
  );
}
add_action('wp_enqueue_scripts', 'astrix_enqueue_scripts');

/**
 * Contact form handler (page-contact.php)
 */
add_action('admin_post_astrix_contact_submit', 'astrix_handle_contact_submit');
add_action('admin_post_nopriv_astrix_contact_submit', 'astrix_handle_contact_submit');

function astrix_handle_contact_submit() {
  $redirect = wp_get_referer() ?: home_url('/contact');

  // Honeypot — silently pretend success to bots
  if (!empty($_POST['astrix_hp'])) {
    wp_safe_redirect(add_query_arg('sent', '1', $redirect));
    exit;
  }

  if (!isset($_POST['astrix_contact_nonce']) || !wp_verify_nonce($_POST['astrix_contact_nonce'], 'astrix_contact_submit')) {
    wp_safe_redirect(add_query_arg('error', '1', $redirect));
    exit;
  }

  // Per-IP rate limit: 1 submission per 60 seconds
  $ip = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : 'unknown';
  $rate_key = 'astrix_contact_rl_' . md5($ip);
  if (get_transient($rate_key)) {
    wp_safe_redirect(add_query_arg('error', '1', $redirect));
    exit;
  }
  set_transient($rate_key, 1, 60);

  $name     = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
  $email    = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
  $company  = isset($_POST['company']) ? sanitize_text_field($_POST['company']) : '';
  $industry = isset($_POST['industry']) ? sanitize_text_field($_POST['industry']) : '';
  $site     = isset($_POST['site']) ? sanitize_text_field($_POST['site']) : '';
  $message  = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
  $budget   = isset($_POST['budget']) ? sanitize_text_field($_POST['budget']) : '';
  $timeline = isset($_POST['timeline']) ? sanitize_text_field($_POST['timeline']) : '';

  if (empty($name) || !is_email($email)) {
    wp_safe_redirect(add_query_arg('error', '1', $redirect));
    exit;
  }

  // Store FIRST, mail second. If wp_mail() is blocked by the host (common on
  // shared hosting, and unverifiable from the server side) the lead is still
  // recoverable from wp-admin → Leads instead of vanishing silently.
  $lead_id = astrix_store_lead(compact('name', 'email', 'company', 'industry', 'site', 'budget', 'timeline', 'message'));

  $to      = astrix_setting('email');
  $subject = 'New Discovery Session inquiry from ' . $name;
  $body    = "Name: $name\nEmail: $email\nCompany: $company\nIndustry: $industry\nWebsite: $site\nBudget: $budget\nTimeline: $timeline\n\nMessage:\n$message";
  $headers = array('Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email);

  $mailed = wp_mail($to, $subject, $body, $headers);
  astrix_mark_lead_mail($lead_id, $mailed);

  wp_safe_redirect(add_query_arg(array(
    'sent'      => '1',
    'sent_name' => rawurlencode(strtok($name, ' ')),
  ), $redirect));
  exit;
}
