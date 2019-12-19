(function ($, Drupal) {
  Drupal.behaviors.schedule = {
    attach: function attach(context, settings) {
      $('.schedule', context).once('schedule').each(Drupal.scheduleFilters);
    }
  };

  Drupal.scheduleFilters = function() {
    var $schedule = $(this);

    $(window).on('hashchange', function(event) {
      // Don't set history.
      event.preventDefault();

      updateCheckboxes(getHashTags());
      updateSessions(getHashTags());
    });
    $(window).trigger('hashchange');

    var existingTags = {};
    $(this).find('.session-tag').map(function() {
      existingTags[$(this).attr('tag')] = $(this).text();
    });

    var $sessionFilterForm = $('<form>', {'class': 'schedule-tags-filter'})
      .append($('<div>', {'class': 'form-checkboxes'}));
    $schedule.append($sessionFilterForm);

    var $sessionFilterFormCheckboxes = $sessionFilterForm.find('.form-checkboxes');

    for (const tag in existingTags) {
      var $formItem = $('<div>', {'class': 'form-item'});
      var $checkbox = $('<input>', {
        'type': 'checkbox',
        'id': 'session-tag-filter--' + tag,
        'tag': tag,
        'checked': getHashTags().includes(tag)
      })
      .on('click', function() {
        updateHash($sessionFilterForm);
      });
      var $label = $('<label>', {
        'for': 'session-tag-filter--' + tag,
        'class': 'option',
        'tag': tag,
        'html': existingTags[tag]
      });

      $formItem.append($checkbox)
        .append(' ')
        .append($label);
      $sessionFilterFormCheckboxes.append($formItem);
    }

    function getChecked($scheduleFilterForm) {
      var checked = [];
      $scheduleFilterForm.find('input[type="checkbox"]:checked').each(function() {
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

    function updateHash($scheduleFilterForm) {
      var checked = getChecked($scheduleFilterForm);
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
      $schedule.find('.schedule-tags-filter input[type="checkbox"]:checked').each(function() {
        $checkbox = $(this);
        $checkbox.prop('checked', hashTags.includes($checkbox.attr('tag')));
      });
    }

    function updateSessions(hashTags) {
      hashTags = getHashTags();

      $schedule.find('.session').each(function() {
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
