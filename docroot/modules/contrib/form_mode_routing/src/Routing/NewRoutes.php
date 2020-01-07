<?php

namespace Drupal\form_mode_routing\Routing;

use Symfony\Component\Routing\Route;

/**
 * Defines dynamic routes for form modes.
 */
class NewRoutes {

  /**
   * {@inheritdoc}
   */
  public function routes() {
    // @todo depency inject these.
    $modes = \Drupal::entityTypeManager()->getStorage('form_routing_entity')->loadMultiple();
    $route_provider = \Drupal::service('router.route_provider');
    // Create new if dont exist.
    $routes = [];

    if (!empty($modes)) {
      foreach ($modes as $mode) {
        $exists = FALSE;
        $form_mode = $mode->label();
        $entity_details = explode('.', $form_mode);

        $entity_type = $entity_details[0];
        if ($entity_type == 'group') {
          // Left to debug your entity type.
          // dump(\Drupal::entityTypeManager()->getDefinition($entity_type));
        }

        $title = 'Edit';
        if (!empty($mode->title)) {
          $title = $mode->title;
        }
        $route_name = 'form_mode_routing.' . $form_mode;

        if ($exists == FALSE) {
          // Create.
          $routes[$route_name] = new Route(
          // Path to attach this route to:
            $mode->path,
            // Route defaults:
            [
              '_entity_form' => $form_mode,
              '_title_callback' => '\Drupal\Core\Entity\Controller\EntityController::title',
            ],
            // Route requirements:
            [
              '_custom_access'  => '\Drupal\form_mode_routing\Access\CustomAccessCheck::access',
            ],
            // Route Options.
            [
              '_admin_route' => $mode->admin
            ],
            // Route host.
            '',
            [],
            [
              'GET',
              'POST',
            ]
          );
        }
      }
    }
    return $routes;

  }

}
