{{-- Sekcja kontaktowa podstron — jeden komponent na wszystkie szablony,
     zbudowany tak samo jak sekcja "Porozmawiajmy o Twoim nowym mieszkaniu"
     na stronie glownej (te same klasy, ten sam rytm).
     Parametry:
       $title     — naglowek sekcji
       $lead      — akapit nad danymi kontaktowymi (HTML, opcjonalny)
       $form      — widok z formularzem (np. 'front.contact.ip-form')
       $page_name — nazwa formularza zapisywana przy zgloszeniu
       $class     — dodatkowa klasa sekcji (np. pt-0, gdy sekcja wyzej ma
                    juz swoj dolny odstep)
       $aside     — widok w lewej kolumnie; domyslnie dane kontaktowe, ale np.
                    na /kontakt sa one wyzej w kartach biur, wiec leci tam
                    zespol biura sprzedazy
       $action, $form_id — opcjonalnie, gdy formularz ma isc pod inny endpoint
                    (schowek wysyla razem z lista odlozonych lokali) --}}
@php
    $lead = $lead ?? null;
    $form  = $form ?? 'front.contact.ip-form';
    $class = $class ?? '';
    $aside = $aside ?? 'layouts.partials.ip-contact-info';
    $action = $action ?? null;
    $form_id = $form_id ?? null;
@endphp

<section id="contact-form" class="ip-section ip-contact-section {{ $class }}">
    <div class="container">

        <x-section-head>{{ $title }}</x-section-head>

        <div class="row ip-cards-row align-items-start">
            <div class="col-12 col-lg-6">
                @include($aside, ['lead' => $lead])
            </div>

            <div class="col-12 col-lg-6">
                @include($form, [
                    'page_name' => $page_name,
                    'action' => $action,
                    'form_id' => $form_id,
                ])
            </div>
        </div>

    </div>
</section>
