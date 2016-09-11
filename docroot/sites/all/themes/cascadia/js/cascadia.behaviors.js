(function ($) {

  /**
   * The recommended way for producing HTML markup through JavaScript is to write
   * theming functions. These are similiar to the theming functions that you might
   * know from 'phptemplate' (the default PHP templating engine used by most
   * Drupal themes including Omega). JavaScript theme functions accept arguments
   * and can be overriden by sub-themes.
   *
   * In most cases, there is no good reason to NOT wrap your markup producing
   * JavaScript in a theme function.
   */
  Drupal.theme.prototype.cascadiaExampleButton = function (path, title) {
    // Create an anchor element with jQuery.
    return $('<a href="' + path + '" title="' + title + '">' + title + '</a>');
  };

  /**
   * Behaviors are Drupal's way of applying JavaScript to a page. In short, the
   * advantage of Behaviors over a simple 'document.ready()' lies in how it
   * interacts with content loaded through Ajax. Opposed to the
   * 'document.ready()' event which is only fired once when the page is
   * initially loaded, behaviors get re-executed whenever something is added to
   * the page through Ajax.
   *
   * You can attach as many behaviors as you wish. In fact, instead of overloading
   * a single behavior with multiple, completely unrelated tasks you should create
   * a separate behavior for every separate task.
   *
   * In most cases, there is no good reason to NOT wrap your JavaScript code in a
   * behavior.
   *
   * @param context
   *   The context for which the behavior is being executed. This is either the
   *   full page or a piece of HTML that was just added through Ajax.
   * @param settings
   *   An array of settings (added through drupal_add_js()). Instead of accessing
   *   Drupal.settings directly you should use this because of potential
   *   modifications made by the Ajax callback that also produced 'context'.
   */
  Drupal.behaviors.cascadiaExampleBehavior = {
    attach: function (context, settings) {
      // By using the 'context' variable we make sure that our code only runs on
      // the relevant HTML. Furthermore, by using jQuery.once() we make sure that
      // we don't run the same piece of code for an HTML snippet that we already
      // processed previously. By using .once('foo') all processed elements will
      // get tagged with a 'foo-processed' class, causing all future invocations
      // of this behavior to ignore them.
      $('.some-selector', context).once('foo', function () {
        // Now, we are invoking the previously declared theme function using two
        // settings as arguments.
        var $anchor = Drupal.theme('cascadiaExampleButton', settings.myExampleLinkPath, settings.myExampleLinkTitle);

        // The anchor is then appended to the current element.
        $anchor.appendTo(this);
      });


      // Scroll to top
      $('a.js-page-top').on('click', function(event) {
        event.preventDefault();
        $('html,body').animate({ scrollTop: 0 }, 400);
      });

      // Scroll to hash url
      $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if(target.length) {
          event.preventDefault();
          var targetOffset = target.offset().top;
          $('html, body').stop().animate({
              scrollTop: targetOffset - 80
          }, 400);
        }
      });

      // Mobile menu toggle
      $('.js-menu-toggle').on('click', function(event) {
        if ($(this).is('.js-menu-toggle-active')) {
          $(this).removeClass('js-menu-toggle-active');
          $(this).removeClass('menu__button-toggle--active');
          $('.l-region--navigation').slideUp('fast');
        } else {
          $(this).addClass('js-menu-toggle-active');
          $(this).addClass('menu__button-toggle--active');
          $('.l-region--navigation').slideDown('fast');
        }
      });

      // Sub-menu click toggle
      $('.menu-item--parent .js-menu-item-toggle').on('click', function () {
        if ($(this).is('.js-menu-item-toggle-active')) {
          // COLLAPSE SUB-MENU
          $(this).removeClass('js-menu-item-toggle-active');
          $(this).closest('.menu-item--parent').removeClass('menu-item--active');
          $(this).siblings('ul.menu').slideUp('fast');
        } else {
          // EXPAND SUB-MENU
          // Close open sub-menu
          $('ul.menu li .js-menu-item-toggle').removeClass('js-menu-item-toggle-active');
          $('ul.menu li').removeClass('menu-item--active');
          $('ul.menu li ul.menu').slideUp('fast');
          // Open new sub-menu
          $(this).addClass('js-menu-item-toggle-active');
          $(this).closest('.menu-item--parent').addClass('menu-item--active');
          $(this).siblings('ul.menu').slideDown('fast');
        }
      });
      // Sub-menu hover toggle for desktop
      $('.menu-item--parent').on('mouseover mouseout', function () {
        if ($(window).width() >= 770) {
          // TOGGLE SUB-MENU
          // @TODO: Fix. Getting called twice.
          $(this).toggleClass('menu-item--active');
          $(this).find('ul.menu').slideToggle('fast');
        }
      });

    }
  };

})(jQuery);
