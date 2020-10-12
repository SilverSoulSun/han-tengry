@if(!empty($animal['meta']['mating_habits']) || count($animal['mating_behaviors']>0) || !empty($animal['meta']['reproduction_season']) || !empty($animal['meta']['pregnancy_duration']) || !empty($animal['meta']['incubation_period']) || !empty($animal['meta']['baby_carrying']) || !empty($animal['meta']['independent_age']) || !empty($animal['meta']['baby_name']) || !empty($animal['meta']['clutch_size']))
    <section class="s-mating">
        <a class="anchor" id="mating"></a>
        <div class="container">
            <div class="s-mating-block">
                <h2 class="a-h2">Mating Habits</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="s-mating-descr">
                            @if (count($animal['mating_behaviors']) > 0)
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">MATING BEHAVIOR</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            @foreach($animal['mating_behaviors'] as $i => $mating_behavior)
                                                <a href="/{{ $mating_behavior['url'] }}">{{ $mating_behavior['name'] }}@if (count($animal['mating_behaviors'])!=$i+1), @endif</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['reproduction_season']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">REPRODUCTION SEASON</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{ $animal['meta']['reproduction_season'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['pregnancy_duration']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">PREGNANCY DURATION</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{$animal['meta']['pregnancy_duration']}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['incubation_period']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">INCUBATION PERIOD</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{$animal['meta']['incubation_period']}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['baby_carrying']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">BABY CARRYING</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{$animal['meta']['baby_carrying']}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['independent_age']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">INDEPENDENT AGE</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{$animal['meta']['independent_age']}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['female_name']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">FEMALE NAME</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{$animal['meta']['female_name']}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['male_name']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">MALE NAME</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{$animal['meta']['male_name']}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['baby_name']))
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="s-mating-slug">
                                            <div class="s-mating-slug__text">BABY NAME</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="s-mating-char">
                                            <div class="s-mating-char__text">{{$animal['meta']['baby_name']}}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($animal['meta']['clutch_size']))
                                    <div class="row align-items-end">
                                        <div class="col-6">
                                            <div class="s-mating-slug">
                                                <div class="s-mating-slug__text">BABY CARRYING</div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="s-mating-char">
                                                <div class="s-mating-char__text">{{$animal['meta']['clutch_size']}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="s-mating-text">
                            <p>{!! $animal['meta']['mating_habits'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
