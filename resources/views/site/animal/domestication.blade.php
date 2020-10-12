@if(!empty($animal['meta']['domestication']))
<div class="block domestication" id="domestication">
    <div class="block-content block-content-right">
        @if(!empty($animal['meta']['domestication']))
        <h2>Domestication</h2>
        <div class="text">{!! $animal['meta']['domestication'] !!}</div>
        @endif
    </div>

    <div class="block-content block-content-left block-content-photos">
        @foreach ($animal['photos']['domestication'] as $i => $photo)
        <div class="photo open-gallery" data-id="{{ $photo['id'] }}">
            @if($i == 0)
            <img src="/uploads/animals/photos/medium/original/{{ $photo['image'] }}" alt="{{ $photo['name'] }}">
            @else
            <img src="/uploads/animals/photos/medium/1x1/{{ $photo['image'] }}" alt="{{ $photo['name'] }}">
            @endif
        </div>
        @endforeach
    </div>
</div>
@endif