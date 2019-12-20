<?php

namespace Drupal\pnwds_custom;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Time slot entity.
 *
 * @see \Drupal\pnwds_custom\Entity\TimeSlot.
 */
class TimeSlotAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\pnwds_custom\Entity\TimeSlotInterface $entity */

    switch ($operation) {

      case 'view':

        return AccessResult::allowedIfHasPermission($account, 'access content');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit time slot entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete time slot entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add time slot entities');
  }


}
