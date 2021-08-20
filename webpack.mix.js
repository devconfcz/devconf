let mix = require('laravel-mix');
let build = require('./tasks/build.js');

mix.disableSuccessNotifications();
mix.setPublicPath('source/assets/build');
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch(['source/**/*.md', 'source/**/*.php', 'source/**/*.scss', '!source/**/_tmp/*']),
    ]
});

mix.js('source/_assets/js/main.js', 'js')
    .sass('source/_assets/sass/main.scss', 'css')
    .sass('source/_assets/sass/site.scss', 'css')
    .sass('source/_assets/sass/cookie.scss', 'css')
    .sass('source/_assets/sass/subsite.scss', 'css')
    .sass('source/_assets/sass/timeline.scss', 'css')
    .sass('source/_assets/sass/backtop.scss', 'css')
    .options({
        processCssUrls: false,
    }).version();
