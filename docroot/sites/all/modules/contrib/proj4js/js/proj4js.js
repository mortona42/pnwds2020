Drupal.behaviors.proj4js = {
  attach: function (context, settings) {
    jQuery(settings.proj4js).each(function(index, projection) {
      Proj4js.defs[projection[0]] = projection[1];
    });
  }
};
