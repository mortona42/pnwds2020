<?php
// $Id: updown.inc,v 1.1.2.2 2010/12/21 08:18:23 realityloop Exp $

/**
 * @file
 * Up Down Widget.
 */

/**
 * Implementation of hook_vud_widgets(). (Specialized)
 */
function bluecheese_groups_vud_widgets() {
  return array(
    'title' => t('Groups'),
    'widget template' => 'widget',
  );
}