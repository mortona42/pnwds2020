<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Session slot entities.
 *
 * @ingroup pnwds_custom
 */
interface SessionSlotInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Session slot name.
   *
   * @return string
   *   Name of the Session slot.
   */
//  public function getName();

  /**
   * Sets the Session slot name.
   *
   * @param string $name
   *   The Session slot name.
   *
   * @return \Drupal\pnwds_custom\Entity\SessionSlotInterface
   *   The called Session slot entity.
   */
//  public function setName($name);

  /**
   * Gets the Session slot creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Session slot.
   */
  public function getCreatedTime();

  /**
   * Sets the Session slot creation timestamp.
   *
   * @param int $timestamp
   *   The Session slot creation timestamp.
   *
   * @return \Drupal\pnwds_custom\Entity\SessionSlotInterface
   *   The called Session slot entity.
   */
  public function setCreatedTime($timestamp);

}
