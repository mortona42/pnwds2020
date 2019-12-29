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
class LocalActionsDerivative extends DeriverBase implements ContainerDeriverInterface {
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
    $local_actions = \Drupal::entityTypeManager()->getStorage('local_action')->loadMultiple();

    foreach ($local_actions as $local_action_id => $local_action) {
      $this->derivatives['local_tasks_actions.action.' . $local_action_id] = [
        'title' => $local_action->label(),
        'route_name' => $local_action->get('route_name'),
        'weight' => $local_action->get('weight'),
        'appears_on' => [
          $local_action->get('appears_on')
        ]
      ];
    }

    return $this->derivatives;
  }

}
