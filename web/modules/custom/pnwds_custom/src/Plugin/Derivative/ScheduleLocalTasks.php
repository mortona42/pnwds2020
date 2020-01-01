<?php

namespace Drupal\pnwds_custom\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Component\Utility\Html;

/**
 * Tabs for schedule view.
 */
class ScheduleLocalTasks extends DeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $days = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('days');
    foreach ($days as $day) {
      $day_id = Html::cleanCssIdentifier($day->name);
      $this->derivatives[$day_id] = $base_plugin_definition;
      $this->derivatives[$day_id]['title'] = $day->name;
      $this->derivatives[$day_id]['route_parameters']['arg_0'] = strtolower($day->name);
    }
    return parent::getDerivativeDefinitions($base_plugin_definition);
  }

}
