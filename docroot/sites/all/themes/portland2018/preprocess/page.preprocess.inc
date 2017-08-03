<?php

/**
 * Implements hook_preprocess_page().
 */
function portland2018_preprocess_page(&$vars) {
  // Legacy reference code from Dublin2016 theme. @TODO: Remove if not needed.
  // if (isset($vars['node']->type) && $vars['node']->type == 'event') {
  //   $vars['logo'] = "/" . drupal_get_path('theme', 'portland2018') . '/logo-front.png';
  // }
  if(arg(2) == 'schedule') {
    drupal_add_js('/sites/all/libraries/isotope/isotope.pkgd.min.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'portland2018') .'/js/schedule.js', 'file');
  }
  elseif(arg(2) == 'sessions') {
    drupal_add_js('/sites/all/libraries/isotope/isotope.pkgd.min.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'portland2018') .'/js/sessions.js', 'file');
  }
}
