<div class="title-photos rounded">
    <div class="cover open-gallery" data-id="{{ $animal['cover']['id'] }}">
        <img src="/uploads/animals/photos/full/1x1/{{ $animal['cover']['image'] }}" alt="{{ $animal['meta']['title'] }}">
    </div>
    <div class="photos">
    @foreach ($animal['photos']['title'] as $i => $photo)
        <div class="photo open-gallery" data-id="{{ $photo['id'] }}">
            <img src="/uploads/animals/photos/small/1x1/{{ $photo['image'] }}" alt="{{ $photo['name'] }}">
            @if($i == 3)
                <div class="more-photos">
                    <div class="total">
                        <span class="symbol">+</span><span class="num">{{ $animal['photos']['total'] - 4 }}</span>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
    </div>
</div>