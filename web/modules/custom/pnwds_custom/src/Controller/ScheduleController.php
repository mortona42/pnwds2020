<?php

namespace Drupal\pnwds_custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Element\Select;
use Drupal\pnwds_custom\Entity\Session;
use Drupal\pnwds_custom\Entity\SessionSlot;
use Drupal\pnwds_custom\Entity\TimeSlot;
use Drupal\pnwds_custom\Form\TagsFilter;

/**
 * Class ScheduleController.
 */
class ScheduleController extends ControllerBase {

  /**
   * Schedule.
   *
   * @return string
   *   Return Hello string.
   */
  public function schedule() {
    $block = [];

//    $view_builder = \Drupal::entityTypeManager()
//      ->getViewBuilder('time_slot');
//
//    // Using select instead of entityquery because of sort issue.
//    $time_slots_query = \Drupal::database()->select('time_slot');
//    $time_slots_query->join('time_slot__field_time', 'time', 'time_slot.id = time.entity_id');
//    $time_slots_query->orderBy('time.field_time_from');
//    $time_slots_query->addField('time_slot', 'id');
//
//    $time_slots = $time_slots_query->execute()->fetchCol();
//    $time_slots = TimeSlot::loadMultiple($time_slots);
//    $block['time_slots'] = $view_builder->viewMultiple($time_slots);
//
//    $session_slot_query = \Drupal::database()->select('session_slot', 'session_slot');
//    $session_slot_query->leftJoin('session_slot__field_session', 'session_ref', 'session_slot.id = session_ref.entity_id');
//    $session_slot_query->leftJoin('time_slot__field_session_slots', 'time_slot_ref', 'session_slot.id = time_slot_ref.field_session_slots_target_id');
//    $session_slot_query->addField('session_slot', 'id', 'session_slot_id');
//    $session_slot_query->addField('session_ref', 'entity_id', 'session_id');
//    $session_slot_query->addField('time_slot_ref', 'entity_id', 'time_slot_id');
//    $session_slot_query->orderBy('time_slot_ref.entity_id');
//
//    $session_slots = $session_slot_query->execute()->fetchCol(0);
//    $session_slots = SessionSlot::loadMultiple($session_slots);
//
//    $sessions = $session_slot_query->execute()->fetchCol(1);
//    $sessions = Session::loadMultiple($sessions);

//    $results = $session_slot_query->execute()->fetchAll();

//    $time_slots = \Drupal::entityQuery('session_slot')

//    $block['filter'] = \Drupal::formBuilder()->getForm(TagsFilter::class);

    return $block;
  }

}
