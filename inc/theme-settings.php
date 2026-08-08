<?php
/**
 * Astrix Settings — global content editable in wp-admin.
 *
 * Uses WordPress core's Settings API, NOT ACF: ACF options pages are a PRO
 * feature, and this data (phone numbers, address, socials) must stay editable
 * even with no plugins installed.
 *
 * Everything here was previously hardcoded, and several values were duplicated
 * across header.php, footer.php and page-contact.php — so changing a phone
 * number meant editing three files. Now: one field, one place.
 */

if (!defined('ABSPATH')) {
  exit;
}

const ASTRIX_OPT = 'astrix_settings';

/** Field definitions: key => [label, default, type, section] */
function astrix_settings_schema() {
  return array(
    'phone_primary'   => array('Primary phone', '+91 98117 34160', 'text', 'contact'),
    'phone_secondary' => array('Secondary phone', '+91 99994 77747', 'text', 'contact'),
    'whatsapp'        => array('WhatsApp number (digits only, with country code)', '919999477747', 'text', 'contact'),
    'email'           => array('Email', 'info@astrixmedia.in', 'text', 'contact'),
    'address'         => array('Address (one line per row)', "Astrix Media LLP\nSCO 42, M3M 113 Market\nSector 113, Gurugram, Haryana 122017", 'textarea', 'contact'),
    'maps_query'      => array('Google Maps search query', 'M3M 113 Market, Sector 113, Gurugram, Haryana 122017', 'text', 'contact'),
    'calendly'        => array('Calendly URL (blank hides the booking block)', '', 'text', 'contact'),
    'instagram'       => array('Instagram URL', 'https://www.instagram.com/theastrixofficial', 'text', 'social'),
    'linkedin'        => array('LinkedIn URL', 'https://www.linkedin.com/company/astrixmedia/', 'text', 'social'),
    'facebook'        => array('Facebook URL', 'https://www.facebook.com/profile.php?id=61570762880498', 'text', 'social'),
    'footer_tagline'  => array('Footer tagline', 'We turn businesses into the brands people choose.', 'textarea', 'footer'),
    'copyright'       => array('Copyright line (year is added automatically)', 'Astrix Media. Where strategy meets story.', 'text', 'footer'),
  );
}

/**
 * Read one setting. Falls back to the baked-in default when unset, so the theme
 * renders correctly on a fresh install with nothing configured.
 */
function astrix_setting($key) {
  $schema = astrix_settings_schema();
  if (!isset($schema[$key])) {
    return '';
  }
  $saved = get_option(ASTRIX_OPT, array());
  $value = isset($saved[$key]) ? trim($saved[$key]) : '';
  return $value !== '' ? $value : $schema[$key][1];
}

/** WhatsApp click-to-chat URL built from the number field. */
function astrix_whatsapp_url() {
  return 'https://wa.me/' . preg_replace('/\D/', '', astrix_setting('whatsapp'));
}

/** tel: href built from any formatted phone value. */
function astrix_tel($key = 'phone_primary') {
  return 'tel:+' . preg_replace('/\D/', '', astrix_setting($key));
}

/** Address as escaped HTML, one <br>-separated line per row of the textarea. */
function astrix_address_html() {
  $lines = preg_split('/\R/', astrix_setting('address'));
  $lines = array_filter(array_map('trim', $lines), 'strlen');
  return implode('<br>', array_map('esc_html', $lines));
}

/* ── Admin page ── */

add_action('admin_menu', function () {
  add_menu_page(
    'Astrix Settings', 'Astrix Settings', 'manage_options',
    'astrix-settings', 'astrix_render_settings_page',
    'dashicons-admin-generic', 59
  );
});

add_action('admin_init', function () {
  register_setting(ASTRIX_OPT . '_group', ASTRIX_OPT, array(
    'sanitize_callback' => function ($input) {
      $clean = array();
      foreach (astrix_settings_schema() as $key => $def) {
        if (!isset($input[$key])) continue;
        $clean[$key] = $def[2] === 'textarea'
          ? sanitize_textarea_field($input[$key])
          : sanitize_text_field($input[$key]);
      }
      return $clean;
    },
  ));
});

function astrix_render_settings_page() {
  $sections = array('contact' => 'Contact details', 'social' => 'Social links', 'footer' => 'Footer');
  ?>
  <div class="wrap">
    <h1>Astrix Settings</h1>
    <p>These values appear across the whole site — header, footer, contact page and the floating call/WhatsApp buttons. Leave a field blank to use the built-in default.</p>
    <form method="post" action="options.php">
      <?php settings_fields(ASTRIX_OPT . '_group'); ?>
      <?php foreach ($sections as $sec => $title) : ?>
        <h2><?php echo esc_html($title); ?></h2>
        <table class="form-table" role="presentation"><tbody>
        <?php foreach (astrix_settings_schema() as $key => $def) :
          if ($def[3] !== $sec) continue;
          $val = isset(get_option(ASTRIX_OPT, array())[$key]) ? get_option(ASTRIX_OPT)[$key] : '';
        ?>
          <tr>
            <th scope="row"><label for="astrix-<?php echo esc_attr($key); ?>"><?php echo esc_html($def[0]); ?></label></th>
            <td>
              <?php if ($def[2] === 'textarea') : ?>
                <textarea id="astrix-<?php echo esc_attr($key); ?>" name="<?php echo esc_attr(ASTRIX_OPT); ?>[<?php echo esc_attr($key); ?>]" rows="3" class="large-text" placeholder="<?php echo esc_attr($def[1]); ?>"><?php echo esc_textarea($val); ?></textarea>
              <?php else : ?>
                <input id="astrix-<?php echo esc_attr($key); ?>" type="text" name="<?php echo esc_attr(ASTRIX_OPT); ?>[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($val); ?>" class="regular-text" placeholder="<?php echo esc_attr($def[1]); ?>">
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody></table>
      <?php endforeach; ?>
      <?php submit_button(); ?>
    </form>
  </div>
  <?php
}
