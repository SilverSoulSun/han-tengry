<section class="s-distr" >
    <a class="anchor" id="distribution"></a>
    <div class="container">
        <div class="s-distr-block">
            @if(!empty($animal['meta']['desrtibution']) || !empty($animal['habitat_map']['image']) )
            <div class="row">
                <div class="col-lg-8">
                    <div class="s-distr-content">
                        <h2 class="a-h2">Distribution</h2>
                        <p>{!! $animal['meta']['desrtibution'] !!}</p>
                    </div>
                </div>
                @if (!empty($animal['habitat_map']['image']))
                <div class="col-lg-4">

                        <div class="s-distr-map">
                            <img src="/uploads/animals/maps/medium/{{$animal['habitat_map']['image']}}" alt="{{$animal['name']}} habitat map">
                        </div>

                </div>
                @endif
            </div>
            @endif
        </div>
        @if(!empty($animal['continents']) || !empty($animal['countries']) || !empty($animal['deserts']) || !empty($animal['mountains']) || !empty($animal['rivers']) || !empty($animal['lakes']) || !empty($animal['regions']) || !empty($animal['oceans']) || !empty($animal['seas']) || !empty($animal['islands']))
        <div class="s-distr-geography">
            <h3 class="a-h3">Geography</h3>
            <div class="s-distr-block s-distr-block--row">
                @if(!empty($animal['continents']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Continents</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['continents'] as $i=> $continent)
                                <a href="/{{$continent['url']}}" class="s-distr-geography__link">{{$continent['name']}}@if (count($animal['continents'])!=$i+1), @endif</a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['subcontinents']))

                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Subcontinents</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['subcontinents'] as $i=> $subcontinent)
                                <a href="/{{$subcontinent['url']}}" class="s-distr-geography__link">{{$subcontinent['name']}}@if (count($animal['subcontinents'])!=$i+1), @endif</a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['countries']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Countries</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['countries'] as $i => $country)
                                <a href="/{{$country['url']}}" class="s-distr-geography__link">{{$country['name']}}@if (count($animal['countries'])!=$i+1), @endif</a>
                                @if(count($animal['countries'])>10 && $i==9)
                                    <a href="/" class="show-more read-more-show hide">Show More</a>
                                    <span class="read-more-content">
                                @endif
                                @if (count($animal['countries'])==$i+1 && count($animal['countries'])>10)
                                    <a class="show-more read-more-hide hide" href="#">Show Less</a>
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['introduced_countries']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Introduced Countries</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['introduced_countries'] as $i => $introduced_country)
                                <a href="/{{$introduced_country['url']}}" class="s-distr-geography__link">{{$introduced_country['name']}}@if (count($animal['introduced_countries'])!=$i+1), @endif</a>
                                @if(count($animal['introduced_countries'])>10 && $i==9)
                                    <a href="/" class="show-more read-more-show hide">Show More</a>
                                    <span class="read-more-content">
                                @endif
                                    @if (count($animal['introduced_countries'])==$i+1 && count($animal['introduced_countries'])>10)
                                        <a class="show-more read-more-hide hide" href="#">Show Less</a>
                                </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['regions']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Regions</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['regions'] as $i => $region)
                                <a href="/{{$region['url']}}" class="s-distr-geography__link">{{$region['name']}}@if (count($animal['regions'])!=$i+1), @endif</a>
                                @if(count($animal['regions'])>10 && $i==9)
                                    <a href="/" class="show-more read-more-show hide">Show More</a>
                                    <span class="read-more-content">
                                @endif
                                @if (count($animal['regions'])==$i+1 && count($animal['regions'])>10)
                                    <a class="show-more read-more-hide hide" href="#">Show Less</a>
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['oceans']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Oceans</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['oceans'] as $i=> $ocean)
                                <a href="/{{$ocean['url']}}" class="s-distr-geography__link">{{$ocean['name']}}@if (count($animal['oceans'])!=$i+1), @endif</a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['seas']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Seas</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['seas'] as $i => $sea)
                                <a href="/{{$sea['url']}}" class="s-distr-geography__link">{{$sea['name']}}@if (count($animal['seas'])!=$i+1), @endif</a>
                                @if(count($animal['seas'])>10 && $i==9)
                                    <a href="/" class="show-more read-more-show hide">Show More</a>
                                    <span class="read-more-content">
                                @endif
                                        @if (count($animal['seas'])==$i+1 && count($animal['seas'])>10)
                                            <a class="show-more read-more-hide hide" href="#">Show Less</a>
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['islands']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Islands</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['islands'] as $i => $island)
                                <a href="/{{$island['url']}}" class="s-distr-geography__link">{{$island['name']}}@if (count($animal['islands'])!=$i+1), @endif</a>
                                @if(count($animal['islands'])>10 && $i==9)
                                    <a href="/" class="show-more read-more-show hide">Show More</a>
                                    <span class="read-more-content">
                                @endif
                                        @if (count($animal['islands'])==$i+1 && count($animal['islands'])>10)
                                            <a class="show-more read-more-hide hide" href="#">Show Less</a>
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['mountains']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Mountains</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['mountains'] as $i => $mountain)
                                <a href="/{{$mountain['url']}}" class="s-distr-geography__link">{{$mountain['name']}}@if (count($animal['mountains'])!=$i+1), @endif</a>
                                @if(count($animal['mountains'])>10 && $i==9)
                                    <a href="/" class="show-more read-more-show hide">Show More</a>
                                    <span class="read-more-content">
                                @endif
                                        @if (count($animal['mountains'])==$i+1 && count($animal['mountains'])>10)
                                            <a class="show-more read-more-hide hide" href="#">Show Less</a>
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['deserts']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Deserts</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['deserts'] as $i=>$desert)
                                <a href="/{{$desert['url']}}" class="s-distr-geography__link">{{$desert['name']}}@if (count($animal['deserts'])!=$i+1), @endif</a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['lakes']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Lakes</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['lakes'] as $i=>$lake)
                                <a href="/{{$lake['url']}}" class="s-distr-geography__link">{{$lake['name']}}@if (count($animal['lakes'])!=$i+1), @endif</a>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if(!empty($animal['rivers']))
                    <div class="row align-items-center">
                        <div class="col-sm-2">
                            <div class="s-distr-geography__slug">Rivers</div>
                        </div>
                        <div class="col-sm-10">
                            @foreach($animal['rivers'] as $i=> $river)
                                <a href="/{{$river['url']}}" class="s-distr-geography__link">{{$river['name']}}@if (count($animal['rivers'])!=$i+1), @endif</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @endif
        @if(!empty($animal['biomes']))
            <div class="s-distr-zone">
                <h3 class="a-h3">Biome</h3>
                <div class="s-distr-block">
                    <div class="row">
                        @foreach($animal['biomes'] as $biome)
                            <div class="col-lg-3 col-md-6 s-distr-margin">
                                <a href="/{{$biome['url']}}" class="s-distr-zone-item" style="background-color: {{ $biome['color'] }}; background-image: url(/uploads/catalog/covers/small/2x1/{{ $biome['cover'] }}); background-size: cover"><span>{{$biome['name']}}</span></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($animal['climate_zones']))
            <div class="s-distr-climate">
                <h3 class="a-h3">Climate zones</h3>
                <div class="row">
                    @foreach($animal['climate_zones'] as $climate_zone)
                        <div class="col-lg-3 col-md-6 s-distr-margin">
                            <a href="/{{$climate_zone['url']}}" class="s-distr-climate__link" style="background-color: {{ $climate_zone['color'] }}; background-image: url(/uploads/catalog/covers/small/2x1/{{ $climate_zone['cover'] }});"><span>{{$climate_zone['name']}}</span></a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>