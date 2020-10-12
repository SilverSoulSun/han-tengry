<header>
<div class="container">

	<a href="{{ LaravelLocalization::getLocalizedURL(null, '/') }}" class="logo">Animalia</a>
	<a href="{{ LaravelLocalization::getLocalizedURL(null, '/') }}" class="slogan">All you want to know about animals </a>


	<ul class="main-nav">
	@foreach($catalogCategories as $category)
	<li><a href="{{ LaravelLocalization::getLocalizedURL(null, '/'.$category['url']) }}">{{ $category['name_'.$gcl] }}</a></li>
	@endforeach
	</ul>

	<div class="sub-nav">
		<li><a><i class="fa fa-search" aria-hidden="true"></i></a></li>
	</div>

</div>
</header>