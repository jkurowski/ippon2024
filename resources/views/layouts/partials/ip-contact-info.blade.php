{{-- Dane kontaktowe przy formularzu — ten sam uklad i te same klasy co
     w sekcji "Porozmawiajmy o Twoim nowym mieszkaniu" na stronie glownej.
     Parametry:
       $lead — akapit nad kreska (HTML, opcjonalny) --}}
@php
    $lead = $lead ?? null;
    $L    = in_array($current_locale, ['pl', 'en']) ? $current_locale : 'pl';
@endphp

@if($lead)
    <p class="ip-contact-lead">{!! $lead !!}</p>
@endif

<div class="ip-contact-sep"></div>

<div class="ip-contact-cols">
    <ul class="ip-contact-list list-unstyled mb-0">
        <li>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg>
            ul. Żelazna 4
        </li>
        <li>
            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="13" r="8"/><polyline points="12,9 12,13 15,15"/><line x1="5" y1="3" x2="2" y2="6"/><line x1="19" y1="3" x2="22" y2="6"/></svg>
            {{ $L == 'pl' ? 'pn.–pt. 9:00–17:00' : 'Mon–Fri 9:00–17:00' }}
        </li>
        <li>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
            <a href="tel:+48724222323">+48 724 222 323</a>
        </li>
        <li>
            <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3.1 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.3a2 2 0 0 1 2.1-.4c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z"/></svg>
            <a href="tel:+48609084219">+48 609 084 219</a>
        </li>
        <li>
            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="4" width="20" height="16"/><polyline points="2,6 12,13 22,6"/></svg>
            <a href="mailto:mieszkania@ippon.group">mieszkania@ippon.group</a>
        </li>
    </ul>

    <div class="ip-contact-people">
        <div class="ip-person">
            <strong>Elżbieta Kalinowska</strong>
            <a href="mailto:e.kalinowska@ippon.group">e.kalinowska@ippon.group</a>
            <a href="tel:+48724222323">+48 724 222 323</a>
        </div>
        <div class="ip-person">
            <strong>Iwona Schubert</strong>
            <a href="mailto:i.schubert@ippon.group">i.schubert@ippon.group</a>
            <a href="tel:+48609884219">+48 609 884 219</a>
        </div>
    </div>
</div>
