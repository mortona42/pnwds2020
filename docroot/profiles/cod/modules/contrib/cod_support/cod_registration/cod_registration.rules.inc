<?php

/**
 * Implements hook_rules_event_info().
 */
function cod_registration_rules_event_info() {
  $events = array();

  $events['cod_registration_state_update'] = array(
    'label' => t('Completing the checkout process'),
    'group' => t('Commerce Checkout'),
    'variables' => array(
      'commerce_order' => array(
        'type' => 'commerce_order',
        'label' => t('Completed order', array(), array('context' => 'a drupal commerce order')),
      ),
    ),
    'access callback' => 'commerce_order_rules_access',
  );

  return $events;
}