


 // Now, Now  //
jQuery(document).ready(function($) {

    // Menu ----------
    $('#main-navigation').accessibleMegaMenu();
    setTimeout(function () {
        $('body').removeClass('init');
    }, 500);

    // Toggle View All ----------
    $('.open-g-door').on('click', function(e){
        $('.g-door').toggleClass("open");
        $('#header-wrap').toggleClass("push-for-door");
        $(this).toggleClass("switch");
        e.preventDefault();
    });
    // Add an optional secondary close button
    $('.close-g-door').on('click', function(e){
        $('.g-door').removeClass("open");
        $('#header-wrap').removeClass("push-for-door");
        e.preventDefault();
    });

    // Slideshow ----------
    $('.slideshow').flexslider({
        animation: "slide",
        controlNav: false,
        prevText: '',
        nextText: ''
    });

    // Overlay: View Search
    $('.overlay-view-search').magnificPopup({
        type: 'inline',
        mainClass: 'mfp-zoom-in overlay-with-search-box',
        showCloseBtn: false,
        preloader: false,
        focus: '#nav-search-box',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
          beforeOpen: function() {
            if($(window).width() < 700) {
              this.st.focus = false;
            } else {
              this.st.focus = '#name';
            }
          }
        }
      });


    // Overlay: View Image ----------
    $('.overlay-view-image').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
              type: 'image',
              mainClass: 'mfp-zoom-in overlay-with-image',
              tLoading: '',
              removalDelay: 100,
              callbacks: {

                imageLoadComplete: function() {
                  var self = this;
                  setTimeout(function() {
                    self.wrap.addClass('mfp-image-loaded');
                  }, 16);
                },
                close: function() {
                  this.wrap.removeClass('mfp-image-loaded');
                },

                // avoid caching of image
                beforeChange: function() {
                 this.items[0].src = this.items[0].src + '?=' + Math.random();
                }
              },

              closeBtnInside: false,
              closeOnContentClick: true,
              midClick: true
        });
    });

    // Overlay: Watch Video ----------
    $('.overlay-watch-video').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-zoom-in overlay-with-video',
            removalDelay: 100,
            preloader: false,
            fixedContentPos: false,
            closeBtnInside: false,
            closeOnContentClick: true,
            midClick: true
        });
    });

    // Overlay: View Slideshow ----------
    $('.overlay-view-slideshow').magnificPopup({
          delegate: 'a',
          type: 'image',
          tLoading: '',
          mainClass: 'mfp-zoom-in overlay-with-slideshow-slides',
          removalDelay: 100,
          callbacks: {
            imageLoadComplete: function() {
              var self = this;
              setTimeout(function() {
                self.wrap.addClass('mfp-image-loaded');
              }, 16);
            },
            close: function() {
              this.wrap.removeClass('mfp-image-loaded');
            },

          },
          closeBtnInside: false,
          closeOnContentClick: true,
          midClick: true,
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
              return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }
          }
        });

    //  ----------
    // $(function() {
    // });

});

// Adapt ----------
function adaptMagic(i, width) {
document.documentElement.id = 'range_' + i;
}
var ADAPT_CONFIG = {
dynamic: true,
callback: adaptMagic,

range: [
'0 to 480',
'480 to 768',
'768 to 1024',
'1024 to 1224',
'1224 to 1600',
'1600 to 1824',
'1824'
]
};