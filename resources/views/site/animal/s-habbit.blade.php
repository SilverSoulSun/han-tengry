@if(!empty($animal['meta']['habits']) || count($animal['lifestyles']) > 0 || count($animal['predators'])>0 || !empty($animal['meta']['group_name']) )
<section class="s-habbit" >
    <a class="anchor" id="habits"></a>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @if ($animal['photos']['lifestyle']->count()>0)
                    <div class="s-habbit-img open-gallery" data-id ="{{$animal['photos']['lifestyle'][0]['id']}}">
                        <img src="/uploads/animals/photos/medium/original/{{$animal['photos']['lifestyle'][0]['image']}}" alt="{{$animal['photos']['lifestyle'][0]['name']}}">
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="s-habbit-content">
                    <h2 class="a-h2">Habits and Lifestyle</h2>
                    @if(!empty($animal['meta']['habits']))
                        <p>{!! $animal['meta']['habits'] !!} </p>
                    @endif
                </div>
                @if(!empty($animal['meta']['group_name']))
                    <div class="s-habbit-group">
                        <div class="row align-items-center">
                                <div class="col-sm-3">
                                    <div class="s-habbit-group__slug">Group name</div>
                                </div>
                                <div class="col-sm-9">
                                    <a href="#" class="s-habbit-group__black" style="cursor: text; pointer-events: none;">{{ $animal['meta']['group_name'] }} </a>
                                </div>

                        </div>
                    </div>
                @endif
                @if(!empty($animal['lifestyles']))
                    <div class="s-habbit-group">
                        <div class="row align-items-center">
                            <div class="col-sm-3">
                                <div class="s-habbit-group__slug">Lifestyle</div>
                            </div>
                            <div class="col-sm-9">
                                @foreach($animal['lifestyles'] as $i=> $lifestyle)
                                    <a href="{{ $lifestyle['url'] }}" title="{{ $lifestyle['name']}}">{{ $lifestyle['name']}}@if (count($animal['lifestyles'])!=$i+1), @endif</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($animal['seasonal_behaviors']))
                    <div class="s-habbit-group">
                        <div class="row align-items-center">
                            <div class="col-sm-3">
                                <div class="s-habbit-group__slug">Seasonal behavior</div>
                            </div>
                            <div class="col-sm-9">
                                @foreach($animal['seasonal_behaviors'] as $i=> $seasonal_behavior)
                                    <a href="{{ $seasonal_behavior['url'] }}" title="{{ $seasonal_behavior['name']}}">{{ $seasonal_behavior['name']}}@if (count($animal['seasonal_behaviors'])!=$i+1), @endif</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($animal['predators']))
                    <div class="s-habbit-group">
                        <div class="row align-items-center">
                            <div class="col-sm-3">
                                <div class="s-habbit-group__slug">Predators</div>
                            </div>
                            <div class="col-sm-9">
                                @foreach($animal['predators'] as $i=> $predator)
                                    <a href="{{ $predator['url'] }}" title="{{ $predator['name'] }}" class="s-habbit-group__black">{{ $predator['name'] }}@if (count($animal['predators'])!=$i+1), @endif</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif