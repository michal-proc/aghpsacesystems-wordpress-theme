import videojs from 'video.js';

export default {
  init() {
    // Get number of elements in slider
    const sliderContainer = $('.projects-slider');

    // Initialize slider with other category's projects
    sliderContainer.slick({
      slidesToShow: 5,
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
            slidesToShow: 4,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            arrows: false,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            arrows: false,
          },
        },
      ],
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
