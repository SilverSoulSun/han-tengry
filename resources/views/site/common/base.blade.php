<!DOCTYPE html>
<html>
<head>

@yield('head')
<meta charset="UTF-8"/>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

<link rel="apple-touch-icon" sizes="114×114" href="/images/site/touch-icon-114×114.png" />
<link rel="apple-touch-icon" sizes="72×72" href="/images/site/touch-icon-72×72.png" />
<link rel="apple-touch-icon" href="/images/site/touch-icon-iphone.png" />

<link rel="stylesheet" href="{{ elixir('css/all.css') }}">

@if(BrowserDetect::isMobile() or BrowserDetect::isTablet())
<link rel="stylesheet" href="{{ elixir('css/mobile.css') }}">
@else
<link rel="stylesheet" href="{{ elixir('css/desktop.css') }}">
@endif
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='mobile-web-app-capable' content='yes' >
<meta name='apple-mobile-web-app-capable' content='yes'>
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#000">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#000">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#000">
<!--[if lt IE 10]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js">-->
<![endif]-->
{{--<script
        src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
        crossorigin="anonymous">
</script>--}}
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
{{--
 <script>
     (adsbygoogle = window.adsbygoogle || []).push({
         google_ad_client: "ca-pub-7017496865378638",
         enable_page_level_ads: true
     });
 </script>
--}}


</head>

<body class="page-{{ @$page_name }} @if(Auth::check() and Auth::user()->admin)b-admin @endif">

 @include('site.common.admin')

@yield('header')
@yield('content')
@yield('footer')

<script src="{{ elixir('js/all.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
 WebFont.load({
   google: {
     families: ['Open Sans:400,300,600,700,800', 'Rubik:300,400,500,700,900']
   }
 });
</script>



@yield('scripts')
@include('site.common.metrics')
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
 <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ae88d90b258a035"></script>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
 <!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ae8c05468f59a9f"></script>-->

</body>
</html>