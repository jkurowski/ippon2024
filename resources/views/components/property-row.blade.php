{{-- Wiersz lokalu — jeden komponent dla wyszukiwarki i schowka.
     Wczesniej ten sam kod stal w dwoch kopiach (investment_shared/list.blade.php
     i investment_shared/search-list.blade.php), rozjezdzajac sie w szczegolach.
     Stare partiale ZOSTAJA nietkniete, bo karmia listy mieszkan i plany pieter.

     Parametry:
       $room       — model Property (z zaladowanymi relacjami floor + investment)
       $investment — opcjonalnie; gdy podany, oszczedza zapytanie o relacje
       $action     — 'show' (przycisk do karty lokalu) albo 'remove' (schowek) --}}
@props([
    'room',
    'investment' => null,
    'action' => 'show',
])

@php
    $inv = $investment ?? $room->investment;

    /* plany pieter podaja numer kolumna z zapytania, schowek relacja */
    $floorNumber = $room->floor_number ?? optional($room->floor)->number;

    $labels = [
        1 => ['pl' => 'Mieszkanie',        'en' => 'Apartment'],
        2 => ['pl' => 'Komórka lokatorska','en' => 'Storage room'],
        3 => ['pl' => 'Miejsce postojowe', 'en' => 'Parking space'],
    ];
    $L = $current_locale == 'en' ? 'en' : 'pl';
    $label = ($labels[$room->type] ?? $labels[1])[$L];

    $hasPromo = $room->highlighted && $room->promotion_price && $room->status == 1;
    $hasPrice = $room->price_brutto && $room->status == 1;

    $url = $inv ? route('developro.property', [
        $inv->slug,
        $room,
        Str::slug($room->name),
        floorLevel((int) $floorNumber, true),
        number2RoomsName((int) $room->rooms, true),
        round(floatval($room->area), 2) . '-m2',
    ]) : null;
@endphp

<article class="ip-prop @if($hasPromo) is-promo @endif" data-room="{{ $room->id }}">

    <a class="ip-prop-media" @if($url) href="{{ $url }}" @endif>
        @if($room->file)
            <picture>
                <source type="image/webp" srcset="{{ asset('investment/property/list/webp/'.$room->file_webp) }}">
                <source type="image/jpeg" srcset="{{ asset('investment/property/list/'.$room->file) }}">
                <img src="{{ asset('investment/property/list/'.$room->file) }}" alt="{{ $label }} {{ $room->number }}" loading="lazy">
            </picture>
        @endif

        @if($hasPromo)
            <span class="ip-prop-ribbon">{{ $L == 'pl' ? 'Promocja' : 'Promo' }}</span>
        @endif
    </a>

    <div class="ip-prop-body">
        <div class="ip-prop-head">
            <h3 class="ip-prop-title">
                @if($url)<a href="{{ $url }}">{{ $label }} {{ $room->number }}</a>@else{{ $label }} {{ $room->number }}@endif
            </h3>

            @if($inv)
                <span class="ip-prop-inv">{{ $inv->name }}</span>
            @endif
        </div>

        @if($hasPrice)
            <p class="ip-prop-price">
                @if($hasPromo)
                    <del>@money($room->price_brutto)</del>
                    <strong>@money($room->promotion_price)</strong>
                    <span>(@money($room->promotion_price / $room->area) / m<sup>2</sup>)</span>
                @else
                    <strong>@money($room->price_brutto)</strong>
                    <span>(@money($room->price_brutto / $room->area) / m<sup>2</sup>)</span>
                @endif
            </p>
        @endif

        <ul class="ip-prop-stats list-unstyled">
            @if(!is_null($floorNumber))
                <li>
                    <img src="{{ asset('images/floor-icon.svg') }}" width="20" height="20" alt="">
                    {{ __('website.select-option-floor') }} {{ $floorNumber }}
                </li>
            @endif
            <li>
                <img src="{{ asset('images/room-icon.svg') }}" width="20" height="20" alt="">
                {{ $room->rooms }} {{ $room->rooms == 1 ? __('website.room') : __('website.rooms') }}
            </li>
            <li>
                <img src="{{ asset('images/area-icon.svg') }}" width="20" height="20" alt="">
                {{ $room->area }} m<sup>2</sup>
            </li>
        </ul>

        @if(!empty($room->additional))
            <div class="property-list-item-option ip-prop-options">
                @foreach($room->additional as $i)
                    @if($i >= 1 && $i <= 6)
                        <span class="option-{{ $i }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ toolTip($i) }}"></span>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

    <div class="ip-prop-side">
        {!! roomStatusBadge($room->status) !!}

        @if($action === 'remove')
            <button type="button" class="ip-btn-outline ip-prop-remove" data-id="{{ $room->id }}">
                <i class="lar la-trash-alt"></i> {{ $L == 'pl' ? 'Usuń ze schowka' : 'Remove' }}
            </button>
        @elseif($url)
            <a href="{{ $url }}" class="ip-btn-outline">{{ __('website.show-room') }}</a>
        @endif
    </div>

    @if($room->attributes_bg && $room->attributes_text && $room->attributes_content)
        <div class="ip-prop-attr" style="background:{{ $room->attributes_bg }}; color:{{ $room->attributes_text }};">
            <span>{{ $room->attributes_content }}</span>
        </div>
    @endif
</article>
