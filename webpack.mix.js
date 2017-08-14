let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/backend.scss', 'public/css')
    .scripts([
            './../../metronic_v4.5.6/theme/assets/global/plugins/respond.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/excanvas.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap/js/bootstrap.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/select2/js/select2.full.min.js',
            './../../metronic_v4.5.6/theme/assets/pages/scripts/components-multi-select.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/js.cookie.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/jquery.blockui.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/ckeditor/ckeditor.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/autosize/autosize.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js',
            './../../metronic_v4.5.6/theme/assets/global/scripts/app.min.js',
            './../../metronic_v4.5.6/theme/assets/pages/scripts/components-form-tools.min.js',
            './../../metronic_v4.5.6/theme/assets/layouts/layout/scripts/layout.min.js',
            './../../metronic_v4.5.6/theme/assets/layouts/layout/scripts/demo.min.js',
            './../../metronic_v4.5.6/theme/assets/layouts/global/scripts/quick-sidebar.min.js',
            './../../metronic_v4.5.6/theme/assets/global/plugins/bootstrap-summernote/summernote.min.js',
            './node_modules/datatables/media/js/jquery.dataTables.min.js',
        ],
        'public/js/backend.js')
    .scripts('resources/assets/js/backend-custom.js', 'public/js/backend-custom.js');
