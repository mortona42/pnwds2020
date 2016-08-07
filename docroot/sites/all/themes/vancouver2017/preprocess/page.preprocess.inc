<?php

/**
 * Implements hook_preprocess_page().
 */
function vancouver2017_preprocess_page(&$vars) {
  if (isset($vars['node']->type) && $vars['node']->type == 'event') {
    $vars['logo'] = "/" . drupal_get_path('theme', 'vancouver2017') . '/logo-front.png';
  }
  if(arg(2) == 'schedule') {
    drupal_add_js('/sites/all/libraries/isotope/isotope.pkgd.min.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'vancouver2017') .'/js/schedule.js', 'file');
  }
  elseif(arg(2) == 'sessions') {
    drupal_add_js('/sites/all/libraries/isotope/isotope.pkgd.min.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'vancouver2017') .'/js/sessions.js', 'file');
  }
}
