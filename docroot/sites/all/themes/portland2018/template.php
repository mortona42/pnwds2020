<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Vancouver 2017 theme.
 */

function portland2018_menu_tree__menu_portland2018($variables) {
  return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>';
}
