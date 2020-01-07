<?php

/**
 * @file
 * Contains form_mode_routing hooks.
 */

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Hook for altering access for form routes.
 *
 * See CustomAccessCheck.php.
 *
 * @param \Drupal\Core\Access\AccessResult $result
 *   The result.
 * @param \Drupal\Core\Session\AccountInterface $account
 *   The account.
 * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
 *   The Route Match.
 */
function hook_form_mode_routing_alter_access(AccessResult &$result, AccountInterface $account, RouteMatchInterface $route_match) {
  // Here override $result example $result = AccessResult::forbidden();
}
