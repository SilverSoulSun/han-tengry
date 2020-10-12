{{--
 * Created by PhpStorm.
 * User: han
 * Date: 22/12/2017
 * Time: 16:21
 --}}
@if(count($animal['references']) > 0)
    <section class="s-ref" >
        <a class="anchor" id="refs"></a>
        <div class="container">
            <h2 class="a-h2">References</h2>
            <div class="s-ref-block">
                @foreach($animal['references'] as $i=> $reference)
                    <div class="s-ref-item">
                        <span>{{$i+1}}.  {{ $reference['name'] }} - <a href="{{ $reference['url'] }}" target="_blank">{{ $reference['url'] }}</a></span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif