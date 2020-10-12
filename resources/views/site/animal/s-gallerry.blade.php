@if($animal['photos']['title']->count()>3)
<section class="s-gallery" >
    <a class="anchor" id="photo-gallery"></a>
    <div class="container">
        <h2 class="a-h2">Photos with
            @if(empty($animal['meta']['title']))
                {{ $animal['name'] }}
            @else
                {{ $animal['meta']['title'] }}
            @endif
        </h2>
        <!-- <a href="#p-animal" class="s-gallery-arrow"></a> -->
        <div class="s-gallery-block">
            <div class="row">
                <div class="col-lg-6 no-gutter-r">
                    <div class="s-gallery-item s-gallery-item--md open-gallery" data-id="{{$animal['photos']['title'][0]['id']}}">
                        <img src="/uploads/animals/photos/full/1x1/{{ $animal['photos']['title'][0]['image'] }}" alt="{{ $animal['photos']['title'][0]['name'] }}">
                    </div>
                </div>

                <div class="col-lg-6 no-gutter-r">
                    <div class="s-gallery-block__sm">
                        <div class="row">
                            <div class="col-sm-6 no-gutter-r">
                                @if(!empty($animal['photos']['title'][1]))
                                    <div class="s-gallery-item s-gallery-item--right open-gallery" data-id="{{$animal['photos']['title'][1]['id']}}">
                                        <img src="/uploads/animals/photos/small/1x1/{{ $animal['photos']['title'][1]['image'] }}" alt="{{ $animal['photos']['title'][1]['name'] }}">
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-6 no-gutter-r">
                                @if(!empty($animal['photos']['title'][2]))
                                    <div class="s-gallery-item s-gallery-item--right open-gallery" data-id="{{$animal['photos']['title'][2]['id']}}">
                                        <img src="/uploads/animals/photos/small/1x1/{{ $animal['photos']['title'][2]['image'] }}" alt="{{ $animal['photos']['title'][2]['name'] }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="s-gallery-block__sm">
                        <div class="row">
                            <div class="col-sm-6 no-gutter-r">
                                @if(!empty($animal['photos']['title'][3]))
                                <div class="s-gallery-item s-gallery-item--right open-gallery" data-id="{{$animal['photos']['title'][3]['id']}}">
                                    <img src="/uploads/animals/photos/small/1x1/{{ $animal['photos']['title'][3]['image'] }}" alt="{{ $animal['photos']['title'][3]['name'] }}">
                                </div>
                                @endif
                            </div>
                            <div class="col-sm-6 no-gutter-r">
                                @if(!empty($animal['photos']['title'][4]))
                                    <div class="s-gallery-item s-gallery-item--right open-gallery" data-id="{{$animal['photos']['title'][4]['id']}}">
                                        <img src="/uploads/animals/photos/small/1x1/{{ $animal['photos']['title'][4]['image'] }}" alt="{{ $animal['photos']['title'][4]['name'] }}">
                                    </div>
                                @endif

                                    @if(count($animal['photos']['title'])>5)
                                        <div class="more-photos">
                                            <div class="total">
                                                <span class="symbol">+</span><span class="num">{{ $animal['photos']['title']->count() - 5 }}</span>
                                            </div>
                                        </div>
                                    @endif


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endif