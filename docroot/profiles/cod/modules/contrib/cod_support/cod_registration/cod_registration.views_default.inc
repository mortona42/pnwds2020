<?php
/**
 * @file
 * cod_registration.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function cod_registration_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'cod_registration_tickets';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'ticket_registration';
  $view->human_name = 'cod_registration_tickets';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['access']['perm'] = 'view all ticket registrations';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '50';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['style_plugin'] = 'table';
  $handler->display->display_options['style_options']['columns'] = array(
    'trid' => 'trid',
    'field_profile_first' => 'field_profile_first',
    'field_profile_last' => 'field_profile_last',
    'mail' => 'mail',
  );
  $handler->display->display_options['style_options']['default'] = '-1';
  $handler->display->display_options['style_options']['info'] = array(
    'trid' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_profile_first' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'field_profile_last' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
    'mail' => array(
      'sortable' => 0,
      'default_sort_order' => 'asc',
      'align' => '',
      'separator' => '',
      'empty_column' => 0,
    ),
  );
  /* Header: Global: Result summary */
  $handler->display->display_options['header']['result']['id'] = 'result';
  $handler->display->display_options['header']['result']['table'] = 'views';
  $handler->display->display_options['header']['result']['field'] = 'result';
  /* Header: Global: Text area */
  $handler->display->display_options['header']['area']['id'] = 'area';
  $handler->display->display_options['header']['area']['table'] = 'views';
  $handler->display->display_options['header']['area']['field'] = 'area';
  $handler->display->display_options['header']['area']['content'] = '<ul class="action-links"><li><?php print l(\'New Registration\', \'node/3200\'); ?></li></ul>';
  $handler->display->display_options['header']['area']['format'] = 'php_code';
  /* Relationship: Ticket registration: Ticket Type */
  $handler->display->display_options['relationships']['ticket_type_ttid']['id'] = 'ticket_type_ttid';
  $handler->display->display_options['relationships']['ticket_type_ttid']['table'] = 'ticket_registration';
  $handler->display->display_options['relationships']['ticket_type_ttid']['field'] = 'ticket_type_ttid';
  $handler->display->display_options['relationships']['ticket_type_ttid']['required'] = TRUE;
  /* Relationship: Ticket registration: Attendee */
  $handler->display->display_options['relationships']['user']['id'] = 'user_uid';
  $handler->display->display_options['relationships']['user']['table'] = 'ticket_registration';
  $handler->display->display_options['relationships']['user']['field'] = 'user_uid';
  $handler->display->display_options['relationships']['user']['required'] = TRUE;
  /* Field: Ticket registration: Ticket Registration ID */
  $handler->display->display_options['fields']['trid']['id'] = 'trid';
  $handler->display->display_options['fields']['trid']['table'] = 'ticket_registration';
  $handler->display->display_options['fields']['trid']['field'] = 'trid';
  $handler->display->display_options['fields']['trid']['label'] = '';
  $handler->display->display_options['fields']['trid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['trid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['trid']['separator'] = '';
  /* Field: Field: First name */
  $handler->display->display_options['fields']['field_profile_first']['id'] = 'field_profile_first';
  $handler->display->display_options['fields']['field_profile_first']['table'] = 'field_data_field_profile_first';
  $handler->display->display_options['fields']['field_profile_first']['field'] = 'field_profile_first';
  /* Field: Field: Last name */
  $handler->display->display_options['fields']['field_profile_last']['id'] = 'field_profile_last';
  $handler->display->display_options['fields']['field_profile_last']['table'] = 'field_data_field_profile_last';
  $handler->display->display_options['fields']['field_profile_last']['field'] = 'field_profile_last';
  /* Field: User: E-mail */
  $handler->display->display_options['fields']['mail']['id'] = 'mail';
  $handler->display->display_options['fields']['mail']['table'] = 'users';
  $handler->display->display_options['fields']['mail']['field'] = 'mail';
  $handler->display->display_options['fields']['mail']['relationship'] = 'user';
  $handler->display->display_options['fields']['mail']['link_to_user'] = '0';
  /* Field: Field: T-shirt size */
  $handler->display->display_options['fields']['field_t_shirt_size']['id'] = 'field_t_shirt_size';
  $handler->display->display_options['fields']['field_t_shirt_size']['table'] = 'field_data_field_t_shirt_size';
  $handler->display->display_options['fields']['field_t_shirt_size']['field'] = 'field_t_shirt_size';
  /* Field: Global: Custom text */
  $handler->display->display_options['fields']['nothing']['id'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['table'] = 'views';
  $handler->display->display_options['fields']['nothing']['field'] = 'nothing';
  $handler->display->display_options['fields']['nothing']['label'] = '';
  $handler->display->display_options['fields']['nothing']['alter']['text'] = '<a href="/node/!1/tickets/checkin/[trid]">Check-in</a>';
  $handler->display->display_options['fields']['nothing']['element_label_colon'] = FALSE;
  /* Field: Ticket registration: Edit link */
  $handler->display->display_options['fields']['edit_registration']['id'] = 'edit_registration';
  $handler->display->display_options['fields']['edit_registration']['table'] = 'ticket_registration';
  $handler->display->display_options['fields']['edit_registration']['field'] = 'edit_registration';
  $handler->display->display_options['fields']['edit_registration']['label'] = 'Edit';
  /* Sort criterion: Ticket registration: Date created */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'ticket_registration';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['created']['expose']['label'] = 'Date created';
  /* Sort criterion: Field: First name (field_profile_first) */
  $handler->display->display_options['sorts']['field_profile_first_value']['id'] = 'field_profile_first_value';
  $handler->display->display_options['sorts']['field_profile_first_value']['table'] = 'field_data_field_profile_first';
  $handler->display->display_options['sorts']['field_profile_first_value']['field'] = 'field_profile_first_value';
  $handler->display->display_options['sorts']['field_profile_first_value']['relationship'] = 'user_uid';
  $handler->display->display_options['sorts']['field_profile_first_value']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['field_profile_first_value']['expose']['label'] = 'First name';
  /* Sort criterion: Field: Last name (field_profile_last) */
  $handler->display->display_options['sorts']['field_profile_last_value']['id'] = 'field_profile_last_value';
  $handler->display->display_options['sorts']['field_profile_last_value']['table'] = 'field_data_field_profile_last';
  $handler->display->display_options['sorts']['field_profile_last_value']['field'] = 'field_profile_last_value';
  $handler->display->display_options['sorts']['field_profile_last_value']['relationship'] = 'user_uid';
  $handler->display->display_options['sorts']['field_profile_last_value']['exposed'] = TRUE;
  $handler->display->display_options['sorts']['field_profile_last_value']['expose']['label'] = 'Last name';
  /* Contextual filter: Ticket type: Entity ID */
  $handler->display->display_options['arguments']['entity_id']['id'] = 'entity_id';
  $handler->display->display_options['arguments']['entity_id']['table'] = 'ticket_type';
  $handler->display->display_options['arguments']['entity_id']['field'] = 'entity_id';
  $handler->display->display_options['arguments']['entity_id']['relationship'] = 'ticket_type_ttid';
  $handler->display->display_options['arguments']['entity_id']['default_action'] = 'default';
  $handler->display->display_options['arguments']['entity_id']['default_argument_type'] = 'cod_events_default_event';
  $handler->display->display_options['arguments']['entity_id']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['entity_id']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['entity_id']['summary_options']['items_per_page'] = '25';
  /* Filter criterion: Field: First name (field_profile_first) */
  $handler->display->display_options['filters']['field_profile_first_value']['id'] = 'field_profile_first_value';
  $handler->display->display_options['filters']['field_profile_first_value']['table'] = 'field_data_field_profile_first';
  $handler->display->display_options['filters']['field_profile_first_value']['field'] = 'field_profile_first_value';
  $handler->display->display_options['filters']['field_profile_first_value']['operator'] = 'contains';
  $handler->display->display_options['filters']['field_profile_first_value']['group'] = 1;
  $handler->display->display_options['filters']['field_profile_first_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_profile_first_value']['expose']['operator_id'] = 'field_profile_first_value_op';
  $handler->display->display_options['filters']['field_profile_first_value']['expose']['label'] = 'First name';
  $handler->display->display_options['filters']['field_profile_first_value']['expose']['operator'] = 'field_profile_first_value_op';
  $handler->display->display_options['filters']['field_profile_first_value']['expose']['identifier'] = 'field_profile_first_value';
  $handler->display->display_options['filters']['field_profile_first_value']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    6 => 0,
    5 => 0,
    4 => 0,
    12 => 0,
    17 => 0,
    13 => 0,
    14 => 0,
    15 => 0,
    18 => 0,
    16 => 0,
    19 => 0,
  );
  /* Filter criterion: Field: Last name (field_profile_last) */
  $handler->display->display_options['filters']['field_profile_last_value']['id'] = 'field_profile_last_value';
  $handler->display->display_options['filters']['field_profile_last_value']['table'] = 'field_data_field_profile_last';
  $handler->display->display_options['filters']['field_profile_last_value']['field'] = 'field_profile_last_value';
  $handler->display->display_options['filters']['field_profile_last_value']['operator'] = 'contains';
  $handler->display->display_options['filters']['field_profile_last_value']['group'] = 1;
  $handler->display->display_options['filters']['field_profile_last_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_profile_last_value']['expose']['operator_id'] = 'field_profile_last_value_op';
  $handler->display->display_options['filters']['field_profile_last_value']['expose']['label'] = 'Last name';
  $handler->display->display_options['filters']['field_profile_last_value']['expose']['operator'] = 'field_profile_last_value_op';
  $handler->display->display_options['filters']['field_profile_last_value']['expose']['identifier'] = 'field_profile_last_value';
  $handler->display->display_options['filters']['field_profile_last_value']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    6 => 0,
    5 => 0,
    4 => 0,
    12 => 0,
    17 => 0,
    13 => 0,
    14 => 0,
    15 => 0,
    18 => 0,
    16 => 0,
    19 => 0,
  );
  /* Filter criterion: User: E-mail */
  $handler->display->display_options['filters']['mail']['id'] = 'mail';
  $handler->display->display_options['filters']['mail']['table'] = 'users';
  $handler->display->display_options['filters']['mail']['field'] = 'mail';
  $handler->display->display_options['filters']['mail']['relationship'] = 'user';
  $handler->display->display_options['filters']['mail']['operator'] = 'contains';
  $handler->display->display_options['filters']['mail']['group'] = 1;
  $handler->display->display_options['filters']['mail']['exposed'] = TRUE;
  $handler->display->display_options['filters']['mail']['expose']['operator_id'] = 'mail_op';
  $handler->display->display_options['filters']['mail']['expose']['label'] = 'E-mail';
  $handler->display->display_options['filters']['mail']['expose']['operator'] = 'mail_op';
  $handler->display->display_options['filters']['mail']['expose']['identifier'] = 'mail';
  $handler->display->display_options['filters']['mail']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    8 => 0,
    6 => 0,
    5 => 0,
    4 => 0,
    12 => 0,
    17 => 0,
    13 => 0,
    14 => 0,
    15 => 0,
    18 => 0,
    16 => 0,
    19 => 0,
  );
  /* Filter criterion: Ticket registration: Ticket registration state (ticket_state) */
  $handler->display->display_options['filters']['ticket_state_target_id']['id'] = 'ticket_state_target_id';
  $handler->display->display_options['filters']['ticket_state_target_id']['table'] = 'field_data_ticket_state';
  $handler->display->display_options['filters']['ticket_state_target_id']['field'] = 'ticket_state_target_id';
  $handler->display->display_options['filters']['ticket_state_target_id']['exposed'] = TRUE;
  $handler->display->display_options['filters']['ticket_state_target_id']['expose']['operator_id'] = 'ticket_state_target_id_op';
  $handler->display->display_options['filters']['ticket_state_target_id']['expose']['label'] = 'Ticket registration state (ticket_state)';
  $handler->display->display_options['filters']['ticket_state_target_id']['expose']['operator'] = 'ticket_state_target_id_op';
  $handler->display->display_options['filters']['ticket_state_target_id']['expose']['identifier'] = 'ticket_state_target_id';
  $handler->display->display_options['filters']['ticket_state_target_id']['is_grouped'] = TRUE;
  $handler->display->display_options['filters']['ticket_state_target_id']['group_info']['label'] = 'Registration state';
  $handler->display->display_options['filters']['ticket_state_target_id']['group_info']['identifier'] = 'ticket_state_target_id';
  $handler->display->display_options['filters']['ticket_state_target_id']['group_info']['default_group'] = '1';
  $handler->display->display_options['filters']['ticket_state_target_id']['group_info']['group_items'] = array(
    1 => array(
      'title' => 'Completed',
      'operator' => '=',
      'value' => array(
        'value' => '31',
        'min' => '',
        'max' => '',
      ),
    ),
    2 => array(
      'title' => 'Checked In',
      'operator' => '=',
      'value' => array(
        'value' => '26',
        'min' => '',
        'max' => '',
      ),
    ),
    3 => array(
      'title' => '',
      'operator' => '=',
      'value' => array(
        'value' => '',
        'min' => '',
        'max' => '',
      ),
    ),
  );

  /* Display: Page */
  $handler = $view->new_display('page', 'Page', 'page_1');
  $handler->display->display_options['path'] = 'admin/conference/events/%/tickets/checkin';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = 'Check-in';
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $export['cod_registration_tickets'] = $view;

  return $export;
}
