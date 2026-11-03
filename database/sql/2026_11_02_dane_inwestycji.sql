-- Poprawki DANYCH inwestycji z uwag klienta (maile 30.10 i 2.11.2026).
-- Plik zbiorczy: kolejne poprawki danych z tego etapu dopisujemy na dole
-- jako nowe sekcje, zeby na developro i produkcje szedl jeden skrypt.
--
-- Bezpieczny do wielokrotnego uruchomienia (same UPDATE po id + nazwie).
-- Warunek na nazwe pilnuje, zeby po kolejnej podmianie bazy (ID juz sie
-- przenumerowaly we wrzesniu) nie nadpisac innej inwestycji.
--
-- Import JAWNIE w utf8mb4 (polskie znaki w warunkach):
--   mysql -uroot baza --default-character-set=utf8mb4 < 2026_11_02_dane_inwestycji.sql
--
-- UWAGA produkcja: inwestycje 15 (Slow B4.1) i 16 (Madalinskiego) istnieja
-- tylko na developro, w bazie www.ippon.group ich nie ma - tam ich UPDATE
-- nic nie zrobi. Przeniesienie samych rekordow to osobna sekcja (do dopisania).

SET NAMES utf8mb4;

-- -----------------------------------------------------------------------------
-- 1. Wspolrzedne na mapie (uwaga 2.11: Slow i Madalinskiego pokazuja sie
--    w Warszawie, mapa Olsztyna obejmuje Warszawe). Trzy rekordy mialy
--    52.227388, 21.011063 - domyslny punkt formularza (centrum Warszawy).
-- -----------------------------------------------------------------------------

-- Slow B4.1 (zrealizowany) lezy na tym samym osiedlu co Slow w sprzedazy (id 5),
-- wiec bierze jego wspolrzedne. Pinezki sie pokryja; jesli maja byc obok
-- siebie, wpisac punkt budynku B4.1.
UPDATE investments AS t
JOIN (SELECT lat, lng FROM investments WHERE id = 5) AS src
SET t.lat = src.lat, t.lng = src.lng
WHERE t.id = 15
  AND JSON_UNQUOTE(JSON_EXTRACT(t.name, '$.pl')) = 'Osiedle Slow'
  AND t.lat = 52.227388;

-- DO UZUPELNIENIA: punkt z Google Maps (prawy klik na budynek -> pierwsza
-- linijka to "lat, lng"). Dopoki NULL, UPDATE nic nie zmienia.
SET @boxy_lat = NULL, @boxy_lng = NULL;          -- BOXY samoobslugowe, ul. Zelazna 4, Olsztyn
SET @madal_lat = NULL, @madal_lng = NULL;        -- Osiedle przy Madalinskiego, Chelm (Gdansk)

UPDATE investments
SET lat = @boxy_lat, lng = @boxy_lng
WHERE id = 13
  AND JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'BOXY samoobsługowe'
  AND @boxy_lat IS NOT NULL AND @boxy_lng IS NOT NULL;

UPDATE investments
SET lat = @madal_lat, lng = @madal_lng
WHERE id = 16
  AND JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'Osiedle przy Madalińskiego'
  AND @madal_lat IS NOT NULL AND @madal_lng IS NOT NULL;

-- Kontrola: zadna inwestycja nie powinna juz stac w centrum Warszawy
-- (poza tymi, ktorych punktow jeszcze nie wpisano).
SELECT id, JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) AS nazwa, lat, lng
FROM investments
WHERE lat = 52.227388 AND lng = 21.011063;

-- ---------------------------------------------------------------------------
-- 3. Kolejnosc planowanych (uwaga klienta 2.11.2026): Warmia Luxury,
--    Gdansk, Warszawa, Lesna Aura. Front sortuje planowane po `sort`
--    (wczesniej po id malejaco). Sortowanie tez w adminie.
-- ---------------------------------------------------------------------------
UPDATE investments SET sort = 10 WHERE id = 8  AND JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'Warmia Luxury Residence';
UPDATE investments SET sort = 11 WHERE id = 16 AND JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'Osiedle przy Madalińskiego';
UPDATE investments SET sort = 12 WHERE id = 10 AND JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'Osiedle Modzelewskiego';
UPDATE investments SET sort = 13 WHERE id = 9  AND JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'Leśna Aura';
