<?php

/**
 * @file
 * Contains time_slot.page.inc.
 *
 * Page callback for Time slot entities.
 */

use Drupal\Core\Render\Element;
use Drupal\pnwds_custom\Entity\SessionSlot;

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
//  $time_slot = $variables['content']['#time_slot'];
//  $time_slot_session_slots = explode(', ', $time_slot->get('field_session_slots')->getString());
//  $tags_parameter = \Drupal::requestStack()->getCurrentRequest()->query->get('tags');
////  $tags_parameter = explode(', ', \Drupal::requestStack()->getCurrentRequest()->query->get('tags'));
//
//  // Get session slots that have the selected tags.
//  $query = \Drupal::database()->select('session_slot', 'session_slot');
//  $query->addField('session_slot', 'id');
//  $query->condition('session_slot.id', $time_slot_session_slots, 'IN');
//  $query->join('time_slot__field_session_slots', 'time_slot_sessions', 'session_slot.id = time_slot_sessions.field_session_slots_target_id');
//  $query->orderBy('time_slot_sessions.delta');
//
//  if (!empty($tags_parameter[0] && $tags_parameter[0] != 'all')) {
//    $query->leftJoin('session_slot__field_session', 'f_session', 'session_slot.id = f_session.entity_id');
//    $query->join('session__field_tags', 'f_tags', 'f_session.field_session_target_id = f_tags.entity_id');
//    $query->addField('f_tags', 'field_tags_target_id');
//    $query->condition('f_tags.field_tags_target_id', $tags_parameter, 'IN');
//  }
//
//  $session_slots = $query->execute()->fetchCol(0);
//  $session_slots = SessionSlot::loadMultiple($session_slots);
//
//  $view_builder = \Drupal::entityTypeManager()
//    ->getViewBuilder('session_slot');
//
//  $session_slots_view = $view_builder->viewMultiple($session_slots);
//  $session_slots_view['#attributes'] = ['class' => ['session-slot-grid']];
//  $session_slots_view['#attached'] = 'pnwds_custom/session_slot_grid';
//
//  $variables['session_slots'] = $view_builder->viewMultiple($session_slots);
}
