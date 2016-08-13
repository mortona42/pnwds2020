<?php

/**
* Implements hook_preprocess_field().
*/

function cascadia_preprocess_field(&$variables, $hook) {
  $element = $variables['element'];

  // Add default CSS classes. Since there can be many fields rendered on a page,
  // save some overhead by calling strtr() directly instead of
  // drupal_html_class().

  $variables['field_name_css'] = strtr($element['#field_name'], '_', '-');
  $variables['field_type_css'] = strtr($element['#field_type'], '_', '-');
  $variables['field_name_bem'] = strtr(ltrim(ltrim($element['#field_name'], 'field'), '_'), '_', '-');

  if($element['#field_type'] == "text_with_summary") {
    $variables['field_full_html'] = 'field--full-html';
  }

  $variables['classes_array'] = array(
    'field',
    // 'field-name-' . $variables['field_name_css'],
    // 'field-type-' . $variables['field_type_css'],
    // 'field-label-' . $element['#label_display'],
    $variables['field_full_html'],
    $element['#bundle'] . '__' . $variables['field_name_bem'],
  );

}