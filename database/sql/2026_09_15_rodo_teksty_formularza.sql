-- 2026-09-15: teksty zgod pod formularzem kontaktowym (PL/EN) od klienta.
-- To zmiana DANYCH, nie schematu — ale baza nie ma dzialajacych migracji, wiec
-- idzie tym samym torem co zmiany schematu (plik + klient mysql).
-- Na produkcji: puscic ten plik albo wpisac te same teksty w adminie (RODO).
--
-- rodo_settings.obligation / obligation_en — akapit pod polami formularza
--   ("Podajac powyzsze dane, oswiadczam...").
-- rodo_rules id 4 ("Zgoda marketingowa", jedyna aktywna) — checkbox. Kolumna
--   text to JSON z tlumaczeniami (Spatie Translatable). PL bez zmian merytorycznych,
--   EN wg klienta. Linki do polityki prywatnosci zostaja jak byly.

SET NAMES utf8mb4;

UPDATE rodo_settings SET
    obligation    = '<p>Podając powyższe dane, oświadczam, że jestem osobą uprawnioną do ich używania, zapoznałem/zapoznałam się z <a href="/pl/polityka-prywatnosci" target="_blank">Polityką Prywatności</a> oraz wyrażam zgodę na przetwarzanie moich danych osobowych we wskazanym celu.</p>',
    obligation_en = '<p>By providing the above information, I declare that I am authorised to use this data, that I have read the <a href="/en/polityka-prywatnosci" target="_blank">Privacy Policy</a>, and that I consent to the processing of my personal data for the stated purpose.</p>'
WHERE id = 1;

UPDATE rodo_rules SET
    text = JSON_OBJECT(
        'pl', '<p>Wyrażam zgodę na przetwarzanie i profilowanie moich danych osobowych przez Ippon Group Sp. z o.o. w celach marketingowych a także na otrzymywanie informacji handlowych na wskazany przeze mnie adres e-mail lub numer telefonu. Więcej informacji na ten temat w <a href="/pl/polityka-prywatnosci" target="_blank" rel="noopener">polityce prywatności</a>.</p>',
        'en', '<p>I consent to the processing and profiling of my personal data by Ippon Group Sp. z o.o. for marketing purposes, as well as to receiving commercial communications at the email address or telephone number I have provided. For more information, please refer to the <a href="/en/polityka-prywatnosci" target="_blank" rel="noopener">Privacy Policy</a>.</p>'
    ),
    updated_at = NOW()
WHERE id = 4;
