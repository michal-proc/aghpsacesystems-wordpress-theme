import videojs from 'video.js';

export default {
  init() {
    // Get number of elements in slider
    const sliderContainer = $('.projects-slider');
    const numberOfElements = sliderContainer.children().length;

    // Initialize slider with other category's projects
    sliderContainer.slick({
      slidesToShow: Math.min(numberOfElements, 5),
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2500,
      arrows: true,
      lazyLoad: 'ondemand',
      draggable: true,
      swipeToSlide: true,
      touchThreshold: 100,
      responsive: [
        {
          breakpoint: 1500,
          settings: {
            slidesToShow: Math.min(numberOfElements, 4),
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: Math.min(numberOfElements, 3),
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: Math.min(numberOfElements, 2),
            arrows: false,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: Math.min(numberOfElements, 1),
            arrows: false,
          },
        },
      ],
    }).on('setPosition', function (event, slick) {
      if (slick.options.slidesToShow >= numberOfElements) {
        $('.slick-slide').css('width', 'fit-content').attr('style', function (i, style) {
          return style + ' !important;';
        });
      }
    });
  },
  finalize() {
    // Initialize video
    const player = videojs('video-player', {
      controls: true,
      autoplay: true,
      preload: 'auto',
      fluid: true,
      muted: true,
    });

    player.on('loadedmetadata', function () {
      player.currentTime(0.5);
    });

    player.on('ready', function () {
      //
    });

    // Update bottom images height
    const singleProject = $('.single-project-other-projects-project');
    singleProject.css('height', singleProject.css('width'));
  },
};
