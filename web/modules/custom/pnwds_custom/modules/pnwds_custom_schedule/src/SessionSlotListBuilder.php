<?php

namespace Drupal\pnwds_custom;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Session slot entities.
 *
 * @ingroup pnwds_custom
 */
class SessionSlotListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Session slot ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\pnwds_custom\Entity\SessionSlot $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.session_slot.edit_form',
      ['session_slot' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
