(function ($) {

  $(document).ready(function() {
    Modernizr.load([{
      test: window.matchMedia,
      nope: "/sites/all/themes/pnwds/libraries/matchmedia/matchmedia.min.js"
    }]);
    
    // Variables for DOM elements
    var w = window,
        d = document,
        b = d.getElementsByTagName('body'),
        mainNav = d.getElementById('block-system-main-menu'),
        userNav = d.getElementById('block-system-user-menu'),
        menuRegion = d.getElementsByClassName('l-region--menu'),
        navRegion = d.getElementsByClassName('l-region--navigation');
    
    enquire.register("screen and (max-width:56.25em)", {
      match : function() {
        navRegion[0].appendChild(mainNav);
      },
      unmatch : function() {
        menuRegion[0].appendChild(mainNav);
      },
      setup : function() {},
      deferSetup : true,
      destroy : function() {}
    });
    
  });

})(jQuery);