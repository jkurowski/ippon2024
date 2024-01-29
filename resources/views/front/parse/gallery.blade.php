@if($list->count() > 0)
<div id="photos-list" class="container">
    <div class="row d-flex justify-content-center">
        @foreach ($list as $p)
        <div class="col-4">
            <div class="col-gallery-thumb">
                <a href="/uploads/gallery/images/{{$p->file}}" class="swipebox" rel="gallery-1" title="">
                    <picture>
                        <source type="image/webp" srcset="{{asset('uploads/gallery/images/thumbs/webp/'.$p->file_webp) }}">
                        <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}">
                        <img src="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}" alt="{{ $p->name }}" width="520" height="293">
                    </picture>
                    <div><i class="las la-search-plus"></i></div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
