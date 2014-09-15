<?php
/**
 * @file
 * pnwds_local_attractions.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function pnwds_local_attractions_taxonomy_default_vocabularies() {
  return array(
    'venue_type' => array(
      'name' => 'Venue Type',
      'machine_name' => 'venue_type',
      'description' => '',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
    ),
  );
}
