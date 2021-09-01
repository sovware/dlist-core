/* eslint-disable */
jQuery(document).ready(function(){
  (function ($) {
    //category slider
    $(".category-slider").owlCarousel({
      items: 6,
      nav: true,
      navText: [
        '<span class="la la-angle-left"></span>',
        '<span class="la la-angle-right"></span>',
      ],
      dots: true,
      margin: 30,
      responsive: {
        0: {
          items: 1,
        },
        400: {
          items: 2,
        },
        575: {
          items: 3,
        },
        767: {
          items: 4,
        },
        1199: {
          items: 5,
        },
      },
    });

    //location slider
    $(".locations_carousel").owlCarousel({
      items: 4,
      nav: true,
      navText: [
        '<span class="la la-angle-left"></span>',
        '<span class="la la-angle-right"></span>',
      ],
      dots: false,
      margin: 30,
      responsive: {
        0: {
          items: 1,
        },
        400: {
          items: 1,
        },
        479: {
          items: 2,
        },
        767: {
          items: 3,
        },
        991: {
          items: 4,
        },
      },
    });

    //listing slider
    /* Check Carousel Data */
    let checkData = function (data, value) {
      return typeof data === 'undefined' ? value : data;
    };

    $(".directorist-listing-carousel .directorist-row").addClass('owl-carousel');
    $(".directorist-listing-carousel").each(function(id, elm){
      $(".directorist-listing-carousel .directorist-row").owlCarousel({
        items: checkData(parseInt(elm.dataset.carouselItems), 6),
        nav: true,
        loop: checkData(JSON.parse(elm.dataset.carouselLoop), true),
        autoplay: checkData(JSON.parse(elm.dataset.carouselAutoplay), true),
        autoplayTimeout: checkData(parseInt(elm.dataset.carouselDelay), 3000), /* delay */
        navText: [
          '<span class="la la-angle-left"></span>',
          '<span class="la la-angle-right"></span>',
        ],
        dots: false,
        margin: 30,
        responsive: {
          0: {
            items: 1,
          },
          400: {
            items: 1,
          },
          575: {
            items: 1,
          },
          767: {
            items: 2,
          },
          991: {
            items: checkData(parseInt(elm.dataset.carouselItems), 6),
          },
        },
      });
    })



    //search field
    $(".search_query .search_fields").keyup(function(){
      $(".directory_home_category_area").addClass("active");
    });

    $(document).on("click", function(e){
      if(!$(e.target).hasClass("search_fields")){
        $(".directory_home_category_area").removeClass("active");
      }
    });

    var tc = document.querySelector(".text-changeable");
    if(tc!==null){
      var typed = new Typed('.text-changeable', {
        stringsElement: '#typed-strings',
        typeSpeed: 70,
        backSpeed: 50,
        loop: true
      });
    }



  })(jQuery);
});