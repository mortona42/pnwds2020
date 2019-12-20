<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Time slot entity.
 *
 * @ingroup pnwds_custom
 *
 * @ContentEntityType(
 *   id = "time_slot",
 *   label = @Translation("Time slot"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\pnwds_custom\TimeSlotListBuilder",
 *     "views_data" = "Drupal\pnwds_custom\Entity\TimeSlotViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\pnwds_custom\Form\TimeSlotForm",
 *       "add" = "Drupal\pnwds_custom\Form\TimeSlotForm",
 *       "edit" = "Drupal\pnwds_custom\Form\TimeSlotForm",
 *       "delete" = "Drupal\pnwds_custom\Form\TimeSlotDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\pnwds_custom\TimeSlotHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\pnwds_custom\TimeSlotAccessControlHandler",
 *   },
 *   base_table = "time_slot",
 *   translatable = FALSE,
 *   admin_permission = "administer time slot entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *   },
 *   links = {
 *     "canonical" = "/admin/conference/time_slot/{time_slot}",
 *     "add-form" = "/admin/conference/time_slot/add",
 *     "edit-form" = "/admin/conference/time_slot/{time_slot}/edit",
 *     "delete-form" = "/admin/conference/time_slot/{time_slot}/delete",
 *     "collection" = "/admin/conference/time_slot",
 *   },
 *   field_ui_base_route = "time_slot.settings"
 * )
 */
class TimeSlot extends ContentEntityBase implements TimeSlotInterface {

  use EntityChangedTrait;
//  use EntityPublishedTrait;

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

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Time slot name'))
      ->setDescription(t('Time slot name. IE "Registration" or "Session 1".'))
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

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
