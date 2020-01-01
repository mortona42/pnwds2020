<?php

/**
 * Implements hook_preprocess_page().
 */
function pisces_preprocess_page(&$variables) {
  // Set year in front page for logo link.
  $slug = explode('/', request_path())[0];
  if (in_array($slug, ['2014', '2015', '2017', '2018'])) {
    $vars['front_page'] = '/' . $slug . '/';
  }
}
