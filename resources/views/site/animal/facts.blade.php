@if(!empty($animal['meta']['facts']))
    <div class="block block-center facts" id="facts">
        <div class="block-content block-content-full">
            @if(!empty($animal['meta']['facts']))
            <h2>Fun facts for kids</h2>
            <div class="text">
            <ol>
            {!! $animal['meta']['facts'] !!}
            </ol>
            </div>
            @endif
        </div>
    </div>
    @endif