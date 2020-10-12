{{--
 * Created by PhpStorm.
 * User: han
 * Date: 22/12/2017
 * Time: 16:17
--}}
@if(!empty($animal['meta']['domestication']))
<section class="s-domest" >
    <a class="anchor" id="domestication"></a>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-lg-1 order-2">
                <h2 class="a-h2">Domestication</h2>
                <div class="s-domest-content">
                    <p>{{$animal['meta']['domestication']}}</p>

                </div>
                @if(!empty($animal['domestication']))
                <div class="s-domest-cat">
                    <span class="s-domest-cat__status">DOMESTICATION STATUS</span>
                    <a href="{{$animal['domestication'][0]['url']}}" class="s-domest-cat__link">{{$animal['domestication'][0]['name']}}</a>
                </div>
                @endif
            </div>
            @if ($animal['photos']['domestication']->count()>0)
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="s-domest__img open-gallery" data-id="{{$animal['photos']['domestication'][0]['id']}}">
                        <img src="/uploads/animals/photos/medium/original/{{$animal['photos']['domestication'][0]['image']}}" alt="{{$animal['photos']['domestication'][0]['name']}}">
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endif