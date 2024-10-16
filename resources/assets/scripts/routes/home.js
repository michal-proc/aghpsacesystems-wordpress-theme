import videojs from 'video.js';

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    const player = videojs('video-player', {
      controls: true,
      autoplay: true,
      preload: 'auto',
      fluid: true,
      muted: true,
    });

    player.on('loadedmetadata', function() {
      player.currentTime(0.5);
    });

    player.on('ready', function () {
      //
    });
  },
};
