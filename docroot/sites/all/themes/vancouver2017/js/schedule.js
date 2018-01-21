(function ($) {

  Drupal.behaviors.vancouver2017Schedule = {
    attach: function (context, settings) {

      $('.schedule').each(function() {
        // @TODO: Make dynamic...
        $(this).before('<ul class="schedule-header"><li><strong>Kitsilano</strong> (Rm #1410)</li><li><strong>Gastown</strong> (Rm #1420)</li><li><strong>West End</strong> (Rm #1430)</li><li><strong>North Shore</strong> (Rm #1900)</li></ul>');
      });

    }
  }

})(jQuery);
