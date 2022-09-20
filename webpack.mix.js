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
    'js': "./resources/js/plugins/",
    'css': "./resources/css/",
    
}

mix.styles([
    path.css + 'plugins',
    path.css + 'custom',
], 'public/css/master.css').version();



mix.scripts([
    path.js + "jquery.min.js",
    path.js + "adminlte.min.js",
    path.js + "bootstrap.bundle.min.js"
], 'public/js/master.js').version();