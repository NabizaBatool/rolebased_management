const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

var path = {
    'plugins': "./resources/plugins/",
    'js': "./resources/js/plugins/",
    'css': "./resources/css/",
}

mix.styles([
    path.css + 'plugins',
    path.css + 'custom',
], 'public/css/master.css').version();



mix.scripts([
   // path.js + 'plugins',
    path.js + "jquery.min.js",
    // path.plugins + "jquery-ui.min.js",
    // path.plugins + "jquery.knob.min.js",
    // path.plugins + "jquery.overlayScrollbars.min.js",
    // path.plugins + "jquery.vmap.min.js",
    // path.plugins + "jquery.vmap.usa.js",
    // path.plugins + "moment.min.js",
    // path.plugins + "sparkline.js",
    // path.plugins + "summernote-bs4.min.js",
    // path.plugins + "daterangepicker.js",
    // path.plugins + "demo.js",
    // path.plugins + "dashboard.js",
    // path.plugins + "tempusdominus-bootstrap-4.min.js",
    // path.plugins + "adminlte.js",
    path.js + "adminlte.min.js",
    path.js + "bootstrap.bundle.min.js"
], 'public/js/master.js').version();