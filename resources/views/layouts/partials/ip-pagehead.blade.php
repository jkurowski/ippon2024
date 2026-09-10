{{-- Naglowek podstrony wg makiety: ciemny pas ze zdjeciem, okruszki, tytul.
     Parametry:
       $title  — tytul (string)
       $crumbs — tablica okruszkow: ['label' => ..., 'url' => ... | null]
       $image  — sciezka do zdjecia tla lub null
       $class  — dodatkowa klasa (np. is-tall przy wielolinijkowym tytule)
       $lead   — akapit pod tytulem (opcjonalny) --}}
@php
    $crumbs = $crumbs ?? [];
    $image  = $image ?? null;
    $class  = $class ?? "";
    $lead   = $lead ?? null;
@endphp

<div class="ip-pagehead {{ $class }}">
    @if($image)
        <img src="{{ $image }}" alt="">
    @endif

    <div class="container">
        <nav class="ip-breadcrumbs">
            <a href="{{ url('/'.app()->getLocale()) }}">Strona główna</a>
            @foreach($crumbs as $crumb)
                <i>|</i>
                @if(!empty($crumb['url']))
                    <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                @else
                    <span>{{ $crumb['label'] }}</span>
                @endif
            @endforeach
        </nav>

        <div class="ip-pagehead-title">
            <h1>{{ $title }}</h1>
            <div class="ip-rule"></div>

            @if($lead)
                <p class="ip-pagehead-lead">{!! $lead !!}</p>
            @endif
        </div>
    </div>
</div>
