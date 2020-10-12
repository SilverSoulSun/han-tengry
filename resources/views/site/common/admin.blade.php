@if(Auth::check() and Auth::user()->admin)
<div class="admin-panel-padder"></div>
<div class="admin-panel">
	<div class="container">
	<a href="/admin" target="_blank" class="admin">Admin</a>

	@if($page_name == 'catalog')
	<ul>
		@if($page_data['page_type'] == 'property')
		<li><a target="_blank"  href="/admin/properties/{{ $page_data['page_id'] }}">Edit property</a></li>
		@endif
		@if($page_data['page_type'] == 'category')
		<li><a target="_blank"  href="/admin/categories/{{ $page_data['page_id'] }}">Edit category</a></li>
		@endif
		@if($page_data['page_type'] == 'taxonomy')
		<li><a target="_blank"  href="/admin/taxonomies/{{ $page_data['page_id'] }}">Edit taxonomy</a></li>
		@endif
		@if($page_data['page_type'] == 'environment')
		<li><a target="_blank"  href="/admin/environments/{{ $page_data['page_id'] }}">Edit environment</a></li>
		@endif
	</ul>
	@endif

	@if($page_name == 'animal')
	<ul>
		<li><a target="_blank"  href="/admin/animals/{{ $animal['id'] }}">Edit animal</a></li>
		

		<li><a target="_blank"  href="/admin/photos?animal_id={{ $animal['id'] }}">Photos</a></li>		
		<li><a target="_blank"  href="/admin/habitat_maps/{{ $page_data['admin']['habitat_map']['id'] }}">Habitat map</a></li>
		<li><a target="_blank"  href="/admin/references?animal_id={{ $animal['id'] }}">References</a></li>

		<li><span>Animal Meta</span></li>
		@foreach($page_data['admin']['metas'] as $meta)
		<li><a target="_blank"  href="/admin/animals_metas/{{ $meta['id'] }}">{{ $meta['lang'] }}</a></li>
		@endforeach
		
		<li><span>Tools</span></li>
		<li><a target="_blank"  href="/admin/page/admin.photos-import">Import photos</a></li>
		<li><a target="_blank"  href="/admin/page/admin.cropper">Cropper</a></li>
	</ul>
	@endif
	</div>
</div>
@endif