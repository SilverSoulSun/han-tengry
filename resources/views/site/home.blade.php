@extends('site.common.base')

@section('head')
    <title>{{ trans('meta.home.title') }}</title>
    <meta name="description" content="{{ trans('meta.home.description') }}"/>

   	{{--
	<meta property="og:title" content="Animalia" />
	<meta property="og:description" content="" />
	<meta property="og:image" content="" />
	<meta property="og:site_name" content="Animalia" />
	<meta property="og:type" content="website" />
	--}}

{{--	<meta name="google-site-verification" content="G9puWESUNV5ii8GgDNpd83JhDFI391sRO79FhY3oBQM" />
	<meta name="yandex-verification" content="24d9307d00c0810d" />--}}
@stop


@section('header')
@include('site.common.header')
@stop

@section('content')
<div class="content">
<div class="container">

<a href="{{ LaravelLocalization::getLocalizedURL(null, '/'.$page_data['aod']['url']) }}" class="aod rounded"  >
	@if(BrowserDetect::isMobile())
	<div class="cover animated lazy" data-src="/uploads/animals/photos/medium/1x1/{{ $page_data['aod']['cover']['image'] }}"></div>
	@else
	<div class="cover animated lazy" data-src="/uploads/animals/photos/full/2x1/{{ $page_data['aod']['cover']['image'] }}"></div>
	@endif

	<div class="caption">
	<div class="title">Animal of the day</div>
	<div class="name">{{ $page_data['aod']['meta']['title'] }}</div>
	</div>
</a>

<div class="properties">
@foreach($page_data['properties'] as $i => $property)
	<a class="property rounded" href="{{ LaravelLocalization::getLocalizedURL(null, '/'.$property['url']) }}" >
		@if($i == 1 or $i == 5 or BrowserDetect::isMobile())
		<div class="cover animated lazy" data-src="/uploads/catalog/covers/medium/2x1/{{ $property['cover'] }}"></div>
		@else
		<div class="cover animated lazy" data-src="/uploads/catalog/covers/medium/1x1/{{ $property['cover'] }}"></div>
		@endif
		<div class="caption">
			<div class="title">{{ $property['title_'.$gcl] }}</div>
			<div class="count">{{ $property['animals_count'] }} species</div>
		</div>
	</a>
@endforeach
</div>

<h2>New animals</h2>
<div class="animals">
@foreach($page_data['animals'] as $ai => $animal)
	@include('site.tmpl.animal')
@endforeach
</div>

</div>
</div>
@stop

@section('footer')
@include('site.common.footer')
@stop