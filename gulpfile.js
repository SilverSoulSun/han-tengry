process.env.DISABLE_NOTIFIER = true;
const elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('resources/img', 'public/build/img');

	mix.scripts([
        "libs/jquery-3.1.0.js",
        "libs/jquery.lazy.min.js",
        "libs/jquery.disablescroll.min.js",
        "libs/jquery-ui.min.js",
        "libs/owl.carousel.min.js",
        
        "site/api.js",
        "site/ui.js",
        "site/search.js",
        "site/carousel.js",
        "site/show_more.js",
        "site/header.js",
        "site/video_slider/jquery.themepunch.revolution.min.js",
        "site/video_slider/jquery.themepunch.tools.min.js",
        "site/video_slider/revolution.extension.actions.min.js",
        "site/video_slider/revolution.extension.carousel.min.js",
        "site/video_slider/revolution.extension.kenburn.min.js",
        "site/video_slider/revolution.extension.layeranimation.min.js",
        "site/video_slider/revolution.extension.migration.min.js",
        "site/video_slider/revolution.extension.navigation.min.js",
        "site/video_slider/revolution.extension.parallax.min.js",
        "site/video_slider/revolution.extension.slideanims.min.js",
        "site/video_slider/revolution.extension.video.min.js",
        "site/video_slider/video_slider_init.js"

     

    ], 'public/js/all.js', 'resources/js');

/*    mix.scripts([

        "site/video_slider/jquery.themepunch.revolution.min.js",
        "site/video_slider/jquery.themepunch.tools.min.js",
        "site/video_slider/revolution.extension.actions.min.js",
        "site/video_slider/revolution.extension.carousel.min.js",
        "site/video_slider/revolution.extension.kenburn.min.js",
        "site/video_slider/revolution.extension.layeranimation.min.js",
        "site/video_slider/revolution.extension.migration.min.js",
        "site/video_slider/revolution.extension.navigation.min.js",
        "site/video_slider/revolution.extension.parallax.min.js",
        "site/video_slider/revolution.extension.slideanims.min.js",
        "site/video_slider/revolution.extension.video.min.js",
        //"site/video_slider/video_slider_init.js"



    ], 'public/js/slider.js', 'resources/js');*/

	mix.styles([
        "libs/reset.css",
        "libs/animate.css",
        "libs/font-awesome.css",
       
        "site/base.css",
        "site/inputs.css",
        "site/elements.css",
        "site/layouts.css",
        "site/popups.css",
        "site/pages.css",
        "site/new.css",
        //"site/video_slider/layers.css",
        //"site/video_slider/navigation.css",
        //"site/video_slider/settings.css"

      
    ], 'public/css/all.css', 'resources/css');


    mix.scripts([
        "libs/jquery-3.1.0.js",
        
        "libs/chosen.jquery.min.js",
        "libs/cropper.min.js",
        "libs/jquery.uploadfile.js",
        
        "admin/api.js",
        "admin/ui.js",
     

    ], 'public/js/admin.js', 'resources/js');


    mix.scripts([
        
        "admin/administrator.js",
     

    ], 'public/js/administrator.js', 'resources/js');


    mix.styles([

        "libs/chosen.css",
        "libs/cropper.min.css",

        "admin/base.css",
        "admin/main.css",
      
    ], 'public/css/admin.css', 'resources/css');


    mix.styles([

        "admin/administrator.css",
      
    ], 'public/css/administrator.css', 'resources/css');



    mix.styles([
        
        "site/responsive/desktop.css", 
        "site/responsive/normal.css",
        "site/responsive/wide.css",
      
    ], 'public/css/desktop.css', 'resources/css');

    mix.styles([

        "site/responsive/mt.css",
        "site/responsive/mobile.css",
        "site/responsive/tablet.css",
      
    ], 'public/css/mobile.css', 'resources/css');

    mix.version(["js/all.js", "js/admin.js", "js/administrator.js", "css/all.css", "css/mobile.css", "css/desktop.css", "css/admin.css", "css/administrator.css"]);

});
