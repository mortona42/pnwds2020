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
  
  Drupal.behaviors.pnwdsTicketQuantity = {
    attach: function (context, settings) {
      $('.ticket-field-formatter-view-form').once('ticket-quantity-select', function () {
        var price = $('.field--name-commerce-price', this),
            desc = $('.field--name-ticket-type-label', this),
            input = $('.form-item-ticket-quantity-1', this);
        
        $('.field__item', price).lettering();
      });
    }
  }

})(jQuery);
