<?php

/**
* Implements hook_preprocess_html().
*/

function cascadia_preprocess_html(&$variables) {

  if(arg(3) == 'proposed') {
    $track = arg(4);
    if(isset($track)) {
      $argument = check_plain(arg(4));
      $vars['attributes_array']['class'][] = $argument;
    }
  }

  $page = page_manager_get_current_page();
  if($page) {
    $variables['classes_array'][] = 'panels-layout';
    if (isset($page['handler']) && isset($page['handler']->conf['display'])) {
      $layout_name = $page['handler']->conf['display']->layout;
    }
    if(isset($layout_name)) {
      $variables['classes_array'][] = 'panels-layout-' . $layout_name;
    }
  }
  else {
    $variables['classes_array'][] = 'no-panels-layout';
  }
}