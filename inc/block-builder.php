<?php
/**
 * Astrix Modular Block Repeater & Custom Div Engine.
 *
 * Provides full block-level modularity on EVERY page in WordPress:
 * - Add any Astrix section or Custom Div block
 * - Remove any section block with 1 click
 * - Reorder blocks (Move Up / Move Down)
 * - Custom HTML, CSS, and JS editing per div block
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Master library of available Astrix modular blocks.
 */
function astrix_get_available_blocks() {
  return array(
    'hero'            => array('title' => '🚀 Hero / Prologue Section (The Belief)', 'icon' => 'dashicons-cover-image'),
    'challenge'       => array('title' => '📖 Chapter 1: Where Strategy Meets Story (Video Background)', 'icon' => 'dashicons-video-alt3'),
    'invisible'       => array('title' => '👁️ Chapter 2: Why Businesses Stay Invisible (16:9 Letterbox & Pullquote)', 'icon' => 'dashicons-visibility'),
    'connection'      => array('title' => '🔗 Chapter 3: The Missing Connection (Animated SVG Thread)', 'icon' => 'dashicons-admin-links'),
    'ecosystems'      => array('title' => '⚙️ Chapter 4: What We Build (4 Integrated Ecosystems)', 'icon' => 'dashicons-networking'),
    'stack'           => array('title' => '💻 Chapter 5: The Stack Technology Matrix', 'icon' => 'dashicons-editor-code'),
    'transformations' => array('title' => '🔄 Chapter 6: Transformations & Client Case Studies', 'icon' => 'dashicons-chart-area'),
    'knowledge'       => array('title' => '📰 Chapter 7: Knowledge & Recognition', 'icon' => 'dashicons-welcome-learn-more'),
    'spinner'         => array('title' => '✨ Astrix Dynamic Brand Spinner', 'icon' => 'dashicons-update'),
    'epilogue'        => array('title' => '☕ Epilogue: Discovery Session / Coffee Callout', 'icon' => 'dashicons-coffee'),
    'custom_div'      => array('title' => '💻 Custom <div> Block (Raw HTML + CSS + JS)', 'icon' => 'dashicons-html'),
  );
}

/**
 * Default blocks assigned to a page when none are saved yet.
 */
function astrix_get_default_page_blocks($post_id) {
  $front_id = (int) get_option('page_on_front');
  $slug = get_post_field('post_name', $post_id);
  $template = get_post_meta($post_id, '_wp_page_template', true);

  if ($post_id === $front_id || $slug === 'home' || $template === 'front-page.php') {
    return array(
      array('type' => 'hero'),
      array('type' => 'challenge'),
      array('type' => 'invisible'),
      array('type' => 'connection'),
      array('type' => 'ecosystems'),
      array('type' => 'stack'),
      array('type' => 'transformations'),
      array('type' => 'knowledge'),
      array('type' => 'spinner'),
      array('type' => 'epilogue'),
    );
  }

  return array();
}

/**
 * Register the Block Repeater Meta Box on all Pages.
 */
add_action('add_meta_boxes', function () {
  add_meta_box(
    'astrix_block_builder_box',
    '🧱 Astrix Modular Section & <div> Block Builder (Add / Remove / Reorder)',
    'astrix_render_block_builder_metabox',
    'page',
    'normal',
    'high'
  );
});

/**
 * Render the interactive Block Repeater interface in wp-admin.
 */
function astrix_render_block_builder_metabox($post) {
  wp_nonce_field('astrix_save_block_builder', 'astrix_block_builder_nonce');
  $available = astrix_get_available_blocks();
  
  $saved_blocks = get_post_meta($post->ID, 'astrix_page_blocks', true);
  if (!is_array($saved_blocks) || empty($saved_blocks)) {
    $saved_blocks = astrix_get_default_page_blocks($post->ID);
  }
  ?>
  <style>
    .ax-bb-wrap { padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, sans-serif; }
    .ax-bb-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 18px; }
    .ax-bb-item { background: #ffffff; border: 1px solid #ccd0d4; border-left: 4px solid #C56A37; border-radius: 4px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); transition: border-color 0.2s; }
    .ax-bb-item:hover { border-color: #9A8E7D; }
    .ax-bb-header { display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; background: #f8f9fa; cursor: pointer; user-select: none; border-bottom: 1px solid transparent; }
    .ax-bb-item.open .ax-bb-header { border-bottom-color: #e2e4e7; }
    .ax-bb-title { font-weight: 600; font-size: 13.5px; color: #1d2327; display: flex; align-items: center; gap: 8px; }
    .ax-bb-actions { display: flex; align-items: center; gap: 6px; }
    .ax-bb-btn { background: #f0f0f1; border: 1px solid #8c8f94; border-radius: 3px; padding: 3px 8px; font-size: 11.5px; cursor: pointer; line-height: 1.4; color: #2c3338; }
    .ax-bb-btn:hover { background: #fff; color: #000; }
    .ax-bb-btn-del { color: #b32d2e; border-color: #e0a3a4; }
    .ax-bb-btn-del:hover { background: #b32d2e; color: #fff; border-color: #b32d2e; }
    .ax-bb-body { padding: 16px; display: none; background: #fff; }
    .ax-bb-item.open .ax-bb-body { display: block; }
    .ax-bb-footer { display: flex; align-items: center; justify-content: space-between; gap: 14px; padding: 14px 16px; background: #f0f0f1; border-radius: 4px; flex-wrap: wrap; }
    .ax-code-area { font-family: monospace; font-size: 12px; width: 100%; box-sizing: border-box; }
  </style>

  <div class="ax-bb-wrap">
    <div style="background: #f0f6fc; border-left: 4px solid #72aee6; padding: 10px 14px; margin-bottom: 16px; font-size: 13px; color: #1d2327; border-radius: 3px;">
      <strong>Modular Page Structure:</strong> Add, remove, or reorder section blocks below. Click <strong>▲ Move Up</strong> / <strong>▼ Move Down</strong> to change section order, or add a <strong>Custom &lt;div&gt; Block</strong> to write raw HTML, CSS, and JS anywhere.
    </div>

    <div class="ax-bb-list" id="ax-block-list">
      <?php if (!empty($saved_blocks)): ?>
        <?php foreach ($saved_blocks as $idx => $block):
          $b_type = isset($block['type']) ? $block['type'] : 'custom_div';
          $b_info = isset($available[$b_type]) ? $available[$b_type] : array('title' => 'Custom Block (' . esc_html($b_type) . ')');
          $b_html = isset($block['custom_html']) ? $block['custom_html'] : '';
          $b_css  = isset($block['custom_css']) ? $block['custom_css'] : '';
          $b_js   = isset($block['custom_js']) ? $block['custom_js'] : '';
        ?>
          <div class="ax-bb-item <?php echo ($b_type === 'custom_div' ? 'open' : ''); ?>" data-index="<?php echo (int) $idx; ?>">
            <div class="ax-bb-header" onclick="this.parentElement.classList.toggle('open');">
              <div class="ax-bb-title">
                <span class="dashicons dashicons-menu" style="color:#999; cursor:grab;"></span>
                <span><?php echo esc_html($b_info['title']); ?></span>
              </div>
              <div class="ax-bb-actions" onclick="event.stopPropagation();">
                <button type="button" class="ax-bb-btn ax-btn-up" title="Move Up">▲ Up</button>
                <button type="button" class="ax-bb-btn ax-btn-down" title="Move Down">▼ Down</button>
                <button type="button" class="ax-bb-btn ax-bb-btn-del ax-btn-remove" title="Remove Block">🗑️ Remove</button>
              </div>
            </div>
            <div class="ax-bb-body">
              <input type="hidden" class="ax-field-type" name="astrix_blocks[<?php echo (int) $idx; ?>][type]" value="<?php echo esc_attr($b_type); ?>">
              
              <?php if ($b_type === 'custom_div'): ?>
                <div style="margin-bottom: 12px;">
                  <label style="display:block; font-weight:600; font-size:12px; margin-bottom:4px;">Custom HTML / &lt;div&gt; Markup:</label>
                  <textarea class="ax-code-area ax-field-html" name="astrix_blocks[<?php echo (int) $idx; ?>][custom_html]" rows="6" placeholder="<div class=&quot;my-custom-div&quot;>...</div>"><?php echo esc_textarea($b_html); ?></textarea>
                </div>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                  <div>
                    <label style="display:block; font-weight:600; font-size:12px; margin-bottom:4px;">Custom CSS (Optional):</label>
                    <textarea class="ax-code-area ax-field-css" name="astrix_blocks[<?php echo (int) $idx; ?>][custom_css]" rows="4" placeholder=".my-custom-div { color: #C56A37; }"><?php echo esc_textarea($b_css); ?></textarea>
                  </div>
                  <div>
                    <label style="display:block; font-weight:600; font-size:12px; margin-bottom:4px;">Custom JavaScript (Optional):</label>
                    <textarea class="ax-code-area ax-field-js" name="astrix_blocks[<?php echo (int) $idx; ?>][custom_js]" rows="4" placeholder="console.log('Custom block loaded');"><?php echo esc_textarea($b_js); ?></textarea>
                  </div>
                </div>
              <?php else: ?>
                <p style="margin:0; font-size:12.5px; color:#646970;">
                  This is a pre-designed Astrix modular section. You can customize its copy and images in the dedicated panel below or in <strong>⚡ Astrix Editor</strong>.
                </p>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <div class="ax-bb-footer">
      <div style="display: flex; align-items: center; gap: 10px;">
        <select id="ax-block-select" style="max-width: 320px; font-size: 13px;">
          <?php foreach ($available as $type_key => $type_data): ?>
            <option value="<?php echo esc_attr($type_key); ?>"><?php echo esc_html($type_data['title']); ?></option>
          <?php endforeach; ?>
        </select>
        <button type="button" class="button button-primary" id="ax-add-block-btn">➕ Add Section Block</button>
      </div>
      <button type="button" class="button button-secondary" id="ax-reset-blocks-btn">🔄 Reset to Default Template Order</button>
    </div>
  </div>

  <script>
    (function($) {
      function reindexBlocks() {
        $('#ax-block-list .ax-bb-item').each(function(index) {
          $(this).attr('data-index', index);
          $(this).find('.ax-field-type').attr('name', 'astrix_blocks[' + index + '][type]');
          $(this).find('.ax-field-html').attr('name', 'astrix_blocks[' + index + '][custom_html]');
          $(this).find('.ax-field-css').attr('name', 'astrix_blocks[' + index + '][custom_css]');
          $(this).find('.ax-field-js').attr('name', 'astrix_blocks[' + index + '][custom_js]');
        });
      }

      // Add Block
      $('#ax-add-block-btn').on('click', function(e) {
        e.preventDefault();
        var selectedType = $('#ax-block-select').val();
        var selectedTitle = $('#ax-block-select option:selected').text();
        var isCustomDiv = (selectedType === 'custom_div');
        var newIndex = $('#ax-block-list .ax-bb-item').length;

        var bodyHtml = '';
        if (isCustomDiv) {
          bodyHtml = '<div style="margin-bottom: 12px;">' +
            '<label style="display:block; font-weight:600; font-size:12px; margin-bottom:4px;">Custom HTML / &lt;div&gt; Markup:</label>' +
            '<textarea class="ax-code-area ax-field-html" name="astrix_blocks[' + newIndex + '][custom_html]" rows="6" placeholder="<div class=&quot;my-custom-div&quot;>...</div>"></textarea>' +
            '</div>' +
            '<div style="display:grid; grid-template-columns: 1fr 1fr; gap: 12px;">' +
            '<div><label style="display:block; font-weight:600; font-size:12px; margin-bottom:4px;">Custom CSS (Optional):</label><textarea class="ax-code-area ax-field-css" name="astrix_blocks[' + newIndex + '][custom_css]" rows="4"></textarea></div>' +
            '<div><label style="display:block; font-weight:600; font-size:12px; margin-bottom:4px;">Custom JavaScript (Optional):</label><textarea class="ax-code-area ax-field-js" name="astrix_blocks[' + newIndex + '][custom_js]" rows="4"></textarea></div>' +
            '</div>';
        } else {
          bodyHtml = '<p style="margin:0; font-size:12.5px; color:#646970;">This is a pre-designed Astrix modular section. You can customize its copy and images in the dedicated panel below or in ⚡ Astrix Editor.</p>';
        }

        var blockHtml = '<div class="ax-bb-item open" data-index="' + newIndex + '">' +
          '<div class="ax-bb-header" onclick="this.parentElement.classList.toggle(\'open\');">' +
            '<div class="ax-bb-title"><span class="dashicons dashicons-menu" style="color:#999; cursor:grab;"></span><span>' + selectedTitle + '</span></div>' +
            '<div class="ax-bb-actions" onclick="event.stopPropagation();">' +
              '<button type="button" class="ax-bb-btn ax-btn-up" title="Move Up">▲ Up</button>' +
              '<button type="button" class="ax-bb-btn ax-btn-down" title="Move Down">▼ Down</button>' +
              '<button type="button" class="ax-bb-btn ax-bb-btn-del ax-btn-remove" title="Remove Block">🗑️ Remove</button>' +
            '</div>' +
          '</div>' +
          '<div class="ax-bb-body">' +
            '<input type="hidden" class="ax-field-type" name="astrix_blocks[' + newIndex + '][type]" value="' + selectedType + '">' +
            bodyHtml +
          '</div>' +
        '</div>';

        $('#ax-block-list').append(blockHtml);
        reindexBlocks();
      });

      // Move Up
      $(document).on('click', '.ax-btn-up', function(e) {
        e.preventDefault();
        var item = $(this).closest('.ax-bb-item');
        var prev = item.prev('.ax-bb-item');
        if (prev.length) {
          item.insertBefore(prev);
          reindexBlocks();
        }
      });

      // Move Down
      $(document).on('click', '.ax-btn-down', function(e) {
        e.preventDefault();
        var item = $(this).closest('.ax-bb-item');
        var next = item.next('.ax-bb-item');
        if (next.length) {
          item.insertAfter(next);
          reindexBlocks();
        }
      });

      // Remove Block
      $(document).on('click', '.ax-btn-remove', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to remove this block?')) {
          $(this).closest('.ax-bb-item').remove();
          reindexBlocks();
        }
      });

      // Reset to Defaults
      $('#ax-reset-blocks-btn').on('click', function(e) {
        e.preventDefault();
        if (confirm('Reset page sections to the default Astrix presentation order?')) {
          location.reload();
        }
      });
    })(jQuery);
  </script>
  <?php
}

/**
 * Save Astrix Block Builder data on post update.
 */
add_action('save_post', function ($post_id) {
  if (!isset($_POST['astrix_block_builder_nonce']) || !wp_verify_nonce($_POST['astrix_block_builder_nonce'], 'astrix_save_block_builder')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['astrix_blocks']) && is_array($_POST['astrix_blocks'])) {
    $clean_blocks = array();
    foreach ($_POST['astrix_blocks'] as $block) {
      if (!empty($block['type'])) {
        $clean_blocks[] = array(
          'type'        => sanitize_text_field($block['type']),
          'custom_html' => isset($block['custom_html']) ? wp_kses_post(wp_unslash($block['custom_html'])) : '',
          'custom_css'  => isset($block['custom_css']) ? wp_strip_all_tags(wp_unslash($block['custom_css'])) : '',
          'custom_js'   => isset($block['custom_js']) ? wp_unslash($block['custom_js']) : '',
        );
      }
    }
    update_post_meta($post_id, 'astrix_page_blocks', $clean_blocks);
  } else {
    // If all blocks were removed
    update_post_meta($post_id, 'astrix_page_blocks', array());
  }
});

/**
 * Frontend dynamic block renderer.
 */
function astrix_render_page_blocks($post_id = null) {
  if (!$post_id) {
    $post_id = is_front_page() ? (int) get_option('page_on_front') : get_the_ID();
  }

  $blocks = get_post_meta($post_id, 'astrix_page_blocks', true);

  if (is_array($blocks) && !empty($blocks)) {
    foreach ($blocks as $block) {
      $type = isset($block['type']) ? $block['type'] : '';

      if ($type === 'custom_div') {
        echo '<div class="astrix-custom-block-wrap">';
        if (!empty($block['custom_css'])) {
          echo '<style>' . $block['custom_css'] . '</style>';
        }
        echo do_shortcode($block['custom_html']);
        if (!empty($block['custom_js'])) {
          echo '<script>' . $block['custom_js'] . '</script>';
        }
        echo '</div>';
      } else {
        $section_file = get_template_directory() . '/template-parts/sections/' . $type . '.php';
        if (file_exists($section_file)) {
          get_template_part('template-parts/sections/' . $type);
        }
      }
    }
    return true;
  }

  return false;
}
