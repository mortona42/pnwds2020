<?php

namespace Drupal\pnwds_custom\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Checkboxes;
use Drupal\Core\Url;
use Drupal\taxonomy\Entity\Vocabulary;
use Drupal\taxonomy\TermStorage;

/**
 * Class TagsFilter.
 */
class TagsFilter extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tags_filter';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
//    $form_state->disableCache();

    $tags =\Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('tags');

    $tags_options = [];
    foreach ($tags as $tag) {
      $tag_name = strtolower($tag->name);
      $tag_name = preg_replace('/[^a-z0-9_]+/', '-', $tag_name);
      $tags_options[$tag_name] = $tag->name;
    }

    $tags_parameter = \Drupal::requestStack()->getCurrentRequest()->query->get('tags');

    $schedule = \Drupal::requestStack()->getCurrentRequest()->attributes->get('schedule');

    $form['tags'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Tags'),
      '#options' => $tags_options,
      '#default_value' => $tags_parameter ? $tags_parameter : [],
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $tags = $form_state->getValue('tags');
    $tags = Checkboxes::getCheckedCheckboxes($tags);

    $redirect = \Drupal\Core\Url::fromRouteMatch(\Drupal::routeMatch());

    if ($tags) {
      $redirect->setRouteParameter('tags', $tags);
    }

    $form_state->setRedirectUrl($redirect);
  }

}
