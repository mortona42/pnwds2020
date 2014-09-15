<?php
/**
 * @file
 * pnwds_local_attractions.openlayers_maps.inc
 */

/**
 * Implements hook_openlayers_maps().
 */
function pnwds_local_attractions_openlayers_maps() {
  $export = array();

  $openlayers_maps = new stdClass();
  $openlayers_maps->disabled = FALSE; /* Edit this to true to make a default openlayers_maps disabled initially */
  $openlayers_maps->api_version = 1;
  $openlayers_maps->name = 'venue_map';
  $openlayers_maps->title = 'Venue Map - Main';
  $openlayers_maps->description = '';
  $openlayers_maps->data = array(
    'width' => 'auto',
    'height' => '480px',
    'image_path' => 'sites/all/modules/contrib/openlayers/themes/default_dark/img/',
    'css_path' => 'sites/all/modules/contrib/openlayers/themes/default_dark/style.css',
    'proxy_host' => 'proxy?request=',
    'hide_empty_map' => 1,
    'center' => array(
      'initial' => array(
        'centerpoint' => '-122.67097971495697, 45.52159371577549',
        'zoom' => '13',
      ),
      'restrict' => array(
        'restrictextent' => 0,
        'restrictedExtent' => '-13661384.665644,5700206.374406,-13649976.439175,5707811.858719',
      ),
    ),
    'behaviors' => array(
      'openlayers_behavior_fullscreen' => array(
        'activated' => 0,
      ),
      'openlayers_behavior_layerswitcher' => array(
        'ascending' => 1,
        'sortBaseLayer' => '0',
        'roundedCorner' => 0,
        'roundedCornerColor' => '#222222',
        'maximizeDefault' => 0,
        'div' => 'map-layer-toggle',
      ),
      'openlayers_behavior_navigation' => array(
        'zoomWheelEnabled' => 0,
        'zoomBoxEnabled' => 1,
        'documentDrag' => 0,
      ),
      'openlayers_behavior_panzoombar' => array(
        'zoomWorldIcon' => 0,
        'panIcons' => 1,
      ),
      'openlayers_behavior_popup' => array(
        'layers' => array(),
        'popupAtPosition' => 'mouse',
        'panMapIfOutOfView' => 1,
        'keepInMap' => 1,
      ),
      'openlayers_behavior_scaleline' => array(),
      'openlayers_behavior_touch_navigation' => array(
        'documentDrag' => 0,
      ),
    ),
    'default_layer' => 'google_normal',
    'layers' => array(
      'google_normal' => 'google_normal',
      'venue_maps_openlayers_1' => 'venue_maps_openlayers_1',
      'venue_maps_openlayers_2' => 'venue_maps_openlayers_2',
      'venue_maps_openlayers_3' => 'venue_maps_openlayers_3',
      'venue_maps_openlayers_4' => 'venue_maps_openlayers_4',
    ),
    'layer_weight' => array(
      'venue_maps_openlayers_1' => '-3',
      'venue_maps_openlayers_2' => '-2',
      'venue_maps_openlayers_3' => '-1',
      'venue_maps_openlayers_4' => '0',
      'geofield_formatter' => '0',
      'openlayers_geojson_picture_this' => '0',
      'openlayers_kml_example' => '0',
    ),
    'layer_styles' => array(
      'geofield_formatter' => '0',
      'openlayers_kml_example' => '0',
      'openlayers_geojson_picture_this' => '0',
      'venue_maps_openlayers_1' => 'default_marker_red',
      'venue_maps_openlayers_2' => 'default_marker_green',
      'venue_maps_openlayers_3' => 'default_marker_gold',
      'venue_maps_openlayers_4' => 'default_marker_blue',
    ),
    'layer_styles_select' => array(
      'geofield_formatter' => '0',
      'openlayers_kml_example' => '0',
      'openlayers_geojson_picture_this' => '0',
      'venue_maps_openlayers_1' => 'default_marker_red',
      'venue_maps_openlayers_2' => 'default_marker_green',
      'venue_maps_openlayers_3' => 'default_marker_gold',
      'venue_maps_openlayers_4' => 'default_marker_blue',
    ),
    'layer_styles_temporary' => array(
      'geofield_formatter' => '0',
      'openlayers_kml_example' => '0',
      'openlayers_geojson_picture_this' => '0',
      'venue_maps_openlayers_1' => 'default_marker_red',
      'venue_maps_openlayers_2' => 'default_marker_green',
      'venue_maps_openlayers_3' => 'default_marker_gold',
      'venue_maps_openlayers_4' => 'default_marker_blue',
    ),
    'layer_activated' => array(
      'venue_maps_openlayers_1' => 'venue_maps_openlayers_1',
      'venue_maps_openlayers_2' => 'venue_maps_openlayers_2',
      'venue_maps_openlayers_3' => 'venue_maps_openlayers_3',
      'venue_maps_openlayers_4' => 'venue_maps_openlayers_4',
      'geofield_formatter' => 0,
      'openlayers_kml_example' => 0,
      'openlayers_geojson_picture_this' => 0,
    ),
    'layer_switcher' => array(
      'venue_maps_openlayers_1' => 'venue_maps_openlayers_1',
      'venue_maps_openlayers_2' => 'venue_maps_openlayers_2',
      'venue_maps_openlayers_3' => 'venue_maps_openlayers_3',
      'venue_maps_openlayers_4' => 'venue_maps_openlayers_4',
      'geofield_formatter' => 0,
      'openlayers_kml_example' => 0,
      'openlayers_geojson_picture_this' => 0,
    ),
    'projection' => 'EPSG:900913',
    'displayProjection' => 'EPSG:4326',
    'styles' => array(
      'default' => 'default',
      'select' => 'default_select',
      'temporary' => 'default',
    ),
  );
  $export['venue_map'] = $openlayers_maps;

  return $export;
}
