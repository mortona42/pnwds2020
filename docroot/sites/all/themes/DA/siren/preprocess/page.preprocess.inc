<?php

function siren_preprocess_page(&$vars) {
  if(arg(2) == 'schedule') {
    drupal_add_js('/sites/all/libraries/isotope/isotope.pkgd.min.js', 'file');
    drupal_add_js(drupal_get_path('theme', 'siren') .'/js/schedule.js', 'file');
  }
}
