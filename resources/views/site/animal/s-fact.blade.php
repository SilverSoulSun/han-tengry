@if(!empty($animal['meta']['facts']))
<section class="s-fact" >
    <a class="anchor" id="facts"></a>
    <div class="container">
        <div class="s-fact-block">
            <h2 class="a-h2">Fun Facts for Kids</h2>
            <ul class="s-fact-list">
                {!! $animal['meta']['facts'] !!}
            </ul>
        </div>
    </div>
</section>
@endif