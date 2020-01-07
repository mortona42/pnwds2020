<?php

namespace Drupal\pnwds_custom\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Session entities.
 *
 * @ingroup pnwds_custom
 */
interface SessionInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface, EntityOwnerInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Session name.
   *
   * @return string
   *   Name of the Session.
   */
  public function getName();

  /**
   * Sets the Session name.
   *
   * @param string $name
   *   The Session name.
   *
   * @return \Drupal\pnwds_custom\Entity\SessionInterface
   *   The called Session entity.
   */
  public function setName($name);

  /**
   * Gets the Session creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Session.
   */
  public function getCreatedTime();

  /**
   * Sets the Session creation timestamp.
   *
   * @param int $timestamp
   *   The Session creation timestamp.
   *
   * @return \Drupal\pnwds_custom\Entity\SessionInterface
   *   The called Session entity.
   */
  public function setCreatedTime($timestamp);

}
