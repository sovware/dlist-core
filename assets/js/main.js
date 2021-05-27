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
    $(".directorist-listing-carousel .directorist-row").addClass('owl-carousel');
    $(".directorist-listing-carousel .directorist-row").owlCarousel({
      items: 6,
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
        575: {
          items: 1,
        },
        767: {
          items: 2,
        },
        991: {
          items: 6,
        },
      },
    });


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