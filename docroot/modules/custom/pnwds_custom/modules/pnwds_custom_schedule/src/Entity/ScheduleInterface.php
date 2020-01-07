<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Schedule entities.
 *
 * @ingroup pnwds_custom
 */
interface ScheduleInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Schedule name.
   *
   * @return string
   *   Name of the Schedule.
   */
  public function getName();

  /**
   * Sets the Schedule name.
   *
   * @param string $name
   *   The Schedule name.
   *
   * @return \Drupal\pnwds_custom\Entity\ScheduleInterface
   *   The called Schedule entity.
   */
  public function setName($name);

  /**
   * Gets the Schedule creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Schedule.
   */
  public function getCreatedTime();

  /**
   * Sets the Schedule creation timestamp.
   *
   * @param int $timestamp
   *   The Schedule creation timestamp.
   *
   * @return \Drupal\pnwds_custom\Entity\ScheduleInterface
   *   The called Schedule entity.
   */
  public function setCreatedTime($timestamp);

}
