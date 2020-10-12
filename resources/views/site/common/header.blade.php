<header xmlns="http://www.w3.org/1999/html" @if($page_name == 'catalog')class="main-head" @endif >
<div class="container clearfix">
	<a href="{{ LaravelLocalization::getLocalizedURL(null, '/') }}" class="logo">Animalia <span>All you want to know about animals</span>
	</a>

	<ul class="main-nav">
	@foreach($catalogCategories as $category)
	<li @if($page_name == 'catalog')class="catalog-li" @endif><a href="{{ LaravelLocalization::getLocalizedURL(null, '/'.$category['url']) }}">{{ $category['name_'.$gcl] }}</a></li>
	@endforeach
	</ul>

	<div class="sub-nav">
		<form class="a-search">
			<input type="text" placeholder="Search" id="search-field" class="search-field">
			<i class="fa fa-search" aria-hidden="true"></i>
		</form>

	</div>

</div>

</header>