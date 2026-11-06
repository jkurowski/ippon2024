{{-- Szczegoly lokalu na wynajem: zdjecie, parametry, opis z CMS-u.
     Uzywane na karcie lokalu i od 2.11.2026 tez na liscie /wynajem - klient:
     lista z kaflami "wyglada bardzo biednie", ma sie od razu pokazywac to,
     co po kliknieciu "zobacz szczegoly".
     Parametry: $rent, $back (true = przycisk "wroc do listy"), $class,
     $title (true = nazwa lokalu nad opisem; na karcie nazwa jest w naglowku) --}}
@php
    $back = $back ?? true;
    $class = $class ?? '';
    $title = $title ?? false;

    /* 5.11.2026: "zdjecia rozjezdzaja strone, mozna ustawic 3 zdjecia obok siebie
       w karuzeli". Galeria wpieta w opis z CMS-u ([galeria=slider]N[/galeria])
       szla jednym duzym, pionowym zdjeciem w waskiej kolumnie tekstu. Wycinamy
       ja z opisu i pokazujemy pod spodem na cala szerokosc kontenera. */
    [$rentText, $rentPhotos] = extract_gallery($rent->text);
@endphp
    <section class="ip-section ip-rent-detail {{ $class }}">
        <div class="container">
            <div class="row align-items-start ip-rent-row">

                <div class="col-12 col-xl-6">
                    <div class="ip-rent-photo">
                        @if($rent->file)
                            <img src="{{ asset('uploads/rents/'.$rent->file) }}" alt="{{ $rent->name }}">
                        @endif
                        <span class="ip-card-badge">{{ rentType($rent->type) }}</span>
                    </div>

                    @if($rent->area)
                        <ul class="ip-rent-params list-unstyled mb-0">
                            <li>
                                <span>{{ $L == 'pl' ? 'Powierzchnia' : 'Area' }}</span>
                                <strong>{{ $rent->area }} m²</strong>
                            </li>
                            <li>
                                <span>{{ $L == 'pl' ? 'Rodzaj' : 'Type' }}</span>
                                <strong>{{ rentType($rent->type) }}</strong>
                            </li>
                        </ul>
                    @endif
                </div>

                <div class="col-12 col-xl-6 mt-4 mt-xl-0">
                    @if($title)
                        <h2 class="ip-rent-name">{{ $rent->name }}</h2>
                    @endif

                    <div class="ip-cms ip-rent-text">
                        {!! parse_text($rentText) !!}
                    </div>

                    @if($back)
                        <a href="{{ route('rent', ['locale' => $L]) }}" class="ip-btn-outline ip-rent-back">
                            @lang('website.button-back-to-list')
                        </a>
                    @endif
                </div>

            </div>

            @include('layouts.partials.ip-photo-carousel', ['photos' => $rentPhotos, 'rel' => 'rent-'.$rent->id])
        </div>
    </section>
