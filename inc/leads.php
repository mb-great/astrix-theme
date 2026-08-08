<?php
/**
 * Contact submission storage.
 *
 * Every submission is written to the database BEFORE wp_mail() is attempted.
 * wp_mail() returning true only means WordPress handed the message to the
 * transport — shared hosts routinely accept and then silently drop. Without a
 * stored copy, a mail failure means the lead is gone with no record it existed.
 *
 * Leads are private (not public, not searchable, no front-end URL) and are
 * read-only in wp-admin — they're a record, not content.
 */

if (!defined('ABSPATH')) {
  exit;
}

const ASTRIX_LEAD_CPT = 'astrix_lead';

/**
 * Favicon fallback.
 *
 * WordPress' own favicon comes from Settings → General → Site Icon, which was
 * never set (site_icon = 0), so the site shipped with NO favicon at all — the
 * browser tab showed a blank page glyph. This outputs the theme's icons only
 * when no Site Icon is configured, so an admin-set icon always wins.
 */
add_action('wp_head', function () {
  if (has_site_icon()) {
    return; // admin configured one — defer to it
  }
  $uri = get_template_directory_uri() . '/assets/';
  printf('<link rel="icon" href="%sfavicon-32.png" sizes="32x32">' . "\n", esc_url($uri));
  printf('<link rel="icon" href="%sfavicon-192.png" sizes="192x192">' . "\n", esc_url($uri));
  printf('<link rel="apple-touch-icon" href="%sapple-touch-icon.png">' . "\n", esc_url($uri));
}, 5);

/** Fields captured from the contact form, in display order. */
function astrix_lead_fields() {
  return array(
    'name'     => 'Name',
    'email'    => 'Email',
    'company'  => 'Company',
    'industry' => 'Industry',
    'site'     => 'Website',
    'budget'   => 'Budget',
    'timeline' => 'Timeline',
    'message'  => 'Message',
  );
}

function astrix_register_lead_cpt() {
  register_post_type(ASTRIX_LEAD_CPT, array(
    'labels' => array(
      'name'          => 'Leads',
      'singular_name' => 'Lead',
      'menu_name'     => 'Leads',
      'all_items'     => 'All Leads',
      'search_items'  => 'Search Leads',
      'not_found'     => 'No leads yet.',
    ),
    'public'              => false,   // no front-end URL — this is private data
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,    // but visible in wp-admin
    'show_in_menu'        => true,
    'show_in_rest'        => false,
    'menu_icon'           => 'dashicons-email-alt',
    'menu_position'       => 26,
    'supports'            => array('title'),
    'capabilities'        => array('create_posts' => 'do_not_allow'), // only the form creates these
    'map_meta_cap'        => true,
  ));
}
add_action('init', 'astrix_register_lead_cpt');

/**
 * Persist one submission. Returns the post ID, or 0 on failure.
 * Never throws — a storage problem must not block the email or the redirect.
 */
function astrix_store_lead(array $data) {
  $title = sprintf(
    '%s — %s',
    $data['name'] !== '' ? $data['name'] : 'Unknown',
    date_i18n('j M Y, H:i')
  );

  $post_id = wp_insert_post(array(
    'post_type'   => ASTRIX_LEAD_CPT,
    'post_title'  => $title,
    'post_status' => 'publish',
  ), true);

  if (is_wp_error($post_id) || !$post_id) {
    return 0;
  }

  foreach (array_keys(astrix_lead_fields()) as $key) {
    if (isset($data[$key])) {
      update_post_meta($post_id, '_astrix_' . $key, $data[$key]);
    }
  }

  // Context useful for spam triage and follow-up.
  update_post_meta($post_id, '_astrix_ip', isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field($_SERVER['REMOTE_ADDR']) : '');
  update_post_meta($post_id, '_astrix_referer', esc_url_raw(wp_get_referer() ?: ''));
  update_post_meta($post_id, '_astrix_mail_sent', 'pending');

  return (int) $post_id;
}

/** Record whether wp_mail() actually accepted the message, so failures are visible. */
function astrix_mark_lead_mail($post_id, $sent) {
  if ($post_id) {
    update_post_meta($post_id, '_astrix_mail_sent', $sent ? 'yes' : 'FAILED');
  }
}

/* ── wp-admin: make leads readable at a glance ── */

add_filter('manage_' . ASTRIX_LEAD_CPT . '_posts_columns', function ($cols) {
  return array(
    'cb'        => isset($cols['cb']) ? $cols['cb'] : '',
    'title'     => 'Lead',
    'lead_email'=> 'Email',
    'lead_co'   => 'Company',
    'lead_budget' => 'Budget',
    'lead_mail' => 'Emailed',
    'date'      => 'Received',
  );
});

add_action('manage_' . ASTRIX_LEAD_CPT . '_posts_custom_column', function ($col, $post_id) {
  $map = array(
    'lead_email'  => '_astrix_email',
    'lead_co'     => '_astrix_company',
    'lead_budget' => '_astrix_budget',
  );
  if (isset($map[$col])) {
    echo esc_html(get_post_meta($post_id, $map[$col], true));
    return;
  }
  if ($col === 'lead_mail') {
    $state = get_post_meta($post_id, '_astrix_mail_sent', true);
    $color = $state === 'yes' ? '#1a7f37' : ($state === 'FAILED' ? '#b32d2e' : '#8a6d3b');
    echo '<strong style="color:' . esc_attr($color) . '">' . esc_html($state ?: 'unknown') . '</strong>';
  }
}, 10, 2);

/**
 * Unread counter bubble on the Leads menu item.
 *
 * Critical while wp_mail() delivery is unconfirmed: if mail is silently dropped
 * by the host, the database is the ONLY record of an inquiry. Without a visible
 * count nobody thinks to open Leads and real enquiries rot unseen.
 */
function astrix_unread_lead_count() {
  $q = new WP_Query(array(
    'post_type'      => ASTRIX_LEAD_CPT,
    'post_status'    => 'publish',
    'posts_per_page' => 1,
    'fields'         => 'ids',
    'no_found_rows'  => false,
    'meta_query'     => array(array('key' => '_astrix_read', 'compare' => 'NOT EXISTS')),
  ));
  return (int) $q->found_posts;
}

add_filter('add_menu_classes', function ($menu) {
  $count = astrix_unread_lead_count();
  if (!$count) return $menu;
  foreach ($menu as $i => $item) {
    if (isset($item[2]) && $item[2] === 'edit.php?post_type=' . ASTRIX_LEAD_CPT) {
      $menu[$i][0] .= ' <span class="update-plugins count-' . $count . '"><span class="plugin-count">'
                    . number_format_i18n($count) . '</span></span>';
      break;
    }
  }
  return $menu;
});

/** Mark a lead read once it has been opened. */
add_action('load-post.php', function () {
  if (!isset($_GET['post'])) return;
  $id = (int) $_GET['post'];
  if (get_post_type($id) === ASTRIX_LEAD_CPT) {
    update_post_meta($id, '_astrix_read', current_time('mysql'));
  }
});

/** Loud notice if any lead failed to email — the scenario we are shipping into. */
add_action('admin_notices', function () {
  if (!current_user_can('edit_posts')) return;
  $failed = new WP_Query(array(
    'post_type'      => ASTRIX_LEAD_CPT,
    'posts_per_page' => 1,
    'fields'         => 'ids',
    'meta_query'     => array(array('key' => '_astrix_mail_sent', 'value' => 'FAILED')),
  ));
  if (!$failed->found_posts) return;
  printf(
    '<div class="notice notice-warning"><p><strong>Astrix:</strong> %d contact submission(s) could not be emailed — the server rejected them. The enquiries are safe in <a href="%s">Leads</a>. Fix delivery with an SMTP plugin.</p></div>',
    (int) $failed->found_posts,
    esc_url(admin_url('edit.php?post_type=' . ASTRIX_LEAD_CPT))
  );
});

/** Full detail panel on the single lead screen. */
add_action('add_meta_boxes', function () {
  add_meta_box('astrix_lead_detail', 'Submission', function ($post) {
    echo '<table class="widefat striped"><tbody>';
    foreach (astrix_lead_fields() as $key => $label) {
      $val = get_post_meta($post->ID, '_astrix_' . $key, true);
      echo '<tr><th style="width:150px;text-align:left">' . esc_html($label) . '</th><td>'
         . nl2br(esc_html($val)) . '</td></tr>';
    }
    foreach (array('ip' => 'IP', 'referer' => 'Came from', 'mail_sent' => 'Email delivered to inbox') as $k => $label) {
      echo '<tr><th style="text-align:left">' . esc_html($label) . '</th><td>'
         . esc_html(get_post_meta($post->ID, '_astrix_' . $k, true)) . '</td></tr>';
    }
    echo '</tbody></table>';
    echo '<p style="margin-top:10px;color:#666">Stored automatically. "Emailed" only reports whether the server accepted the message for delivery — it cannot confirm it reached the inbox.</p>';
  }, ASTRIX_LEAD_CPT, 'normal', 'high');
});
