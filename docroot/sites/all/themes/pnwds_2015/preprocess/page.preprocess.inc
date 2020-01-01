<?php

/**
 * Implements hook_preprocess_page().
 */
function pnwds_2015_preprocess_page(&$vars) {
  // You can use preprocess hooks to modify the variables before they are passed
  // to the theme function or template file.
  $slug = explode('/', request_path())[0];
  if (in_array($slug, ['2014', '2015', '2017', '2018'])) {
    $vars['front_page'] = '/' . $slug;
  }
}
