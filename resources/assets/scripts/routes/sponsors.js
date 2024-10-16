import 'slick-carousel';

export default {
  init() {
    const slickSlider = $('.slick-slider');
    slickSlider.slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: false,
      lazyLoad: 'ondemand',
      draggable: true,
      swipeToSlide: true,
      touchThreshold: 100,
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            slidesToShow: 5,
          },
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
          },
        },
      ],
    });
  },
  finalize() {
    //
  },
};
