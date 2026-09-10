{{-- Kafel wpisu blogowego — ten sam komponent co w aktualnosciach.
     Parametr: $news (model Article) --}}
@php $url = route('front.news.show', $news->slug); @endphp

<article class="ip-news-card">
    <a href="{{ $url }}" class="ip-news-media">
        @if($news->file)
            <picture>
                <source type="image/webp" srcset="{{ asset('/uploads/articles/thumbs/webp/'.$news->file_webp) }}">
                <source type="image/jpeg" srcset="{{ asset('/uploads/articles/thumbs/'.$news->file) }}">
                <img src="{{ asset('/uploads/articles/thumbs/'.$news->file) }}" alt="{{ $news->title }}" width="700" height="394">
            </picture>
        @endif
    </a>

    <div class="ip-news-body">
        <span class="ip-news-date">{{ \Carbon\Carbon::parse($news->date)->format('d.m.Y') }}</span>

        <h3><a href="{{ $url }}">{{ $news->title }}</a></h3>

        @if($news->content_entry)
            <p>{{ \Illuminate\Support\Str::limit(strip_tags($news->content_entry), 160) }}</p>
        @endif

        <div class="ip-news-actions">
            <a href="{{ $url }}" class="ip-btn-outline">
                {{ $current_locale == 'pl' ? 'Czytaj więcej' : 'Read more' }}
            </a>
        </div>
    </div>
</article>
