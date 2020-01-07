<?php

namespace Drupal\form_mode_routing\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class FormRoutingEntityForm.
 */
class FormRoutingEntityForm extends EntityForm {

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager) {
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);
    $form_routing_entity = $this->entity;

    $access = $form_routing_entity->getAccess();
    $form['info'] = [
      '#markup' => $this->t('<a href="/admin/structure/display-modes/form/add/node">Create New Form mode</a> then add to your content type.'),
    ];
    $form_modes = \Drupal::service('entity_display.repository')->getAllFormModes();

    if (!empty($form_modes)) {
      // dump($form_modes['node']);.
      $form_mode_options = [];
      foreach ($form_modes as $ke => $v) {
        foreach ($v as $key => $value) {
          $id = $value['id'];
          $form_mode_options[$id] = $value['id'] . ' - for edit  ' . $ke;
        }

      }
      $these_entities = $this->entityTypeManager->getStorage('form_routing_entity')->loadMultiple();
      if (count($these_entities) != 0) {
        foreach ($these_entities as $from_mode_entity) {
          $lab = $from_mode_entity->label();
          unset($form_mode_options[$lab]);
        }
      }

      if (empty($form_mode_options) && empty($from_mode_entity->label())) {
        $this->messenger()->addMessage('You need to create more Form modes');
      }
      // $types = \Drupal::service('entity_typemanager')->getStorage('node')->loadMultiple();
      $bundle_label = \Drupal::entityTypeManager()
        ->getStorage('node_type')->loadMultiple();

      $roles = \Drupal::entityTypeManager()->getStorage('user_role')->loadMultiple();
      $role_op = [];
      foreach ($roles as $role_id => $role_obj) {
        $role_op[$role_id] = $role_obj->get('label');
      }

      if (!empty($form_routing_entity) && !empty($form_routing_entity->label())) {
        $form_mode_options[$form_routing_entity->label()] = $form_routing_entity->label();
      }

      $form['label'] = [
        '#type' => 'select',
        '#options' => $form_mode_options,
        '#title' => $this->t('Form Mode'),
        '#maxlength' => 255,
        '#default_value' => $form_routing_entity->label(),
        '#description' => $this->t("Label for the Form routing entity."),
        '#required' => TRUE,
      ];

      $form['id'] = [
        '#type' => 'machine_name',
        '#default_value' => $form_routing_entity->id(),
        '#machine_name' => [
          'exists' => '\Drupal\form_mode_routing\Entity\FormRoutingEntity::load',
        ],
        '#disabled' => !$form_routing_entity->isNew(),
      ];

      $form['path'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Path'),
        '#description' => $this->t("must include {node} some where in it example /something/{node}/something"),
        '#required' => TRUE,
        '#default_value' => $form_routing_entity->path,
      ];

      $form['access'] = [
        '#type' => 'checkboxes',
        '#options' => $role_op,
        '#title' => $this->t('Role that can Access'),
        '#description' => $this->t("what roles can access this form mode"),
        '#required' => TRUE,
      ];
      if (!empty($access)) {
        $form['access']['#default_value'] = array_values($access);
      }

      $form['admin'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Admin theme'),
        '#description' => $this->t('Show form in admin theme'),
        '#default_value' => $form_routing_entity->admin,
      ];

    }
    else {
      $this->messenger()->addMessage($this->t('Please create some form modes first.'));
    }
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
    $access = $form_state->getValue('access');
    $striped_access = [];
    foreach ($access as $key => $val) {
      if (!empty($val)) {
        $striped_access[$key] = $val;
      }
    }

    if (count($striped_access) == 0) {
      $form_state->setErrorByName('access', t('You need at least one access role.'));
    }
    else {
      $form_state->setValue('access', $striped_access);
    }

    // Attempt to at least try something with the path.
    $path = $form_state->getValue('path');
    // Check if first char is a slash.
    if ($path[0] !== '/') {
      // Dont be mean just add it for them.
      $path = '/' . $path;
    }
    // Check  if path contains "{".
    if (strpos($path, '/{') !== FALSE) {
      // Cool. lets make sure the close it.
      if (strpos($path, '}') !== FALSE) {
        // This is kinda valid.
      }
      else {
        $form_state->setErrorByName('path', t('Path must contain "}".  For example:  "/test/{node}" = /test/1'));
      }

    }
    else {
      $form_state->setErrorByName('path', t('Path must contain "/{".  For example:  "/test/{node}/edit" = /test/1/edit'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $form_routing_entity = $this->entity;
    $access = $form_state->getValue('access');
    $form_routing_entity->setAccess($access);

    $status = $form_routing_entity->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Form routing entity.', [
          '%label' => $form_routing_entity->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Form routing entity.', [
          '%label' => $form_routing_entity->label(),
        ]));
    }
    // Trigger cache rebuild as it is needed for access and route.
    drupal_flush_all_caches();
    $form_state->setRedirectUrl($form_routing_entity->toUrl('collection'));
  }

}
