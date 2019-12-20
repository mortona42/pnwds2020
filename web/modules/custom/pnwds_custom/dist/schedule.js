"use strict";

(function ($, Drupal) {
  Drupal.behaviors.schedule = {
    attach: function attach(context, settings) {
      $('.schedule', context).once('schedule').each(Drupal.scheduleFilters);
    }
  };

  Drupal.scheduleFilters = function () {
    var $schedule = $(this);
    $(window).on('hashchange', function (event) {
      // Don't set history.
      event.preventDefault();
      updateCheckboxes(getHashTags());
      updateSessions(getHashTags());
    });
    $(window).trigger('hashchange');
    var existingTags = {};
    $(this).find('.session-tag').map(function () {
      existingTags[$(this).attr('tag')] = $(this).text();
    });
    var $sessionFilterForm = $('<form>', {
      'class': 'schedule-tags-filter'
    }).append($('<div>', {
      'class': 'form-checkboxes'
    }));
    $schedule.append($sessionFilterForm);
    var $sessionFilterFormCheckboxes = $sessionFilterForm.find('.form-checkboxes');

    for (var tag in existingTags) {
      var $formItem = $('<div>', {
        'class': 'form-item'
      });
      var $checkbox = $('<input>', {
        'type': 'checkbox',
        'id': 'session-tag-filter--' + tag,
        'tag': tag,
        'checked': getHashTags().includes(tag)
      }).on('click', function () {
        updateHash($sessionFilterForm);
      });
      var $label = $('<label>', {
        'for': 'session-tag-filter--' + tag,
        'class': 'option',
        'tag': tag,
        'html': existingTags[tag]
      });
      $formItem.append($checkbox).append(' ').append($label);
      $sessionFilterFormCheckboxes.append($formItem);
    }

    function getChecked($scheduleFilterForm) {
      var checked = [];
      $scheduleFilterForm.find('input[type="checkbox"]:checked').each(function () {
        checked.push($(this).attr('tag'));
      });
      return checked;
    }

    function getHashTags() {
      var hashTags = [];
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = location.hash.substr(1).split('&')[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var fragment = _step.value;
          var key = fragment.split('=')[0];
          var value = fragment.split('=')[1];

          if (value && key == 'tags') {
            hashTags = value.split(',');
          }
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator["return"] != null) {
            _iterator["return"]();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }

      return hashTags;
    }

    function updateHash($scheduleFilterForm) {
      var checked = getChecked($scheduleFilterForm);
      var hash = '';

      if (checked.length >= 1) {
        hash = '#tags=' + checked.join(',');
      }

      if (hash != '') {
        history.replaceState({}, null, hash);
      } else {
        history.replaceState({}, null, location.pathname + location.search);
      }

      $(window).trigger('hashchange');
    }

    function updateCheckboxes(hashTags) {
      $schedule.find('.schedule-tags-filter input[type="checkbox"]:checked').each(function () {
        $checkbox = $(this);
        $checkbox.prop('checked', hashTags.includes($checkbox.attr('tag')));
      });
    }

    function updateSessions(hashTags) {
      hashTags = getHashTags();
      $schedule.find('.session').each(function () {
        var $session = $(this);
        var sessionTags = [];
        $session.find('.session-tag').each(function () {
          var $sessionTag = $(this);
          sessionTags.push($sessionTag.attr('tag'));
        });
        var tagMatch = [];
        var _iteratorNormalCompletion2 = true;
        var _didIteratorError2 = false;
        var _iteratorError2 = undefined;

        try {
          for (var _iterator2 = hashTags[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
            var _tag = _step2.value;

            if (sessionTags.includes(_tag)) {
              tagMatch.push(_tag);
            }
          }
        } catch (err) {
          _didIteratorError2 = true;
          _iteratorError2 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion2 && _iterator2["return"] != null) {
              _iterator2["return"]();
            }
          } finally {
            if (_didIteratorError2) {
              throw _iteratorError2;
            }
          }
        }

        if (hashTags.length == 0) {
          $session.removeClass('schedule-tags--hidden');
          $session.removeClass('schedule-tags--highlight');
        } else {
          if (tagMatch.length >= 1) {
            $session.removeClass('schedule-tags--hidden');
            $session.addClass('schedule-tags--highlight');
          } else {
            $session.removeClass('schedule-tags--highlight');
            $session.addClass('schedule-tags--hidden');
          }
        }
      });
    }
  };
})(jQuery, Drupal);