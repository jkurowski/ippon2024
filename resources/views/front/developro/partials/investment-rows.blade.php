{{-- Naprzemienne bloki inwestycji: zdjecie na pelna szerokosc + kolumna tekstu.
     Uklad odbija sie co drugi wiersz, tak jak w makiecie.
     Parametry:
       $investments
       $showLogo — true na "W sprzedazy": nad tytulem logo inwestycji zamiast
                   zlotej kreski. Gdy logo nie ma, wraca kreska. --}}
@php
    $showLogo = $showLogo ?? false;
@endphp
@php
    /* Zdjecie: "Duza miniatura na listach" z CMS-u (investmentLargeImage, z WebP
       i wersja na telefon), a bez niej naglowek, potem miniatura. Sprawdzamy
       istnienie pliku, bo czesc rekordow z CMS-u nie ma odpowiednikow w lokalnej kopii. */
    $ipPhoto = function ($inv) {
        foreach ([['investment/header', $inv->file_header], ['investment/thumbs', $inv->file_thumb]] as [$dir, $file]) {
            if ($file && is_file(public_path($dir.'/'.$file))) {
                return asset($dir.'/'.$file);
            }
        }
        return null;
    };
@endphp

<section class="ip-invrows">
    @foreach($investments as $inv)
        @php
            $large = investmentLargeImage($inv, 'list');
            $photo = $large ? null : $ipPhoto($inv);
            $city  = $cities->firstWhere('id', $inv->city);
            $url   = $inv->developro ? route('developro.investment.index', $inv->slug) : null;
        @endphp

        <article class="ip-invrow @if($loop->even) is-reverse @endif">
            <div class="row g-0 align-items-center">

                <div class="col-12 col-lg-7 ip-invrow-media">
                    @if($large)
                        @include('front.developro.partials.large-picture', ['img' => $large, 'alt' => $inv->name, 'lazy' => !$loop->first])
                    @elseif($photo)
                        <img src="{{ $photo }}" alt="{{ $inv->name }}">
                    @endif
                    @if($city)
                        <span class="ip-city-badge">{{ $city->name }}</span>
                    @endif
                </div>

                <div class="col-12 col-lg-5 ip-invrow-body">
                    <div class="ip-invrow-inner">
                        @php
                            $logo = ($showLogo && $inv->file_logo && is_file(public_path('investment/logo/'.$inv->file_logo)))
                                        ? asset('investment/logo/'.$inv->file_logo) : null;
                        @endphp

                        @if($logo)
                            <img class="ip-invrow-logo" src="{{ $logo }}" alt="{{ $inv->name }}">
                        @endif

                        <h2>{{ $inv->name }}</h2>

                        @unless($logo)
                            <div class="ip-rule"></div>
                        @endunless

                        @if($inv->entry_content)
                            <div class="ip-invrow-desc">{!! $inv->entry_content !!}</div>
                        @endif

                        @if($url)
                            <a href="{{ $url }}" class="ip-btn-gold-lg">Zobacz więcej</a>
                        @endif
                    </div>
                </div>

            </div>
        </article>
    @endforeach
</section>
