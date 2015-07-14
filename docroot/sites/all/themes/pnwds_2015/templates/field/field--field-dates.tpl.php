<?php

/**
 * @file field.tpl.php
 * Default template implementation to display the value of a field.
 *
 * This file is not used and is here as a starting point for customization only.
 * @see theme_field()
 *
 * Available variables:
 * - $items: An array of field values. Use render() to output them.
 * - $label: The item label.
 * - $label_hidden: Whether the label display is set to 'hidden'.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - field: The current template type, i.e., "theming hook".
 *   - field-name-[field_name]: The current field name. For example, if the
 *     field name is "field_description" it would result in
 *     "field-name-field-description".
 *   - field-type-[field_type]: The current field type. For example, if the
 *     field type is "text" it would result in "field-type-text".
 *   - field-label-[label_display]: The current label position. For example, if
 *     the label position is "above" it would result in "field-label-above".
 *
 * Other variables:
 * - $element['#object']: The entity to which the field is attached.
 * - $element['#view_mode']: View mode, e.g. 'full', 'teaser'...
 * - $element['#field_name']: The field name.
 * - $element['#field_type']: The field type.
 * - $element['#field_language']: The field language.
 * - $element['#field_translatable']: Whether the field is translatable or not.
 * - $element['#label_display']: Position of label display, inline, above, or
 *   hidden.
 * - $field_name_css: The css-compatible field name.
 * - $field_type_css: The css-compatible field type.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_field()
 * @see theme_field()
 *
 * @ingroup themeable
 */

// Grab the first element for time
$dateobj = $element['#items'][0];

$item['start']['day'] = format_date($dateobj['value'], 'custom', 'l');
$item['start']['month'] = format_date($dateobj['value'], 'custom', 'M');
$item['start']['date'] = format_date($dateobj['value'], 'custom', 'j');
$item['start']['year'] = format_date($dateobj['value'], 'custom', 'Y');
$item['start']['time'] = format_date($dateobj['value'], 'custom', 'g:ia');
$item['end']['day'] = format_date($dateobj['value2'], 'custom', 'l');
$item['end']['month'] = format_date($dateobj['value2'], 'custom', 'M');
$item['end']['date'] = format_date($dateobj['value2'], 'custom', 'j');
$item['end']['year'] = format_date($dateobj['value2'], 'custom', 'Y');
$item['end']['time'] = format_date($dateobj['value2'], 'custom', 'g:ia');

?>
<!--
THIS FILE IS NOT USED AND IS HERE AS A STARTING POINT FOR CUSTOMIZATION ONLY.
See http://api.drupal.org/api/function/theme_field/7 for details.
After copying this file to your theme's folder and customizing it, remove this
HTML comment.
-->
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
  <?php endif; ?>
  <div class="field-items"<?php print $content_attributes; ?>>
    <footer class="event__dates">
      <?php foreach( $item as $date => $data ): ?>
        <div class="event__date event__date--<?php print $date; ?>">
          <?php foreach ($data as $key => $value): ?>
            <span class="date__item <?php print 'date__item--' . $key . ' date__' . $date . '--item date__' . $date . '--' . $key; ?>"><?php print $value; ?></span>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>
    </footer>
  </div>
</div>
