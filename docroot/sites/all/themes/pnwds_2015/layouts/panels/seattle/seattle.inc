<?php
// Plugin definition
$plugin = array(
  'title' => t('Seattle'),
  'icon' => 'seattle.png',
  'category' => t('PNWDS'),
  'theme' => 'seattle',
  'css' => '../../../css/panels/seattle/seattle.css',
  'regions' => array(
	  'header_top' => t('Header Top'),
    'left_header' => t('Left Header'),
    'right_header' => t('Right Header'),
    'left_triptych' => t('Left Triptych'),
    'middle_triptych' => t('Middle Triptych'),
    'right_triptych' => t('Right Triptych'),
    'left_content' => t('Left Content'),
    'right_content' => t('Right Content'),
    'footer' => t('Footer'),
  ),
);
