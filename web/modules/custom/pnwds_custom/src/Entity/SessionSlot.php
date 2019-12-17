<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Session slot entity.
 *
 * @ingroup pnwds_custom
 *
 * @ContentEntityType(
 *   id = "session_slot",
 *   label = @Translation("Session slot"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\pnwds_custom\SessionSlotListBuilder",
 *     "views_data" = "Drupal\pnwds_custom\Entity\SessionSlotViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\pnwds_custom\Form\SessionSlotForm",
 *       "add" = "Drupal\pnwds_custom\Form\SessionSlotForm",
 *       "edit" = "Drupal\pnwds_custom\Form\SessionSlotForm",
 *       "delete" = "Drupal\pnwds_custom\Form\SessionSlotDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\pnwds_custom\SessionSlotHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\pnwds_custom\SessionSlotAccessControlHandler",
 *   },
 *   base_table = "session_slot",
 *   translatable = FALSE,
 *   admin_permission = "administer session slot entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *   },
 *   links = {
 *     "canonical" = "/admin/conference/session_slot/{session_slot}",
 *     "add-form" = "/admin/conference/session_slot/add",
 *     "edit-form" = "/admin/conference/session_slot/{session_slot}/edit",
 *     "delete-form" = "/admin/conference/session_slot/{session_slot}/delete",
 *     "collection" = "/admin/conference/session_slot",
 *   },
 *   field_ui_base_route = "session_slot.settings"
 * )
 */
class SessionSlot extends ContentEntityBase implements SessionSlotInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
//  public function getName() {
//    return $this->get('name')->value;
//  }
//
//  /**
//   * {@inheritdoc}
//   */
//  public function setName($name) {
//    $this->set('name', $name);
//    return $this;
//  }

  /**
   * {@inheritdoc}
   */
  public function label() {
    return $this->id();
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

//    $fields['name'] = BaseFieldDefinition::create('string')
//      ->setLabel(t('Session slot name'))
//      ->setDescription(t('The name of the Session slot entity.'))
//      ->setSettings([
//        'max_length' => 50,
//        'text_processing' => 0,
//      ])
//      ->setDefaultValue('')
//      ->setDisplayOptions('view', [
//        'label' => 'above',
//        'type' => 'string',
//        'weight' => -4,
//      ])
//      ->setDisplayOptions('form', [
//        'type' => 'string_textfield',
//        'weight' => -4,
//      ])
//      ->setDisplayConfigurable('form', TRUE)
//      ->setDisplayConfigurable('view', TRUE)
//      ->setRequired(TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
