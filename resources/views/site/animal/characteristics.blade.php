<div class="block characteristics" id="characteristics">
    @if(!empty($animal['meta']['population_size'])) 
    <div class="characteristic">
        
        <div class="value">{{ $animal['meta']['population_size'] }}</div>
        <h3>population size</h3>
    </div>
    @endif
    @if(!empty($animal['meta']['life_span']))
    <div class="characteristic">
        
        <div class="value">{{ $animal['meta']['life_span'] }}</div>
        <h3>Life span</h3>
    </div>
    @endif
    @if(!empty($animal['meta']['speed']))
    <div class="characteristic">
        
        <div class="value">{{ $animal['meta']['speed'] }}</div>
        <h3>Top Speed</h3>
    </div>
    @endif
    @if(!empty($animal['meta']['weight']))
    <div class="characteristic">
        
        <div class="value">{{ $animal['meta']['weight'] }}</div>
        <h3>Weight</h3>
    </div>
    @endif
    @if(!empty($animal['meta']['height']))
    <div class="characteristic">
        
        <div class="value">{{ $animal['meta']['height'] }}</div>
        <h3>Height</h3>
    </div>
    @endif
    @if(!empty($animal['meta']['lengths']))
    <div class="characteristic">
        
        <div class="value">{{ $animal['meta']['lengths'] }}</div>
        <h3>Length</h3>
    </div>
    @endif
    @if(!empty($animal['meta']['wingspan']))
    <div class="characteristic">
        
        <div class="value">{{ $animal['meta']['wingspan'] }}</div>
        <h3>wingspan</h3>
    </div>
    @endif
</div>