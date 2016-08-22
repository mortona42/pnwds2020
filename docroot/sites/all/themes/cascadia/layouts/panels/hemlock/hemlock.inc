<?php
// Plugin definition
$plugin = array(
  'title' => t('Hemlock'),
  'icon' => 'hemlock.png',
  'category' => t('Cascadia'),
  'theme' => 'hemlock',
  'css' => '../../../css/panels/hemlock/hemlock.css',
  'regions' => array(
    'preface' => t('Preface'),
    'left_header' => t('Left Header'),
    'right_header' => t('Right Header'),
    'middle' => t('Middle'),
    'left_content' => t('Left Content'),
    'right_content' => t('Right Content'),
    'footer' => t('Footer'),
  ),
);
