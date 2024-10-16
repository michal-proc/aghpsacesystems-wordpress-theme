// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import sponsors from './routes/sponsors';
import contact from './routes/contact';
import ourAchievements from './routes/our-achievements';
import postTemplateSingleProject from './routes/post-template-single-project';
import postTemplateEventConference from './routes/post-template-event-conference';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Our achievements page
  ourAchievements,
  // Sponsors page
  sponsors,
  // Contact page
  contact,
  // Project page
  postTemplateSingleProject,
  // Event (Conference) page
  postTemplateEventConference,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
