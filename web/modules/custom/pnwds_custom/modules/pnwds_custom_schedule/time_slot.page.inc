<?php

/**
 * @file
 * Contains time_slot.page.inc.
 *
 * Page callback for Time slot entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Time slot templates.
 *
 * Default template: time_slot.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_time_slot(array &$variables) {
  $time_slot = $variables['content']['#time_slot'];

  $variables['#attached']['library'][] = 'pnwds_custom/session-slot-grid';
  $variables['content']['field_session_slots']['#attributes']['class'][] = 'session-slot-grid';
}
