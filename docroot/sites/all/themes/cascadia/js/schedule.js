(function ($) {

  Drupal.behaviors.cascadiaSchedule = {
    attach: function (context, settings) {

      // $('.view-cod-schedule-content .timeslot-content').once().prepend('<div class="gutter-size"></div>');

      // $('.timeslot-content').isotope({
      //   itemSelector: '.views-row',
      //   masonry: {
      //     columnWidth: '.views-row',
      //     gutter: '.gutter-size'
      //   }

      // });

      // $('.pane-cod-session-tracks-schedule-session-tracks a').click(function() {
      //   if ($(this).hasClass('clicked')) {
      //     $(this).removeClass('clicked');
      //     $('.view-cod-schedule-content .timeslot-content').isotope({filter: '*'});
      //     return false;
      //   }
      //   else {
      //     var filterValue = $(this).parents('li').attr('data-filter');
      //     $(this).parents('li').siblings().find('.clicked').removeClass('clicked');
      //     $(this).addClass('clicked');
      //     $('.view-cod-schedule-content .timeslot-content').isotope({filter: filterValue});
      //     return false;
      //   }

      // });

      $('.schedule').each(function() {
        // @TODO: Make dynamic...
        $(this).before('<ul class="schedule-header"><li><strong>Kitsilano</strong> (Rm #1410)</li><li><strong>Gastown</strong> (Rm #1420)</li><li><strong>West End</strong> (Rm #1430)</li><li><strong>North Shore</strong> (Rm #1900)</li></ul>');
        // $(this).find('.schedule__timeslot-sessions:first-child li').each(function() {
        //   alert($(this).find('.session__room').text());
        // });
      });

    }
  }

})(jQuery);
