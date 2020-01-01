<?php

/**
* Implements hook_preprocess_page().
*/

function cascadia_preprocess_page(&$vars) {
  if(arg(2) == 'schedule') {
    drupal_add_js('/sites/all/libraries/isotope/isotope.pkgd.min.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'cascadia') .'/js/schedule.js', 'file');
  }

  // Set year in front page for logo link.
  $slug = explode('/', request_path())[0];
  if (in_array($slug, ['2014', '2015', '2017', '2018'])) {
    $vars['front_page'] = '/' . $slug;
  }
}
