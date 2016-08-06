<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Siren theme.
 */

function siren_menu_tree__main_menu($variables) {
  return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>';
}

function siren_menu_tree__user_menu($variables) {
  return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="user-close-btn" href="#top">Return to Content</a>';
}
