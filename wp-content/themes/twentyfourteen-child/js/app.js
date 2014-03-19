


//  // Now, Now  //
$(document).ready(function($) {


    // Prevent FOUC while JS loads, then swap for Run ----------
    setTimeout(function () {
        $('body').removeClass('init').addClass('run');
    }, 500);


    // Menu ----------
    $('html.js #main-navigation').accessibleMegaMenu();


    // Scroll Position (nav changes) ----------
    var mainNav = $('#main-site-navigation-wrap');
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 640) {
            mainNav.removeClass('menu-thick').addClass('menu-slim');
        }
        if (scroll < 640) {
            mainNav.removeClass('menu-slim').addClass('menu-thick');
        }
    });


    // Smooth Scroll to Top (without ugly hashes, and with nice top offsets) ----------
    $(".hero .arrow-down").click(function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: $('#top').offset().top -40 }, 500, 'swing');
    });


    // Smooth Scroll for Anchors Links ----------
    $('a[href^="#"]').on('click',function (e) {
      e.preventDefault();
      var target = this.hash,
      $target = $(target);
      $('html, body').stop().animate({
          'scrollTop': $target.offset().top
      }, 500, 'swing', function () {
          window.location.hash = target;
          // history.replaceState({}, '', '/');
      });
    });


    // // Toggle View All ----------
    $('.open-g-door').on('click', function(e){
        $('.g-door').toggleClass("open");
        mainNav.toggleClass("push-for-door");
        $(this).toggleClass("switch");
        e.preventDefault();
    });
    // Add an optional secondary close button
    $('.close-g-door').on('click', function(e){
        $('.g-door').removeClass("open");
        mainNav.removeClass("push-for-door");
        e.preventDefault();
    });


    // LazyLoad Images ----------
    $('img.load').lazyload({
        effect : "fadeIn"
    });


    // // Read Time for Lists ---------
    // $(function() {

    //     $('.eta-read-time').each(function() {

    //       $(this).readingTime({
    //         readingTimeTarget: $(this).find('.eta'),
    //         // wordCountTarget: $(this).find('.words'),
    //         remotePath: $(this).attr('data-file'),
    //         remoteTarget: $(this).attr('data-target')
    //       });

    //     });

    // });

    // Read Time for Articles ---------
    // $(function() {

    //   $('#read-time-wrap').readingTime({
    //     // wordCountTarget: '.words'
    //   });

    // });


    // Collapsible Content - Add Toggle ----------
    var toggleIcon = $( "<span class='toggle-icon' data-icon='E'></span>" );
    $('.collapse-header').append(toggleIcon);
    // Collapsible Content
    $(function() {
      $(".collapse-header").click(function () {
        if ($(this).hasClass('open')){
            $(this).next('.collapse-content').slideUp('slow');
            $(this).removeClass('open')
        }
        else {
          // close other content
          $('.collapse-header').not(this).next('.collapse-content').slideUp('slow');
          $('.collapse-header').not(this).removeClass('open');

          //open clicked content
          $(this).next('.collapse-content').slideDown('slow');
          // add open class
          $(this).addClass('open');
        }
      });
    });


    // Slideshow ----------
    $('.slideshow').flexslider({
        animation: "slide",
        controlNav: false,
        prevText: '',
        nextText: ''
    });


    // Overlay: View Search ----------
    $('.overlay-view-search').magnificPopup({
        type: 'inline',
        mainClass: 'mfp-zoom-in overlay-with-search-box',
        closeBtnInside: false,
        preloader: false,
        focus: '#nav-search-box',
        callbacks: {
          beforeOpen: function() {
            if($(window).width() < 700) {
              this.st.focus = false;
            } else {
              this.st.focus = '#nav-search-box';
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
              removalDelay: 500,
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
            removalDelay: 500,
            preloader: false,
            fixedContentPos: true,
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
          removalDelay: 500,
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
              return item.el.attr('title');
            }
          }
        });

});
