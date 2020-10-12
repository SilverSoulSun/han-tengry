@extends('site.common.base')

@section('head')
    <title>{{ trans('meta.animal.title', array('name' => $animal['meta']['title']) ) }}</title> 
    <meta name="description" content="{{ trans('meta.animal.description', array('name' => $animal['meta']['title']) ) }}"/>

    {{--
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:type" content="website" />  
    --}}

@stop


@section('header')
    @include('site.animal.s-floating-header')
    @include('site.common.header')
@stop

@section('content')

    @include('site.animal.s-char')
    {{--@if(Request::url() === 'animalia.bio')--}}
    @include('site.animal.s-ad-banner-horizontal-1')
    {{--@endif--}}
    @include('site.animal.s-gallerry')
    {{--@if ( $animal['name']=="Snow Leopard")--}}
    {{--@if(0)--}}
    @include('site.animal.s-video')
    {{--@endif--}}
    @include('site.animal.s-distr')
    @include('site.animal.s-habbit')
    @include('site.animal.s-diet')
    @include('site.animal.s-mating')
    @include('site.animal.s-population')
    @include('site.animal.s-domest')
    @include('site.animal.s-fact')
    @include('site.animal.s-ad-banner-horizontal-2')
    @include('site.animal.s-ref')
    @include('site.animal.s-related')
    @include('site.animal.s-fascinating')


{{--<div class="content">
<div class="container">

    <div class="head">

        @if(empty($animal['meta']['title']))
    	<h1>{{ $animal['name'] }}</h1>
    	@else
    	<h1>{{ $animal['meta']['title'] }}</h1>
    	@endif

         <div class="share">
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_inline_share_toolbox"></div>
        </div>

        <div class="names">
            <div class="name">{{ $animal['scientific_name'] }}</div>
            @if(!empty($animal['meta']['common_names']))
             • 
            <div class="name">{{ $animal['meta']['common_names'] }}</div>
            @endif
        </div>  
    </div>

    @include('site.animal.nav')
    @include('site.animal.photos')
    @include('site.animal.appearance')
    @include('site.animal.characteristics')
    @include('site.animal.disrtibution')
    @include('site.animal.lifestyle')
    @include('site.animal.nutrition')
    @include('site.animal.mating')
    @include('site.animal.population')

    @include('site.animal.domestication')
    @include('site.animal.facts')

    @include('site.animal.references')
</div>
</div>--}}
@stop

@section('scripts')
<script type="text/javascript">
    
    API.conditions['animal_id'] = {{ $animal['id'] }};
    var gallery = {};

</script>
@stop

@section('footer')
@include('site.common.footer')
@include('site.common.gallery')
{{--@include('site.common.gallery') --}}
@stop