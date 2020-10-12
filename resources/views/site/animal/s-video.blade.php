{{--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>--}}
<!-- REVOLUTION STYLE SHEETS -->
<link rel="stylesheet" type="text/css" href="/revolution/css/settings.css">
<!-- REVOLUTION LAYERS STYLES -->


<link rel="stylesheet" type="text/css" href="/revolution/css/layers.css">

<!-- REVOLUTION NAVIGATION STYLES -->
<link rel="stylesheet" type="text/css" href="/revolution/css/navigation.css">

<!-- FONT AND STYLE FOR BASIC DOCUMENTS, NO NEED FOR FURTHER USAGE IN YOUR PROJECTS-->

{{--<link rel="stylesheet" type="text/css" href="/revolution/css/noneed.css">--}}
<!-- REVOLUTION JS FILES -->
{{--<script type="text/javascript" src="/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="/revolution/js/jquery.themepunch.revolution.min.js"></script>--}}

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
{{--<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="/revolution/js/extensions/revolution.extension.video.min.js"></script>--}}
<script type="text/javascript">
/*    window.onload = function() {
            var tpj = jQuery;

            var revapi1070;
       /!* tpj(document).ready(function () {
            if (tpj("#rev_slider_1070_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1070_1");
            } *!/
           // else {
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
                        /!*arrows: {

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

                        }*!/
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

        /!*ready*!/
    };*/
</script>
@if(count($animal['videos']) > 0)
<section class="video">
    <div class="container">
        <h2 class="a-h2">Video</h2>
        <article class="content1">


            <div id="rev_slider_1070_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="media-gallery" data-source="gallery" style="margin:0px auto;background-color:#333333;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.4.1 auto mode -->
                <div id="rev_slider_1070_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
                    <ul>
                        <!-- SLIDE  -->
                        @foreach($animal['videos'] as $i=> $video)
                            @if($video['type']=="Youtube")
                                <li data-index="rs-3018{{$i}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="https://img.youtube.com/vi/{{$video['video_id']}}/default.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="{{$video['title']}}" data-param1="{{$video['video_category']}}" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    {{--<img src="../../assets/images/dummy.png"  alt=""  data-lazyload="../../assets/images/youtube1_cover.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>--}}
                                    <!-- LAYERS -->
                                    <!-- LAYER NR. 3 -->
                                        <div class="tp-caption   tp-resizeme fullscreenvideo tp-videolayer"
                                             id="slide-3018-layer-3{{$i}}"
                                             data-x="0"
                                             data-y="0"
                                             data-type="video"
                                             data-responsive_offset="on"

                                             data-frames='[{"speed":1000,"to":"o:1;","delay":1000,"ease":"Power1.easeInOut"},{"delay":"wait","speed":1000,"ease":"nothing"}]'
                                             data-ytid="{{$video['video_id']}}"
                                             data-videoattributes="version=3&amp;enablejsapi=1&amp;html5=1&amp;volume=100&hd=1&wmode=opaque&showinfo=0&ref=0&rel=0&origin=@php echo public_path() @endphp;"
                                             data-videorate="1"
                                             data-videowidth="100%"
                                             data-videoheight="100%"
                                             data-videocontrols="controls" data-videoloop="none"
                                             data-forceCover="1" data-aspectratio="16:9"
                                             data-textAlign="['left','left','left','left']"
                                             data-paddingtop="[0,0,0,0]"
                                             data-paddingright="[0,0,0,0]"
                                             data-paddingbottom="[0,0,0,0]"
                                             data-paddingleft="[0,0,0,0]"
                                             data-autoplay="on"
                                             data-nextslideatend="true"
                                             data-volume="100" data-forcerewind="on"
                                             style="z-index: 7;text-transform:left;border-width:0px;"> </div>
                                </li>
                            @elseif($video['type']=="Vimeo")
                                <li data-index="rs-3016{{$i}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"
                                    data-thumb="
                                        @php
                                            $imgid = $video['video_id'];

                                            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));

                                            echo $hash[0]['thumbnail_medium'];
                                        @endphp
                                    "
                                    data-rotate="0"  data-saveperformance="off"  data-title="{{$video['title']}} " data-param1="{{$video['video_category']}}" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    {{--<img src="../../assets/images/dummy.png"  alt=""  data-lazyload="../../assets/images/amigos.jpg" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>--}}
                                    <!-- LAYERS -->

                                    <!-- LAYER NR. 1 -->
                                    <div class="tp-caption   tp-resizeme fullscreenvideo tp-videolayer"
                                         id="slide-3016-layer-3{{$i}}"
                                         data-x="0"
                                         data-y="0"
                                         data-type="video"
                                         data-responsive_offset="on"

                                         data-frames='[{"speed":1000,"to":"o:1;","delay":1150,"ease":"Power1.easeInOut"},{"delay":"wait","speed":1000,"ease":"nothing"}]'
                                         data-vimeoid="{{$video['video_id']}}"
                                         data-videoattributes="title=0&byline=0&portrait=0&api=1" data-videowidth="100%" data-videoheight="100%" data-videoloop="none" data-forceCover="1" data-aspectratio="16:9"			data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         data-autoplay="off"
                                         data-nextslideatend="true"
                                         data-volume="100" data-forcerewind="on"
                                         style="z-index: 5;text-transform:left;border-width:0px;"> </div>
                                </li>
                            @endif
                        @endforeach


                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
        </div><!-- END REVOLUTION SLIDER -->



    </article>
    </div>
</section>
@endif