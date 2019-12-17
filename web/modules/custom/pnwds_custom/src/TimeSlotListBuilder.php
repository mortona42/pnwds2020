<?php

namespace Drupal\pnwds_custom;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Time slot entities.
 *
 * @ingroup pnwds_custom
 */
class TimeSlotListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Time slot ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\pnwds_custom\Entity\TimeSlot $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.time_slot.edit_form',
      ['time_slot' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
