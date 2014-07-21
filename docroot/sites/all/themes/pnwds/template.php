<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * Pacific NW Drupal Summit 2014 theme.
 */
/**
 * Implements hook_js_alter()
 *
 * Moves scripts from the header scope (and others) to the footer, maintaining
 * their relative positions by adjusting script groups while also making
 * sure settings are positioned just after the original header scripts.
 */
function pnwds_js_alter(&$javascript) {
  // Collect the scripts we want in to remain in the header scope.
  $header_scripts = array(
    'sites/all/themes/pnwds/libraries/html5shiv/html5shiv.min.js',
    'sites/all/themes/pnwds/libraries/matchmedia/matchmedia.min.js',
    'sites/all/themes/pnwds/js/vendor/modernizr.js',
    'sites/all/themes/pnwds/libraries/selectivizr/selectivizr.min.js',
    'sites/all/themes/pnwds/libraries/selectivizr/enquire.min.js'
  );
  
  // Add LIBRARY for specific devices devices
  /*
    $user_agent = ( array_key_exists('HTTP_USER_AGENT', $_SERVER) ) ? $_SERVER['HTTP_USER_AGENT'] : '';
    
    if ( $user_agent ) {
      if ( stripos($_SERVER['HTTP_USER_AGENT'], "iPad") ) {
        $iPad = TRUE;
      } else if ( stripos($_SERVER['HTTP_USER_AGENT'], "Android") && stripos($_SERVER['HTTP_USER_AGENT'], "mobile") ) {
        $Android = TRUE;
      } else if ( stripos($_SERVER['HTTP_USER_AGENT'], "Android") ) {
        $Android = FALSE;
        $AndroidTablet = TRUE;
      } else {
        $Android = FALSE;
        $AndroidTablet = FALSE;
        $iPad = FALSE;
      }
      $tablet = ( $iPad || $AndroidTablet ) ? TRUE : FALSE;
    }
    
    if ( $tablet ) {
      $header_scripts[] = 'sites/all/themes/pnwds/js/vendor/PLUGIN.SCRIPT.js';
      $javascript['sites/all/themes/pnwds/js/vendor/PLUGIN.SCRIPT.js'] = array( 'group' => 100,
                                                                                'every_page' => TRUE,
                                                                                'type' => 'file',
                                                                                'weight' => '0.008',
                                                                                'scope' => 'header',
                                                                                'cache' => TRUE,
                                                                                'defer' => FALSE,
                                                                                'preprocess' => TRUE,
                                                                                'version' => '',
                                                                                'data' => 'sites/all/themes/pnwds/js/vendor/PLUGIN.SCRIPT.js',
                                                                              );
    }
  */

  // Change the default scope of all other scripts to footer.
  // We assume if the script is scoped to header it was done so by default.
  foreach ($javascript as $key => &$script) {
    if ($script['scope'] == 'header' && !in_array($script['data'], $header_scripts)) {
      $script['scope'] = 'footer';
    }
  }
  
  // For context_breakpoint to work correctly, settings need to be defined in the head
  // $javascript['settings']['scope'] = 'header';
}



/**
 * Implements hook_preprocess_view()
 */
function pnwds_preprocess_views_view_list(&$vars) {
  if (isset($vars['view']->name)) {
    $function = __FUNCTION__ . '__' . $vars['view']->name . '__' . $vars['view']->current_display;
   
    if (function_exists($function)) {
     $function($vars);
    }
  }
}

function pnwds_preprocess_views_view_fields(&$vars) {
  if (isset($vars['view']->name)) {
    $function = __FUNCTION__ . '__' . $vars['view']->name . '__' . $vars['view']->current_display;
   
    if (function_exists($function)) {
     $function($vars);
    }
  }
}

/**
 * Implements hook_views_pre_render()
 */
function pnwds_views_pre_render(&$view) {
  if (isset($view->name)) {
    $function = __FUNCTION__ . '__' . $view->name . '__' . $view->current_display;
    
    if (function_exists($function)) {
      $function($view);
    }
  }
}

/**
 * Override or insert vars into the node templates.
 *
 * @param $vars
 *   An array of vars to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 *
 * Implements hook_preprocess_node().
 */
function pnwds_preprocess_node(&$vars) {
  $node = $vars['node'];
  $view_mode = $vars['view_mode'];
  $type = $vars['type'];
  $nid = $vars['nid'];
  
  // Create view_mode tpls
  if( !empty($view_mode) ) {
    $vars['theme_hook_suggestions'][] = 'node__' . $type . '__' . $view_mode;
    $vars['theme_hook_suggestions'][] = 'node__' . $nid . '__' . $view_mode;
    $vars['classes_array'][] = 'node__' . $type . '--' . $view_mode;
  }
  
/*
  switch($view_mode) {
    case 'slide':
    break;
  }
    
  switch($type) {
    case 'experience':
    break;
  }
*/
}

/**
 * Implements hook_menu_alter()
 *
 * Alter the data being saved to the {menu_router} table after hook_menu is invoked.
 *
 * This hook is invoked by menu_router_build(). The menu definitions are passed
 * in by reference. Each element of the $items array is one item returned
 * by a module from hook_menu. Additional items may be added, or existing items
 * altered.
 *
 * @param $items
 *   Associative array of menu router definitions returned from hook_menu().
 */
function pnwds_menu_alter(&$items) {
  // Example - disable the page at node/add
  $items['user/login']['access callback'] = 'user_is_anonymous';
}

/**
 * Implements theme_menu_tree__menu_id()
 *
 * @funcSet:
 *   Return HTML for Primary Menu and Link wrappers [ ul & li ].
 *
 * @func:
 * - Main UL
 *
 */
function pnwds_menu_tree__user_menu($vars) {
  return '<nav id="user-menu" role="navigation" tabindex="-1"><input type="checkbox" id="user-menu-toggle"><label for="user-menu-toggle" onclick></label><ul class="menu--user-menu menu links">' . $vars['tree'] . '</ul></nav>';
}

/** @func:
 * - Main LI
 */
function pnwds_menu_link__user_menu($vars) {
  $element = $vars['element'];
  $sub_menu = '';
  $path = current_path();

  if ($element['#below']) {
    foreach ($element['#below'] as $key => $val) {
      if (is_numeric($key)) {
        $element['#below'][$key]['#theme'] = 'menu_link__user_menu_inner'; // Second level LI
        if ($val['#href'] == $path) {
          $element['#localized_options']['attributes']['class'][] = 'menu__item--active-trail active-trail';
          $element['#attributes']['class'][] = 'menu__item--active-trail active-trail';
        }
      }
    }
    $element['#below']['#theme_wrappers'][0] = 'menu_tree__user_menu_inner'; // Second level UL
    $sub_menu = drupal_render($element['#below']);
    $element['#attributes']['class'][] = 'dropdown';
  }
  $element['#attributes']['class'][] = 'menu__item';
  $element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
  $element['#attributes']['class'][] = 'menu__item--' . strtolower(str_replace(' ','-', $element['#original_link']['link_title']));

  if ($element['#below']) {
    $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    $element['#localized_options']['attributes']['aria-haspopup'] ='true';
    $output = '<input type="checkbox" />' . l($element['#title'], $element['#href'], array('attributes' => $element['#localized_options']['attributes'], 'html' => TRUE));
  } else {
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
}

/** @func:
 * - Inner UL
 */
function pnwds_menu_tree__user_menu_inner($vars) {
    return '<ul class="menu--user-menu_sub dropdown-menu menu">' . $vars['tree'] . '</ul>';
}

/** @func:
 * - Inner LI
 */
function pnwds_menu_link__user_menu_inner($vars) {
  $element = $vars['element'];
  $sub_menu = '';
  
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
    $element['#attributes']['class'][] = 'dropdown';
    $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    $element['#localized_options']['attributes']['aria-haspopup'] ='true';
    $output = '<input type="checkbox" />' . l($element['#title'], $element['#href'], array('attributes' => $element['#localized_options']['attributes'], 'html' => TRUE));
  } else {
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }
  
  $element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
  
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
}

/**
 * Implements theme_menu_tree__menu_id()
 *
 * @funcSet:
 *   Return HTML for Primary Menu and Link wrappers [ ul & li ].
 *
 * @func:
 * - Main UL
 *
 */
function pnwds_menu_tree__main_menu($vars) {
  return '<nav id="main-menu" role="navigation" tabindex="-1"><input type="checkbox" id="main-menu-toggle"><label for="main-menu-toggle" onclick></label><ul class="menu--main-menu menu links">' . $vars['tree'] . '</ul></nav>';
}

/** @func:
 * - Main LI
 */
function pnwds_menu_link__main_menu(array $vars) {
  $element = $vars['element'];
  $sub_menu = '';
  $path = current_path();

  if ($element['#below']) {
    foreach ($element['#below'] as $key => $val) {
      if (is_numeric($key)) {
        $element['#below'][$key]['#theme'] = 'menu_link__main_menu_inner'; // Second level LI
        if ($val['#href'] == $path) {
          $element['#localized_options']['attributes']['class'][] = 'menu__item--active-trail active-trail';
          $element['#attributes']['class'][] = 'menu__item--active-trail active-trail';
        }
      }
    }
    $element['#below']['#theme_wrappers'][0] = 'menu_tree__main_menu_inner'; // Second level UL
    $sub_menu = drupal_render($element['#below']);
    $element['#attributes']['class'][] = 'dropdown';
  }
  $element['#attributes']['class'][] = 'menu__item';
  $element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
  $element['#attributes']['class'][] = 'menu__item--' . strtolower(str_replace(' ','-', $element['#original_link']['link_title']));

  if ($element['#below']) {
    $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    $element['#localized_options']['attributes']['aria-haspopup'] ='true';
    $output = '<input type="checkbox" />' . l($element['#title'], $element['#href'], array('attributes' => $element['#localized_options']['attributes'], 'html' => TRUE));
  } else {
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  }

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
}

/** @func:
 * - Inner UL
 */
function pnwds_menu_tree__main_menu_inner($vars) {
    return '<ul class="menu--main-menu_sub dropdown-menu menu">' . $vars['tree'] . '</ul>';
}

/** @func:
 * - Inner LI
 */
function pnwds_menu_link__main_menu_inner($vars) {
  $element = $vars['element'];
  $sub_menu = '';
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $element['#attributes']['class'][] = 'level-' . $element['#original_link']['depth'];
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
}

/**
 * Provide a form-specific alteration instead of the global hook_form_alter().
 *
 * Modules can implement hook_form_FORM_ID_alter() to modify a specific form,
 * rather than implementing hook_form_alter() and checking the form ID, or
 * using long switch statements to alter multiple forms.
 *
 * Form alter hooks are called in the following order: hook_form_alter(),
 * hook_form_BASE_FORM_ID_alter(), hook_form_FORM_ID_alter(). See
 * hook_form_alter() for more details.
 *
 * @param $form
 * - Nested array of form elements that comprise the form.
 * @param $form_state
 * - A keyed array containing the current state of the form. The arguments
 *   that drupal_get_form() was originally called with are available in the
 *   array $form_state['build_info']['args'].
 * @param $form_id
 * - String representing the name of the form itself. Typically this is the
 *   name of the function that generated the form.
 *
 */
function pnwds_form_ticket_field_formatter_view_form_alter(&$form, &$form_state, $form_id) {
  // Modification for the form with the given form ID goes here. For example, if
  // FORM_ID is "user_register_form" this code would run only on the user
  // registration form.
  // Change the width of the ticket quantity input
  $form['ticket_quantity_1']['#size'] = 2;
  /* dsm($form); */
} 