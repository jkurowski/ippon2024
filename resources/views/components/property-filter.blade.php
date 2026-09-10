{{-- Pasek filtrow lokali w oprawie ze strony glownej (.ip-filter).
     Na stronie glownej stala tu atrapa z bootstrapowym dropdownem i
     action="#" — teraz oba miejsca korzystaja z tego samego, dzialajacego
     formularza GET, ktory trafia do wyszukiwarki.

     Parametry:
       $action      — dokad leci formularz (domyslnie wyszukiwarka)
       $investments — kolekcja inwestycji do wyboru (pusta = kolumna znika)
       $rooms       — dostepne liczby pokoi, np. [1,2,3,4]
       $floors      — dostepne numery pieter
       $areas       — progi metrazu jako pary [min, max]
       $submit      — napis na przycisku --}}
@props([
    'action' => null,
    'investments' => null,
    'rooms' => [],
    'floors' => [],
    'areas' => [],
    'submit' => null,
])

@php
    $L = $current_locale == 'en' ? 'en' : 'pl';
    $url = $action ?: route('search', ['locale' => $L]);
    $submitLabel = $submit ?: ($L == 'pl' ? 'Znajdź mieszkanie' : 'Find an apartment');

    /* ile kolumn realnie pokazujemy — od tego zalezy szerokosc w siatce */
    $cols = 1
        + (($investments && $investments->count()) ? 1 : 0)
        + (count($floors) ? 1 : 0)
        + (count($rooms) ? 1 : 0)
        + (count($areas) ? 1 : 0);
    $colClass = 'col-6 col-md-4 col-xl-' . max(2, (int) floor(12 / max($cols, 1)));
@endphp

<section {{ $attributes->merge(['class' => 'ip-filter']) }}>
    <div class="container">
        <form class="row gx-0 ip-filter-row" method="get" action="{{ $url }}">

            @if($investments && $investments->count())
                <div class="{{ $colClass }} ip-filter-col">
                    <label for="filter-investment">{{ $L == 'pl' ? 'Inwestycja' : 'Investment' }}</label>
                    <select name="inwestycja" id="filter-investment" class="ip-filter-select">
                        <option value="">{{ $L == 'pl' ? 'Wszystkie' : 'All' }}</option>
                        @foreach($investments as $inv)
                            <option value="{{ $inv->slug }}" @selected(request('inwestycja') == $inv->slug)>{{ $inv->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if(count($floors))
                <div class="{{ $colClass }} ip-filter-col">
                    <label for="filter-floor">@lang('website.select-option-floor')</label>
                    <select name="floor" id="filter-floor" class="ip-filter-select">
                        <option value="">{{ $L == 'pl' ? 'Dowolne' : 'Any' }}</option>
                        @foreach($floors as $f)
                            <option value="{{ $f }}" @selected(request()->filled('floor') && request('floor') == $f)>
                                {{ $f == 0 ? __('website.select-option-floor-groundfloor') : $f }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if(count($rooms))
                <div class="{{ $colClass }} ip-filter-col">
                    <label for="filter-rooms">@lang('website.select-option-rooms')</label>
                    <select name="rooms" id="filter-rooms" class="ip-filter-select">
                        <option value="">{{ $L == 'pl' ? 'Dowolne' : 'Any' }}</option>
                        @foreach($rooms as $r)
                            <option value="{{ $r }}" @selected(request('rooms') == $r)>
                                {{ $r }} {{ $r == 1 ? __('website.room') : __('website.rooms') }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="{{ $colClass }} ip-filter-col">
                <label for="filter-status">Status</label>
                <select name="status" id="filter-status" class="ip-filter-select">
                    <option value="">{{ $L == 'pl' ? 'Dowolny' : 'Any' }}</option>
                    <option value="1" @selected(request('status') == '1')>@lang('website.property-status-1')</option>
                    <option value="2" @selected(request('status') == '2')>@lang('website.property-status-2')</option>
                    <option value="3" @selected(request('status') == '3')>@lang('website.property-status-3')</option>
                </select>
            </div>

            @if(count($areas))
                <div class="{{ $colClass }} ip-filter-col">
                    <label for="filter-area">@lang('website.property-area')</label>
                    <select name="area" id="filter-area" class="ip-filter-select">
                        <option value="">{{ $L == 'pl' ? 'Dowolny' : 'Any' }}</option>
                        @foreach($areas as $a)
                            <option value="{{ $a }}" @selected(request('area') == $a)>{{ $a }} m&sup2;</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="{{ $colClass }} ip-filter-btn">
                <button type="submit" class="ip-btn-gold">
                    {{ $submitLabel }}
                    <svg viewBox="0 0 14 14" aria-hidden="true">
                        <circle cx="6" cy="6" r="4.6"/>
                        <line x1="9.4" y1="9.4" x2="13" y2="13"/>
                    </svg>
                </button>
            </div>

        </form>
    </div>
</section>
