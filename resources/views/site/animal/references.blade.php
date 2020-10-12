@if(count($animal['references']) > 0)
<div class="block block-center references" id="references">
    <div class="block-content block-content-full">
        <h2>References</h2>
        <ol>
        @foreach($animal['references'] as $reference)
        <li >
        <div class="name">{{ $reference['name'] }}</div>
        <a href="{{ $reference['url'] }}" target="_blank">{{ $reference['url'] }}</a>
        </li>
        @endforeach
	    </ol>
    </div>
</div>
@endif