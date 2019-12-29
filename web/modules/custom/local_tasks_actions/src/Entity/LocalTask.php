<?php

namespace Drupal\local_tasks_actions\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Local task entity.
 *
 * @ConfigEntityType(
 *   id = "local_task",
 *   label = @Translation("Local task"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\local_tasks_actions\LocalTaskListBuilder",
 *     "form" = {
 *       "add" = "Drupal\local_tasks_actions\Form\LocalTaskForm",
 *       "edit" = "Drupal\local_tasks_actions\Form\LocalTaskForm",
 *       "delete" = "Drupal\local_tasks_actions\Form\LocalTaskDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\local_tasks_actions\LocalTaskHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "local_task",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/local_tasks_actions/local_task/{local_task}",
 *     "add-form" = "/admin/structure/local_tasks_actions/local_task/add",
 *     "edit-form" = "/admin/structure/local_tasks_actions/local_task/{local_task}/edit",
 *     "delete-form" = "/admin/structure/local_tasks_actions/local_task/{local_task}/delete",
 *     "collection" = "/admin/structure/local_tasks_actions/tasks"
 *   }
 * )
 */
class LocalTask extends ConfigEntityBase implements LocalTaskInterface {

  /**
   * The Local task ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Local task label.
   *
   * @var string
   */
  protected $label;

}
