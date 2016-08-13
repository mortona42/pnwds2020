(function ($) {

  // Initialize Isotope container.
  Drupal.behaviors.initIsotope = {
    attach: function (context, settings) {

      $('.view-cod-schedule-content .timeslot-content').once().prepend('<div class="gutter-size"></div>');

      $('.timeslot-content').isotope({
        itemSelector: '.views-row',
        masonry: {
          columnWidth: '.views-row',
          gutter: '.gutter-size'
        }

      });

      $('.pane-cod-session-tracks-schedule-session-tracks a').click(function() {
        if ($(this).hasClass('clicked')) {
          $(this).removeClass('clicked');
          $('.view-cod-schedule-content .timeslot-content').isotope({filter: '*'});
          return false;
        }
        else {
          var filterValue = $(this).parents('li').attr('data-filter');
          $(this).parents('li').siblings().find('.clicked').removeClass('clicked');
          $(this).addClass('clicked');
          $('.view-cod-schedule-content .timeslot-content').isotope({filter: filterValue});
          return false;
        }

      });

    }
  }

})(jQuery);