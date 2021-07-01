const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 

 mix.styles([  
  'public/assets/css/plugins/nice-select.css',
  'public/assets/css/plugins/easyzoom.css',
  'public/assets/css/plugins/slick.css',
  'public/assets/css/plugins/animate.css',
  'public/assets/css/plugins/magnific-popup.css',
  'public/assets/css/plugins/jquery-ui.css',
  'public/assets/css/style.css',
], 'public/assets/css/all.css');

 mix.scripts([  
    'public/assets/js/vendor/modernizr-3.6.0.min.js',
    'public/assets/js/vendor/jquery-3.5.1.min.js',
    'public/assets/js/vendor/jquery-migrate-3.3.0.min.js',
    'public/assets/js/vendor/bootstrap.bundle.min.js',
    'public/assets/js/plugins/jquery.syotimer.min.js',
    'public/assets/js/plugins/jquery.instagramfeed.min.js',
    'public/assets/js/plugins/jquery.nice-select.min.js',
    'public/assets/js/plugins/wow.js',
    'public/assets/js/plugins/jquery-ui.js',
    'public/assets/js/plugins/jquery-ui-touch-punch.js',
    'public/assets/js/plugins/magnific-popup.js',
    'public/assets/js/plugins/sticky-sidebar.js',
    'public/assets/js/plugins/easyzoom.js',
    'public/assets/js/plugins/slick.js',
    'public/assets/js/plugins/scrollup.js',
    'public/assets/js/plugins/ajax-mail.js',
    'public/frontend/js/select2/js/select2.min.js',
 ], 'public/assets/js/all.js');

