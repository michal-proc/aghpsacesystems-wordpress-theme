import 'slick-carousel';

export default {
  init() {
    //
  },
  finalize() {
    const eventConferenceMap = $('.event-conference-map');
    const iframe = $('iframe');
    const width = eventConferenceMap.width();
    eventConferenceMap.css('min-height', `${width / 2}px`);
    iframe.css('min-height', `${width / 2}px`);
  },
};
