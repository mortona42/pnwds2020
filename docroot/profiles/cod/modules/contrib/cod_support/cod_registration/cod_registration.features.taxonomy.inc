<?php
/**
 * @file
 * cod_registration.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function cod_registration_taxonomy_default_vocabularies() {
  return array(
    'checkin_types' => array(
      'name' => 'Checkin Types',
      'machine_name' => 'checkin_types',
      'description' => 'Event Checkin Types',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
