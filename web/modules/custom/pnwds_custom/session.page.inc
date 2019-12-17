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

  $tags_parameter = \Drupal::requestStack()->getCurrentRequest()->query->get('tags');

  // Hide session if tag is not in filter.
  if ($tags_parameter) {
    $tags = $session->field_tags->referencedEntities();
    foreach ($tags as $tag) {
      $tag_class = strtolower($tag->label());
      $tag_class = preg_replace('/[^a-z0-9_]+/', '-', $tag_class);
      if (!in_array($tag_class, $tags_parameter)) {
        $variables['attributes']['class'][] = 'filtered-hidden';
      }
    }
  }
}
