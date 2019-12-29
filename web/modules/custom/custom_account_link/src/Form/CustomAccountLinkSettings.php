<?php

namespace Drupal\custom_account_link\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CustomAccountLinkConfigForm.
 */
class CustomAccountLinkSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'custom_account_link.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_account_link_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('custom_account_link.settings');

    $form['label_source'] = [
      '#type' => 'radios',
      '#title' => $this->t('Label source'),
      '#options' => ['text' => $this->t('Text'), 'username' => $this->t('Username')],
      '#default_value' => $config->get('label_source')
    ];

    $form['label_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#default_value' => $config->get('label_text'),
      '#states' => [
        'visible' => [
          ':input[name="label_source"]' => ['value' => 'text']
        ]
      ]
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('custom_account_link.settings')
      ->set('label_source', $form_state->getValue('label_source'))
      ->set('label_text', $form_state->getValue('label_text'))
      ->save();
  }

}
