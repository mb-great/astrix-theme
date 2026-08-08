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
 * The fallback nav when no WordPress menu is assigned. Renders the complete
 * multi-column mega menus for 'Our Services' and 'Our Expertise' per deck slides 1-4.
 */
function astrix_nav_fallback() {
  global $astrix_nav_active;
  $active = isset($astrix_nav_active) ? $astrix_nav_active : '';
  ?>
  <ul class="ax-nav-list">
    <li class="ax-nav-d0"><a href="<?php echo esc_url(home_url('/')); ?>" class="<?php echo esc_attr('axnav-link' . ($active === 'home' ? ' axnav-on' : '')); ?>"><span>Home</span></a></li>
    
    <!-- Our Services (Deck Slide 2) -->
    <li class="ax-nav-d0 ax-has-mega">
      <a href="<?php echo esc_url(home_url('/services')); ?>" class="<?php echo esc_attr('axnav-link' . ($active === 'services' ? ' axnav-on' : '')); ?>" aria-haspopup="true" aria-expanded="false">
        <span>Our Services</span>
        <svg class="ax-caret" width="10" height="6" viewBox="0 0 10 6" aria-hidden="true"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.4" fill="none" stroke-linecap="round"/></svg>
      </a>
      <div class="ax-mega">
        <div class="ax-mega-inner">
          <ul class="ax-mega-cols">
            <li class="ax-col-head">
              <a href="<?php echo esc_url(home_url('/services')); ?>">Strategy &amp; Brand</a>
              <ul class="ax-mega-sub">
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Creative &amp; Communication</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Content Marketing</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Reputation Management</a></li>
              </ul>
            </li>
            <li class="ax-col-head">
              <a href="<?php echo esc_url(home_url('/services')); ?>">SEO &amp; Performance</a>
              <ul class="ax-mega-sub">
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">SEO Services</a></li>
                <li class="ax-badge-new"><a href="<?php echo esc_url(home_url('/services')); ?>">AEO Services</a></li>
                <li class="ax-badge-new"><a href="<?php echo esc_url(home_url('/services')); ?>">Generative Engine Optimization</a></li>
                <li class="ax-badge-hot"><a href="<?php echo esc_url(home_url('/services')); ?>">Performance Marketing</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Search Engine Marketing</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Digital Marketing</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Ad Management</a></li>
              </ul>
            </li>
            <li class="ax-col-head">
              <a href="<?php echo esc_url(home_url('/services')); ?>">Social</a>
              <ul class="ax-mega-sub">
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Social Media Marketing</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Influencer Marketing</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">UGC Video</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">BGC (Brand Generated Content)</a></li>
                <li class="ax-badge-best"><a href="<?php echo esc_url(home_url('/services')); ?>">Social + Performance Combo</a></li>
              </ul>
            </li>
            <li class="ax-col-head">
              <a href="<?php echo esc_url(home_url('/services')); ?>">Web &amp; Apps</a>
              <ul class="ax-mega-sub">
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Website Development</a></li>
                <li><a href="<?php echo esc_url(home_url('/services')); ?>">Web Application Development</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </li>

    <!-- Our Expertise (Deck Slide 3) -->
    <li class="ax-nav-d0 ax-has-mega">
      <a href="<?php echo esc_url(home_url('/our-expertise')); ?>" class="<?php echo esc_attr('axnav-link' . ($active === 'expertise' ? ' axnav-on' : '')); ?>" aria-haspopup="true" aria-expanded="false">
        <span>Our Expertise</span>
        <svg class="ax-caret" width="10" height="6" viewBox="0 0 10 6" aria-hidden="true"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.4" fill="none" stroke-linecap="round"/></svg>
      </a>
      <div class="ax-mega">
        <div class="ax-mega-inner">
          <ul class="ax-mega-cols" style="grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));">
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">B2B Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">FMCG Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Healthcare Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Real Estate Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Home Decor Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">EV Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Education Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Automotive Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Finance Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Travel &amp; Tourism Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Skincare &amp; Beauty Digital Marketing</a></li>
            <li><a href="<?php echo esc_url(home_url('/our-expertise')); ?>">Ecommerce Marketing Company</a></li>
          </ul>
        </div>
      </div>
    </li>

    <li class="ax-nav-d0"><a href="<?php echo esc_url(home_url('/our-clients')); ?>" class="<?php echo esc_attr('axnav-link' . ($active === 'clients' ? ' axnav-on' : '')); ?>"><span>Our Clients</span></a></li>
    <li class="ax-nav-d0"><a href="<?php echo esc_url(home_url('/contact')); ?>" class="<?php echo esc_attr('axnav-link' . ($active === 'contact' ? ' axnav-on' : '')); ?>"><span>Contact</span></a></li>
  </ul>
  <?php
}

/**
 * Auto-seed menu on theme activation or admin visit.
 */
add_action('after_switch_theme', 'astrix_seed_primary_menu');

/**
 * One-time seeding of the menu described in deck slides 1-4.
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
