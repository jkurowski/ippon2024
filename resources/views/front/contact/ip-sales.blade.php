{{-- Zespol biura sprzedazy — lewa kolumna sekcji kontaktowej na /kontakt.
     Adresy i godziny sa wyzej, w kartach biur, wiec tu zostaja tylko ludzie.
     Bez zdjecia z obecnej strony: obok danych i duzego formularza wygladalo
     obco (uwaga Jacka).
     Parametr: $lead (HTML, opcjonalny) --}}
@php
    $lead = $lead ?? null;
    $L    = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';

    $osoby = [
        ['name' => 'Elżbieta Kalinowska', 'mail' => 'e.kalinowska@ippon.group', 'phone' => '+48 724 222 323', 'tel' => '+48724222323'],
        ['name' => 'Iwona Schubert',      'mail' => 'i.schubert@ippon.group',   'phone' => '+48 609 884 219', 'tel' => '+48609884219'],
    ];
@endphp

@if($lead)
    <p class="ip-contact-lead">{!! $lead !!}</p>
@endif

<div class="ip-contact-sep"></div>

<span class="ip-sales-label">{{ $L == 'pl' ? 'Biuro sprzedaży' : 'Sales office' }}</span>

<div class="row ip-sales-row">
    @foreach($osoby as $osoba)
        <div class="col-12 col-sm-6">
            <div class="ip-sales-card">
                <span class="ip-sales-avatar">
                    <svg viewBox="0 0 40 40" fill="none" aria-hidden="true">
                        <circle cx="20" cy="15" r="6.5" stroke="currentColor" stroke-width="1.4"/>
                        <path d="M8 33c1.6-6 6.2-9 12-9s10.4 3 12 9" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
                    </svg>
                </span>
                <strong>{{ $osoba['name'] }}</strong>
                <a href="mailto:{{ $osoba['mail'] }}">{{ $osoba['mail'] }}</a>
                <a href="tel:{{ $osoba['tel'] }}">{{ $osoba['phone'] }}</a>
            </div>
        </div>
    @endforeach
</div>

<span class="ip-sales-label">Social media</span>

<div class="ip-sales-social">
    <a href="https://www.instagram.com/deweloper_ippon.group/" target="_blank" rel="nofollow noopener" aria-label="Instagram">
        <i class="ip-ico ip-ico-ig" aria-hidden="true"></i>
    </a>
    <a href="https://www.facebook.com/ippongroup" target="_blank" rel="nofollow noopener" aria-label="Facebook">
        <i class="ip-ico ip-ico-fb" aria-hidden="true"></i>
    </a>
    <a href="https://www.youtube.com/@ippongroupsp.zo.o.3650" target="_blank" rel="nofollow noopener" aria-label="YouTube">
        <i class="ip-ico ip-ico-yt" aria-hidden="true"></i>
    </a>
</div>
