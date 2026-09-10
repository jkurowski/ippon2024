{{-- Ikonki kroków i haseł na podstronie "Jak kupić mieszkanie".
     Kreska bierze kolor z currentColor, wiec kolor ustawia rodzic.
     Parametr: $name --}}
@switch($name)
    @case('budynek')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M9 33V11l9-4 9 4v22M27 33V18h5v15M9 33h26M14 16h3M21 16h3M14 21h3M21 21h3M14 26h3M21 26h3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break

    @case('umowa')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M6 24c2-3 5-3 7-1s4 2 6 0 5-2 7 0 4 2 6-1M10 17V9h13l5 5v3M23 9v5h5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 12h5M14 15h9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
        @break

    @case('dokument')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M11 6h12l6 6v22H11V6Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><path d="M23 6v6h6M15 18h10M15 23h10M15 28h6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
        @break

    @case('pioro')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M8 32c8 1 12-2 15-7 3-5 4-11 3-16-6 1-11 4-14 8-3 4-4 9-4 15Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><path d="M8 32c4-6 8-10 14-13" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
        @break

    @case('klodka')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><rect x="10" y="17" width="20" height="16" rx="2" stroke="currentColor" stroke-width="1.4"/><path d="M14.5 17v-4a5.5 5.5 0 0 1 11 0v4" stroke="currentColor" stroke-width="1.4"/><circle cx="20" cy="24" r="2" stroke="currentColor" stroke-width="1.4"/><path d="M20 26v3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
        @break

    @case('klucz')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><circle cx="15" cy="16" r="6" stroke="currentColor" stroke-width="1.4"/><path d="m19.5 20.5 11 11M27 28l3 3M24 25l3 3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
        @break

    @case('dom')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M7 19 20 8l13 11M11 17v15h18V17M17 32v-8h6v8" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break

    @case('tarcza')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M20 5 8 10v9c0 8 5 13 12 16 7-3 12-8 12-16v-9L20 5Z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/><path d="m14.5 20 4 4 7-8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break

    @case('bank')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M6 16 20 8l14 8M9 16v14M15 16v14M25 16v14M31 16v14M6 33h28" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break

    @case('dzwig')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><path d="M8 33h10M13 33V9l16 4M13 13l16-4M29 13v6M29 19h-4M25 19v4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/><rect x="22" y="23" width="6" height="5" stroke="currentColor" stroke-width="1.4"/></svg>
        @break

    @case('kalendarz')
        <svg viewBox="0 0 40 40" fill="none" aria-hidden="true"><rect x="7" y="10" width="26" height="23" rx="2" stroke="currentColor" stroke-width="1.4"/><path d="M7 17h26M13 7v6M27 7v6" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/><path d="M13 23h2M19 23h2M25 23h2M13 28h2M19 28h2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        @break
@endswitch
