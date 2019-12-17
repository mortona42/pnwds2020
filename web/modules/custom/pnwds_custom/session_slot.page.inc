<?php

/**
 * @file
 * Contains session_slot.page.inc.
 *
 * Page callback for Session slot entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Session slot templates.
 *
 * Default template: session_slot.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_session_slot(array &$variables) {
  $session_slot = $variables['content']['#session_slot'];

  $edit_form = $session_slot->toUrl('edit-form');
  $edit_form->setOption('query', ['destination' => \Drupal::service('path.current')->getPath()]);
  $variables['edit_form'] = \Drupal\Core\Link::fromTextAndUrl(t('edit'), $edit_form);
}
