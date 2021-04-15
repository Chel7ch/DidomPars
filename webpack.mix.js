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

mix.js([
        'resources/js/app.js',
        'resources/js/jquery.min.js',
        // 'resources/js/bootstrap.min.js'
    ],
    'public/js/app.js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .styles([
            'resources/css/app.css',
            'resources/css/bootstrap.min.css'],
        'public/css/app.css');
