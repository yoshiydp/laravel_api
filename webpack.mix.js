let mix = require('laravel-mix');
mix.pug = require('laravel-mix-pug');

mix.js('resources/js/build.js','public/js')
.sass('resources/scss/app.scss','public/css')
.pug('resources/pug/layouts/[^_]*.pug','resources/views/layouts',{
  pug: {
    pretty: true
  },
  ext: '.blade.php',
  excludePath: 'resources/pug/layouts'
})
.pug('resources/pug/home/*.pug','resources/views/home',{
  pug: {
    pretty: true
  },
  ext: '.blade.php',
  excludePath: 'resources/pug/home'
})
.webpackConfig({
  module: {
    rules: [{
      test: /\.pug$/,
      loader: 'pug-plain-loader'
    },{
      test: /\.styl(us)?$/,
      loader: 'style-loader',
    }],
  }
});