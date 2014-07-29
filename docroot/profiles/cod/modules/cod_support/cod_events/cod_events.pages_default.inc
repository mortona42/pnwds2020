<?php
/**
 * @file
 * cod_events.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_pages().
 */
function cod_events_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'cod_event_page';
  $page->task = 'page';
  $page->admin_title = 'COD Event Page';
  $page->admin_description = 'Panel page for Events';
  $page->path = 'node/%node/event_display';
  $page->access = array();
  $page->menu = array();
  $page->arguments = array(
    'node' => array(
      'id' => 1,
      'identifier' => 'Node: ID',
      'name' => 'entity_id:node',
      'settings' => array(),
    ),
  );
  $page->conf = array(
    'admin_paths' => FALSE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_cod_event_page_panel_context';
  $handler->task = 'page';
  $handler->subtask = 'cod_event_page';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Panel',
    'no_blocks' => 0,
    'pipeline' => 'standard',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
  );
  $display = new panels_display();
  $display->layout = 'mondrian';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'content' => NULL,
      'main' => NULL,
      'secondary' => NULL,
      'tertiary-first' => NULL,
      'tertiary-second' => NULL,
      'tertiary-third' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '%node:title';
  $display->uuid = '3872f757-bc34-4373-9fb4-47ac2be5b5c6';
  $display->content = array();
  $display->panels = array();
    $pane = new stdClass();
    $pane->pid = 'new-8a4f7b23-13b7-45c9-8b14-72d6f4411160';
    $pane->panel = 'main';
    $pane->type = 'entity_field';
    $pane->subtype = 'node:field_dates';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array(
      'label' => 'hidden',
      'formatter' => 'date_default',
      'delta_limit' => 0,
      'delta_offset' => '0',
      'delta_reversed' => FALSE,
      'formatter_settings' => array(
        'format_type' => 'long',
        'multiple_number' => '',
        'multiple_from' => '',
        'multiple_to' => '',
        'fromto' => 'both',
      ),
      'context' => 'argument_entity_id:node_1',
      'override_title' => 0,
      'override_title_text' => '',
    );
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = '8a4f7b23-13b7-45c9-8b14-72d6f4411160';
    $display->content['new-8a4f7b23-13b7-45c9-8b14-72d6f4411160'] = $pane;
    $display->panels['main'][0] = 'new-8a4f7b23-13b7-45c9-8b14-72d6f4411160';
    $pane = new stdClass();
    $pane->pid = 'new-9ad5b6db-a919-42ac-acdd-219b767d64f6';
    $pane->panel = 'main';
    $pane->type = 'entity_field';
    $pane->subtype = 'node:body';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array(
      'label' => 'hidden',
      'formatter' => 'text_default',
      'delta_limit' => 0,
      'delta_offset' => '0',
      'delta_reversed' => FALSE,
      'formatter_settings' => array(),
      'context' => 'argument_entity_id:node_1',
      'override_title' => 0,
      'override_title_text' => '',
    );
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 1;
    $pane->locks = array();
    $pane->uuid = '9ad5b6db-a919-42ac-acdd-219b767d64f6';
    $display->content['new-9ad5b6db-a919-42ac-acdd-219b767d64f6'] = $pane;
    $display->panels['main'][1] = 'new-9ad5b6db-a919-42ac-acdd-219b767d64f6';
    $pane = new stdClass();
    $pane->pid = 'new-3c15b724-4b37-4931-ab0d-e8045909d7ea';
    $pane->panel = 'secondary';
    $pane->type = 'entity_field';
    $pane->subtype = 'node:field_event_image';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array(
      'label' => 'hidden',
      'formatter' => 'image',
      'delta_limit' => 0,
      'delta_offset' => '0',
      'delta_reversed' => FALSE,
      'formatter_settings' => array(
        'image_style' => '',
        'image_link' => '',
      ),
      'context' => 'argument_entity_id:node_1',
      'override_title' => 0,
      'override_title_text' => '',
    );
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = '3c15b724-4b37-4931-ab0d-e8045909d7ea';
    $display->content['new-3c15b724-4b37-4931-ab0d-e8045909d7ea'] = $pane;
    $display->panels['secondary'][0] = 'new-3c15b724-4b37-4931-ab0d-e8045909d7ea';
    $pane = new stdClass();
    $pane->pid = 'new-d2042929-e9ec-4edf-983a-2c275cadc0af';
    $pane->panel = 'tertiary-first';
    $pane->type = 'views_panes';
    $pane->subtype = 'cod_sponsors_admin-panel_pane_2';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array(
      'arguments' => array(
        'gid' => '',
      ),
    );
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = 'd2042929-e9ec-4edf-983a-2c275cadc0af';
    $display->content['new-d2042929-e9ec-4edf-983a-2c275cadc0af'] = $pane;
    $display->panels['tertiary-first'][0] = 'new-d2042929-e9ec-4edf-983a-2c275cadc0af';
    $pane = new stdClass();
    $pane->pid = 'new-cd399f7c-1f6a-43ce-8482-66b1f1ce90ca';
    $pane->panel = 'tertiary-second';
    $pane->type = 'views_panes';
    $pane->subtype = 'cod_session_sessions-panel_pane_1';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array();
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = 'cd399f7c-1f6a-43ce-8482-66b1f1ce90ca';
    $display->content['new-cd399f7c-1f6a-43ce-8482-66b1f1ce90ca'] = $pane;
    $display->panels['tertiary-second'][0] = 'new-cd399f7c-1f6a-43ce-8482-66b1f1ce90ca';
    $pane = new stdClass();
    $pane->pid = 'new-cf2ea4fb-a8c8-4dee-b620-22161407676d';
    $pane->panel = 'tertiary-third';
    $pane->type = 'views_panes';
    $pane->subtype = 'cod_news-panel_pane_1';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array();
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = 'cf2ea4fb-a8c8-4dee-b620-22161407676d';
    $display->content['new-cf2ea4fb-a8c8-4dee-b620-22161407676d'] = $pane;
    $display->panels['tertiary-third'][0] = 'new-cf2ea4fb-a8c8-4dee-b620-22161407676d';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = '0';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['cod_event_page'] = $page;

  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'event_dashboard';
  $page->task = 'page';
  $page->admin_title = 'Event dashboard';
  $page->admin_description = 'Event dashboard';
  $page->path = 'admin/conference/events/%node/dashboard';
  $page->access = array(
    'plugins' => array(
      0 => array(
        'name' => 'entity_bundle:node',
        'settings' => array(
          'type' => array(
            'event' => 'event',
          ),
        ),
        'context' => 'argument_entity_id:node_1',
        'not' => FALSE,
      ),
      3 => array(
        'name' => 'role',
        'settings' => array(
          'rids' => array(
            0 => 7,
            1 => 3,
            2 => 5,
            3 => 6,
            4 => 4,
          ),
        ),
        'context' => 'logged-in-user',
        'not' => FALSE,
      ),
    ),
    'logic' => 'and',
    'type' => 'none',
    'settings' => NULL,
  );
  $page->menu = array(
    'type' => 'default tab',
    'title' => 'Dashboard',
    'name' => 'navigation',
    'weight' => '-10',
    'parent' => array(
      'type' => 'none',
      'title' => 'Manage Event',
      'name' => 'navigation',
      'weight' => '0',
    ),
  );
  $page->arguments = array(
    'node' => array(
      'id' => 1,
      'identifier' => 'Event',
      'name' => 'entity_id:node',
      'settings' => array(),
    ),
  );
  $page->conf = array(
    'admin_paths' => TRUE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_event_dashboard_panel_context';
  $handler->task = 'page';
  $handler->subtask = 'event_dashboard';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Landing Page',
    'no_blocks' => 0,
    'pipeline' => 'standard',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
  );
  $display = new panels_display();
  $display->layout = 'onecol';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'middle' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = 'Event Dashboard';
  $display->uuid = '821a4c89-fbc6-4667-8a31-96d416c6c40c';
  $display->content = array();
  $display->panels = array();
    $pane = new stdClass();
    $pane->pid = 'new-953eed62-a7ab-4e14-a3c3-6b54bc9268d6';
    $pane->panel = 'middle';
    $pane->type = 'views_panes';
    $pane->subtype = 'ticket_registration-panel_pane_1';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array();
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 0;
    $pane->locks = array();
    $pane->uuid = '953eed62-a7ab-4e14-a3c3-6b54bc9268d6';
    $display->content['new-953eed62-a7ab-4e14-a3c3-6b54bc9268d6'] = $pane;
    $display->panels['middle'][0] = 'new-953eed62-a7ab-4e14-a3c3-6b54bc9268d6';
    $pane = new stdClass();
    $pane->pid = 'new-b3bf5ce8-48dd-4abe-a06f-c73772de5965';
    $pane->panel = 'middle';
    $pane->type = 'views_panes';
    $pane->subtype = 'cod_sponsors_admin-panel_pane_1';
    $pane->shown = TRUE;
    $pane->access = array();
    $pane->configuration = array();
    $pane->cache = array();
    $pane->style = array(
      'settings' => NULL,
    );
    $pane->css = array();
    $pane->extras = array();
    $pane->position = 1;
    $pane->locks = array();
    $pane->uuid = 'b3bf5ce8-48dd-4abe-a06f-c73772de5965';
    $display->content['new-b3bf5ce8-48dd-4abe-a06f-c73772de5965'] = $pane;
    $display->panels['middle'][1] = 'new-b3bf5ce8-48dd-4abe-a06f-c73772de5965';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = '0';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['event_dashboard'] = $page;

  return $pages;

}
