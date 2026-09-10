{{-- Naglowek sekcji z ornamentem — powtarzal sie w 22 miejscach nowego frontu.
     Uzycie:
       <x-section-head>Tytul sekcji</x-section-head>
       <x-section-head lead="Zdanie pod tytulem" class="pb-0">Tytul</x-section-head>
     Druga linia na zloto: <x-section-head>Tytul <span>na zloto</span></x-section-head> --}}
@props(['lead' => null])

<div {{ $attributes->merge(['class' => 'ip-section-head']) }}>
    <h2 class="ip-section-title">{{ $slot }}</h2>

    @if($lead)
        <p class="ip-section-lead">{!! $lead !!}</p>
    @endif

    <div class="ip-ornament">
        <img src="{{ asset('images/homepage/ornament.png') }}" width="46" height="40" alt="">
    </div>
</div>
