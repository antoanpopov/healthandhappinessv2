let mix = require('laravel-mix').mix;
const WebpackShellPlugin = require('webpack-shell-plugin');
const themeInfo = require('./theme.json');

mix.sass('Resources/scss/app.scss','assets/css/all.css');
/**
 * Concat scripts
 */
mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap-sass/assets/javascript/bootstrap.min.js',
], 'assets/js/all.js');

/**
 * Copy Font directory https://laravel.com/docs/5.4/mix#url-processing
 */
mix.copy(
  'fonts',
  '../../public/fonts'
);

/**
 * Publishing the assets
 */
mix.webpackConfig({
    plugins: [
        new WebpackShellPlugin({onBuildEnd: ['php ../../artisan stylist:publish ' + themeInfo.name]})
    ]
});
