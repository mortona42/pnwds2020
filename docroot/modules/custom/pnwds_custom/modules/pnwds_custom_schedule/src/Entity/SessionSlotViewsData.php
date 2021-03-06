<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Session slot entities.
 */
class SessionSlotViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
