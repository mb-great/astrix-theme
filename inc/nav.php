<?php
/**
 * Editable navigation — deck slides 1-4.
 *
 * The nav used to be a hardcoded list of <a> tags in header.php, so adding a
 * menu item meant a deploy. This registers real WordPress menus and renders
 * them through a walker that supports three levels:
 *
 *   depth 0 — top-level item        ("Our Services")
 *   depth 1 — mega-menu column head ("SEO & Performance")  or a plain link
 *   depth 2 — link inside a column  ("AEO Services")
 *
 * A depth-1 item that HAS children becomes a column heading; one that has no
 * children stays a normal link and the panel flows them into columns. That is
 * what lets "Our Services" (headed columns) and "Our Expertise" (a flat list)
 * share one walker.
 *
 * Badges ("NEW", "BESTSELLER") are driven by a CSS class on the menu item, set
 * in Appearance → Menus → CSS Classes, so the client can add or remove them
 * without touching code: ax-badge-new, ax-badge-hot, ax-badge-best.
 *
 * SAFETY: if no menu is assigned to the 'primary' location, the theme falls
 * back to the original hardcoded links. A site with no menu configured must
 * never render an empty header.
 */

if (!defined('ABSPATH')) {
  exit;
}

add_action('after_setup_theme', function () {
  register_nav_menus(array(
    'primary' => 'Primary navigation (header)',
    'footer_explore'     => 'Footer — Explore column',
    'footer_capabilities' => 'Footer — Capabilities column',
  ));
});

/**
 * Walker producing the mega-menu markup.
 */
class Astrix_Mega_Walker extends Walker_Nav_Menu {

  // NOTE: do not declare $has_children here. The parent Walker already defines
  // it as public, and redeclaring it protected is a fatal error.

  public function start_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    if ($depth === 0) {
      // The mega panel itself.
      $output .= "\n$indent<div class=\"ax-mega\"><div class=\"ax-mega-inner\"><ul class=\"ax-mega-cols\">\n";
    } else {
      $output .= "\n$indent<ul class=\"ax-mega-sub\">\n";
    }
  }

  public function end_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    if ($depth === 0) {
      $output .= "$indent</ul></div></div>\n";
    } else {
      $output .= "$indent</ul>\n";
    }
  }

  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
    $classes   = empty($item->classes) ? array() : (array) $item->classes;
    $has_kids  = in_array('menu-item-has-children', $classes, true);

    $classes[] = 'ax-nav-d' . $depth;
    if ($has_kids && $depth === 0) { $classes[] = 'ax-has-mega'; }
    if ($has_kids && $depth === 1) { $classes[] = 'ax-col-head'; }

    $class_attr = 'class="' . esc_attr(trim(implode(' ', array_filter($classes)))) . '"';

    $output .= '<li ' . $class_attr . '>';

    $url    = !empty($item->url) ? $item->url : '';
    $title  = apply_filters('the_title', $item->title, $item->ID);
    $atts   = '';
    if ($url)                { $atts .= ' href="' . esc_url($url) . '"'; }
    if (!empty($item->target)){ $atts .= ' target="' . esc_attr($item->target) . '" rel="noopener"'; }
    if (!empty($item->attr_title)) { $atts .= ' title="' . esc_attr($item->attr_title) . '"'; }

    // A top-level item that owns a panel needs to be reachable by keyboard and
    // announce its state, so it gets button semantics on top of the link.
    if ($has_kids && $depth === 0) {
      $atts .= ' aria-haspopup="true" aria-expanded="false"';
    }

    $output .= '<a' . $atts . '><span>' . esc_html($title) . '</span>';
    if ($has_kids && $depth === 0) {
      $output .= '<svg class="ax-caret" width="10" height="6" viewBox="0 0 10 6" aria-hidden="true"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.4" fill="none" stroke-linecap="round"/></svg>';
    }
    $output .= '</a>';
  }

  public function end_el(&$output, $item, $depth = 0, $args = null) {
    $output .= "</li>\n";
  }
}

/**
 * Render the header nav, with the pre-menu hardcoded links as the fallback.
 */
function astrix_primary_nav() {
  if (has_nav_menu('primary')) {
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'container'      => false,
      'menu_class'     => 'ax-nav-list',
      'depth'          => 3,
      'walker'         => new Astrix_Mega_Walker(),
      'fallback_cb'    => 'astrix_nav_fallback',
    ));
    return;
  }
  astrix_nav_fallback();
}

/**
 * The original hardcoded nav. Used when no menu has been assigned yet, so the
 * header can never come out empty on a fresh install.
 */
function astrix_nav_fallback() {
  global $astrix_nav_active;
  $active = isset($astrix_nav_active) ? $astrix_nav_active : '';
  $links = array(
    'home'        => array('/', 'Home'),
    'services'    => array('/services', 'Our Services'),
    'expertise'   => array('/our-expertise', 'Our Expertise'),
    'clients'     => array('/our-clients', 'Our Clients'),
    'contact'     => array('/contact', 'Contact'),
  );
  echo '<ul class="ax-nav-list">';
  foreach ($links as $key => $l) {
    printf(
      '<li class="ax-nav-d0"><a href="%s" class="%s"><span>%s</span></a></li>',
      esc_url(home_url($l[0])),
      esc_attr('axnav-link' . ($active === $key ? ' axnav-on' : '')),
      esc_html($l[1])
    );
  }
  echo '</ul>';
}

/**
 * One-time seeding of the menu described in deck slides 1-4.
 *
 * Runs only when there is no 'Astrix Primary' menu yet, so it can never
 * overwrite the client's own edits. Re-runnable safely.
 */
function astrix_seed_primary_menu() {
  $name = 'Astrix Primary';
  if (wp_get_nav_menu_object($name)) {
    return new WP_Error('exists', 'Menu already exists — not touching it.');
  }

  $menu_id = wp_create_nav_menu($name);
  if (is_wp_error($menu_id)) { return $menu_id; }

  $add = function ($title, $url, $parent = 0, $classes = '') use ($menu_id) {
    return wp_update_nav_menu_item($menu_id, 0, array(
      'menu-item-title'     => $title,
      'menu-item-url'       => $url,
      'menu-item-parent-id' => $parent,
      'menu-item-status'    => 'publish',
      'menu-item-classes'   => $classes,
    ));
  };

  $add('Home', home_url('/'));

  // Our Services — four headed columns (deck slide 2)
  $services = $add('Our Services', home_url('/services'));
  $cols = array(
    'Strategy & Brand' => array(
      array('Creative & Communication', ''),
      array('Content Marketing', ''),
      array('Reputation Management', ''),
    ),
    'SEO & Performance' => array(
      array('SEO Services', ''),
      array('AEO Services', 'ax-badge-new'),
      array('Generative Engine Optimization', 'ax-badge-new'),
      array('Performance Marketing', 'ax-badge-hot'),
      array('Search Engine Marketing', ''),
      array('Digital Marketing', ''),
      array('Ad Management', ''),
    ),
    'Social' => array(
      array('Social Media Marketing', ''),
      array('Influencer Marketing', ''),
      array('UGC Video', ''),
      array('BGC (Brand Generated Content)', ''),
      array('Social + Performance Combo', 'ax-badge-best'),
    ),
    'Web & Apps' => array(
      array('Website Development', ''),
      array('Web Application Development', ''),
    ),
  );
  foreach ($cols as $head => $items) {
    $col = $add($head, '#', $services);
    foreach ($items as $it) {
      $add($it[0], home_url('/services'), $col, $it[1]);
    }
  }

  // Our Expertise — flat industry list (deck slide 3)
  $expertise = $add('Our Expertise', home_url('/our-expertise'));
  foreach (array(
    'B2B Digital Marketing', 'FMCG Marketing', 'Healthcare Digital Marketing',
    'Real Estate Digital Marketing', 'Home Decor Digital Marketing', 'EV Digital Marketing',
    'Education Digital Marketing', 'Automotive Digital Marketing', 'Finance Digital Marketing',
    'Travel & Tourism Digital Marketing', 'Skincare & Beauty Digital Marketing',
    'Ecommerce Marketing Company',
  ) as $t) {
    $add($t, home_url('/our-expertise'), $expertise);
  }

  $add('Our Clients', home_url('/our-clients'));
  $add('Contact', home_url('/contact'));

  set_theme_mod('nav_menu_locations', array_merge(
    (array) get_theme_mod('nav_menu_locations', array()),
    array('primary' => $menu_id)
  ));

  return $menu_id;
}
