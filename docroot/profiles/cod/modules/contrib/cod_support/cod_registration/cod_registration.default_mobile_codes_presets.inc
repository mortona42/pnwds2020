<?php
/**
 * @file
 * cod_registration.default_mobile_codes_presets.inc
 */

/**
 * Implements hook_default_mobile_codes_preset().
 */
function cod_registration_default_mobile_codes_preset() {
  $export = array();

  $preset = new stdClass();
  $preset->disabled = FALSE; /* Edit this to true to make a default preset disabled initially */
  $preset->api_version = 2;
  $preset->name = 'cod_registration_qrcode';
  $preset->provider = 'phpqrcode';
  $preset->defaults = array(
    'ecc' => 'L',
    'size' => '8',
    'margin' => '0',
  );
  $preset->extras = array(
    'image_style' => '',
  );
  $export['cod_registration_qrcode'] = $preset;

  return $export;
}
