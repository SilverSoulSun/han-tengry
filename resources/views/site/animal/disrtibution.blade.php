@if(!empty($animal['meta']['desrtibution']) or count($animal['climate_zones']) > 0 or count($animal['biomes']) > 0)
<div class="block disrtibution" id="disrtibution">
    @if(!empty($animal['habitat_map']['image']))
    <div class="habitat-map">
        <img src="/uploads/animals/maps/medium/{{ $animal['habitat_map']['image'] }}">
    </div>
    @endif
    <div class="block-content block-content-left block-content-2-3">
        @if(!empty($animal['meta']['desrtibution']))
        <h2>Disrtibution</h2>
        <div class="text">{!! $animal['meta']['desrtibution'] !!}</div>
        @endif

        <div class="properties">
            @if(count($animal['biomes']) > 0)
            <div class="property">
                <h3>Biome</h3>
                <ul>
                @foreach($animal['biomes'] as $biome)
                    <li>
                    <a style="background-color: {{ $biome['color'] }}; background-image: url(/uploads/catalog/covers/small/2x1/{{ $biome['cover'] }});" href="/{{ $biome['url'] }}">
                    <span>{{ $biome['name'] }}</span>
                    </a></li>
                @endforeach
                </ul>
            </div>
            @endif

            @if(count($animal['climate_zones']) > 0)
            <div class="property">
                <h3>Climate zones</h3>
                <ul>
                @foreach($animal['climate_zones'] as $climate_zone)
                    <li >
                    <a style="background-color: {{ $climate_zone['color'] }}; background-image: url(/uploads/catalog/covers/small/2x1/{{ $climate_zone['cover'] }});" href="/{{ $climate_zone['url'] }}">
                    <span>{{ $climate_zone['name'] }}</span>
                    </a></li>
                @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>

</div>
@endif