<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Time slot entities.
 *
 * @ingroup pnwds_custom
 */
interface TimeSlotInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Time slot name.
   *
   * @return string
   *   Name of the Time slot.
   */
  public function getName();

  /**
   * Sets the Time slot name.
   *
   * @param string $name
   *   The Time slot name.
   *
   * @return \Drupal\pnwds_custom\Entity\TimeSlotInterface
   *   The called Time slot entity.
   */
  public function setName($name);

  /**
   * Gets the Time slot creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Time slot.
   */
  public function getCreatedTime();

  /**
   * Sets the Time slot creation timestamp.
   *
   * @param int $timestamp
   *   The Time slot creation timestamp.
   *
   * @return \Drupal\pnwds_custom\Entity\TimeSlotInterface
   *   The called Time slot entity.
   */
  public function setCreatedTime($timestamp);

}
