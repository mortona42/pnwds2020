(function ($) {

  Drupal.behaviors.pnwdsBranding = {
    attach: function (context, settings) {
      $('.site--branding__name', context).once('lettering', function () {
        if ( $('a', this).length > 0) {
          $('a', this).lettering('words');
        } else {
          $(this).lettering('words');
        }
      });
    }
  };

})(jQuery);
