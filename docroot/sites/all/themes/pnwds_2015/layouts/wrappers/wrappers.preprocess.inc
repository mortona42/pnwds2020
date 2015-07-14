<?php

/**
 * Implements hook_preprocess_page().
 */
function pnwds_2015_preprocess_wrappers(&$variables) {
  // You can use preprocess hooks to modify the variables before they are passed
  // to the theme function or template file.
  
  $variables['logo'] = '/' . drupal_get_path('theme', 'pnwds_2015') . '/logo_2015.svg';

}