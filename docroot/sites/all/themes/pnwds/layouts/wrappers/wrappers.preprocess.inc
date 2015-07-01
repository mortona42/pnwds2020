<?php

/**
 * Implements hook_preprocess_page().
 */
function pnwds_preprocess_wrappers(&$variables) {
  // You can use preprocess hooks to modify the variables before they are passed
  // to the theme function or template file.
  if(isset($variables['event']) && $variables['event'] == '2014'){
  	$variables['logo'] = drupal_get_path('theme', 'pnwds') . '/logo.svg';
  }
  else{
	  $variables['logo'] = drupal_get_path('theme', 'pnwds') . '/logo_2015.png';
  }
}