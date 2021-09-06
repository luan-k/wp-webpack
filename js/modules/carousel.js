jQuery(document).ready(function ($) {
  $(document).ready(function () {
    $(".logo-carousel").slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1000,
      arrows: true,
      prevArrow:
        '<button class="slide-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
      nextArrow:
        '<button class="slide-arrow slick-next"><i class="fas fa-chevron-right"></i></button>',
      dots: false,
      pauseOnHover: false,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 520,
          settings: {
            slidesToShow: 2,
          },
        },
      ],
    });
    $("#exzoom").exzoom({
      // thumbnail nav options
      navWidth: 120,
      navHeight: 120,
      navItemNum: 5,
      navItemMargin: 7,
      navBorder: 1,

      // autoplay
      autoPlay: true,

      // autoplay interval in milliseconds
      autoPlayTimeout: 3000,
    });
  });
});
