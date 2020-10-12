<div class="nav">
<ul>

<li><a href="#description">Description</a></li>

@if(!empty($animal['meta']['desrtibution']))
<li><a href="#disrtibution">Disrtibution</a></li>
@endif

@if(!empty($animal['meta']['habits']))
<li><a href="#lifestyle">Habits and lifestyle</a></li>
@endif

@if(!empty($animal['meta']['nutrition']))
<li><a href="#nutrition">Diet and nutrition</a></li>
@endif

@if(!empty($animal['meta']['mating_habits']))
<li><a href="#mating">Mating habits</a></li>
@endif

@if(!empty($animal['meta']['population_threats']))
<li><a href="#population">Population</a></li>
@endif

@if(!empty($animal['meta']['domestication']))
<li><a href="#domestication">Domestication</a></li>
@endif

@if(!empty($animal['meta']['facts']))
<li><a href="#facts">Fun facts for kids</a></li>
@endif
</ul>
</div>