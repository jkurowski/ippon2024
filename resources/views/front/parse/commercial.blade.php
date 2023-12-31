@if($list->count() > 0)
    <div class="textSlider commercial-slider">
        <ul class="list-unstyled mb-0">
            @foreach ($list as $p)
                <li>
                    <picture>
                        <source type="image/webp" srcset="{{asset('uploads/gallery/images/webp/'.$p->file_webp) }}">
                        <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/'.$p->file) }}">
                        <img src="{{asset('uploads/gallery/images/'.$p->file) }}" alt="{{ $p->name }}">
                    </picture>
                </li>
            @endforeach
        </ul>
    </div>
@endif
