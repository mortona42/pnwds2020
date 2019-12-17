<?php

namespace Drupal\pnwds_custom;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Session slot entity.
 *
 * @see \Drupal\pnwds_custom\Entity\SessionSlot.
 */
class SessionSlotAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\pnwds_custom\Entity\SessionSlotInterface $entity */

    switch ($operation) {

      case 'view':

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit session slot entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete session slot entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add session slot entities');
  }


}
