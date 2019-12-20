<?php

namespace Drupal\pnwds_custom\Controller;

use Drupal\Component\Utility\Html;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormState;
use Drupal\Core\Render\Element\Checkboxes;
use Drupal\Core\Render\Element\Select;
use Drupal\pnwds_custom\Entity\Conference;
use Drupal\pnwds_custom\Entity\Session;
use Drupal\pnwds_custom\Entity\SessionSlot;
use Drupal\pnwds_custom\Entity\TimeSlot;
use Drupal\pnwds_custom\Form\TagsFilter;
use Drupal\taxonomy\Entity\Vocabulary;

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
    $view_builder = \Drupal::entityTypeManager()
      ->getViewBuilder('conference');

    $block = [];

    $conference = Conference::load(1);
    $block['conference'] = $view_builder->view($conference);

    $session_tags = [];
    foreach($conference->field_schedule->referencedEntities() as $schedule) {
      foreach ($schedule->field_time_slots->referencedEntities() as $time_slot) {
        foreach ($time_slot->field_session_slots->referencedEntities() as $session_slot) {
          foreach ($session_slot->field_session->referencedEntities() as $session) {
            foreach ($session->field_tags->referencedEntities() as $session_tag) {
              $session_tag_machine_name = strtolower(Html::cleanCssIdentifier($session_tag->label()));
              $session_tags[$session_tag_machine_name] = $session_tag->label();
            }
          }
        }
      }
    }
    ksort($session_tags);

    $block['conference']['session_filter'] = [
      '#theme' => 'session_filter',
      '#session_tags' => $session_tags
    ];


//    $block['schedule_tag_filter_variables'] = [
//      '#theme' => 'schedule_filter_variables',
//      '#session_tags' => $session_tags
//    ];

//    $schedule_filters = [
//      '#type' => 'checkboxes',
//      '#title' => $this->t('Tags'),
//      '#title_display' => true,
//      '#id' => 'schedule-filters',
//      '#options' => $session_tags,
////      '#default_value' => $tags_parameter ? $tags_parameter : [],
//      '#weight' => '0',
//    ];
//
//    $block['conference']['schedule_filters'] = Checkboxes::processCheckboxes($schedule_filters, new FormState(), $block['conference']['schedule_filters']);

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
