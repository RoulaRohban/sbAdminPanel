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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
// mix.styles(['']);
// mix.scripts([])
mix.styles([
    'resources/assets/css/all.min.css',
    'resources/assets/css/dataTables.bootstrap4.min.css',
    'resources/assets/css/sb-admin-2.min.css'
], 'public/css/all.css');

mix.scripts([
    'resources/assets/js/jquery.min.js',
    'resources/assets/js/bootstrap.bundle.min.js',
    'resources/assets/js/jquery.easing.min.js',
    'resources/assets/js/sb-admin-2.min.js',
    'resources/assets/js/jquery.dataTables.min.js',
    'resources/assets/js/dataTables.bootstrap4.min.js',
    'resources/assets/js/datatables-demo.js',
    'resources/assets/js/Chart.min.js',
    'resources/assets/js/chart-area-demo.js',
    'resources/assets/js/chart-bar-demo.js',
    'resources/assets/js/chart-pie-demo.js',
], 'public/js/all.js');