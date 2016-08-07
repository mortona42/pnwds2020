<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Vancouver 2017 theme.
 */

function vancouver2017_menu_tree__menu_vancouver2017($variables) {
  return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>';
}
