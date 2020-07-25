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

mix .js('resources/js/logout.js', 'public/js')
    .js('resources/js/toggle.js', 'public/js')
    .js('resources/js/course.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/login.scss', 'public/css')
    .sass('resources/sass/logout.scss', 'public/css')
    .sass('resources/sass/course.scss', 'public/css')
    .copy( 'resources/images', 'public/image', false );
