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

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/highcharts.js', 'public/js')
    .js('resources/js/chosen.js', 'public/js')
    .js('resources/js/map.js', 'public/js')
    .js('resources/js/show-map.js', 'public/js')
    .js('resources/js/sweetalert2.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/chosen.css', 'public/css')
    .postCss('resources/css/sweetalert2.css', 'public/css')
    .postCss('resources/css/map.css', 'public/css');
