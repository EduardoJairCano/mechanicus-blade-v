const mix = require('laravel-mix');
/*
 |--------------------------------------------------------------------------
 | Laravel Mix
 |--------------------------------------------------------------------------
 |
 | Laravel Mix provides a fluent API for defining Webpack build steps for
 | your Laravel application using several common CSS and JavaScript
 | pre-processors.
 |
 | Documentation
 | - https://laravel.com/docs/7.x/mix
 */


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
    .sass('resources/sass/app.scss', 'public/css');


/*
 |--------------------------------------------------------------------------
 | Mix Browser Sync
 |--------------------------------------------------------------------------
 |
 | Mix BrowserSync will automatically monitor your files for changes, and
 | insert your changes into the browser - all without requiring a manual
 | refresh.
 |
 | - https://laravel-mix.com/docs/5.0/browsersync
 */
mix.browserSync('http://mechanicus.test');


/*
 |--------------------------------------------------------------------------
 | Mix Versioning
 |--------------------------------------------------------------------------
 |
 | Mix provides an ID version to identify whenever the file will be modified.
 | This only will be applied to a production environment.
 |
 | - https://laravel-mix.com/docs/5.0/versioning
 */
if (mix.inProduction()) {
    mix.version();
}
