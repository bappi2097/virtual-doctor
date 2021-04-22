const mix = require("laravel-mix");
require("laravel-mix-purgecss");

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
// mix.extract();

mix.js("resources/js/app.js", "public/js")
    .copy("resources/template/assets/libs/jquery/dist/jquery.min.js", "public/assets/libs/jquery/dist/jquery.min.js")
    .copy("resources/template/js/jquery-3.5.1.min.js", "public/js/jquery-3.5.1.min.js")
    .copy("resources/template/js/bootstrap.bundle.min.js", "public/js/bootstrap.bundle.min.js")
    .copy("resources/template/js/all.min.js", "public/js/all.min.js")
    .copy("resources/js/toastr.js", "public/js/toastr.js")
    .copy("resources/template/js/feather.min.js", "public/js/feather.min.js")
    .copy("resources/template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js", "public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js")
    .copy("resources/template/assets/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js", "public/assets/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js")
    .copy("resources/template/assets/libs/select2@4.1.0-rc.0/dist/js/select2.min.js", "public/assets/libs/select2@4.1.0-rc.0/dist/js/select2.min.js")
    .copy("resources/template/assets/libs/summernote-0.8.18-dist/summernote-lite.js", "public/assets/libs/summernote-0.8.18-dist/summernote-lite.js")
    .copy("resources/template/dist/js/app-style-switcher.js", "public/dist/js/app-style-switcher.js")
    .copy("resources/template/dist/js/waves.js", "public/dist/js/waves.js")
    .copy("resources/template/dist/js/sidebarmenu.js", "public/dist/js/sidebarmenu.js")
    .copy("resources/template/dist/js/custom.js", "public/dist/js/custom.js")
    .copy("resources/template/js/scripts.js", "public/js/scripts.js")
    .copy("resources/template/assets/libs/chartist/dist/chartist.min.js", "public/assets/libs/chartist/dist/chartist.min.js")
    .copy("resources/template/assets/libs/moment.js/2.29.1/moment.min.js", "public/assets/libs/moment.js/2.29.1/moment.min.js")
    .copy("resources/template/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js", "public/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js")
    .copy("resources/template/dist/js/pages/dashboards/dashboard1.js", "public/dist/js/pages/dashboards/dashboard1.js")
    .copy("resources/template/dist/js/pages/datatable/datatable-basic.init.js", "public/dist/js/pages/datatable/datatable-basic.init.js")
    .copy("resources/template/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js", "public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js")
    .postCss("resources/template/assets/libs/chartist/dist/chartist.min.css", "public/assets/libs/chartist/dist/chartist.min.css")
    .postCss("resources/template/assets/libs/select2@4.1.0-rc.0/dist/css/select2.min.css", "public/assets/libs/select2@4.1.0-rc.0/dist/css/select2.min.css")
    .postCss("resources/template/assets/libs/summernote-0.8.18-dist/summernote-lite.css", "public/assets/libs/summernote-0.8.18-dist/summernote-lite.css")
    .postCss("resources/template/assets/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css", "public/assets/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css")
    .postCss("resources/template/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css", "public/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css")
    .postCss("resources/template/dist/css/style.min.css", "public/dist/css/style.min.css")
    .postCss("resources/template/dist/css/custom.css", "public/dist/css/custom.css")
    .postCss("resources/template/assets/styles.css", "public/css/styles.css")
    .postCss("resources/css/toastr.css", "public/css/toastr.css")
    .postCss("resources/template/dist/css/preloader.css", "public/dist/css/preloader.css")
    .copy("resources/template/dist/image", "public/dist/image")
    .copy("resources/template/assets/images", "public/assets/images")
    .purgeCss()
    .version();
