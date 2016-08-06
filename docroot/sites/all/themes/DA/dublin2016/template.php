<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Dublin 2016 theme.
 */

function dublin2016_menu_tree__menu_dublin2016($variables) {
  return '<div class="menu-block"><ul class="menu">' . $variables['tree'] . '</ul></div><a class="close-btn" id="nav-close-btn" href="#top">Return to Content</a>';
}
