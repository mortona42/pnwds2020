<?php

/**
 * Preprocessor for page.tpl.php template file.
 */
function bluecheese_preprocess_page(&$variables) {
  // Add HTML tag name for title tag.
  $variables['site_name_element'] = $variables['is_front'] ? 'h1' : 'div';

  // Add variable for site status message (for development sites).
  $variables['drupalorg_site_status'] = filter_xss_admin(variable_get('drupalorg_site_status', FALSE));
}

/**
 * Implementation of template_preprocess_node().
 */
function bluecheese_preprocess_node(&$variables) {
  // Modify 'Submitted by' text on nodes
  $variables['date'] = format_date($variables['node']->created, 'custom', 'F j, Y \a\t g:ia');
  $variables['pubdate'] = '<time pubdate datetime="' . $variables['node']->created . '">' . $variables['date'] . '</time>';
  $variables['submitted'] = t('Posted by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['pubdate']));
}

/**
 * Process variables for aggregator-item.tpl.php.
 *
 * @see aggregator-item.tpl.php
 */
function bluecheese_preprocess_aggregator_item(&$variables) {
  // Modify 'Posted on' date
  $variables['source_date'] = format_date($variables['item']->timestamp, 'custom', 'F j, Y \a\t g:ia');
  // Hide 'Drupal Planet' category on Planet posts
  foreach ($variables['categories'] as $key => $category) {
    if (strpos($category, 'class="active"') !== FALSE) {
      unset($variables['categories'][$key]);
    }
  }
}

/**
 * Implements hook_css_alter().
 *
 * Remove core & module CSS files we don't want in our theme
 */
function bluecheese_css_alter(&$css) {
  unset($css['modules/forum/forum.css']);
}

/**
 * Theme local tasks, so a primary item is not active if we have active in the secondary ones.
 */
function bluecheese_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';

    $output .= drupal_render($variables['primary']);
      // Admitted, this is a total hack. If we have any secondary local tasks,
      // there shold be no class="active" item in the primary local tasks,
      // because it is not "directly" active. So replace with class="parent-active".
  }
  if (!empty($variables['secondary'])) {
    $output = str_replace('class="active"', 'class="parent-active"', $output);
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}
