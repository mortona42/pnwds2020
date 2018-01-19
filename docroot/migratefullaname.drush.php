<?php

// Search for publication nodes of publication type "report".
$efq = new EntityFieldQuery();
$efq
// Conditions on the entity - its type and its bundle ("sub-type")
->entityCondition('entity_type', 'ticket_registration')
->entityCondition('bundle', 51);
// Conditions on the entity's fields
// Execute, returning an array of arrays.
$result = $efq->execute();

// Ensure we've got some node results.
if (!isset($result['ticket_registration'])) {
  drush_log("No registrations to process.", "ok");
  return;
}

// Iterate over the result, loading each node at a time.
foreach($result['ticket_registration'] as $trid => $registration) {
  $full_name = '';
  $first_name = '';
  $last_name = '';

  // Load the full node and wrap it with entity_metadata_wrapper().
  $registration = ticket_registration_load($trid);
  $wrapper = entity_metadata_wrapper("ticket_registration", $registration);

  // If there's a full-text field_body, swap it into the summary;
  // then delete that full version, so it's blank, and save.
  $registered_user = $wrapper->user_uid->value();
  $user_wrapper = entity_metadata_wrapper("user", $registered_user);
  $first_name = $user_wrapper->field_profile_first->value();
  $last_name = $user_wrapper->field_profile_last->value();
  $full_name = $first_name . ' ' . $last_name;

  if ($first_name && $wrapper->field_profile_first->value() == NULL) {
    $wrapper->field_profile_first->set($first_name);
  }
  if ($last_name && $wrapper->field_profile_last->value() == NULL) {
    $wrapper->field_profile_last->set($last_name);
  }
  $wrapper->save();

  // Log our progress.
  drush_log("Processed registration={$registration->trid}, title={$full_name}", "ok");
}