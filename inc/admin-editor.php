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
 * Enqueue WordPress Media Uploader scripts and styles for Astrix Meta Boxes.
 */
add_action('admin_enqueue_scripts', function ($hook) {
  if (in_array($hook, array('post.php', 'post-new.php'))) {
    global $post;
    if ($post && $post->post_type === 'page') {
      wp_enqueue_media();
      wp_enqueue_script(
        'astrix-admin-js',
        get_template_directory_uri() . '/js/astrix-admin.js',
        array('jquery'),
        filemtime(get_template_directory() . '/js/astrix-admin.js'),
        true
      );
    }
  }
});

/**
 * Remove default empty editor on structured Astrix page templates to prevent confusion.
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
    )) || in_array($slug, array('home', 'services', 'studio', 'perspective', 'work', 'contact', 'our-expertise', 'our-clients'));

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

