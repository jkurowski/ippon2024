-- Pole "Adres URL" — wymusza docelowy adres inwestycji na wszystkich listach
-- na froncie (strona glowna, w sprzedazy / planowane / wkrotce, mapa,
-- zrealizowane). Do tej pory adresy spoza serwisu byly zaszyte w widokach
-- (`@if($r->id == 13) https://boxolsztyn.pl/`), a po przeniesieniu bazy ID
-- sie przenumerowaly i takie warunki przestaly trafiac we wlasciwe rekordy.
--
-- Puste pole = zachowanie jak dotad: karta inwestycji z modulu DeveloPro,
-- a gdy modulu nie ma — brak linku.
--
-- Kolumna trzyma JSON-a spatie/laravel-translatable (jak `name` i `stage`),
-- wiec jedna kolumna obsluguje PL i EN. Stad 500 znakow, a nie 255 —
-- w srodku siedza dwa adresy naraz.
--
-- Baza byla wielokrotnie zmieniana recznie, migracje Laravela sa nieaktualne
-- (tabela `migrations` nie ma nawet AUTO_INCREMENT). Zmiany schematu ida tedy.
ALTER TABLE `investments`
    ADD COLUMN `url` VARCHAR(500) NULL DEFAULT NULL AFTER `slug`;

-- Adresy przepisane 1:1 z warunkow, ktore staly w widokach. Po slugu,
-- a nie po ID — wlasnie rozjezdzajace sie ID byly powodem tej zmiany.
-- Wypelniamy tylko wersje PL: pusta wersja EN spada na polska, wiec jeden
-- adres nie musi siedziec w bazie dwa razy.
UPDATE `investments`
SET `url` = '{"pl":"https://boxolsztyn.pl/"}'
WHERE `slug` = 'boxy-samoobslugowe';

UPDATE `investments`
SET `url` = '{"pl":"https://www.aurora.olsztyn.pl/"}'
WHERE `slug` = 'osiedle-aurora-etap-4';
