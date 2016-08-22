<?php
// Plugin definition
$plugin = array(
  'title' => t('Spruce'),
  'icon' => 'spruce.png',
  'category' => t('Cascadia'),
  'theme' => 'spruce',
  'css' => '../../../css/panels/spruce/spruce.css',
  'regions' => array(
    'preface' => t('Preface'),
    'left_content' => t('Left Content'),
    'top_right_content' => t('Top Right Content'),
    'bottom_right_content' => t('Bottom Right Content'),
    'footer' => t('Footer'),
  ),
);
