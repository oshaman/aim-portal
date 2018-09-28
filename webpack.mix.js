// noinspection JSAnnotator
let mix = require('laravel-mix');

mix.styles([
    'resources/assets/admin/css/bootstrap/bootstrap.min.css',
    'resources/assets/admin/css/font-awesome.min.css',
    'resources/assets/admin/css/select2.min.css',
    'resources/assets/admin/css/ionicons.min.css',
    'resources/assets/admin/css/AdminLTE.min.css',
    'resources/assets/admin/css/custom.css',
    'resources/assets/admin/css/_all-skins.min.css'
], 'public/css/admin.css');

mix.scripts([
    'resources/assets/admin/js/jquery.min.js',
    'resources/assets/admin/js/bootstrap.min.js',
    'resources/assets/admin/js/select2.full.min.js',
    'resources/assets/admin/js/fastclick.min.js',
    'resources/assets/admin/js/jquery.slimscroll.min.js',
    'resources/assets/admin/js/adminlte.min.js',
    'resources/assets/admin/dist/js/scripts.js',
    'resources/assets/admin/js/translate.js'
], 'public/js/admin.js');

mix.copy('resources/assets/admin/fonts/bootstrap', 'public/fonts');
mix.copy('resources/assets/admin/fonts/font-awesome', 'public/fonts');
