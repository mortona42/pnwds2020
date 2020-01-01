<?php

namespace Drupal\pnwds_custom\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Component\Utility\Html;
use Drupal\taxonomy\Entity\Term;
use Drupal\taxonomy\Entity\Vocabulary;

/**
 * Defines dynamic local tasks.
 */
class ScheduleLocalTasks extends DeriverBase {

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $days = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('days');
    foreach ($days as $day) {
      // Implement dynamic logic to provide values for the same keys as in example.links.task.yml.
      $this->derivatives[Html::cleanCssIdentifier($day->name)] = $base_plugin_definition;
      $this->derivatives[Html::cleanCssIdentifier($day->name)]['title'] = $day->name;
      $this->derivatives[Html::cleanCssIdentifier($day->name)]['route_name'] = 'view.schedule.page';
    }
    return parent::getDerivativeDefinitions($base_plugin_definition);
  }

}
