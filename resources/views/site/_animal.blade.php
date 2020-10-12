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
@include('site.common.header')
@stop

@section('content')
<div class="content">
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
</div>
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
@stop