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

mix.js('resources/js/app.js', 'public/js')
    .version()
    .vue()
    .extract(['vue', 'bootstrap'])
    .sourceMaps()
    .sass('resources/sass/app.scss', 'public/css')
    .browserSync({
        proxy: '192.168.10.10'
    });
