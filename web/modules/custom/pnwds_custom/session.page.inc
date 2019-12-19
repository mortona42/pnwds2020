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

  // Add session tags
  $variables['session_tags'] = $session->field_tags->referencedEntities();

  $variables['url'] = $session->toUrl('canonical')->toString();
  $variables['label'] = $session->label();
  $variables['page'] = !empty(\Drupal::requestStack()->getCurrentRequest()->attributes->get('session'));

}
