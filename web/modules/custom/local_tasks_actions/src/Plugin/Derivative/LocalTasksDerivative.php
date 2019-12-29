<?php

namespace Drupal\local_tasks_actions\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\ContentEntityType;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class for Config Task.
 */
class LocalTasksDerivative extends DeriverBase implements ContainerDeriverInterface {
  use StringTranslationTrait;

  /**
   * The entity manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityManager;

  /**
   * Creates an FieldUiLocalTask object.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_manager
   *   The entity manager.
   */
  public function __construct(EntityTypeManagerInterface $entity_manager) {
    $this->entityManager = $entity_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $container->get('entity.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $local_tasks = \Drupal::entityTypeManager()->getStorage('local_task')->loadMultiple();

    foreach ($local_tasks as $local_task_id => $local_task) {
      $this->derivatives['local_tasks_actions.task.' . $local_task_id] = [
        'title' => $local_task->label(),
        'route_name' => $local_task->get('route_name'),
        'base_route' => $local_task->get('base_route'),
        'parent_id' => $local_task->get('parent_id'),
        'weight' => $local_task->get('weight'),
      ];
    }

    return $this->derivatives;
  }

}
