<?php

if (! function_exists('contactRecipient')) {
    /**
     * Adres, na ktory idzie mail z formularza kontaktowego.
     *
     * Formularze na Karierze, O nas i Zakupie gruntu maja trafiac do
     * sekretariatu, nie do biura sprzedazy (uwagi klienta z 8.10 i 15.10.2026).
     * Formularz wysyla tylko slowo-klucz form_office=secretariat, a adres
     * bierze sie z Admin > Ustawienia > SEO — z zewnatrz nie da sie podstawic
     * wlasnego odbiorcy. Bez ustawionego adresu sekretariatu zostaje page_email.
     */
    function contactRecipient($request)
    {
        if ($request->input('form_office') === 'secretariat' && settings()->get('secretariat_email')) {
            return settings()->get('secretariat_email');
        }

        return settings()->get('page_email');
    }
}
