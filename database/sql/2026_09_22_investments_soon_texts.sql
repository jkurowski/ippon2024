-- Wlasny tytul i opis dla sekcji "Przyszlosc pisana komfortem" (Nadchodzace
-- projekty) na stronie glownej. Do tej pory blok bral nazwe inwestycji i
-- pierwsze 140 znakow zajawki, a wg projektu ma tam stac osobne haslo
-- marketingowe — przy Osiedlu Malczewskiego "PRESTIZ MIERZY SIE SPOKOJEM".
--
-- Oba pola sa tlumaczone (JSON spatie/laravel-translatable), tak samo jak
-- `name`, `stage` czy `entry_content`. TEXT, a nie VARCHAR, bo tak trzyma
-- sie tu tresci tlumaczone o dowolnej dlugosci.
--
-- Migracje Laravela sa nieaktualne (patrz 2026_09_17_investments_sort.sql),
-- zmiany schematu ida tedy.
--
-- UWAGA: plik zawiera polskie znaki, wiec importujemy go JAWNIE w utf8mb4:
--   mysql -u... -p... baza --default-character-set=utf8mb4 < 2026_09_22_investments_soon_texts.sql
-- Bez tego przelacznika klient mysql na Windowsie zapisuje podwojnie
-- zakodowane krzaki.
ALTER TABLE `investments`
    ADD COLUMN `soon_title`   TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `stage`,
    ADD COLUMN `soon_content` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `soon_title`;

-- Tresc z projektu dla jedynej inwestycji ze statusem "Juz wkrotce".
-- Dopasowanie po nazwie, nie po `id` — id na produkcji moga byc inne.
-- Tytul zapisany wersalikami tak, jak stoi w projekcie; arkusz i tak nadaje
-- .ip-split-title text-transform: uppercase, wiec zapis mala litera tez zadziala.
UPDATE `investments`
SET `soon_title`   = '{"pl":"PRESTIŻ MIERZY SIĘ SPOKOJEM"}',
    `soon_content` = '{"pl":"Luksus ciszy, prestiż lokalizacji w kameralnej części Gdańska"}'
WHERE JSON_UNQUOTE(JSON_EXTRACT(`name`, '$.pl')) = 'Osiedle Malczewskiego';
