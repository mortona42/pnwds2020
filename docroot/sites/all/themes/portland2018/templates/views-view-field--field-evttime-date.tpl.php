<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php
  $database_timezone = new DateTimeZone($row->field_field_evttime_date['0']['raw']['timezone_db']);
  $event_timezone = new DateTimeZone($row->field_field_evttime_date['0']['raw']['timezone']);

  $time1 = new DateTime($row->field_field_evttime_date['0']['raw']['value'], $database_timezone);
  $time1->setTimezone($event_timezone);

  $time2 = new DateTime( $row->field_field_evttime_date['0']['raw']['value2'], $database_timezone);
  $time2->setTimezone($event_timezone);

  print '<span class="date-display-single"><div class="date-display-range"><span class="date-display-start">'.$time1->format('h:i').'</span> to <span class="date-display-end">'.$time2->format('h:i').'</span></div></span>';
?>
