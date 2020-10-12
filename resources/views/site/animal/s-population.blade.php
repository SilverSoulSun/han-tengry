@if(!empty($animal['meta']['population_threats']) or !empty($animal['meta']['population_number']) )
<section class="s-population" >
    <a class="anchor" id="population"></a>
    <div class="container">
        <div class="s-population-block">
            <div class="row">
                <div class="col-lg-6">
                    @if ($animal['photos']['population']->count()>0)
                        <div class="s-population-img open-gallery" data-id="{{$animal['photos']['population'][0]['id']}}">
                            <img src="/uploads/animals/photos/medium/original/{{$animal['photos']['population'][0]['image']}}" alt="{{$animal['photos']['population'][0]['name']}}">
                        </div>
                    @endif
                    <div class="s-population-link">
                        @if(!empty($animal['current_population_trend']))
                            <div class="row align-items-center">
                                <div class="col-sm-5 col-md-4">
                                    <div class="s-population-slug">Population Trend</div>
                                </div>
                                <div class="col-sm-7 col-md-8">
                                    <a href="/{{ $animal['current_population_trend']['url'] }}" class="s-population__link">{{ $animal['current_population_trend']['name_'.$gcl] }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="s-population-link">
                        @if (!empty($animal['population_status']))
                            <div class="row align-items-center">
                                <div class="col-sm-5 col-md-4">
                                    <div class="s-population-slug">POPULATION STATUS</div>
                                </div>
                                <div class="col-sm-7 col-md-8">
                                    <a href="/{{ $animal['population_status']['url'] }}" class="s-population__link">{{ $animal['population_status']['name_'.$gcl] }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="s-population-view">
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['ne']['active'])) active @endif">ne</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['dd']['active'])) active @endif">dd</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['lc']['active'])) active @endif">lc</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['nt']['active'])) active @endif">nt</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['vu']['active'])) active @endif">vu</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['en']['active'])) active @endif">en</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['cr']['active'])) active @endif">cr</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['ew']['active'])) active @endif">ew</a>
                        <a href="/" class="s-population-view__item @if(!empty($animal['statuses']['ex']['active'])) active @endif">ex</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="s-population-content">
                        @if(!empty($animal['meta']['population_threats']))
                            <h2 class="a-h2">Population</h2>
                            <h3 class="a-h3">Population threats</h3>
                            <p>{!! $animal['meta']['population_threats'] !!}</p>
                        @endif
                        @if(!empty($animal['meta']['population_number']))
                            <h3 class="a-h3">Population number</h3>
                            <p>{!! $animal['meta']['population_number'] !!}</p>
                        @endif
                        @if(!empty($animal['meta']['ecological_niche']))
                            <h3 class="a-h3">Ecological niche</h3>
                            <p>{!! $animal['meta']['ecological_niche'] !!}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif