@if(!empty($animal['meta']['nutrition']) or count($animal['predators']) > 0 or count($animal['preys']) > 0)
<div id="nutrition" class="block nutrition @if(count($animal['preys']) == 0  and count($animal['predators']) == 0) block-center @endif"> 
          
    <h2>Diet and nutrition</h2>

    @if(count($animal['preys']) > 0 or count($animal['predators']) > 0)
        <div class="block-content block-content-left block-content-1-3">
            @if(count($animal['diets']) > 0)
            <div class="badge">
                <h4>Diet</h4>
                <ul>
                @foreach($animal['diets'] as $diet)
                    <li><a href="/{{ $diet['url'] }}">{{ $diet['name'] }}</a></li>
                @endforeach
                </ul> 
                
            </div>
            @endif

            @if(!empty($animal['meta']['nutrition'])) 
            <div class="text">{!! $animal['meta']['nutrition'] !!}</div>
            @endif
        </div>

    @else
        <div class="block-content block-content-full ">
        <div class="text">
            {!! $animal['meta']['nutrition'] !!}

            @if(!empty($animal['meta']['preys'])) 
            <p><b>Preys:</b> {!! $animal['meta']['preys'] !!}</p>
            @endif

            @if(!empty($animal['meta']['predators'])) 
            <p><b>Predators:</b> {!! $animal['meta']['predators'] !!}</p>
            @endif
        </div>


        @if(count($animal['diets']) > 0)
        <div class="badge">
             <h4>Diet</h4>
            <ul>
            @foreach($animal['diets'] as $diet)
                <li><a href="/{{ $diet['url'] }}">{{ $diet['name'] }}</a></li>
            @endforeach
            </ul> 
           
        </div>
        @endif
        </div>
    @endif
    
    @if(count($animal['preys']) > 0)
    <div class="nutrition-links @if(count($animal['predators']) == 0) nutrition-links-full @endif">
        <h3>Prey</h3>
        @if(!empty($animal['meta']['preys'])) 
        <div class="text"><p>{!! $animal['meta']['preys'] !!}</p></div>
        @endif
        <ul>
        @foreach($animal['preys'] as $prey)
            <li class="animal">
            <a href="/{{ $prey['url'] }}" >
                <div class="cover" style="background-image: url(/uploads/animals/photos/small/1x1/{{ $prey['cover']['image'] }});"></div>
                <div class="caption">{{ $prey['name'] }}</div>
            </a>
            </li>
        @endforeach
        </ul> 
    </div>
    @endif

    @if(count($animal['predators']) > 0)
    <div class="nutrition-links @if(count($animal['preys']) == 0) nutrition-links-full @endif">
        <h3>Predators</h3>
        @if(!empty($animal['meta']['predators'])) 
        <div class="text"><p>{!! $animal['meta']['predators'] !!}</p></div>
        @endif
        <ul>
        @foreach($animal['predators'] as $predator)
            <li class="animal">
            <a href="/{{ $predator['url'] }}" >
                <div class="cover" style="background-image: url(/uploads/animals/photos/small/1x1/{{ $predator['cover']['image'] }});"></div>
                <div class="caption">{{ $predator['name'] }}</div>
            </a>
            </li>
        @endforeach
        </ul> 
    </div>
    @endif
</div>
@endif