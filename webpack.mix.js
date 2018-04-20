let mix = require('laravel-mix');

mix
	.setPublicPath('public')
	.setResourceRoot('../')

	.copy('resources/assets/js/main.js', 'public/build/js')
	.sass('resources/assets/sass/main.scss', 'public/build/css')

	.copy('node_modules/jquery/dist/jquery.min.js', 'public/build/js')
	.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/build/css')
	.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/build/js')
	.copy('node_modules/jquery-validation/dist/jquery.validate.min.js', 'public/build/js')
	.copy('node_modules/jquery-mask-plugin/dist/jquery.mask.min.js', 'public/build/js')

	// Unifica Todos JS em um aquivos APP.js
	.scripts([
		'public/build/js/jquery.min.js',
		'public/build/js/bootstrap.min.js',
		'public/build/js/jquery.validate.min.js',
		'public/build/js/jquery.mask.min.js',
		'public/build/js/main.js',
	], 'public/js/app.js')

	// Unifica Todos CSS em um aquivos APP.css
	.styles([
		'public/build/css/bootstrap.min.css',
		'public/build/css/main.css',
	], 'public/css/app.css')