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
	.js('resources/js/admin.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')
	// пришлось создавать папку admin. возможно, получилось бы, и создавая файл в папке css, но я сначала не пересобирал проект... в общем, надо пробовать писать так, и пересобирать проект, может будет толк. 
    .sass('resources/sass/admin.scss', 'public/css/admin');

