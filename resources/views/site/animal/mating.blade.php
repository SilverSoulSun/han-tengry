@if(!empty($animal['meta']['mating_habits']))
<div class="block mating" id="mating">
    <h2>Mating habits</h2>
    <div class="block-content block-content-right block-content-2-3">
        @if(!empty($animal['meta']['mating_habits']))
        <div class="text">{!! $animal['meta']['mating_habits'] !!}</div>
        @endif

        <div class="lists">
        @if(count($animal['mating_behaviors']) > 0)
            <div class="list">
            <h4>Mating behavior</h4>
            <div class="value">
                <ul>
                @foreach($animal['mating_behaviors'] as $mating_behavior)
                    <li><a href="/{{ $mating_behavior['url'] }}">{{ $mating_behavior['name'] }}</a></li>
                @endforeach
                </ul>
            </div>
            </div>
        @endif
        
        @if(!empty($animal['meta']['reproduction_season']))
            <div class="list">
            <h4>Reproduction season</h4>
            <div class="value">{{ $animal['meta']['reproduction_season'] }}</div>
            </div>
        @endif


        @if(!empty($animal['meta']['pregnancy_duration']))
            <div class="list">
            <h4>Pregnancy duration</h4>
            <div class="value">{{ $animal['meta']['pregnancy_duration'] }}</div>
            </div>
        @endif

        @if(!empty($animal['meta']['incubation_period']))
            <div class="list">
            <h4>Incubation period</h4>
            <div class="value">{{ $animal['meta']['incubation_period'] }}</div>
            </div>
        @endif

        @if(!empty($animal['meta']['independent_age']))
            <div class="list">
            <h4>Independent age</h4>
            <div class="value">{{ $animal['meta']['independent_age'] }}</div>
            </div>
        @endif
        </div>
    </div>

    <div class="characteristics">
        @if(!empty($animal['meta']['female_name']))
        <div class="characteristic">            
            
            <div class="value">{{ $animal['meta']['female_name'] }}</div>
            <h3>female name</h3>
        </div>
        @endif       

        @if(!empty($animal['meta']['male_name']))
        <div class="characteristic">            
            
            <div class="value">{{ $animal['meta']['male_name'] }}</div>
            <h3>male name</h3>
        </div>
        @endif

         @if(!empty($animal['meta']['baby_name']))
        <div class="characteristic">            
            
            <div class="value">{{ $animal['meta']['baby_name'] }}</div>
            <h3>baby name</h3>
        </div>
        @endif

        @if(!empty($animal['meta']['baby_carrying']))
        <div class="characteristic">            
            
            <div class="value">{{ $animal['meta']['baby_carrying'] }}</div>
            <h3>baby carrying</h3>
        </div>
        @endif

        @if(!empty($animal['meta']['clutch_size']))
        <div class="characteristic">            
            
            <div class="value">{{ $animal['meta']['clutch_size'] }}</div>
            <h3> Clutch size</h3>
        </div>
        @endif



        
    </div>
</div>
@endif