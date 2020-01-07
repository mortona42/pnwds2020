<?php

namespace Drupal\local_tasks_actions\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LocalTaskForm.
 */
class LocalTaskForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $local_task = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $local_task->label(),
      '#description' => $this->t("Label for the Local task."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $local_task->id(),
      '#machine_name' => [
        'exists' => '\Drupal\local_tasks_actions\Entity\LocalTask::load',
      ],
      '#disabled' => !$local_task->isNew(),
    ];

    $form['route_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Route name'),
      '#default_value' => $local_task->get('route_name'),
    ];

    $form['base_route'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Base route'),
      '#default_value' => $local_task->get('base_route'),
    ];

    $form['parent_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Parent id'),
      '#default_value' => $local_task->get('parent_id'),
    ];

    $form['weight'] = [
      '#type' => 'textfiled',
      '#title' => $this->t('Weight'),
      '#default_value' => $local_task->get('weight'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $local_task = $this->entity;
    $local_task->save();

    $form_state->setRedirectUrl($local_task->toUrl('collection'));
  }

}
