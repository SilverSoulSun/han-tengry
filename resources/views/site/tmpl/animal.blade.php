<a class="item-animal rounded" href="{{ LaravelLocalization::getLocalizedURL(null, '/'.$animal['url']) }}" >
	@if($ai == 0)
	<div class="cover animated lazy" data-src="/uploads/animals/photos/full/1x1/{{ $animal['cover']['image'] }}"></div>
	@else
	<div class="cover animated lazy" data-src="/uploads/animals/photos/small/1x1/{{ $animal['cover']['image'] }}"></div>
	@endif
	<div class="caption">
		@if(empty($animal['meta']['title']))
		<div class="name">{{ $animal['name'] }}</div>
		@else
		<div class="name">{{ $animal['meta']['title'] }}</div>
		@endif
		<div class="scientific_name">{{ $animal['scientific_name'] }}</div>
	</div>
</a>