<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Conference entity.
 *
 * @ingroup pnwds_custom
 *
 * @ContentEntityType(
 *   id = "conference",
 *   label = @Translation("Conference"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\pnwds_custom\ConferenceListBuilder",
 *     "views_data" = "Drupal\pnwds_custom\Entity\ConferenceViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\pnwds_custom\Form\ConferenceForm",
 *       "add" = "Drupal\pnwds_custom\Form\ConferenceForm",
 *       "edit" = "Drupal\pnwds_custom\Form\ConferenceForm",
 *       "delete" = "Drupal\pnwds_custom\Form\ConferenceDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\pnwds_custom\ConferenceHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\pnwds_custom\ConferenceAccessControlHandler",
 *   },
 *   base_table = "conference",
 *   translatable = FALSE,
 *   admin_permission = "administer conference entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/conference/{conference}",
 *     "add-form" = "/admin/conference/conference/add",
 *     "edit-form" = "/admin/conference/conference/{conference}/edit",
 *     "delete-form" = "/admin/conference/conference/{conference}/delete",
 *     "collection" = "/admin/conference/conference",
 *   },
 *   field_ui_base_route = "conference.settings"
 * )
 */
class Conference extends ContentEntityBase implements ConferenceInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Conference.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Conference is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
