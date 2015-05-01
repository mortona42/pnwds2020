<?php
/**
* This plugin array is more or less self documenting
*/
$plugin = array(
  // the title in the admin
  'title' => t('Schedule Day Menu'),
  // no one knows if "single" defaults to FALSE...
  'single' => TRUE,
  // oh joy, I get my own section of panel panes
  'category' => array(t('Conference Organizing'), -9),
  'edit form' => 'cod_schedule_pane_menu_edit_form',
  'render callback' => 'cod_schedule_menu_pane_render'
);

/**
* Run-time rendering of the body of the block (content type)
* See ctools_plugin_examples for more advanced info
*/
function cod_schedule_menu_pane_render($subtype, $conf, $context = NULL) {
  // our output is generate by js. Any markup or theme functions
  // could go here.
  // that private js function is so bad that fixing it will be the
  // basis of the next tutorial
  $block = new stdClass();
  $block->title = '';

  $content_type = isset($conf['content_type']) ? $conf['content_type'] : NULL;

  if ($event = node_load(array_shift($context))) {
    $block->content = cod_schedule_menu_render($event, array_shift($context), $content_type);
  } else {
    $block->content = t('Invalid Event Type');
  }
  return $block;
}

/*
 * functions similar to menu_tree_output
 */
function cod_schedule_menu_render($event, $context = NULL, $content_type = NULL) {
  $build = array();
  $items = array();

  // Grab the days.
  if ($days = cod_schedule_days($event, $content_type)) {
    $router_item = menu_get_item();

    // Pull out just the menu links we are going to render so that we
    // get an accurate count for the first/last classes.
    foreach ($days as $k => $day) {
      $items[$k]['link']['href'] = dirname(current_path()) . '/' . $day;
      if ($router_item['href'] == $items[$k]['link']['href']) {
        $items[$k]['link']['in_active_trail'] = TRUE;
      }
      else {
        $items[$k]['link']['in_active_trail'] = FALSE;
      }
      $items[$k]['link']['title'] = date('l', strtotime($day));
    }

  }


  $num_items = count($items);
  foreach ($items as $i => $data) {
    $class = array();
    if ($i == 0) {
      $class[] = 'first';
    }
    if ($i == $num_items - 1) {
      $class[] = 'last';
    }
    // Set a class for the <li>-tag. Since $data['below'] may contain local
    // tasks, only set 'expanded' class if the link also has children within
    // the current menu.
    if ($data['link']['has_children'] && $data['below']) {
      $class[] = 'expanded';
    }
    elseif ($data['link']['has_children']) {
      $class[] = 'collapsed';
    }
    else {
      $class[] = 'leaf';
    }
    // Set a class if the link is in the active trail.
    if ($data['link']['in_active_trail']) {
      $class[] = 'active-trail';
      $data['link']['localized_options']['attributes']['class'][] = 'active-trail';
    }
    // Normally, l() compares the href of every link with $_GET['q'] and sets
    // the active class accordingly. But local tasks do not appear in menu
    // trees, so if the current path is a local task, and this link is its
    // tab root, then we have to set the class manually.
    if ($data['link']['href'] == $router_item['tab_root_href'] && $data['link']['href'] != $_GET['q']) {
      $data['link']['localized_options']['attributes']['class'][] = 'active';
    }

    // Allow menu-specific theme overrides.
    $element['#theme'] = 'menu_link__'. 'cod_schedule';
    $element['#attributes']['class'] = $class;
    $element['#title'] = $data['link']['title'];
    $element['#href'] = $data['link']['href'];
    $element['#localized_options'] = !empty($data['link']['localized_options']) ? $data['link']['localized_options'] : array();
    $element['#below'] = $data['below'] ? menu_tree_output($data['below']) : $data['below'];
    $element['#original_link'] = $data['link'];
    // Index using the link's unique mlid.
    // Index using the link's unique mlid.
    $build[] = $element;
  }
  if ($build) {
    // Make sure drupal_render() does not re-order the links.
    $build['#sorted'] = TRUE;
    // Add the theme wrapper for outer markup.
    // Allow menu-specific theme overrides.
    $build['#theme_wrappers'][] = 'menu_tree__' . 'cod_schedule';
  }

  return $build;
}

function cod_schedule_pane_menu_edit_form($form, &$form_state) {
  $conf = &$form_state['conf'];

  $form['content_type'] = array(
      '#title' => t('Enter an optional content type'),
      '#type' => 'textfield',
      '#maxlength' => 64,
      '#weight' => -10,
  );

  if (!empty($conf['content_type'])) {
    $form['content_type']['#description'] = t('Currently set to !ct', array('!ct' => $conf['content_type']));
  }

  return $form;
}

function cod_schedule_pane_menu_edit_form_submit($form, &$form_state) {
  // This will either be the value set previously or a value set by the
  // validator.
  $form_state['conf']['content_type'] = $form_state['values']['content_type'];
}
