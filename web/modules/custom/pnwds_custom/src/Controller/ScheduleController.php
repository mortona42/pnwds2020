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

    return $block;
  }

}
