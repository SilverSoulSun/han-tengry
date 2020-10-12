@if(!empty($animal['related']))
<section class="s-related" >
    <a class="anchor" id="related"></a>
    <div class="container">
        <h2 class="a-h2">Related Animals</h2>

        <div class="s-related-row">
            <div class="row justify-content-center">
                @foreach($animal['related'] as $i => $related_animal)
                    <div class="col-lg-3 col-md-6">
                        <a href="/{{$related_animal['url']}}" class="s-related-item ml-auto" style="background: url('/uploads/animals/photos/small/1x1/{{ $related_animal['cover']['image'] }}') no-repeat center; background-size: cover">
                            <div class="s-related-item__content">
                                <div class="s-related-item__name">{{$related_animal['name']}}</div>
                                <span>{{$related_animal['scientific_name']}}</span>
                            </div>
                        </a>
                    </div>
                    @if($i==3 && count($animal['related']>5))
            </div>
        </div>
        <div class="s-related-row">
            <div class="row justify-content-center">
                    @endif
                @endforeach
            </div>
        </div>
        @if(0)
            <div class="center">
                <a href="/" class="show-more">Show more animals</a>
            </div>
        @endif
    </div>
</section>
@endif