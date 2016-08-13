<?php

/**
* Implements hook_preprocess_node().
*/

function cascadia_preprocess_node(&$variables) {

  $variables['view_mode'] = $variables['elements']['#view_mode'];
  $variables['node'] = $variables['elements']['#node'];
  $node = $variables['node'];

  // BEM node classes.
  $variables['classes_array'][] = drupal_html_class($node->type);
  $variables['classes_array'][] = drupal_html_class($node->type . '--' . $variables['view_mode']);

}