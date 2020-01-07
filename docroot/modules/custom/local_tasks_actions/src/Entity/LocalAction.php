<?php

namespace Drupal\local_tasks_actions\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Local action entity.
 *
 * @ConfigEntityType(
 *   id = "local_action",
 *   label = @Translation("Local action"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\local_tasks_actions\LocalActionListBuilder",
 *     "form" = {
 *       "add" = "Drupal\local_tasks_actions\Form\LocalActionForm",
 *       "edit" = "Drupal\local_tasks_actions\Form\LocalActionForm",
 *       "delete" = "Drupal\local_tasks_actions\Form\LocalActionDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\local_tasks_actions\LocalActionHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "local_action",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/local_tasks_actions/local_action/{local_action}",
 *     "add-form" = "/admin/structure/local_tasks_actions/local_action/add",
 *     "edit-form" = "/admin/structure/local_tasks_actions/local_action/{local_action}/edit",
 *     "delete-form" = "/admin/structure/local_tasks_actions/local_action/{local_action}/delete",
 *     "collection" = "/admin/structure/local_tasks_actions/actions"
 *   }
 * )
 */
class LocalAction extends ConfigEntityBase implements LocalActionInterface {

  /**
   * The Local action ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Local action label.
   *
   * @var string
   */
  protected $label;

}
