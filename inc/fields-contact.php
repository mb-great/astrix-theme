<?php
/**
 * Contact page — editable copy.
 *
 * Two halves, same as every other inc/fields-*.php:
 *   1. acf_add_local_field_group() so the strings are editable in wp-admin.
 *   2. an 'astrix_fallback_fields' filter so the page renders byte-identically
 *      with ACF deactivated, or with ACF active but nothing ever saved.
 *
 * NOT handled here (deliberately): the phone numbers, WhatsApp number, email,
 * postal address, Google Maps query and Calendly URL. Those live in
 * Astrix Settings (inc/theme-settings.php) because they are reused by
 * header.php and footer.php too, and they must stay editable with no plugins.
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Resolve the page that page-contact.php actually renders.
 *
 * page-contact.php carries a "Template Name: Contact" header, but the Contact
 * page has NO _wp_page_template meta — WordPress picks the file through the
 * template hierarchy instead, on the page-{slug}.php branch (slug "contact").
 * ACF's page_template location rule compares against _wp_page_template, which
 * is 'default' here, so that rule alone would never match. Resolving the page
 * by slug mirrors exactly how WordPress chose the template in the first place,
 * and stays correct on a fresh install where the post ID is different.
 */
function astrix_contact_page_id() {
  $page = get_page_by_path('contact', OBJECT, 'page');
  return $page ? (int) $page->ID : 0;
}

add_action('acf/init', function () {

  if (!function_exists('acf_add_local_field_group')) return;

  /**
   * Location: OR of two groups.
   *   - the slug-resolved Contact page (how the template is really selected);
   *   - anything explicitly assigned the "Contact" template, so the fields
   *     follow the template if an editor ever picks it from the Page Attributes
   *     dropdown.
   */
  $location = array(
    array(array('param' => 'page_template', 'operator' => '==', 'value' => 'page-contact.php')),
  );

  $contact_id = astrix_contact_page_id();
  if ($contact_id) {
    array_unshift($location, array(array('param' => 'page', 'operator' => '==', 'value' => $contact_id)));
  }

  acf_add_local_field_group(array(
    'key' => 'group_contact_content',
    'title' => 'Contact Page Content',
    'menu_order' => 0,
    'fields' => array(

      /* ── Page header ── */
      array('key' => 'field_ct_eyebrow', 'label' => 'Eyebrow', 'name' => 'contact_eyebrow', 'type' => 'text', 'instructions' => 'Small uppercase line above the headline.'),
      array('key' => 'field_ct_headline', 'label' => 'Headline', 'name' => 'contact_headline', 'type' => 'text', 'instructions' => 'First part of the H1, before the italic word.'),
      array('key' => 'field_ct_headline_emphasis', 'label' => 'Headline Emphasis Word', 'name' => 'contact_headline_emphasis', 'type' => 'text', 'instructions' => 'Rendered in the orange italic serif.'),

      /* ── Success state (after a form submission) ── */
      array('key' => 'field_ct_success_eyebrow', 'label' => 'Success Eyebrow', 'name' => 'contact_success_eyebrow', 'type' => 'text'),
      array('key' => 'field_ct_success_greeting', 'label' => 'Success Greeting', 'name' => 'contact_success_greeting', 'type' => 'text', 'instructions' => 'The sender\'s first name is appended automatically, e.g. "Thank you, Jane."'),
      array('key' => 'field_ct_success_body', 'label' => 'Success Message', 'name' => 'contact_success_body', 'type' => 'textarea', 'rows' => 2, 'new_lines' => ''),
      array('key' => 'field_ct_success_note_before', 'label' => 'Success Note — before first link', 'name' => 'contact_success_note_before', 'type' => 'text'),
      array('key' => 'field_ct_success_note_work', 'label' => 'Success Note — link text (Work)', 'name' => 'contact_success_note_work', 'type' => 'text'),
      array('key' => 'field_ct_success_note_between', 'label' => 'Success Note — between links', 'name' => 'contact_success_note_between', 'type' => 'text'),
      array('key' => 'field_ct_success_note_perspective', 'label' => 'Success Note — link text (Perspective)', 'name' => 'contact_success_note_perspective', 'type' => 'text'),

      /* ── Error state ── */
      array('key' => 'field_ct_error_message', 'label' => 'Error Message', 'name' => 'contact_error_message', 'type' => 'textarea', 'rows' => 2, 'new_lines' => '', 'instructions' => 'Shown when the form is rejected (missing name, invalid email, expired nonce, rate limit).'),

      /* ── Form labels. Only the visible label text is editable; the underlying
             input name= attributes are fixed, the PHP handler depends on them. ── */
      array('key' => 'field_ct_label_name', 'label' => 'Label — Name', 'name' => 'contact_label_name', 'type' => 'text'),
      array('key' => 'field_ct_label_company', 'label' => 'Label — Company', 'name' => 'contact_label_company', 'type' => 'text'),
      array('key' => 'field_ct_label_email', 'label' => 'Label — Email', 'name' => 'contact_label_email', 'type' => 'text'),
      array('key' => 'field_ct_label_industry', 'label' => 'Label — Industry', 'name' => 'contact_label_industry', 'type' => 'text'),
      array('key' => 'field_ct_label_site', 'label' => 'Label — Website', 'name' => 'contact_label_site', 'type' => 'text'),
      array('key' => 'field_ct_label_site_note', 'label' => 'Label — Website qualifier', 'name' => 'contact_label_site_note', 'type' => 'text', 'instructions' => 'Rendered in lowercase next to the Website label.'),
      array('key' => 'field_ct_label_message', 'label' => 'Label — Message', 'name' => 'contact_label_message', 'type' => 'text'),
      array('key' => 'field_ct_label_budget', 'label' => 'Label — Investment range', 'name' => 'contact_label_budget', 'type' => 'text'),
      array('key' => 'field_ct_label_timeline', 'label' => 'Label — Timeline', 'name' => 'contact_label_timeline', 'type' => 'text'),
      array('key' => 'field_ct_submit_label', 'label' => 'Submit Button Label', 'name' => 'contact_submit_label', 'type' => 'text', 'instructions' => 'The arrow is added automatically.'),

      /* ── Sidebar column headings and link labels ── */
      array('key' => 'field_ct_email_heading', 'label' => 'Sidebar Heading — Email', 'name' => 'contact_email_heading', 'type' => 'text', 'instructions' => 'The address itself lives in Astrix Settings → Contact details.'),
      array('key' => 'field_ct_phone_heading', 'label' => 'Sidebar Heading — Phone', 'name' => 'contact_phone_heading', 'type' => 'text', 'instructions' => 'The number itself lives in Astrix Settings → Contact details.'),
      array('key' => 'field_ct_whatsapp_label', 'label' => 'WhatsApp Button Label', 'name' => 'contact_whatsapp_label', 'type' => 'text'),
      array('key' => 'field_ct_calendly_heading', 'label' => 'Sidebar Heading — Booking', 'name' => 'contact_calendly_heading', 'type' => 'text', 'instructions' => 'Only visible once a Calendly URL is set in Astrix Settings.'),
      array('key' => 'field_ct_calendly_label', 'label' => 'Booking Button Label', 'name' => 'contact_calendly_label', 'type' => 'text'),
      array('key' => 'field_ct_studio_heading', 'label' => 'Sidebar Heading — Studio', 'name' => 'contact_studio_heading', 'type' => 'text', 'instructions' => 'The address and map query live in Astrix Settings → Contact details.'),
      array('key' => 'field_ct_directions_label', 'label' => 'Directions Link Label', 'name' => 'contact_directions_label', 'type' => 'text'),

      /* ── Three reassurance stats under the sidebar ── */
      array('key' => 'field_ct_stat1_value', 'label' => 'Stat 1 — Value', 'name' => 'contact_stat1_value', 'type' => 'text'),
      array('key' => 'field_ct_stat1_label', 'label' => 'Stat 1 — Label', 'name' => 'contact_stat1_label', 'type' => 'text'),
      array('key' => 'field_ct_stat2_value', 'label' => 'Stat 2 — Value', 'name' => 'contact_stat2_value', 'type' => 'text'),
      array('key' => 'field_ct_stat2_label', 'label' => 'Stat 2 — Label', 'name' => 'contact_stat2_label', 'type' => 'text'),
      array('key' => 'field_ct_stat3_value', 'label' => 'Stat 3 — Value', 'name' => 'contact_stat3_value', 'type' => 'text'),
      array('key' => 'field_ct_stat3_label', 'label' => 'Stat 3 — Label', 'name' => 'contact_stat3_label', 'type' => 'text'),

      /* ── FAQ section header ── */
      array('key' => 'field_ct_faq_eyebrow', 'label' => 'FAQ Eyebrow', 'name' => 'contact_faq_eyebrow', 'type' => 'text'),
      array('key' => 'field_ct_faq_headline', 'label' => 'FAQ Headline', 'name' => 'contact_faq_headline', 'type' => 'text'),
    ),
    'location' => $location,
  ));

});

/**
 * Baked-in defaults — the exact strings page-contact.php shipped with.
 *
 * Escaping note: page-contact.php prints the apostrophe-bearing strings
 * ('contact_headline', 'contact_success_body') through wp_kses_post() rather
 * than esc_html(), because esc_html() would turn ' into &#039; and change the
 * rendered bytes. Everything else goes through esc_html().
 */
add_filter('astrix_fallback_fields', function ($fields) {
  return array_merge($fields, array(

    'contact_eyebrow'                   => 'Start a Conversation',
    'contact_headline'                  => "Let's build something",
    'contact_headline_emphasis'         => 'meaningful.',

    'contact_success_eyebrow'           => 'Message Received',
    'contact_success_greeting'          => 'Thank you',
    'contact_success_body'              => "We'll read this properly and reply within one business day.",
    'contact_success_note_before'       => 'In the meantime, wander through',
    'contact_success_note_work'         => 'the work',
    'contact_success_note_between'      => 'or read our',
    'contact_success_note_perspective'  => 'perspective',

    'contact_error_message'             => 'Please add your name and a valid email, and try again.',

    'contact_label_name'                => 'Your name',
    'contact_label_company'             => 'Company',
    'contact_label_email'               => 'Work email',
    'contact_label_industry'            => 'Industry',
    'contact_label_site'                => 'Website',
    'contact_label_site_note'           => '(optional)',
    'contact_label_message'             => 'What do you want to be known for?',
    'contact_label_budget'              => 'Investment range',
    'contact_label_timeline'            => 'Timeline',
    'contact_submit_label'              => 'Send it over',

    'contact_email_heading'             => 'Prefer email?',
    'contact_phone_heading'             => 'Call or message',
    'contact_whatsapp_label'            => 'WhatsApp us',
    'contact_calendly_heading'          => 'Book a call',
    'contact_calendly_label'            => '30-min intro via Calendly',
    'contact_studio_heading'            => 'Studio',
    'contact_directions_label'          => 'Get directions',

    'contact_stat1_value'               => '<1 day',
    'contact_stat1_label'               => 'Reply time',
    'contact_stat2_value'               => 'Senior',
    'contact_stat2_label'               => 'team, always',
    'contact_stat3_value'               => 'No',
    'contact_stat3_label'               => 'obligation',

    'contact_faq_eyebrow'               => 'Before You Ask',
    'contact_faq_headline'              => 'Questions, answered.',
  ));
});
