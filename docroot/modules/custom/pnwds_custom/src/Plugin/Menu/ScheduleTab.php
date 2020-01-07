<?php

namespace Drupal\pnwds_custom\Plugin\Menu;

use Drupal\Core\Menu\LocalTaskDefault;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Provides route parameters needed to link to the current user tracker tab.
 */
class ScheduleTab extends LocalTaskDefault {

  /**
   * {@inheritdoc}
   */
  public function getRouteParameters(RouteMatchInterface $route_match) {
    $day = $this->getPluginDefinition()['title'];
    return ['arg_0' => $day];
  }

}
