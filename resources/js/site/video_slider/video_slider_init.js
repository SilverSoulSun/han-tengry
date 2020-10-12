/**
 * Created by han on 20/05/2018.
 */
window.onload = function() {
    var tpj = jQuery;

    var revapi1070;
    /* tpj(document).ready(function () {
     if (tpj("#rev_slider_1070_1").revolution == undefined) {
     revslider_showDoubleJqueryError("#rev_slider_1070_1");
     } */
    // else {
    if (typeof(YT) == 'undefined' || typeof(YT.Player) == 'undefined') {

        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        /*window.onYouTubePlayerAPIReady = function() {
            onYouTubePlayer();
        };*/
    }

    revapi1070 = tpj("#rev_slider_1070_1").show().revolution({

        sliderType: "standard",
        jsFileLocation: "revolution/js/",
        sliderLayout: "auto",
        dottedOverlay: "none",
        delay: 9000,
        navigation: {
            keyboardNavigation: "off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation: "off",
            mouseScrollReverse: "default",
            onHoverStop: "off",
            tabs: {
                style: "hesperiden",
                enable: true,
                width: 300,
                height: 80,
                min_width: 150,
                wrapper_padding: 0,
                wrapper_color: "#ffffff",
                wrapper_opacity: "1",
                tmp: '<div class="tp-tab-content">  <span class="tp-tab-date">@{{param1}}</span>  <span class="tp-tab-title">@{{title}}</span></div><div class="tp-tab-image"></div>',
                visibleAmount: 5,
                hide_onmobile: true,
                hide_onleave: false,
                hide_delay: 200,
                direction: "horizontal",
                span: false,
                position: "outer-bottom",
                space: 0,
                h_align: "left",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 0
            }
            /*arrows: {

             enable: true,
             style: 'gyges',
             tmp: '',
             rtl: false,
             hide_onleave: false,
             hide_onmobile: true,
             hide_under: 0,
             hide_over: 9999,
             hide_delay: 200,
             hide_delay_mobile: 1200,

             left: {
             container: 'slider',
             h_align: 'left',
             v_align: 'center',
             h_offset: 20,
             v_offset: 0
             },

             right: {
             container: 'slider',
             h_align: 'right',
             v_align: 'center',
             h_offset: 20,
             v_offset: 0
             }

             }*/
        },
        visibilityLevels: [1240, 1024, 778, 480],
        //responsiveLevels: [1240, 1024, 778, 480],
        //visibilityLevels: [1240, 1024],
        gridwidth: 1230,
        gridheight: 692,
        lazyType: "smart",
        shadow: 0,
        //figure out
        spinner: "spinner5",
        stopLoop: "on",
        stopAfterLoops: 0,
        stopAtSlide: 1,
        shuffle: "off",
        autoHeight: "off",
        disableProgressBar: "on",
        hideThumbsOnMobile: "off",
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        debugMode: false,
        fallbacks: {
            simplifyAll: "off",
            nextSlideOnWindowFocus: "off",
            disableFocusListener: false
        }
    });

    // }

    /*ready*/
};