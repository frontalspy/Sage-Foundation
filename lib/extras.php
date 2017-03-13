<?php

namespace Roots\Sage\Extras;

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

class foundationNavMenu extends \Walker_Nav_menu {
  public function start_lvl(&$output, $depth = 0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"menu\">\n";
  }
}

// Adds Foundation classes to next/prev buttons
function posts_link_attributes() {
    return 'class="button primary-background"';
}
add_filter('next_posts_link_attributes', __NAMESPACE__ . '\\posts_link_attributes');
add_filter('previous_posts_link_attributes', __NAMESPACE__ . '\\posts_link_attributes');
