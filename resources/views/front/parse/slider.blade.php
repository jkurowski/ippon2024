@if($list->count() > 0)
<div class="textSlider container pt-5 pb-5">
    <div class="row p-0 m-0">
        <ul class="list-unstyled mb-0">
    @foreach ($list as $p)
            <li>
                <a href="/uploads/gallery/images/{{$p->file}}" class="swipebox" rel="gallery-{{$p->gallery_id}}" title="">
                    <picture>
                        <source type="image/webp" srcset="{{asset('uploads/gallery/images/webp/'.$p->file_webp) }}">
                        <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/'.$p->file) }}">
                        <img src="{{asset('uploads/gallery/images/'.$p->file) }}" alt="{{ $p->name }}">
                    </picture>
                </a>
            </li>
    @endforeach
        </ul>
    </div>
</div>
@endif
