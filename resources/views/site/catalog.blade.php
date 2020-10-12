@extends('site.common.base')

@section('head')
    <title>{{ trans('meta.catalog.title', array('title' => $page_data['info']['title_'.$gcl], 'total' => $page_data['animals']->total()) ) }}</title> 
    <meta name="description" content="{{ trans('meta.catalog.description', array('title' => $page_data['info']['title_'.$gcl]) ) }}"/>
   	
    @if($page_data['info']['index'] == false)
    <meta name="robots" content="noindex, follow">
    @endif

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
<div class="content main-content">

<div class="page-cover">
	<div class="icover lazy @if(!empty($page_data['info']['cover'])) page-cover-image @endif" 
	@if(!empty($page_data['info']['color'])) style="background-color: {{ $page_data['info']['color']  }}" @endif  
	@if(!empty($page_data['info']['cover'])) data-src="/uploads/catalog/covers/full/2x1/{{ $page_data['info']['cover'] }}" @endif>		
	</div>
	
	<div class="overlay">
	<div class="container">
		<div class="title">
			<div class="page-type">
				@if($page_data['page_type'] != 'category')
				{{ str_replace("_", " ", $page_data['info']['type']) }}
				@endif
			</div>
			<h1>{{ $page_data['info']['title_'.$gcl] }}</h1>
			<h2>{{ $page_data['animals']->total() }} {{ str_plural('species', $page_data['animals']->total()) }}</h2>
		</div>

		<div class="description">
			<p>{{ $page_data['info']['description_'.$gcl] }}</p>
			@if(!empty($page_data['info']['source_'.$gcl]))
			<a class="source" target="_blank" href="{{ $page_data['info']['source_'.$gcl] }}">Source <i class="fa fa-external-link" aria-hidden="true"></i></a>
			@endif
		</div>
	</div>
	</div>
</div>

<div class="container">

<div class="animals">
@foreach($page_data['animals'] as $ai => $animal)
	@include('site.tmpl.animal')
@endforeach
</div>


@if($page_data['animals']->lastPage() > 1)
	@if(!BrowserDetect::isMobile())
		<div class="paginator">
			<?php
				$paginator = urldecode( $page_data['animals']->render() );
				if($page_data['animals']->currentPage() == 2){
					$paginator = \Controller::str_replace_nth('?page=1', '', $paginator, 0);
					$paginator = \Controller::str_replace_nth('?page=1', '', $paginator, 0);
				}

				if($page_data['animals']->currentPage() > 2){
					$paginator = \Controller::str_replace_nth('?page=1', '', $paginator, 0);
				}
				
			?>
		    {!! $paginator !!}
		</div>
	@else
		<div class="mobile-paginator">

			@if(Input::get('page') > 1)
			<a class="prev" href="{!! str_replace('?page=1', '', $page_data['animals']->url( $page_data['animals']->currentPage()-1 ) ); !!}">Previous</a>
			@endif
			@if($page_data['animals']->currentPage() != $page_data['animals']->lastPage())
			<a class="next" href="{!! $page_data['animals']->nextPageUrl() !!}">Next</a>
			@endif
	
		</div>
	@endif

@endif

</div>
</div>
@stop

@section('footer')
@include('site.common.footer')
@stop