(function ($, Drupal) {
  Drupal.behaviors.schedule = {
    attach: function attach(context, settings) {
      $('.conference', context).once('conference').each(Drupal.scheduleFilters);
    }
  };

  Drupal.scheduleFilters = function() {
    var $conference = $(this);

    $(window).off('hashchange.form-fragment').on('hashchange', function(event) {

      updateCheckboxes(getHashTags());
      updateSessions(getHashTags());
    });
    $(window).trigger('hashchange');

    var $sessionFilter = $conference.find('.session-filter');
    $sessionFilter.find('input[type="checkbox"]').each(function() {
      $(this).on('click', function() {
        updateHash($sessionFilter);
      });
    });

    function getChecked($sessionFilter) {
      var checked = [];
      $sessionFilter.find('input[type="checkbox"]:checked').each(function() {
        console.log(this);
        checked.push($(this).attr('tag'));
      });
      return checked;
    }

    function getHashTags() {
      var hashTags = [];
      for (const fragment of location.hash.substr(1).split('&')) {
        var key = fragment.split('=')[0];
        var value = fragment.split('=')[1];

        if (value && key == 'tags') {
          hashTags = value.split(',');
        }
      }
      return hashTags;
    }

    function updateHash($sessionFilter) {
      var checked = getChecked($sessionFilter);
      var hash = '';
      if (checked.length >=1) {
        hash = '#tags=' + checked.join(',');
      }
      if (hash != '') {
        history.replaceState({}, null, hash);
      }
      else {
        history.replaceState({}, null, location.pathname + location.search);
      }

      $(window).trigger('hashchange');
    }

    function updateCheckboxes(hashTags) {
      $conference.find('.session-filter input[type="checkbox"]').each(function() {
        $checkbox = $(this);
        $checkbox.prop('checked', hashTags.includes($checkbox.attr('tag')));
      });
    }

    function updateSessions(hashTags) {
      hashTags = getHashTags();

      $conference.find('.session').each(function() {
        var $session = $(this);
        var sessionTags = [];
        $session.find('.session-tag').each(function() {
          var $sessionTag = $(this);
          sessionTags.push($sessionTag.attr('tag'));
        });
        var tagMatch = [];
        for (const tag of hashTags) {
          if (sessionTags.includes(tag)) {
            tagMatch.push(tag);
          }
        }

        if (hashTags.length == 0) {
          $session.removeClass('schedule-tags--hidden');
          $session.removeClass('schedule-tags--highlight');
        }
        else {
          if (tagMatch.length >= 1) {
            $session.removeClass('schedule-tags--hidden');
            $session.addClass('schedule-tags--highlight');
          }
          else {
            $session.removeClass('schedule-tags--highlight');
            $session.addClass('schedule-tags--hidden');
          }
        }
      });
    }
  };
})(jQuery, Drupal);
