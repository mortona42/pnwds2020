<?php

namespace Drupal\local_tasks_actions\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LocalActionForm.
 */
class LocalActionForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $local_action = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#maxlength' => 255,
      '#default_value' => $local_action->label(),
      '#description' => $this->t("Local action title."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $local_action->id(),
      '#machine_name' => [
        'exists' => '\Drupal\local_tasks_actions\Entity\LocalAction::load',
      ],
      '#disabled' => !$local_action->isNew(),
    ];

    $form['route_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Route name'),
      '#default_value' => $local_action->get('route_name'),
    ];

    $form['appears_on'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Appears on'),
      '#default_value' => $local_action->get('appears_on'),
    ];

    $form['weight'] = [
      '#type' => 'textfiled',
      '#title' => $this->t('Weight'),
      '#default_value' => $local_action->get('weight'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $local_action = $this->entity;
    $local_action->save();

    $form_state->setRedirectUrl($local_action->toUrl('collection'));
  }

}
