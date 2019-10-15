const path = require('path')
const fs = require('fs-extra')
const mix = require('laravel-mix')
require('laravel-mix-versionhash')
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')


mix
    .options({
        processCssUrls: false
    })
    .scripts([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/jquery-ui/jquery-ui.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/admin-lte/dist/js/adminlte.min.js',
        'bower_components/moment/min/moment.min.js',
        'bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'
    ], 'public/admin/dist/js/all.js')
    .styles([
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'bower_components/admin-lte/dist/css/AdminLTE.min.css',
        'bower_components/admin-lte/dist/css/skins/_all-skins.css',
        'bower_components/admin-lte/dist/css/skins/skin-blue.min.css',
        'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'bower_components/bootstrap-daterangepicker/daterangepicker.css'
    ], 'public/admin/dist/css/all.css')

    .js('resources/js/app.js', 'public/dist/js')
    .sass('resources/sass/app.scss', 'public/dist/css')


    .copyDirectory('bower_components/font-awesome/fonts', 'public/admin/dist/fonts')
    .copyDirectory('bower_components/bootstrap/fonts', 'public/admin/dist/fonts')
    // .copyDirectory('resources/images', 'public/images')
    .disableNotifications()

if (mix.inProduction()) {
    mix
    // .extract() // Disabled until resolved: https://github.com/JeffreyWay/laravel-mix/issues/1889
    // .version() // Use `laravel-mix-versionhash` for the generating correct Laravel Mix manifest file.
        .versionHash()
} else {
    mix.sourceMaps()
}

mix.webpackConfig({
    plugins: [
        // new BundleAnalyzerPlugin()
    ],
    resolve: {
        extensions: ['.js', '.json', '.vue'],
        alias: {
            '~': path.join(__dirname, './resources/js')
        }
    },
    output: {
        chunkFilename: 'dist/js/[chunkhash].js',
        path: mix.config.hmr ? '/' : path.resolve(__dirname, './public/build')
    }
})

mix.then(() => {
    if (!mix.config.hmr) {
        process.nextTick(() => publishAseets())
    }
})

function publishAseets() {
    const publicDir = path.resolve(__dirname, './public')

    if (mix.inProduction()) {
        fs.removeSync(path.join(publicDir, 'dist'))
    }

    fs.copySync(path.join(publicDir, 'build', 'dist'), path.join(publicDir, 'dist'))
    fs.removeSync(path.join(publicDir, 'build'))
}
