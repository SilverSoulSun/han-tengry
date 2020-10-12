@if(!empty($animal['meta']['habits']) or count($animal['social_behaviors']) > 0 or count($animal['lifestyles']) > 0 or count($animal['active_day_periods']) > 0)
<div class="block lifestyle" id="lifestyle">
    
    <div class="block-content block-content-right">
        @if(!empty($animal['meta']['habits']))
        <h2>{{ trans('animal.habits-and-lifestyle') }}</h2>
        @endif
    
        @if(!empty($animal['meta']['habits']))
        <div class="text">{!! $animal['meta']['habits'] !!}</div>
        @endif

         <div class="lists">

        @if(!empty($animal['meta']['group_name']))
            <div class="list">
            <h4>group name</h4>
            <div class="value">{{ $animal['meta']['group_name'] }}</div>
            </div>
        @endif
        </div>

        <ul class="properties">
        @foreach($animal['social_behaviors'] as $social_behavior)
            <li style="background-color: {{ $social_behavior['color'] }}">
            <a href="/{{ $social_behavior['url'] }}" title="{{ $social_behavior['name'] }}">
            <span class="icon">{{ str_limit($social_behavior['name'], 2, '') }}</span>
            <span class="name">{{ $social_behavior['name'] }}</span>
            </a>
            </li>
        @endforeach

        @foreach($animal['lifestyles'] as $lifestyle)
            <li style="background-color: {{ $lifestyle['color'] }}">
            <a href="/{{ $lifestyle['url'] }}" title="{{ $lifestyle['name'] }}">
            <span class="icon">{{ str_limit($lifestyle['name'], 2, '') }}</span>
            <span class="name">{{ $lifestyle['name'] }}</span>
            </a>
            </li>
        @endforeach

        @foreach($animal['active_day_periods'] as $active_day_period)
            <li style="background-color: {{ $active_day_period['color'] }}">
            <a href="/{{ $active_day_period['url'] }}" title="{{ $active_day_period['name'] }}">
            <span class="icon">{{ str_limit($active_day_period['name'], 2, '') }}</span>
            <span class="name">{{ $active_day_period['name'] }}</span>
            </a>
            </li>
        @endforeach

        </ul>


        
    </div>

    <div class="block-content block-content-left block-content-photos">
        @foreach ($animal['photos']['lifestyle'] as $i => $photo)
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