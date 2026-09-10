@extends('layouts.page', ['body_class' => 'ip-page'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)

{{-- ==== STARY KOD — wylaczony, do usuniecia po odbiorze ==== --}}
@if(1 == 2)
@section('pageheader')
    @include('layouts.partials.page-header', ['page_title' => '', 'page' => $page, 'header_file' => $page->file_header])
@stop

@section('content')
    <section id="clipboard" class="p-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div id="clipboardmessage"></div>
                </div>
            </div>

            @include('front.developro.investment_shared.list')
        </div>
        @if($properties->count() > 0)
            @include('front.contact.clipboard-form', [ 'page_name' => 'Schowek'])
        @endif
    </section>
@endsection
@endif
{{-- ==== KONIEC STAREGO KODU ==== --}}

{{-- ==========================================================================
     NOWY WIDOK — Schowek jako porownywarka

     Uklad jest odwrocony wzgledem zwyklej listy: kolumna na lokal, wiersz na
     ceche. Inaczej nie da sie porownac metrazu ani ceny miedzy lokalami bez
     skakania wzrokiem. Rozwiazanie przeniesione z instalacji "poligonowa"
     i przelozone na komponenty tego frontu.

     Pierwsza kolumna (nazwy cech) jest przyklejona przy przewijaniu w bok —
     przy osmiu lokalach tabela nie miesci sie na ekranie i bez tego zostawaly
     same liczby, bez informacji, co wlasciwie porownujemy.
     ========================================================================== --}}
@php
    $L = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    /* Powierzchnie dodatkowe siedza w osobnych kolumnach — skladamy je w jedna
       liste, zeby wiersz porownania mial sens takze przy pustych polach. */
    $extraAreas = function ($p) use ($L) {
        $map = [
            'balcony_area'   => $L == 'pl' ? 'Balkon' : 'Balcony',
            'balcony_area_2' => $L == 'pl' ? 'Balkon 2' : 'Balcony 2',
            'loggia_area'    => $L == 'pl' ? 'Loggia' : 'Loggia',
            'terrace_area'   => $L == 'pl' ? 'Taras' : 'Terrace',
            'garden_area'    => $L == 'pl' ? 'Ogródek' : 'Garden',
        ];

        $out = [];
        foreach ($map as $field => $label) {
            if ($p->$field > 0) {
                $out[] = $label . ' ' . rtrim(rtrim(number_format((float) $p->$field, 2, ',', ' '), '0'), ',') . ' m²';
            }
        }

        return $out;
    };
@endphp

@section('pageheader')
    @include('layouts.partials.ip-pagehead', [
        'title'  => $L == 'pl' ? 'Schowek' : 'Shortlist',
        'crumbs' => [
            ['label' => $L == 'pl' ? 'Schowek' : 'Shortlist', 'url' => null],
        ],
        'lead'   => $L == 'pl'
                        ? 'Mieszkania odłożone na później, zestawione obok siebie. Wyślij nam całą listę — odpowiemy na wszystkie naraz.'
                        : 'The apartments you saved, side by side. Send us the whole list — we will get back on all of them.',
        'image'  => ($page->file_header && is_file(public_path('uploads/header/'.$page->file_header)))
                        ? asset('uploads/header/'.$page->file_header) : null,
    ])
@stop

@section('content')

    <section class="ip-section ip-clipboard-section">
        <div class="container">

            <div id="clipboardmessage" class="ip-clipboard-message"></div>

            @if($properties->count() > 0)

                <div class="ip-compare-wrap">
                    <table class="ip-compare">
                        <thead>
                            <tr>
                                <th scope="col" class="ip-compare-label">
                                    {{ $L == 'pl' ? 'Porównanie' : 'Comparison' }}
                                </th>

                                @foreach($properties as $p)
                                    @php
                                        $url = route('developro.property', [
                                            $p->investment->slug, $p, Str::slug($p->name),
                                            floorLevel((int) optional($p->floor)->number, true),
                                            number2RoomsName((int) $p->rooms, true),
                                            round(floatval($p->area), 2).'-m2',
                                        ]);
                                    @endphp
                                    <th scope="col" class="ip-compare-col" data-room="{{ $p->id }}">
                                        <a href="{{ $url }}" class="ip-compare-media">
                                            @if($p->file)
                                                <img src="{{ asset('investment/property/list/'.$p->file) }}"
                                                     alt="{{ $p->name }}" loading="lazy">
                                            @endif
                                        </a>

                                        <a href="{{ $url }}" class="ip-compare-name">{{ $p->name }}</a>
                                        <span class="ip-compare-inv">{{ $p->investment->name }}</span>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row" class="ip-compare-label">Status</th>
                                @foreach($properties as $p)
                                    <td>{!! roomStatusBadge($p->status) !!}</td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">{{ $L == 'pl' ? 'Cena' : 'Price' }}</th>
                                @foreach($properties as $p)
                                    @php $promo = $p->highlighted && $p->promotion_price && $p->status == 1; @endphp
                                    <td>
                                        @if($p->status == 1 && $p->price_brutto)
                                            @if($promo)
                                                <strong class="ip-compare-price is-promo">@money($p->promotion_price)</strong>
                                                <s>@money($p->price_brutto)</s>
                                                @if($p->price_30 > 0)
                                                    {{-- Omnibus: najnizsza cena z 30 dni przed obnizka --}}
                                                    <span class="ip-compare-note">
                                                        {{ $L == 'pl' ? 'Najniższa z 30 dni:' : 'Lowest in 30 days:' }}
                                                        @money($p->price_30)
                                                    </span>
                                                @endif
                                            @else
                                                <strong class="ip-compare-price">@money($p->price_brutto)</strong>
                                            @endif
                                        @else
                                            &mdash;
                                        @endif
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">{{ $L == 'pl' ? 'Cena za m²' : 'Price per m²' }}</th>
                                @foreach($properties as $p)
                                    <td>
                                        @if($p->status == 1 && $clipboard->price($p) && $p->area > 0)
                                            @money($clipboard->price($p) / $p->area)
                                        @else
                                            &mdash;
                                        @endif
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">@lang('website.property-area')</th>
                                @foreach($properties as $p)
                                    <td><strong>{{ $p->area }} m²</strong></td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">@lang('website.select-option-rooms')</th>
                                @foreach($properties as $p)
                                    <td>{{ $p->rooms ?: '—' }}</td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">@lang('website.select-option-floor')</th>
                                @foreach($properties as $p)
                                    <td>{{ optional($p->floor)->number ?? '—' }}</td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">{{ $L == 'pl' ? 'Budynek' : 'Building' }}</th>
                                @foreach($properties as $p)
                                    <td>{{ optional($p->building)->name ?: '—' }}</td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">
                                    {{ $L == 'pl' ? 'Powierzchnie dodatkowe' : 'Extra areas' }}
                                </th>
                                @foreach($properties as $p)
                                    @php $extras = $extraAreas($p); @endphp
                                    <td>
                                        @if(count($extras))
                                            <ul class="ip-compare-list list-unstyled">
                                                @foreach($extras as $extra)
                                                    <li>{{ $extra }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            &mdash;
                                        @endif
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">{{ $L == 'pl' ? 'Atuty' : 'Highlights' }}</th>
                                @foreach($properties as $p)
                                    <td>
                                        @if(!empty($p->additional))
                                            <ul class="ip-compare-list list-unstyled">
                                                @foreach($p->additional as $i)
                                                    @if($i >= 1 && $i <= 6)
                                                        <li>{{ toolTip((int) $i) }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            &mdash;
                                        @endif
                                    </td>
                                @endforeach
                            </tr>

                            <tr>
                                <th scope="row" class="ip-compare-label">{{ $L == 'pl' ? 'Materiały' : 'Materials' }}</th>
                                @foreach($properties as $p)
                                    <td>
                                        <ul class="ip-compare-list ip-compare-links list-unstyled">
                                            @if($p->file_pdf)
                                                <li>
                                                    <a href="{{ asset('investment/property/pdf/'.$p->file_pdf) }}" target="_blank" rel="noopener">
                                                        {{ $L == 'pl' ? 'Rzut PDF' : 'Floor plan PDF' }}
                                                    </a>
                                                </li>
                                            @endif
                                            @if($p->virtual_walk)
                                                <li>
                                                    <a href="{{ $p->virtual_walk }}" target="_blank" rel="noopener">
                                                        {{ $L == 'pl' ? 'Spacer 3D' : '3D walk' }}
                                                    </a>
                                                </li>
                                            @endif
                                            @if(!$p->file_pdf && !$p->virtual_walk)
                                                <li>&mdash;</li>
                                            @endif
                                        </ul>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th scope="row" class="ip-compare-label">&nbsp;</th>
                                @foreach($properties as $p)
                                    <td>
                                        <button type="button" class="ip-btn-outline ip-prop-remove" data-id="{{ $p->id }}">
                                            <i class="lar la-trash-alt"></i>
                                            {{ $L == 'pl' ? 'Usuń' : 'Remove' }}
                                        </button>
                                    </td>
                                @endforeach
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <p class="ip-compare-disclaimer">
                    {{ $L == 'pl'
                        ? 'Zestawienie ma charakter orientacyjny. Ostateczną ofertę i warunki zakupu przedstawia biuro sprzedaży.'
                        : 'This comparison is indicative. The final offer and terms are presented by our sales office.' }}
                    {{ $L == 'pl'
                        ? 'W schowku mieści się do '.\App\Services\Front\ClipboardService::LIMIT.' mieszkań.'
                        : 'The shortlist holds up to '.\App\Services\Front\ClipboardService::LIMIT.' apartments.' }}
                </p>

            @else
                <div class="ip-clipboard-empty">
                    <p class="ip-news-empty">
                        {{ $L == 'pl'
                            ? 'Schowek jest pusty. Odkładaj mieszkania przyciskiem przy karcie lokalu, a wrócą tutaj do porównania.'
                            : 'Your shortlist is empty. Save apartments from their detail page and they will show up here.' }}
                    </p>

                    <div class="text-center">
                        <a href="{{ route('search', ['locale' => $L]) }}" class="ip-btn-gold-lg">
                            {{ $L == 'pl' ? 'Przejdź do wyszukiwarki' : 'Go to search' }}
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </section>

    @if($properties->count() > 0)
        @include('layouts.partials.ip-contact-section', [
            'title'     => $L == 'pl' ? 'Zapytaj o odłożone mieszkania' : 'Ask about your shortlist',
            'lead'      => $L == 'pl'
                            ? 'Wyślemy Ci komplet informacji o wszystkich lokalach ze schowka. <strong>Odpowiadamy w dni robocze.</strong>'
                            : 'We will send you details for every unit on your list. <strong>We reply on business days.</strong>',
            'form'      => 'front.contact.ip-form',
            'page_name' => 'Schowek',
            'action'    => route('clipboard.send'),
            'form_id'   => 'clipboard-form-el',
            'class'     => 'pt-0',
        ])
    @endif

@endsection

@push('scripts')
    <script>
        /* Usuwanie ze schowka: znika cala kolumna, aktualizuje sie licznik
           w naglowku. Gdy schowek zrobi sie pusty, przeladowujemy strone —
           inaczej zostalaby pusta tabela i formularz zapytania o nic. */
        document.querySelectorAll('.ip-prop-remove').forEach(function (button) {
            button.addEventListener('click', function () {
                removeProperty(button.dataset.id);
            });
        });

        function removeProperty(propertyId) {
            const xhr = new XMLHttpRequest();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            xhr.open('DELETE', '{{ route('clipboard.destroy', ['locale' => $L]) }}');
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xhr.send(JSON.stringify({ id: propertyId }));

            xhr.addEventListener('load', function () {
                if (xhr.status !== 200) {
                    return;
                }

                const response = JSON.parse(xhr.responseText);
                document.querySelector('#clipboardmessage').innerHTML = response.message;

                const counter = document.querySelector('#clipboardcount');
                if (counter) {
                    counter.innerHTML = response.count;
                }

                if (response.count === 0) {
                    window.location.reload();
                    return;
                }

                /* kolumna to komorka o tym samym indeksie w kazdym wierszu */
                const head = document.querySelector(`.ip-compare th[data-room="${propertyId}"]`);
                if (!head) {
                    return;
                }

                const index = [...head.parentElement.children].indexOf(head);

                document.querySelectorAll('.ip-compare tr').forEach(function (row) {
                    const cell = row.children[index];
                    if (cell) {
                        cell.remove();
                    }
                });
            });
        }
    </script>
@endpush
