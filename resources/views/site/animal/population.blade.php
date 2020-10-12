@if(!empty($animal['meta']['population_threats']) or !empty($animal['meta']['population_number']) )
    <div class="block block-center population" id="population">
        <h2>Population</h2>

        @if(!empty($animal['population_status']))
        <div class="population-status">
            @if(!empty($animal['current_population_trend']))
            <div class="title">
                <h4>Population Trend</h4>
                <div class="value">
                    <a href="/{{ $animal['current_population_trend']['url'] }}">{{ $animal['current_population_trend']['name_'.$gcl] }}</a>
                </div>
            </div>
            @endif
            <div class="title">
                <h4>Population status</h4>
                <div class="value">
                    <a href="/{{ $animal['population_status']['url'] }}">{{ $animal['population_status']['name_'.$gcl] }}</a>
                </div>
            </div>
            <div class="statuses">
                @foreach ($animal['statuses'] as $i => $status)

                @if(isset($status['url']))
                <a href="{{ $status['url'] }}" target="_blank" class="status active">{{ $i }}</a>
                @else
                <div class="status @if(isset($status['active'])) active @endif">{{ $i }}</div>
                @endif
                
                @endforeach
            </div>
        </div>
        @endif

        
        @if(!empty($animal['meta']['population_threats']))
            <div class="block-content block-content-full">
                <h3>Population threats</h3>
                <div class="text">{!! $animal['meta']['population_threats'] !!}</div>
            </div>
        @endif
        

        @if(!empty($animal['meta']['population_number']))
        <div class="block-content block-content-full">     
            <h3>Population number</h3>
            <div class="text">{!! $animal['meta']['population_number'] !!}</div>
        </div>
        @endif  

        @if(!empty($animal['meta']['ecological_niche']))
            <div class="block-content block-content-full">
                <h3>Ecological niche</h3>
                <div class="text">{!! $animal['meta']['ecological_niche'] !!}</div>
            </div>
        @endif
            
    </div>
@endif