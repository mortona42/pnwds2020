<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Vancouver 2017 theme.
 */

function seattle2019_menu_tree__menu_seattle2019($variables) {
  return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>';
}
