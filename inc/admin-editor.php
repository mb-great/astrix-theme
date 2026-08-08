<?php
/**
 * Astrix Admin Editor & Native Meta Boxes.
 *
 * Provides a clean, organized, zero-dependency visual editing interface
 * inside WordPress wp-admin for the Homepage and Subpage templates.
 * Includes WordPress Media Library image selection and instant post meta saving.
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Enqueue WordPress Media Uploader scripts and styles for Astrix Meta Boxes and Options Page.
 */
add_action('admin_enqueue_scripts', function ($hook) {
  if (in_array($hook, array('post.php', 'post-new.php', 'toplevel_page_astrix-editor'))) {
    wp_enqueue_media();
    wp_enqueue_script(
      'astrix-admin-js',
      get_template_directory_uri() . '/js/astrix-admin.js',
      array('jquery'),
      filemtime(get_template_directory() . '/js/astrix-admin.js'),
      true
    );
  }
});

/**
 * Register prominent top-level WordPress Admin Menu: ⚡ Astrix Editor
 */
add_action('admin_menu', function () {
  add_menu_page(
    '⚡ Astrix Theme Editor',
    '⚡ Astrix Editor',
    'manage_options',
    'astrix-editor',
    'astrix_render_unified_options_page',
    'dashicons-art',
    2 // Position right below Dashboard
  );
});


/**
 * Hide default empty editor on structured Astrix page templates so only the dedicated
 * Astrix Content Panels and image pickers are displayed.
 */
add_action('admin_init', function () {
  if (isset($_GET['post'])) {
    $post_id = (int) $_GET['post'];
    $front_id = (int) get_option('page_on_front');
    $template = get_post_meta($post_id, '_wp_page_template', true);
    $slug = get_post_field('post_name', $post_id);

    $is_structured = ($post_id === $front_id) || in_array($template, array(
      'front-page.php',
      'templates/template-services.php',
      'templates/template-studio.php',
      'templates/template-perspective.php',
      'templates/template-work.php',
      'templates/template-contact.php',
      'page-services.php',
      'page-studio.php',
      'page-perspective.php',
      'page-work.php',
      'page-contact.php',
    )) || in_array($slug, array('home', 'services', 'studio', 'perspective', 'work', 'contact'));

    if ($is_structured) {
      remove_post_type_support('page', 'editor');
    }
  }
});

/**
 * Register Astrix Custom Meta Boxes.
 */

add_action('add_meta_boxes', function () {
  global $post;
  if (!$post || $post->post_type !== 'page') {
    return;
  }

  $post_id = $post->ID;
  $front_id = (int) get_option('page_on_front');
  $template = get_post_meta($post_id, '_wp_page_template', true);
  $slug = $post->post_name;

  $is_home = ($post_id === $front_id) || $slug === 'home' || $template === 'front-page.php';
  $is_services = ($slug === 'services' || $template === 'templates/template-services.php' || $template === 'page-services.php');
  $is_studio = ($slug === 'studio' || $template === 'templates/template-studio.php' || $template === 'page-studio.php');
  $is_perspective = ($slug === 'perspective' || $template === 'templates/template-perspective.php' || $template === 'page-perspective.php');
  $is_work = ($slug === 'work' || $template === 'templates/template-work.php' || $template === 'page-work.php');
  $is_contact = ($slug === 'contact' || $template === 'templates/template-contact.php' || $template === 'page-contact.php');

  if ($is_home) {
    add_meta_box('astrix_home_editor', '⚡ Astrix Homepage Content Editor', 'astrix_render_home_metabox', 'page', 'normal', 'high');
  } elseif ($is_services) {
    add_meta_box('astrix_services_editor', '⚡ Astrix Services Page Editor', 'astrix_render_services_metabox', 'page', 'normal', 'high');
  } elseif ($is_contact) {
    add_meta_box('astrix_contact_editor', '⚡ Astrix Contact Page Editor', 'astrix_render_contact_metabox', 'page', 'normal', 'high');
  } elseif ($is_studio) {
    add_meta_box('astrix_studio_editor', '⚡ Astrix Studio / About Page Editor', 'astrix_render_studio_metabox', 'page', 'normal', 'high');
  } elseif ($is_perspective) {
    add_meta_box('astrix_perspective_editor', '⚡ Astrix Perspective Page Editor', 'astrix_render_perspective_metabox', 'page', 'normal', 'high');
  } elseif ($is_work) {
    add_meta_box('astrix_work_editor', '⚡ Astrix Work Page Editor', 'astrix_render_work_metabox', 'page', 'normal', 'high');
  }
});

/**
 * Register Meta Box for Case Studies / Clients CPT.
 */
add_action('add_meta_boxes_case_study', function () {
  add_meta_box('astrix_case_study_editor', '📈 Client Transformation & Growth Metric', 'astrix_render_case_study_metabox', 'case_study', 'normal', 'high');
});

function astrix_render_case_study_metabox($post) {
  wp_nonce_field('astrix_save_meta', 'astrix_meta_nonce');
  $client = get_post_meta($post->ID, 'client', true);
  $from_text = get_post_meta($post->ID, 'from_text', true);
  $to_text = get_post_meta($post->ID, 'to_text', true);
  $metric = get_post_meta($post->ID, 'metric', true);
  $metric_label = get_post_meta($post->ID, 'metric_label', true);
  $show_hp = get_post_meta($post->ID, 'show_on_homepage', true);
  if ($show_hp === '') { $show_hp = '1'; }
  ?>
  <div style="padding: 10px 0;">
    <div style="margin-bottom: 16px;">
      <label style="display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px;">Client Name & Industry Category</label>
      <input type="text" name="astrix_meta[client]" value="<?php echo esc_attr($client); ?>" placeholder="e.g. Meridian Financial · Fintech" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #8c8f94;">
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px;">From (Initial State)</label>
        <input type="text" name="astrix_meta[from_text]" value="<?php echo esc_attr($from_text); ?>" placeholder="e.g. Quiet challenger" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #8c8f94;">
      </div>
      <div>
        <label style="display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px;">To (Transformed State)</label>
        <input type="text" name="astrix_meta[to_text]" value="<?php echo esc_attr($to_text); ?>" placeholder="e.g. Category default" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #8c8f94;">
      </div>
    </div>
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
      <div>
        <label style="display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px;">Percentage / Metric Value</label>
        <input type="text" name="astrix_meta[metric]" value="<?php echo esc_attr($metric); ?>" placeholder="e.g. +240%" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #8c8f94;">
      </div>
      <div>
        <label style="display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px;">Metric Label</label>
        <input type="text" name="astrix_meta[metric_label]" value="<?php echo esc_attr($metric_label); ?>" placeholder="e.g. Qualified pipeline" style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #8c8f94;">
      </div>
    </div>
    <div style="margin-top: 14px;">
      <label style="font-weight: 600; font-size: 13px; display: inline-flex; align-items: center; gap: 8px;">
        <input type="checkbox" name="astrix_meta[show_on_homepage]" value="1" <?php checked($show_hp, '1'); ?>>
        Display this transformation card on the Homepage
      </label>
    </div>
  </div>
  <?php
}


/**
 * Helper to render an admin text / textarea field row.
 */
function astrix_admin_field($post_id, $key, $label, $type = 'text', $help = '') {
  $val = astrix_field($key, $post_id);
  echo '<div style="margin-bottom: 16px;">';
  echo '<label style="display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px; color: #1d2327;">' . esc_html($label) . '</label>';
  
  if ($type === 'textarea') {
    echo '<textarea name="astrix_meta[' . esc_attr($key) . ']" rows="3" style="width: 100%; border-radius: 4px; border: 1px solid #8c8f94; padding: 8px; font-size: 13px;">' . esc_textarea($val) . '</textarea>';
  } else {
    echo '<input type="text" name="astrix_meta[' . esc_attr($key) . ']" value="' . esc_attr($val) . '" style="width: 100%; border-radius: 4px; border: 1px solid #8c8f94; padding: 8px; font-size: 13px;">';
  }
  
  if ($help) {
    echo '<p style="margin: 4px 0 0; font-size: 12px; color: #646970;">' . esc_html($help) . '</p>';
  }
  echo '</div>';
}

/**
 * Helper to render an image uploader field with Media Library modal.
 */
function astrix_admin_image_field($post_id, $key, $label, $default_rel = '') {
  $val = astrix_field($key, $post_id);
  $default_url = $default_rel ? get_template_directory_uri() . '/assets/' . $default_rel : '';
  $display_url = $val ? $val : $default_url;

  echo '<div style="margin-bottom: 18px; padding: 12px; background: #f8f9fa; border: 1px solid #e2e4e7; border-radius: 4px;">';
  echo '<label style="display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px; color: #1d2327;">' . esc_html($label) . '</label>';
  echo '<div style="display: flex; gap: 10px; align-items: center;">';
  echo '<input type="text" class="ax-media-input" name="astrix_meta[' . esc_attr($key) . ']" value="' . esc_attr($val) . '" placeholder="' . esc_attr($default_url) . '" style="flex: 1; border-radius: 4px; border: 1px solid #8c8f94; padding: 6px 8px; font-size: 13px;">';
  echo '<button type="button" class="button button-secondary ax-media-upload-btn">Choose Image</button>';
  echo '<button type="button" class="button ax-media-remove-btn" title="Clear image">&times;</button>';
  echo '</div>';
  echo '<div class="ax-media-preview">';
  if ($display_url) {
    echo '<img src="' . esc_url($display_url) . '" style="max-height: 100px; border-radius: 4px; margin-top: 8px; display: block; border: 1px solid #ddd;">';
  }
  echo '</div>';
  echo '</div>';
}

/**
 * Render Homepage Meta Box with structured sections.
 */
function astrix_render_home_metabox($post) {
  wp_nonce_field('astrix_save_meta', 'astrix_meta_nonce');
  ?>
  <style>
    .ax-box-section { background: #fdfdfd; border: 1px solid #e2e4e7; border-radius: 6px; padding: 18px 20px; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); }
    .ax-box-title { margin: 0 0 14px; font-size: 14px; font-weight: 700; color: #1d2327; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #eee; padding-bottom: 8px; }
  </style>

  <div style="padding: 10px 0;">
    <div style="background: #e7f3ff; border-left: 4px solid #2271b1; padding: 12px 16px; margin-bottom: 18px; font-size: 13px; color: #1d2327; border-radius: 4px;">
      <strong>Astrix Homepage Content Editor:</strong> Edit headlines, copy, eyebrows, and images for all 19 deck slides below. Click <strong>Update</strong> at the top right when done.
    </div>

    <!-- Section 1: Hero -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">🚀 Slide 5: Hero Section</h3>
      <?php
      astrix_admin_field($post->ID, 'hero_eyebrow', 'Hero Eyebrow', 'text', 'Default: A Business Transformation Partner');
      astrix_admin_field($post->ID, 'hero_h1_line1', 'Hero Headline Line 1', 'text', 'Default: Growth isn\'t a marketing challenge.');
      astrix_admin_field($post->ID, 'hero_h1_line2', 'Hero Headline Line 2 (Before emphasis)', 'text', 'Default: It\'s a business');
      astrix_admin_field($post->ID, 'hero_h1_emphasis', 'Hero Headline Emphasis Word', 'text', 'Default: systems');
      astrix_admin_field($post->ID, 'hero_h1_line2_end', 'Hero Headline Line 2 (After emphasis)', 'text', 'Default: challenge.');
      astrix_admin_field($post->ID, 'hero_para', 'Hero Paragraph Body', 'textarea', 'Main intro narrative text');
      astrix_admin_image_field($post->ID, 'hero_image', 'Hero Image (Image 01)', 'deck-01-hero.webp');
      ?>
    </div>

    <!-- Section 2: Chapter 1 (Challenge) -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">📖 Slide 6: Chapter One (The Challenge)</h3>
      <?php
      astrix_admin_field($post->ID, 'ch1_eyebrow', 'Chapter One Eyebrow', 'text', 'Default: WHERE STRATEGY MEETS STORY');
      astrix_admin_field($post->ID, 'ch1_headline', 'Chapter One Headline', 'textarea', 'Default: Every Business Has a Story. Become the One People Choose.');
      ?>
    </div>

    <!-- Section 3: Chapter 2 (Invisible) -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">👁️ Slide 7–8: Chapter Two (The Invisible)</h3>
      <?php
      astrix_admin_field($post->ID, 'ch2_eyebrow', 'Chapter Two Eyebrow', 'text', 'Default: Being Chosen');
      astrix_admin_field($post->ID, 'ch2_headline', 'Chapter Two Headline', 'textarea', 'Default: To be chosen is to be seen clearly.');
      astrix_admin_field($post->ID, 'ch2_pullquote', 'Chapter Two Pull Quote', 'textarea', 'Default: Attention is easy to rent. Preference is worth owning.');
      astrix_admin_image_field($post->ID, 'ch2_image', 'Chapter Two Image (Image 02)', 'deck-02-invisible.webp');
      ?>
    </div>

    <!-- Section 4: Chapter 3 (Connection) -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">🔗 Slide 9–10: Chapter Three (The Connection)</h3>
      <?php
      astrix_admin_field($post->ID, 'ch3_eyebrow', 'Chapter Three Eyebrow', 'text', 'Default: The Connection');
      astrix_admin_field($post->ID, 'ch3_headline', 'Chapter Three Headline', 'text', 'Default: Not Under One Roof. Built as One');
      astrix_admin_field($post->ID, 'ch3_body', 'Chapter Three Body Text', 'textarea', 'Default: Seven disciplines. One room. No handoffs.');
      ?>
    </div>

    <!-- Section 5: Chapter 4 (Ecosystems) -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">⚙️ Slide 12–13: Chapter Four (What We Build)</h3>
      <?php
      astrix_admin_field($post->ID, 'ch4_eyebrow', 'Chapter Four Eyebrow', 'text', 'Default: What We Build');
      astrix_admin_field($post->ID, 'ch4_headline', 'Chapter Four Headline', 'text', 'Default: Not services. Working ecosystems.');
      astrix_admin_field($post->ID, 'ch4_body', 'Chapter Four Body Text', 'textarea', 'Default: Every engagement leaves a system that runs, not a folder of deliverables.');
      ?>
    </div>

    <!-- Section 6: Chapter 5 (Stack) -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">💻 Slide 14: Chapter Five (The Stack)</h3>
      <?php
      astrix_admin_field($post->ID, 'ch5_eyebrow', 'Chapter Five Eyebrow', 'text', 'Default: The Stack');
      astrix_admin_field($post->ID, 'ch5_headline', 'Chapter Five Headline', 'text', 'Default: Technology, translated into business.');
      astrix_admin_field($post->ID, 'ch5_body', 'Chapter Five Body Text', 'textarea', 'Default: Most agencies hide the engineering. We consider it half the argument.');
      astrix_admin_image_field($post->ID, 'ch5_image', 'Chapter Five Stack Image (Image 03)', 'deck-03.webp');
      ?>
    </div>

    <!-- Section 7: Chapter 6 (Transformations) -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">🔄 Slide 16: Chapter Six (Transformations)</h3>
      <?php
      astrix_admin_field($post->ID, 'ch6_eyebrow', 'Chapter Six Eyebrow', 'text', 'Default: Transformations, Not Portfolios');
      astrix_admin_image_field($post->ID, 'ch6_image_before', 'Before Image (Image 04)', 'deck-04-before.webp');
      ?>
    </div>

    <!-- Section 8: Chapter 7 (Knowledge) -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">📰 Slide 17: Chapter Seven (Knowledge & Recognitions)</h3>
      <?php
      astrix_admin_field($post->ID, 'ch7_eyebrow', 'Chapter Seven Eyebrow', 'text', 'Default: Knowledge & Recognition');
      astrix_admin_field($post->ID, 'ch7_headline', 'Chapter Seven Headline', 'text', 'Default: We publish what we practise.');
      astrix_admin_field($post->ID, 'ch7_body', 'Chapter Seven Body Text', 'textarea', 'Default: No gated PDFs, no hot takes. One idea worth your time, monthly.');
      ?>
    </div>

    <!-- Section 9: Epilogue -->
    <div class="ax-box-section">
      <h3 class="ax-box-title">☕ Slide 18: Epilogue & Contact Callout</h3>
      <?php
      astrix_admin_field($post->ID, 'epilogue_eyebrow', 'Epilogue Eyebrow', 'text', 'Default: Let\'s Talk');
      astrix_admin_field($post->ID, 'epilogue_headline', 'Epilogue Headline', 'text', 'Default: Let\'s have a coffee together');
      astrix_admin_field($post->ID, 'epilogue_body', 'Epilogue Body Text', 'textarea', 'Default: Every business starts with an idea. But ironically, plenty of great ones stay a well-kept secret.');
      ?>
    </div>
  </div>
  <?php
}

/**
 * Render Services Page Meta Box.
 */
function astrix_render_services_metabox($post) {
  wp_nonce_field('astrix_save_meta', 'astrix_meta_nonce');
  ?>
  <div style="padding: 10px 0;">
    <div style="background: #e7f3ff; border-left: 4px solid #2271b1; padding: 12px 16px; margin-bottom: 18px; font-size: 13px; color: #1d2327; border-radius: 4px;">
      <strong>Astrix Services Page Editor:</strong> Edit headlines and intro narrative for the Services template.
    </div>
    <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px;">
      <?php
      astrix_admin_field($post->ID, 'services_eyebrow', 'Services Page Eyebrow', 'text', 'Default: What We Do');
      astrix_admin_field($post->ID, 'services_hero_title', 'Hero Title', 'text', 'Default: Capabilities built to compound.');
      astrix_admin_field($post->ID, 'services_hero_subtitle', 'Hero Subtitle', 'textarea', 'Default: Four integrated disciplines. Zero handoffs.');
      ?>
    </div>
  </div>
  <?php
}

/**
 * Render Contact Page Meta Box.
 */
function astrix_render_contact_metabox($post) {
  wp_nonce_field('astrix_save_meta', 'astrix_meta_nonce');
  ?>
  <div style="padding: 10px 0;">
    <div style="background: #e7f3ff; border-left: 4px solid #2271b1; padding: 12px 16px; margin-bottom: 18px; font-size: 13px; color: #1d2327; border-radius: 4px;">
      <strong>Astrix Contact Page Editor:</strong> Edit headlines and discovery session text.
    </div>
    <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px;">
      <?php
      astrix_admin_field($post->ID, 'contact_eyebrow', 'Contact Eyebrow', 'text', 'Default: Direct Line');
      astrix_admin_field($post->ID, 'contact_title', 'Contact Main Headline', 'text', 'Default: Let\'s have a coffee together');
      astrix_admin_field($post->ID, 'contact_subtitle', 'Subtitle / Instructions', 'textarea', 'Default: Every business starts with an idea...');
      ?>
    </div>
  </div>
  <?php
}

/**
 * Render Studio / About Page Meta Box.
 */
function astrix_render_studio_metabox($post) {
  wp_nonce_field('astrix_save_meta', 'astrix_meta_nonce');
  ?>
  <div style="padding: 10px 0;">
    <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px;">
      <?php
      astrix_admin_field($post->ID, 'studio_eyebrow', 'Studio Eyebrow', 'text', 'Default: Who We Are');
      astrix_admin_field($post->ID, 'studio_title', 'Studio Title', 'text', 'Default: Built as one integrated engine.');
      astrix_admin_field($post->ID, 'studio_body', 'Studio Narrative Body', 'textarea');
      ?>
    </div>
  </div>
  <?php
}

/**
 * Render Perspective Page Meta Box.
 */
function astrix_render_perspective_metabox($post) {
  wp_nonce_field('astrix_save_meta', 'astrix_meta_nonce');
  ?>
  <div style="padding: 10px 0;">
    <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px;">
      <?php
      astrix_admin_field($post->ID, 'perspective_eyebrow', 'Perspective Eyebrow', 'text', 'Default: Thinking');
      astrix_admin_field($post->ID, 'perspective_title', 'Perspective Title', 'text', 'Default: We publish what we practise.');
      ?>
    </div>
  </div>
  <?php
}

/**
 * Render Work Page Meta Box.
 */
function astrix_render_work_metabox($post) {
  wp_nonce_field('astrix_save_meta', 'astrix_meta_nonce');
  ?>
  <div style="padding: 10px 0;">
    <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px;">
      <?php
      astrix_admin_field($post->ID, 'work_eyebrow', 'Work Page Eyebrow', 'text', 'Default: Case Studies');
      astrix_admin_field($post->ID, 'work_title', 'Work Page Title', 'text', 'Default: Transformations, not portfolios.');
      ?>
    </div>
  </div>
  <?php
}

/**
 * Save Astrix Post Meta when any page or case study is saved/updated.
 */
add_action('save_post', function ($post_id) {
  if (!isset($_POST['astrix_meta_nonce']) || !wp_verify_nonce($_POST['astrix_meta_nonce'], 'astrix_save_meta')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['astrix_meta']) && is_array($_POST['astrix_meta'])) {
    foreach ($_POST['astrix_meta'] as $key => $value) {
      $clean_val = wp_kses_post(wp_unslash($value));
      update_post_meta($post_id, $key, $clean_val);
      update_post_meta($post_id, '_astrix_' . $key, $clean_val);
      
      // Also sync to ACF if ACF update_field function is available
      if (function_exists('update_field')) {
        update_field($key, $clean_val, $post_id);
      }
    }
  }
});

/**
 * Render Unified ⚡ Astrix Editor Options Page.
 */
function astrix_render_unified_options_page() {
  if (!current_user_can('manage_options')) {
    wp_die('Unauthorized');
  }

  $front_id = (int) get_option('page_on_front');
  if (!$front_id) {
    $home_page = get_page_by_path('home');
    if ($home_page) { $front_id = $home_page->ID; }
  }

  // Handle Save
  $message = '';
  if (isset($_POST['astrix_unified_submit']) && check_admin_referer('astrix_save_unified_options', 'astrix_unified_nonce')) {
    // 1. Save global settings
    if (isset($_POST['astrix_settings']) && is_array($_POST['astrix_settings'])) {
      $current_settings = get_option(ASTRIX_OPT, array());
      foreach ($_POST['astrix_settings'] as $k => $v) {
        $current_settings[$k] = wp_kses_post(wp_unslash($v));
      }
      update_option(ASTRIX_OPT, $current_settings);
    }

    // 2. Save homepage meta fields
    if ($front_id && isset($_POST['astrix_home_meta']) && is_array($_POST['astrix_home_meta'])) {
      foreach ($_POST['astrix_home_meta'] as $k => $v) {
        $clean = wp_kses_post(wp_unslash($v));
        update_post_meta($front_id, $k, $clean);
        update_post_meta($front_id, '_astrix_' . $k, $clean);
        if (function_exists('update_field')) { update_field($k, $clean, $front_id); }
      }
    }

    // 3. Save section toggles
    if (isset($_POST['astrix_toggles'])) {
      $toggles = array();
      $all_sections = array('intro-gate', 'hero', 'challenge', 'invisible', 'connection', 'engine', 'ecosystems', 'stack', 'transformations', 'knowledge', 'spinner', 'epilogue');
      foreach ($all_sections as $sec) {
        $toggles[$sec] = isset($_POST['astrix_toggles'][$sec]) ? true : false;
      }
      update_option('astrix_section_toggles', $toggles);
    }

    $message = 'Settings saved successfully!';
  }

  $active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'home';
  $toggles = get_option('astrix_section_toggles', array(
    'intro-gate'      => true,
    'hero'            => true,
    'challenge'       => true,
    'invisible'       => true,
    'connection'      => true,
    'engine'          => false,
    'ecosystems'      => true,
    'stack'           => true,
    'transformations' => true,
    'knowledge'       => true,
    'spinner'         => true,
    'epilogue'        => true,
  ));
  ?>
  <div class="wrap" style="max-width: 1080px; margin-top: 20px;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; border-bottom: 2px solid #221C16; padding-bottom: 14px;">
      <div style="display: flex; align-items: center; gap: 14px;">
        <span style="font-size: 26px;">⚡</span>
        <div>
          <h1 style="margin: 0; font-size: 24px; font-weight: 700; color: #221C16;">Astrix Theme Editor</h1>
          <p style="margin: 2px 0 0; color: #646970; font-size: 13px;">Manage all 19 presentation deck slides, copy, images, and global company details in one place.</p>
        </div>
      </div>
      <a href="<?php echo esc_url(home_url('/')); ?>" target="_blank" class="button button-secondary" style="font-weight: 600;">View Live Site ↗</a>
    </div>

    <?php if ($message): ?>
      <div class="notice notice-success is-dismissible" style="margin-bottom: 20px;"><p><strong><?php echo esc_html($message); ?></strong></p></div>
    <?php endif; ?>

    <h2 class="nav-tab-wrapper" style="margin-bottom: 24px;">
      <a href="?page=astrix-editor&tab=home" class="nav-tab <?php echo $active_tab === 'home' ? 'nav-tab-active' : ''; ?>">🏠 Homepage Slides</a>
      <a href="?page=astrix-editor&tab=contact" class="nav-tab <?php echo $active_tab === 'contact' ? 'nav-tab-active' : ''; ?>">📞 Contact & Global Info</a>
      <a href="?page=astrix-editor&tab=toggles" class="nav-tab <?php echo $active_tab === 'toggles' ? 'nav-tab-active' : ''; ?>">🎚️ Section Toggles</a>
      <a href="<?php echo admin_url('edit.php?post_type=case_study'); ?>" class="nav-tab">📈 Client Case Studies ↗</a>
    </h2>

    <form method="post" action="">
      <?php wp_nonce_field('astrix_save_unified_options', 'astrix_unified_nonce'); ?>

      <?php if ($active_tab === 'home'): ?>
        <!-- Tab 1: Homepage -->
        <div style="background: #fff; border: 1px solid #ccd0d4; border-radius: 6px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="margin: 0; font-size: 18px;">Homepage Presentation Deck (19 Slides)</h2>
            <input type="submit" name="astrix_unified_submit" class="button button-primary button-hero" value="Save All Changes">
          </div>

          <!-- Section 1: Hero -->
          <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px; margin-bottom: 20px;">
            <h3 style="margin:0 0 12px; font-size:15px; font-weight:700; color:#C56A37;">🚀 Slide 5: Prologue / Hero Section</h3>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Hero Eyebrow</label>
              <input type="text" name="astrix_home_meta[hero_eyebrow]" value="<?php echo esc_attr(astrix_field('hero_eyebrow', $front_id)); ?>" style="width:100%;">
            </div>
            <div style="display:grid; grid-template-columns: 2fr 1fr 1fr; gap:12px; margin-bottom: 14px;">
              <div>
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Headline Line 1</label>
                <input type="text" name="astrix_home_meta[hero_h1_line1]" value="<?php echo esc_attr(astrix_field('hero_h1_line1', $front_id)); ?>" style="width:100%;">
              </div>
              <div>
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Emphasis Word (Italic)</label>
                <input type="text" name="astrix_home_meta[hero_h1_emphasis]" value="<?php echo esc_attr(astrix_field('hero_h1_emphasis', $front_id)); ?>" style="width:100%;">
              </div>
              <div>
                <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Line 2 End</label>
                <input type="text" name="astrix_home_meta[hero_h1_line2_end]" value="<?php echo esc_attr(astrix_field('hero_h1_line2_end', $front_id)); ?>" style="width:100%;">
              </div>
            </div>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Intro Paragraph Narrative</label>
              <textarea name="astrix_home_meta[hero_para]" rows="3" style="width:100%;"><?php echo esc_textarea(astrix_field('hero_para', $front_id)); ?></textarea>
            </div>
            <?php astrix_admin_image_field($front_id, 'hero_image', 'Hero System Image (Image 01)', 'deck-01-hero.webp'); ?>
          </div>

          <!-- Section 2: Chapter 1 -->
          <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px; margin-bottom: 20px;">
            <h3 style="margin:0 0 12px; font-size:15px; font-weight:700; color:#C56A37;">📖 Slide 6: Chapter One (The Challenge)</h3>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Eyebrow</label>
              <input type="text" name="astrix_home_meta[ch1_eyebrow]" value="<?php echo esc_attr(astrix_field('ch1_eyebrow', $front_id)); ?>" style="width:100%;">
            </div>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Chapter One Headline</label>
              <textarea name="astrix_home_meta[ch1_headline]" rows="2" style="width:100%;"><?php echo esc_textarea(astrix_field('ch1_headline', $front_id)); ?></textarea>
            </div>
          </div>

          <!-- Section 3: Chapter 2 -->
          <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px; margin-bottom: 20px;">
            <h3 style="margin:0 0 12px; font-size:15px; font-weight:700; color:#C56A37;">👁️ Slide 7–8: Chapter Two (Why Businesses Stay Invisible)</h3>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Headline</label>
              <input type="text" name="astrix_home_meta[ch2_headline]" value="<?php echo esc_attr(astrix_field('ch2_headline', $front_id)); ?>" style="width:100%;">
            </div>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Pullquote</label>
              <textarea name="astrix_home_meta[ch2_pullquote]" rows="2" style="width:100%;"><?php echo esc_textarea(astrix_field('ch2_pullquote', $front_id)); ?></textarea>
            </div>
            <?php astrix_admin_image_field($front_id, 'ch2_image', 'Invisible 16:9 Letterbox Image (Image 02)', 'deck-02-invisible.webp'); ?>
          </div>

          <!-- Section 4: The Stack (Slide 14) -->
          <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px; margin-bottom: 20px;">
            <h3 style="margin:0 0 12px; font-size:15px; font-weight:700; color:#C56A37;">💻 Slide 14: Chapter Five (The Stack Matrix)</h3>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Stack Headline</label>
              <input type="text" name="astrix_home_meta[ch5_headline]" value="<?php echo esc_attr(astrix_field('ch5_headline', $front_id)); ?>" style="width:100%;">
            </div>
            <?php astrix_admin_image_field($front_id, 'ch5_image', 'The Stack Image (Image 03)', 'deck-03.webp'); ?>
          </div>

          <!-- Section 5: Epilogue (Slide 18) -->
          <div class="ax-box-section" style="background:#fdfdfd; border:1px solid #e2e4e7; border-radius:6px; padding:18px; margin-bottom: 20px;">
            <h3 style="margin:0 0 12px; font-size:15px; font-weight:700; color:#C56A37;">☕ Slide 18: Epilogue & Coffee Conversation CTA</h3>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Headline</label>
              <input type="text" name="astrix_home_meta[epilogue_headline]" value="<?php echo esc_attr(astrix_field('epilogue_headline', $front_id)); ?>" style="width:100%;">
            </div>
            <div style="margin-bottom: 14px;">
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Body Text</label>
              <textarea name="astrix_home_meta[epilogue_body]" rows="2" style="width:100%;"><?php echo esc_textarea(astrix_field('epilogue_body', $front_id)); ?></textarea>
            </div>
          </div>

          <div style="margin-top: 24px; text-align: right;">
            <input type="submit" name="astrix_unified_submit" class="button button-primary button-hero" value="Save All Changes">
          </div>
        </div>

      <?php elseif ($active_tab === 'contact'): ?>
        <!-- Tab 2: Contact & Global Info -->
        <div style="background: #fff; border: 1px solid #ccd0d4; border-radius: 6px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="margin: 0; font-size: 18px;">Global Contact, Social & Address Details</h2>
            <input type="submit" name="astrix_unified_submit" class="button button-primary button-hero" value="Save All Changes">
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Primary Phone</label>
              <input type="text" name="astrix_settings[phone_primary]" value="<?php echo esc_attr(astrix_setting('phone_primary')); ?>" style="width:100%;">
            </div>
            <div>
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Secondary Phone</label>
              <input type="text" name="astrix_settings[phone_secondary]" value="<?php echo esc_attr(astrix_setting('phone_secondary')); ?>" style="width:100%;">
            </div>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
            <div>
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">WhatsApp Number (Digits only, with country code)</label>
              <input type="text" name="astrix_settings[whatsapp]" value="<?php echo esc_attr(astrix_setting('whatsapp')); ?>" style="width:100%;">
            </div>
            <div>
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Email Address</label>
              <input type="email" name="astrix_settings[email]" value="<?php echo esc_attr(astrix_setting('email')); ?>" style="width:100%;">
            </div>
          </div>

          <div style="margin-bottom: 20px;">
            <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Registered Office Address (Slide 19)</label>
            <textarea name="astrix_settings[address]" rows="3" style="width:100%;"><?php echo esc_textarea(astrix_setting('address')); ?></textarea>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; margin-bottom: 20px;">
            <div>
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Instagram URL</label>
              <input type="url" name="astrix_settings[instagram]" value="<?php echo esc_attr(astrix_setting('instagram')); ?>" style="width:100%;">
            </div>
            <div>
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">LinkedIn URL</label>
              <input type="url" name="astrix_settings[linkedin]" value="<?php echo esc_attr(astrix_setting('linkedin')); ?>" style="width:100%;">
            </div>
            <div>
              <label style="display:block; font-weight:600; font-size:13px; margin-bottom:4px;">Facebook URL</label>
              <input type="url" name="astrix_settings[facebook]" value="<?php echo esc_attr(astrix_setting('facebook')); ?>" style="width:100%;">
            </div>
          </div>

          <div style="margin-top: 24px; text-align: right;">
            <input type="submit" name="astrix_unified_submit" class="button button-primary button-hero" value="Save All Changes">
          </div>
        </div>

      <?php elseif ($active_tab === 'toggles'): ?>
        <!-- Tab 3: Section Toggles -->
        <div style="background: #fff; border: 1px solid #ccd0d4; border-radius: 6px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="margin: 0; font-size: 18px;">Homepage 12-Section Visibility Toggles</h2>
            <input type="submit" name="astrix_unified_submit" class="button button-primary button-hero" value="Save All Changes">
          </div>
          <p style="color:#646970; font-size:13px; margin-bottom:20px;">Check or uncheck any section to instantly show or hide it on the live homepage:</p>

          <div style="display: flex; flex-direction: column; gap: 12px;">
            <?php
            $section_names = array(
              'intro-gate'      => 'Intro Gate (6-hour localStorage brand splash screen)',
              'hero'            => 'Prologue / Hero Section (The Belief)',
              'challenge'       => 'Chapter 1: The Challenge (Video background)',
              'invisible'       => 'Chapter 2: Why Businesses Stay Invisible (16:9 Letterbox & Pullquote)',
              'connection'      => 'Chapter 3: The Missing Connection (SVG Animated Thread)',
              'engine'          => 'Chapter 3: Transformation Engine (Hidden per PPTX slide 11)',
              'ecosystems'      => 'Chapter 4: What We Build (4 Integrated Ecosystems)',
              'stack'           => 'Chapter 5: The Stack Technology Matrix',
              'transformations' => 'Chapter 6: Transformations & Case Studies',
              'knowledge'       => 'Chapter 7: Knowledge & Recognition',
              'spinner'         => 'Astrix Mark Dynamic Spinner',
              'epilogue'        => 'Epilogue: Discovery Session / Coffee Callout',
            );
            foreach ($section_names as $sec_slug => $sec_label):
              $is_on = !empty($toggles[$sec_slug]);
            ?>
              <label style="display:flex; align-items:center; gap:12px; font-size:14px; padding:10px 14px; background:#f9f9f9; border-radius:4px; border:1px solid #e2e4e7;">
                <input type="checkbox" name="astrix_toggles[<?php echo esc_attr($sec_slug); ?>]" value="1" <?php checked($is_on, true); ?>>
                <strong><?php echo esc_html($sec_label); ?></strong>
              </label>
            <?php endforeach; ?>
          </div>

          <div style="margin-top: 24px; text-align: right;">
            <input type="submit" name="astrix_unified_submit" class="button button-primary button-hero" value="Save All Changes">
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>
  <?php
}


