<?php

namespace Drupal\form_mode_routing\Access;

use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\RouteMatchInterface;

/**
 * Checks access for displaying form mode control.
 */
class CustomAccessCheck implements AccessInterface {

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The Route Match.
   */
  public function access(AccountInterface $account, RouteMatchInterface $route_match = NULL) {
    $result = AccessResult::forbidden();
    if (!empty($route_match)) {
      $route_name = $route_match->getRouteName();
      $explode = explode('form_mode_routing.', $route_name);
      if (!empty($explode[1])) {
        $modes = \Drupal::entityTypeManager()->getStorage('form_routing_entity')->loadByProperties([
          'label' => $explode[1],
        ]);
        if (count($modes) == 1) {
          $mode = reset($modes);
          $access = $mode->getAccess();
          $roles = $account->getRoles();

          if ($account->id() == 1) {
            $result = AccessResult::allowed();
          }
          foreach ($access as $role) {
            if (in_array($role, $roles)) {
              $result = AccessResult::allowed();
            }
          }
        }
      }
      // Hook here for people to change access with out a subscriber.
      \Drupal::moduleHandler()->invokeAll('form_mode_routing_alter_access', [
        &$result,
        $account,
        $route_match,
      ]);
    }
    return $result;
  }

}
