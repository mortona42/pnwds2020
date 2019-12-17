<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Schedule entity.
 *
 * @ingroup pnwds_custom
 *
 * @ContentEntityType(
 *   id = "schedule",
 *   label = @Translation("Schedule"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\pnwds_custom\ScheduleListBuilder",
 *     "views_data" = "Drupal\pnwds_custom\Entity\ScheduleViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\pnwds_custom\Form\ScheduleForm",
 *       "add" = "Drupal\pnwds_custom\Form\ScheduleForm",
 *       "edit" = "Drupal\pnwds_custom\Form\ScheduleForm",
 *       "delete" = "Drupal\pnwds_custom\Form\ScheduleDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\pnwds_custom\ScheduleHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\pnwds_custom\ScheduleAccessControlHandler",
 *   },
 *   base_table = "schedule",
 *   translatable = FALSE,
 *   admin_permission = "administer schedule entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/conference/schedule/{schedule}",
 *     "add-form" = "/admin/conference/schedule/add",
 *     "edit-form" = "/admin/conference/schedule/{schedule}/edit",
 *     "delete-form" = "/admin/conference/schedule/{schedule}/delete",
 *     "collection" = "/admin/conference/schedule",
 *   },
 *   field_ui_base_route = "schedule.settings"
 * )
 */
class Schedule extends ContentEntityBase implements ScheduleInterface {

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
      ->setDescription(t('Schedule name. IE "Day 1" or "Tuesday".'))
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

    $fields['status']->setDescription(t('A boolean indicating whether the Schedule is published.'))
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
