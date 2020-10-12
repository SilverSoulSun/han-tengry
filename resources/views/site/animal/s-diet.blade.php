@if(!empty($animal['meta']['nutrition']) || count($animal['diets']) > 0 || count($animal['preys']) > 0)
    <section class="s-diet" >
        <a class="anchor" id="diet"></a>
        <div class="container">
            <div class="s-diet-block">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="a-h2">Diet and Nutrition</h2>
                        <p class="s-diet-nutrition-margin">{!! $animal['meta']['nutrition'] !!}</p>
                        @if (count($animal['diets']) > 0)
                            <div class="s-diet-item">
                                <span class="s-diet-item__slug">Diet</span>
                                @foreach($animal['diets'] as $i=> $diet)
                                    <a href="/{{$diet['url']}}" class="s-diet-item__link">
                                        {{$diet['name']}}@if (count($animal['diets'])!=$i+1), @endif
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        @if (count($animal['preys']) > 0)
                            <div class="s-diet-item">
                                <span class="s-diet-item__slug">Diet</span>
                                @foreach($animal['preys'] as $i=> $prey)
                                    <a href="/{{$prey['url']}}" class="s-diet-item__link">
                                        {{$prey['name']}}@if (count($animal['preys'])!=$i+1), @endif
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    {{--@if ($animal['photos']['nutrition']->count()>0)--}}
                        <div class="col-lg-4">
                            <div class="s-diet-img">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- animalia_responsive_3 -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-7017496865378638"
                                 data-ad-slot="5708786822"
                                 data-ad-format="auto"
                                 data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                            {{--<div class="s-diet-img open-gallery" data-id="{{$animal['photos']['nutrition'][0]['id']}}">--}}
                                {{--<img src="/uploads/animals/photos/medium/original/{{$animal['photos']['nutrition'][0]['image']}}" alt="{{$animal['photos']['nutrition'][0]['name']}}">--}}
                            {{--</div>--}}
                        </div>
                    {{--@endif--}}
                </div>
            </div>
        </div>
    </section>
@endif