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
    'resources/assets/css/pagesources/normalize.css',
    'resources/assets/css/pagesources/bulma.css',
    'resources/assets/css/pagesources/chosen.min.css',
    'resources/assets/css/pagesources/datepicker.min.css',
    'resources/assets/css/pagesources/famfamfam-flags.css',
    'resources/assets/css/base.css'
], 'public/css/airline.css');

mix.copyDirectory('resources/assets/images', 'public/images');

mix.copy('resources/assets/images/chosen-sprite.png', 'public/css');

mix.copyDirectory('resources/assets/css/pages', 'public/css');

mix.scripts([
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/chosen.jquery.min.js',
    'resources/assets/js/datepicker.min.js',
    'resources/assets/js/site.js'
], 'public/js/airline.js');