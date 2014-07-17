(function ($) {

  $(document).ready(function() {
    Modernizr.load([{
      test: window.matchMedia,
      nope: "/sites/all/themes/pnwds/libraries/matchmedia/matchmedia.min.js"
    }]);
    
    // Variables for DOM elements
    var w = window,
        wH = w.innerHeight,
        d = document,
        b = d.getElementsByTagName('body'),
        container = d.getElementById('container'),
        mainNav = d.getElementById('block-system-main-menu'),
        userNav = d.getElementById('block-system-user-menu'),
        menuRegion = d.getElementsByClassName('l-region--menu'),
        navRegion = d.getElementsByClassName('l-region--navigation'),
        footerWrapper = d.getElementsByClassName('w-footer'),
        footerOrigClass = footerWrapper.className;
    
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
    }).register("screen and (min-width:56.25em)", {
      match : function() {
        footerWrapper[0].className = footerWrapper[0].className + " positioned";
        footerHeight = footerWrapper[0].offsetHeight;
        container.style.paddingBottom = parseInt(footerHeight) + "px";
        
        if (wH > container.offsetHeight) {
          container.style.height = wH + "px";
        }
      },
      unmatch : function() {
        footerWrapper[0].className = footerOrigClass;
        container.style.paddingBottom = "0px";
      },
      setup : function() {},
      deferSetup : true,
      destroy : function() {}
    });;
    
  });

})(jQuery);