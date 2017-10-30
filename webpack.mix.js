var mix = require('laravel-mix');

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
    'resources/assets/css/normalize.css',
    'resources/assets/css/bulma.css',
    'resources/assets/css/chosen.min.css',
    'resources/assets/css/datepicker.min.css',
    'public/css/base.css'
], 'public/css/airline.css');

mix.scripts([
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/chosen.jquery.min.js',
    'resources/assets/js/datepicker.min.js'
], 'public/js/airline.js');