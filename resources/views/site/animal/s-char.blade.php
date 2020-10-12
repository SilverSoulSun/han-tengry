<section class="s-char">
    <a class="anchor" id="description"></a>
    <div class="container">
        <div class="s-char-block">
            <div class="row" >
                <div class="col-lg-8">
                    <div class="s-char-img open-gallery" data-id="{{ $animal['cover']['id'] }}">
                        <img src="/uploads/animals/photos/full/1.25x1/{{ $animal['cover']['image'] }}" alt="{{ $animal['meta']['title'] }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="s-char-content">
                        <div class="s-char-heading">
                            <h1 class="a-h1" >
                                @if(empty($animal['meta']['title']))
                                    {{ $animal['name'] }}
                                @else
                                    {{ $animal['meta']['title'] }}
                                @endif
                            </h1>
                            {{--<span>{{ $animal['scientific_name'] }}</span>--}}
                            <p class="s-char-heading__name">
                                @if (!empty($animal['meta']['common_names']))
                                   {{ $animal['meta']['common_names'] }}
                                @endif

                            </p>
                        </div>
                        <div class="s-char-kinds">
                            @foreach ($animal['taxonomies'] as $taxonomy)
                            <div class="s-char-kinds__item">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <div class="s-char-kinds__attr">
                                            @switch( $taxonomy['type'] )
                                            @case( 'infrakingdom' )
                                            {{ trans('animal.infrakingdom') }}
                                            @breakswitch
                                            @case( 'kingdom' )
                                            {{ trans('animal.kingdom') }}
                                            @breakswitch
                                            @case( 'subkingdom' )
                                            {{ trans('animal.subkingdom') }}
                                            @breakswitch
                                            @case( 'superphylum' )
                                            {{ trans('animal.superphylum') }}
                                            @breakswitch
                                            @case( 'infraphylum' )
                                            {{ trans('animal.infraphylum') }}
                                            @breakswitch
                                            @case( 'phylum' )
                                            {{ trans('animal.phylum') }}
                                            @breakswitch
                                            @case( 'subphylum' )
                                            {{ trans('animal.subphylum') }}
                                            @breakswitch
                                            @case( 'microphylum' )
                                            {{ trans('animal.microphylum') }}
                                            @breakswitch
                                            @case( 'superclass' )
                                            {{ trans('animal.superclass') }}
                                            @breakswitch
                                            @case( 'parvclass' )
                                            {{ trans('animal.parvclass') }}
                                            @breakswitch
                                            @case( 'class' )
                                            {{ trans('animal.class') }}
                                            @breakswitch
                                            @case( 'subclass' )
                                            {{ trans('animal.subclass') }}
                                            @breakswitch
                                            @case( 'infraclass' )
                                            {{ trans('animal.infraclass') }}
                                            @breakswitch
                                            @case( 'lehion' )
                                            {{ trans('animal.legion') }}
                                            @breakswitch
                                            @case( 'cohort' )
                                            {{ trans('animal.cohort') }}
                                            @breakswitch
                                            @case( 'superorder' )
                                            {{ trans('animal.superorder') }}
                                            @breakswitch
                                            @case( 'magnoorder' )
                                            {{ trans('animal.magnorder') }}
                                            @breakswitch
                                            @case( 'infraorder' )
                                            {{ trans('animal.infraorder') }}
                                            @breakswitch
                                            @case( 'order' )
                                            {{ trans('animal.order') }}
                                            @breakswitch
                                            @case( 'suborder' )
                                            {{ trans('animal.suborder') }}
                                            @breakswitch
                                            @case( 'parvorder' )
                                            {{ trans('animal.parvorder') }}
                                            @breakswitch
                                            @case( 'superfamily' )
                                            {{ trans('animal.superfamily') }}
                                            @breakswitch
                                            @case( 'family' )
                                            {{ trans('animal.family') }}
                                            @breakswitch
                                            @case( 'subfamily' )
                                            {{ trans('animal.subfamily') }}
                                            @breakswitch
                                            @case( 'supertribe' )
                                            {{ trans('animal.supertribe') }}
                                            @breakswitch
                                            @case( 'tribe' )
                                            {{ trans('animal.tribe') }}
                                            @breakswitch
                                            @case( 'subtribe' )
                                            {{ trans('animal.subtribe') }}
                                            @breakswitch
                                            @case( 'section' )
                                            {{ trans('animal.section') }}
                                            @breakswitch
                                            @case( 'clade' )
                                            {{ trans('animal.clade') }}
                                            @breakswitch
                                            @case( 'genus' )
                                            {{ trans('animal.genus') }}
                                            @breakswitch
                                            @case( 'subgenus' )
                                            {{ trans('animal.subgenus') }}
                                            @breakswitch
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <a href="/{{ $taxonomy['url'] }}" class="s-char-kinds__name">{{ $taxonomy['name'] }}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="s-char-kinds__item">
                                <div class="row align-items-center">
                                    <div class="col-4">
                                        <div class="s-char-kinds__attr">
                                            SPECIES
                                        </div>
                                    </div>
                                    <div class="col-8 s-char-kinds__name unactive">
                                        {{ $animal['scientific_name'] }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                @if($animal['template_id']==1)
                    <div class="s-char-char">
                        <div class="s-char-char__block">
                            <div class="row">
                                @foreach($animal['characteristics'] as $i =>$k )
                                    <div class="col-6">
                                        <div class="s-char-char__name">{{ $k[0] }}</div>
                                        <div class="s-char-char__num">{{ $k[1] }}</div>
                                    </div>
                                    @if(($i==1 && count($animal['characteristics'])>2) || ($i == 3  && count($animal['characteristics'])>4) || ($i ==5  && count($animal['characteristics'])>6) )
                            </div>
                        </div>
                        <div class="s-char-char__block">
                            <div class="row">
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
            </div>
        </div>
                @else
        </div>
                <div class="s-char-char s-char-char-custom">
                    @if (count($animal['characteristics'])>0)
                        <div class="s-char-char__wrap-wrap">
                            <div class="s-char-char__wrap">
                                <div class="s-char-char__name">{{$animal['characteristics'][0][0]}}</div>
                                <div class="s-char-char__num">{{$animal['characteristics'][0][1]}}</div>
                            </div>
                            @if (count($animal['characteristics'])>1)
                            <div class="s-char-char__wrap">

                                    <div class="s-char-char__name">{{$animal['characteristics'][1][0]}}</div>
                                    <div class="s-char-char__num">{{$animal['characteristics'][1][1]}}</div>

                            </div>
                            @endif
                        </div>
                    @endif
                    @if (count($animal['characteristics'])>2)
                        <div class="s-char-char__wrap-wrap">
                            <div class="s-char-char__wrap">
                                <div class="s-char-char__name">{{$animal['characteristics'][2][0]}}</div>
                                <div class="s-char-char__num">{{$animal['characteristics'][2][1]}}</div>
                            </div>
                            @if (count($animal['characteristics'])>3)
                            <div class="s-char-char__wrap">

                                    <div class="s-char-char__name">{{$animal['characteristics'][3][0]}}</div>
                                    <div class="s-char-char__num">{{$animal['characteristics'][3][1]}}</div>

                            </div>
                            @endif
                        </div>
                    @endif
                    @if (count($animal['characteristics'])>4)
                        <div class="s-char-char__wrap-wrap">
                            <div class="s-char-char__wrap">
                                <div class="s-char-char__name">{{$animal['characteristics'][4][0]}}</div>
                                <div class="s-char-char__num">{{$animal['characteristics'][4][1]}}</div>
                            </div>
                            @if (count($animal['characteristics'])>5)
                            <div class="s-char-char__wrap">

                                    <div class="s-char-char__name">{{$animal['characteristics'][5][0]}}</div>
                                    <div class="s-char-char__num">{{$animal['characteristics'][5][1]}}</div>

                            </div>
                            @endif
                        </div>
                    @endif

                </div>
                @endif

            </div>

        <div class="s-char-text">
            <p>{!! $animal['meta']['appearance'] !!}</p>
        </div>
        <div class="s-char-status">
            @foreach($animal['active_day_periods'] as $active_day_period)
                <a href="/{{ $active_day_period['url'] }}" title="{{ $active_day_period['name'] }}" class="s-char-status-item" style="background-color:{{ $active_day_period['color'] }}">
                    <p>{{ str_limit($active_day_period['name'], 2, '') }}</p>
                    <span>{{ $active_day_period['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['diets'] as $diet)
                <a href="/{{ $diet['url'] }}" title="{{ $diet['name'] }}" class="s-char-status-item" style="background-color:{{ $diet['color'] }}">
                    <p>{{ str_limit($diet['name'], 2, '') }}</p>
                    <span>{{ $diet['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['lifestyles'] as $lifestyle)
                <a href="/{{ $lifestyle['url'] }}" title="{{ $lifestyle['name'] }}" class="s-char-status-item" style="background-color:{{ $lifestyle['color'] }}">
                    <p>{{ str_limit($lifestyle['name'], 2, '') }}</p>
                    <span>{{ $lifestyle['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['looks'] as $look)
                <a href="/{{ $look['url'] }}" title="{{ $look['name'] }}" class="s-char-status-item" style="background-color:{{ $look['color'] }}">
                    <p>{{ str_limit($look['name'], 2, '') }}</p>
                    <span>{{ $look['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['mating_behaviors'] as $mating_behavior)
                <a href="/{{ $mating_behavior['url'] }}" title="{{ $mating_behavior['name'] }}" class="s-char-status-item" style="background-color:{{ $mating_behavior['color'] }}">
                    <p>{{ str_limit($mating_behavior['name'], 2, '') }}</p>
                    <span>{{ $mating_behavior['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['others'] as $other)
                <a href="/{{ $other['url'] }}" title="{{ $other['name'] }}" class="s-char-status-item" style="background-color:{{ $other['color'] }}">
                    <p>{{ str_limit($other['name'], 2, '') }}</p>
                    <span>{{ $other['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['social_behaviors'] as $social_behavior)
                <a href="/{{ $social_behavior['url'] }}" title="{{ $social_behavior['name'] }}" class="s-char-status-item" style="background-color:{{ $social_behavior['color'] }}">
                    <p>{{ str_limit($social_behavior['name'], 2, '') }}</p>
                    <span>{{ $social_behavior['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['seasonal_behaviors'] as $seasonal_behavior)
                <a href="/{{ $seasonal_behavior['url'] }}" title="{{ $seasonal_behavior['name'] }}" class="s-char-status-item" style="background-color:{{ $social_behavior['color'] }}">
                    <p>{{ str_limit($seasonal_behavior['name'], 2, '') }}</p>
                    <span>{{ $seasonal_behavior['name'] }}</span>
                </a>
            @endforeach
            @foreach($animal['domestication'] as $domestication)
                <a href="/{{ $domestication['url'] }}" title="{{ $domestication['name'] }}" class="s-char-status-item" style="background-color:{{ $social_behavior['color'] }}">
                    <p>{{ str_limit($domestication['name'], 2, '') }}</p>
                    <span>{{ $domestication['name'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>