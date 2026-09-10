{{-- Kafel aktualnosci — ten sam komponent co na stronie glownej.
     Parametr: $news (model News) --}}
<article class="ip-news-card">
    <a href="{{ route('front.articles.show', $news->slug) }}" class="ip-news-media">
        @if($news->file)
            <picture>
                <source type="image/webp" srcset="{{ asset('/uploads/news/thumbs/webp/'.$news->file_webp) }}">
                <source type="image/jpeg" srcset="{{ asset('/uploads/news/thumbs/'.$news->file) }}">
                <img src="{{ asset('/uploads/news/thumbs/'.$news->file) }}" alt="{{ $news->title }}" width="700" height="394">
            </picture>
        @endif
    </a>

    <div class="ip-news-body">
        <span class="ip-news-date">{{ \Carbon\Carbon::parse($news->date)->format('d.m.Y') }}</span>

        <h3>
            <a href="{{ route('front.articles.show', $news->slug) }}">{{ $news->title }}</a>
        </h3>

        @if($news->content_entry)
            <p>{{ excerpt($news->content_entry, 160) }}</p>
        @endif

        <div class="ip-news-actions">
            <a href="{{ route('front.articles.show', $news->slug) }}" class="ip-btn-outline">
                {{ $current_locale == 'pl' ? 'Czytaj więcej' : 'Read more' }}
            </a>
        </div>
    </div>
</article>
