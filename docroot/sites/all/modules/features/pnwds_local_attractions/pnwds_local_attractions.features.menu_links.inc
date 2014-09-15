<?php
/**
 * @file
 * pnwds_local_attractions.features.menu_links.inc
 */

/**
 * Implements hook_menu_default_menu_links().
 */
function pnwds_local_attractions_menu_default_menu_links() {
  $menu_links = array();

  // Exported menu link: main-menu_whats-around:locations
  $menu_links['main-menu_whats-around:locations'] = array(
    'menu_name' => 'main-menu',
    'link_path' => 'locations',
    'router_path' => 'locations',
    'link_title' => 'What\'s Around',
    'options' => array(
      'identifier' => 'main-menu_whats-around:locations',
    ),
    'module' => 'system',
    'hidden' => 1,
    'external' => 0,
    'has_children' => 0,
    'expanded' => 0,
    'weight' => 0,
    'customized' => 1,
  );
  // Translatables
  // Included for use with string extractors like potx.
  t('What\'s Around');


  return $menu_links;
}
