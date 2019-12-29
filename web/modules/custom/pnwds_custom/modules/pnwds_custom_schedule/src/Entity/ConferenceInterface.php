<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Conference entities.
 *
 * @ingroup pnwds_custom
 */
interface ConferenceInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Conference name.
   *
   * @return string
   *   Name of the Conference.
   */
  public function getName();

  /**
   * Sets the Conference name.
   *
   * @param string $name
   *   The Conference name.
   *
   * @return \Drupal\pnwds_custom\Entity\ConferenceInterface
   *   The called Conference entity.
   */
  public function setName($name);

  /**
   * Gets the Conference creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Conference.
   */
  public function getCreatedTime();

  /**
   * Sets the Conference creation timestamp.
   *
   * @param int $timestamp
   *   The Conference creation timestamp.
   *
   * @return \Drupal\pnwds_custom\Entity\ConferenceInterface
   *   The called Conference entity.
   */
  public function setCreatedTime($timestamp);

}
