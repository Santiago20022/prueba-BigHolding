const mix = require('laravel-mix')
mix.js('resources/js/app.js', 'public/js')
  .vue()
  .sourceMaps()
  .version()

mix.webpackConfig({
    stats: {
      children: false
    }
})