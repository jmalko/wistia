let mix = require('laravel-mix');

mix.js('resources/js/cp.js', 'dist/js/cp.js')
    .sass('resources/sass/cp.scss', 'dist/css/cp.css');
