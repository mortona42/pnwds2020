<?php

/**
 * @file
 * Contains session.page.inc.
 *
 * Page callback for Session entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Session templates.
 *
 * Default template: session.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_session(array &$variables) {
  $session = $variables['content']['#session'];

  $tag_fields = Element::children($variables['content']['field_tags']);
  foreach ($tag_fields as $tag_field) {
    $variables['content']['field_tags'][$tag_field]['#attributes']['class'][] = 'session-tag';
    $session_tag_id = $session->field_tags->referencedEntities()[$tag_field]->label();
    $session_tag_id = strtolower(\Drupal\Component\Utility\Html::cleanCssIdentifier($session_tag_id));
    $variables['content']['field_tags'][$tag_field]['#attributes']['tag'] = $session_tag_id;
  }

  $variables['url'] = $session->toUrl('canonical')->toString();
  $variables['label'] = $session->label();
  $variables['page'] = !empty(\Drupal::requestStack()->getCurrentRequest()->attributes->get('session'));

}
