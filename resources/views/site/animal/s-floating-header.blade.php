<header class="header-fixed">
    <div class="container">
        <div class="header-fixed__top">
            <a href="{{ LaravelLocalization::getLocalizedURL(null, '/') }}" class="logo">Animalia</a>
            <div class="header-fixed__head">
                @if(empty($animal['meta']['title']))
                    {{ $animal['name'] }}
                @else
                    {{ $animal['meta']['title'] }}
                @endif
            </div>
            <div class="sub-nav">
                <form class="a-search">
                    <input type="text" placeholder="Search" class="search-field">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </form>
            </div>
        </div>
        <div class="header-fixed__bottom">
            <div class="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
            <ul class="main-list">
                <li><a href="#description">Description</a></li>
                @if($animal['photos']['title']->count()>3)
                    <li><a href="#photo-gallery">Gallery</a></li>
                @endif
                @if(!empty($animal['meta']['desrtibution']) || !empty($animal['habitat_map']['image']) )
                    <li><a href="#distribution">Distribution</a></li>
                @endif
                @if(!empty($animal['meta']['habits']) || count($animal['lifestyles']) > 0 || count($animal['predators'])>0 || !empty($animal['meta']['group_name']) )
                    <li><a href="#habits">Lifestyle</a></li>
                @endif
                @if(!empty($animal['meta']['nutrition']) || count($animal['diets']) > 0 || count($animal['preys']) > 0)
                    <li><a href="#diet">Diet</a></li>
                @endif
                @if(!empty($animal['meta']['mating_habits']) || count($animal['mating_behaviors']>0) || !empty($animal['meta']['reproduction_season']) || !empty($animal['meta']['pregnancy_duration']) || !empty($animal['meta']['incubation_period']) || !empty($animal['meta']['baby_carrying']) || !empty($animal['meta']['independent_age']) || !empty($animal['meta']['baby_name']) || !empty($animal['meta']['clutch_size']))
                    <li><a href="#mating">Mating Habits</a></li>
                @endif
                @if(!empty($animal['meta']['population_threats']) or !empty($animal['meta']['population_number']) )
                    <li><a href="#population">Population</a></li>
                @endif
                @if(!empty($animal['meta']['domestication']))
                    <li><a href="#domestication">Domestication</a></li>
                @endif
                @if(!empty($animal['meta']['facts']))
                    <li><a href="#facts">Facts</a></li>
                @endif
                @if(count($animal['references']) > 0)
                    <li><a href="#refs">References</a></li>
                @endif
                @if(!empty($animal['related']))
                    <li><a href="#related">Related Animals</a></li>
                @endif

            </ul>

            <div class="socials-list">
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            </div>
        </div>
    </div>

</header>
<a href="#description" class="s-gallery-arrow"></a>

