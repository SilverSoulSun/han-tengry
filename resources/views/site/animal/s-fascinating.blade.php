@if(!empty($featured))
<section class="s-fascinating">
    <div class="container">
        <h2 class="a-h2">More Fascinating Animals to Learn About</h2>
        <div class="s-fascinating-block">
            <div class="owl-carousel s-fascinating-item">
                @foreach($featured as $fanimal)
                    <a href="/{{$fanimal['url']}}" class="s-related-item" style="background: url('/uploads/animals/photos/small/1x1/{{ $fanimal['cover']['image'] }}') no-repeat center; background-size: cover">
                        <div class="s-related-item__content">
                            <div class="s-related-item__name">{{$fanimal['name']}}</div>
                            <span>{{$fanimal['scientific_name']}}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif