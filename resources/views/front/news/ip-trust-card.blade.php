{{-- Aktualnosc jako kafel w stylu "Dlaczego warto nam zaufac" — uwaga Zarzadu
     z 8.10.2026: dotychczasowe kafle (zdjecie + bialy opis) "nie pasuja do
     calosci". Zdjecie na caly kafel, zlota ramka w srodku, tytul na zdjeciu,
     zajawka i "Czytaj wiecej" wysuwaja sie po najechaniu (.ip-trust-card).
     Zdjecie z oryginalu, nie z miniatury 700 px — kafel jest wyzszy niz
     szerszy i kadr 16:9 z miniatury bylby rozmyty po przycieciu.
     Najpierw gotowy kafel 3:4 z uploads/news/card (NewsService::makeCard —
     cala grafika z wpalonym tekstem, bez ucinania bokow; od 29.10.2026 przy
     dodaniu/edycji wpisu, starsze: php artisan news:cards). Bez kafla zostaje
     stary kadr 16:9 przyciety przez object-fit.
     Parametr: $news (model News) --}}
@php
    $ipNewsUrl  = route('front.articles.show', $news->slug);
    $ipNewsFile = null;
    $ipNewsWebp = null;
    $ipNewsCard = $news->file ? \App\Services\NewsService::cardPath($news) : null;

    if ($ipNewsCard && is_file(public_path($ipNewsCard))) {
        $ipNewsFile = $ipNewsCard;
        $ipNewsWebp = is_file(public_path(\App\Services\NewsService::cardPath($news, true))) ? \App\Services\NewsService::cardPath($news, true) : null;
    } elseif ($news->file) {
        $ipNewsFile = is_file(public_path('uploads/news/'.$news->file))
            ? 'uploads/news/'.$news->file
            : 'uploads/news/thumbs/'.$news->file;

        if ($news->file_webp && is_file(public_path('uploads/news/webp/'.$news->file_webp))) {
            $ipNewsWebp = 'uploads/news/webp/'.$news->file_webp;
        }
    }
@endphp

<a href="{{ $ipNewsUrl }}" class="ip-trust-card ip-news-trust">
    @if($ipNewsFile)
        <picture>
            @if($ipNewsWebp)
                <source type="image/webp" srcset="{{ asset($ipNewsWebp) }}">
            @endif
            <img src="{{ asset($ipNewsFile) }}" alt="" loading="lazy" decoding="async">
        </picture>
    @endif

    <div class="ip-trust-card-body">
        <span class="ip-news-trust-date">{{ \Carbon\Carbon::parse($news->date)->format('d.m.Y') }}</span>
        <h3>{{ $news->title }}</h3>

        <div class="ip-trust-card-desc">
            @if($news->content_entry)
                <p>{{ excerpt($news->content_entry, 140) }}</p>
            @endif
            <span class="ip-news-trust-more">
                {{ $current_locale == 'pl' ? 'Czytaj więcej' : 'Read more' }}
                <svg viewBox="0 0 14 14" aria-hidden="true"><path d="M2 12 12 2M4 2h8v8"/></svg>
            </span>
        </div>
    </div>
</a>
