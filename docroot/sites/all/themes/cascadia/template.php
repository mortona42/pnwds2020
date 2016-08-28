<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Cascadia theme.
 */

// function cascadia_menu_tree__main_menu($variables) {
//   return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>';
// }

// function cascadia_menu_tree__user_menu($variables) {
//   return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="user-close-btn" href="#top">Return to Content</a>';
// }

function cascadia_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
    $element['#attributes']['class'] = array('menu-item--parent js-menu-item-parent');
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function cascadia_link($variables) {
  return '<a href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . '>' . ($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])) . '</a><span class="js-menu-item-toggle"></span>';
}