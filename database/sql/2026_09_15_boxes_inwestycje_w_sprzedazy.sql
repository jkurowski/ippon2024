-- 2026-09-15: modul "Boksy" (admin) przerobiony na kafle "Inwestycje w sprzedazy"
-- na stronie glownej.
--
-- Stan przed zmiana: tabela pusta, modul nigdzie niewyswietlany na froncie i bez
-- pozycji w menu admina (stary boks z animacjami AOS). Dodatkowo `id` nie mialo
-- AUTO_INCREMENT, wiec kazde "Dodaj boks" konczylo sie bledem 1364.
--
-- Pola tlumaczone (Spatie Translatable) trzymaja JSON {"pl": ..., "en": ...} w TEXT.
-- `area` (metraz) tylko PL — liczby i m2 sa takie same w obu jezykach.
--
-- Dane: 5 inwestycji od klienta (teksty PL/EN). Bez linkow i bez zdjec — linki
-- uzupelnia sie w adminie, a zdjecia leza w public/uploads (poza repo), wiec i tak
-- trzeba je wgrac przez admin. Lokalizacja wzieta z adresow inwestycji w bazie.

SET NAMES utf8mb4;

ALTER TABLE boxes
    CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

ALTER TABLE boxes
    MODIFY id INT NOT NULL AUTO_INCREMENT,
    DROP COLUMN place_id,
    DROP COLUMN title,
    DROP COLUMN `text`,
    DROP COLUMN file_alt,
    DROP COLUMN link,
    DROP COLUMN link_button,
    DROP COLUMN link_target,
    DROP COLUMN aos_animation,
    DROP COLUMN aos_duration,
    DROP COLUMN aos_delay,
    DROP COLUMN aos_offset,
    ADD COLUMN badge            TEXT NULL        AFTER id,
    ADD COLUMN location         TEXT NULL        AFTER badge,
    ADD COLUMN name             TEXT NULL        AFTER location,
    ADD COLUMN description      TEXT NULL        AFTER name,
    ADD COLUMN area             VARCHAR(50) NULL AFTER description,
    ADD COLUMN handover         TEXT NULL        AFTER area,
    ADD COLUMN advantage        TEXT NULL        AFTER handover,
    ADD COLUMN link_apartments  TEXT NULL        AFTER advantage,
    ADD COLUMN link_description TEXT NULL        AFTER link_apartments;

INSERT INTO boxes (badge, location, name, description, area, handover, advantage, file, sort, created_at, updated_at) VALUES
(
    JSON_OBJECT('pl', 'OSTATNIE MIESZKANIA', 'en', 'LAST APARTMENTS AVAILABLE'),
    JSON_OBJECT('pl', 'Olsztyn, ul. Kordeckiego', 'en', 'Olsztyn, Kordeckiego Street'),
    JSON_OBJECT('pl', 'Osiedle SLOW Bud. 4.2', 'en', 'SLOW Residential Development – Building 4.2'),
    JSON_OBJECT('pl', 'Ostatnie mieszkania do odbioru na jesień 2026 roku.', 'en', 'Last apartments available for handover in autumn 2026.'),
    '35-56 m²',
    JSON_OBJECT('pl', 'Q4 2026 r.', 'en', 'Q4 2026'),
    JSON_OBJECT('pl', '2 piętra, winda', 'en', '2 floors, lift'),
    NULL, 1, NOW(), NOW()
),
(
    JSON_OBJECT('pl', 'W SPRZEDAŻY', 'en', 'NOW ON SALE'),
    JSON_OBJECT('pl', 'Olsztyn, ul. Sikorskiego / ul. Wilczyńskiego', 'en', 'Olsztyn, Sikorskiego / Wilczyńskiego Street'),
    JSON_OBJECT('pl', 'Osiedle TEMPO', 'en', 'TEMPO Residential Development'),
    JSON_OBJECT('pl', 'Pierwsze w Olsztynie osiedle z pakietem Smart Home w standardzie, zlokalizowane tuż przy przystankach tramwajowych i autobusowych.', 'en', 'The first residential development in Olsztyn with a Smart Home package included as standard, located right next to tram and bus stops.'),
    '28-86 m²',
    JSON_OBJECT('pl', 'Q2 2028 r.', 'en', 'Q2 2028'),
    JSON_OBJECT('pl', '4 piętra, garaż podziemny', 'en', '4 floors, underground garage'),
    NULL, 2, NOW(), NOW()
),
(
    JSON_OBJECT('pl', 'W SPRZEDAŻY', 'en', 'NOW ON SALE'),
    JSON_OBJECT('pl', 'Olsztyn, ul. Kordeckiego', 'en', 'Olsztyn, Kordeckiego Street'),
    JSON_OBJECT('pl', 'Osiedle SLOW B3.1 / B3.2', 'en', 'SLOW Residential Development – B3.1 / B3.2'),
    JSON_OBJECT('pl', 'Kameralna i ekologiczna inwestycja, z ponad 60-metrowymi odstępami między budynkami oraz bogatą strefą rekreacyjną.', 'en', 'An intimate and eco-friendly residential development, with over 60 metres of space between buildings and an extensive recreational area.'),
    '35-70 m²',
    JSON_OBJECT('pl', 'Q2 2028 r.', 'en', 'Q2 2028'),
    JSON_OBJECT('pl', '2 piętra, winda', 'en', '2 floors, lift'),
    NULL, 3, NOW(), NOW()
),
(
    JSON_OBJECT('pl', 'OSTATNIE MIESZKANIA', 'en', 'LAST APARTMENTS AVAILABLE'),
    JSON_OBJECT('pl', 'Olsztyn, ul. Kordeckiego', 'en', 'Olsztyn, Kordeckiego Street'),
    JSON_OBJECT('pl', 'Osiedle SLOW B4.3', 'en', 'SLOW Residential Development – B4.3'),
    JSON_OBJECT('pl', 'Proekologiczna inwestycja, ponad 2 hektary prywatnej zieleni z wiatą grillową i strefą do jogi.', 'en', 'An eco-friendly residential development with over 2 hectares of private green space, featuring a barbecue area and a dedicated yoga zone.'),
    '35-56 m²',
    JSON_OBJECT('pl', 'Q3 2027 r.', 'en', 'Q3 2027'),
    JSON_OBJECT('pl', '2 piętra, winda', 'en', '2 floors, lift'),
    NULL, 4, NOW(), NOW()
),
(
    JSON_OBJECT('pl', 'SPRZEDAŻ ZAKOŃCZONA', 'en', 'SOLD OUT'),
    JSON_OBJECT('pl', 'Olsztyn, ul. Kanta', 'en', 'Olsztyn, Kanta Street'),
    JSON_OBJECT('pl', 'Osiedle SYNERGIA', 'en', 'SYNERGIA Residential Development'),
    JSON_OBJECT('pl', 'Osiedle powstanie w samym centrum Jarot, największej dzielnicy mieszkaniowej w Olsztynie.', 'en', 'The development is located in the heart of Jaroty, Olsztyn’s largest residential district.'),
    '27-80 m²',
    JSON_OBJECT('pl', 'Q4 2026 r.', 'en', 'Q4 2026'),
    JSON_OBJECT('pl', '5 pięter, parking podziemny', 'en', '5 floors, underground parking'),
    NULL, 5, NOW(), NOW()
);
