-- Uwagi p. Anny z 16.11.2026 ("strona ippon"). Puscic RAZ (przesuwa kolejnosc zrealizowanych).
-- Pliki zdjec: paczka uploads-2026-11-19.zip (uploads/gallery/images, uploads/boxes) - rozpakowac PRZED albo PO, bez znaczenia.
-- Wszystko po slugach / nazwach, bez zaszytych ID.

SET NAMES utf8mb4;

SET @slow     = (SELECT id FROM investments WHERE slug = 'osiedle-slow');
SET @synergia = (SELECT id FROM investments WHERE slug = 'osiedle-synergia');
SET @b31      = (SELECT id FROM buildings WHERE investment_id = @slow AND number = 'B3.1');

-- ---------------------------------------------------------------------------
-- 1. Galerie (karuzela na karcie "Inwestycje zrealizowane")
-- ---------------------------------------------------------------------------
INSERT INTO galleries (name, slug, sort, status, created_at, updated_at)
SELECT 'Zrealizowana - Slow B4.2', 'zrealizowana-slow-b42', 0, 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM galleries WHERE slug = 'zrealizowana-slow-b42');

INSERT INTO galleries (name, slug, sort, status, created_at, updated_at)
SELECT 'Zrealizowana - Synergia', 'zrealizowana-synergia', 0, 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM galleries WHERE slug = 'zrealizowana-synergia');

SET @g_b42 = (SELECT id FROM galleries WHERE slug = 'zrealizowana-slow-b42');
SET @g_syn = (SELECT id FROM galleries WHERE slug = 'zrealizowana-synergia');

INSERT INTO images (gallery_id, name, file, file_webp, sort, created_at, updated_at)
SELECT g, n, CONCAT(f, '.jpg'), CONCAT(f, '.webp'), s, NOW(), NOW() FROM (
    SELECT @g_b42 g, 'SLOW B4.2 1.jpg' n, '161126_slow-b42-1' f, 1 s UNION ALL
    SELECT @g_b42, 'SLOW B4.2 2.jpg', '161126_slow-b42-2', 2 UNION ALL
    SELECT @g_b42, 'SLOW B4.2 3.jpg', '161126_slow-b42-3', 3 UNION ALL
    SELECT @g_syn, 'Synergia 1.jpg', '161126_synergia-1', 1 UNION ALL
    SELECT @g_syn, 'Synergia 2.jpg', '161126_synergia-2', 2 UNION ALL
    SELECT @g_syn, 'Synergia 3.jpg', '161126_synergia-3', 3 UNION ALL
    SELECT @g_syn, 'Synergia 4.jpg', '161126_synergia-4', 4
) x
WHERE NOT EXISTS (SELECT 1 FROM images i WHERE i.file = CONCAT(x.f, '.jpg'));

-- ---------------------------------------------------------------------------
-- 2. Zrealizowane: Slow B4.2 (nowy rekord jak "Osiedle Slow" B4.1) i Synergia
--    Kolejnosc listy: najnowsze na gorze (B4.2, Synergia, potem dotychczasowe).
-- ---------------------------------------------------------------------------
UPDATE investments SET sort = sort + 2 WHERE status = 2;

INSERT INTO investments
    (name, slug, url, type, status, address, stage, marker, city, lat, lng, zoom, date_end,
     entry_content, contact_form, carousel_id, developro, sort, city_sort,
     company_id, sale_point_id, created_at, updated_at)
SELECT
    JSON_OBJECT('pl', 'Osiedle Slow', 'en', 'Osiedle Slow'),
    'osiedle-slow-b42', url, type, 2, address,
    JSON_OBJECT('pl', 'Budynek B 4.2', 'en', 'Building B 4.2'),
    marker, city, lat, lng, zoom, '2026',
    JSON_OBJECT(
        'pl', '<p>Trzykondygnacyjny budynek obejmuje 39 funkcjonalnych mieszkań. Inwestycja wyróżnia się bliskością natury i dostępem do ponad 2,14 hektara terenów zielonych, ścieżek spacerowych oraz rozbudowanych stref rekreacyjnych, tworzących przestrzeń sprzyjającą wypoczynkowi i aktywnemu stylowi życia.</p>',
        'en', '<p>A three-storey building with 39 functional apartments. The development stands out for its closeness to nature and access to over 2.14 hectares of green space, walking paths and extensive recreation areas, creating a space for relaxation and an active lifestyle.</p>'
    ),
    contact_form, @g_b42, developro, 1, city_sort,
    company_id, sale_point_id, NOW(), NOW()
FROM investments
WHERE slug = 'osiedle-slow-1'
  AND NOT EXISTS (SELECT 1 FROM (SELECT slug FROM investments) t WHERE t.slug = 'osiedle-slow-b42');

UPDATE investments SET
    status = 2,
    sort = 2,
    carousel_id = @g_syn,
    entry_content = JSON_OBJECT(
        'pl', '<p>Pięciopiętrowy budynek obejmuje 95 mieszkań o powierzchniach od 27 do 80 m², a jego wyróżnikiem jest zielone patio na poziomie pierwszego piętra, z miejscami wypoczynku, alejkami spacerowymi i placem zabaw, przeznaczone wyłącznie dla mieszkańców. Inwestycja oferuje wysoki standard wykończenia, cichobieżne windy, garaż podziemny, komórki lokatorskie oraz sklep Carrefour na parterze.</p>',
        'en', '<p>The five-storey building comprises 95 apartments from 27 to 80 m². Its distinguishing feature is a green patio on the first floor with seating areas, walking paths and a playground, reserved exclusively for residents. The development offers a high standard of finish, quiet lifts, an underground garage, storage rooms and a Carrefour shop on the ground floor.</p>'
    )
WHERE id = @synergia;

-- status budynku na mapie (lista budynkow na karcie Slow)
UPDATE buildings SET status = 2 WHERE investment_id = @slow AND number = 'B4.2';

-- ---------------------------------------------------------------------------
-- 3. Kafle "Inwestycje w sprzedazy" (SG i /mieszkania-w-sprzedazy): bez B4.2 i Synergii,
--    Slow B3.1 i B3.2 osobno. Kolejnosc: Tempo, B3.1, B3.2, B4.3.
-- ---------------------------------------------------------------------------
DELETE FROM boxes WHERE JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) IN ('Osiedle SLOW Bud. 4.2', 'Osiedle SYNERGIA');

SET @box_b31 = (SELECT id FROM boxes WHERE JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'Osiedle SLOW B3.1 / B3.2');

INSERT INTO boxes (badge, location, name, description, area, handover, advantage, link_apartments, link_description, file, file_webp, sort, created_at, updated_at)
SELECT badge, location,
    JSON_OBJECT('pl', 'Osiedle SLOW B3.2', 'en', 'SLOW Residential Development – B3.2'),
    JSON_OBJECT(
        'pl', 'Kameralny budynek na osiedlu SLOW, obejmujący zaledwie 30 mieszkań, otoczony jest terenami zielonymi, zapewniając mieszkańcom spokój, prywatność oraz codzienny kontakt z naturą.',
        'en', 'An intimate building on the SLOW estate with just 30 apartments, surrounded by green areas, offering residents peace, privacy and everyday contact with nature.'
    ),
    area, handover, advantage,
    JSON_OBJECT(
        'pl', CONCAT('/pl/i/osiedle-slow/mieszkania?building=', (SELECT id FROM buildings WHERE investment_id = @slow AND number = 'B3.2'), '#filtr'),
        'en', CONCAT('/en/i/osiedle-slow/mieszkania?building=', (SELECT id FROM buildings WHERE investment_id = @slow AND number = 'B3.2'), '#filtr')
    ),
    link_description,
    '161126_osiedle-slow-b32.jpg', '161126_osiedle-slow-b32.webp', 4, NOW(), NOW()
FROM boxes WHERE id = @box_b31;

UPDATE boxes SET
    name = JSON_OBJECT('pl', 'Osiedle SLOW B3.1', 'en', 'SLOW Residential Development – B3.1'),
    link_apartments = JSON_OBJECT(
        'pl', CONCAT('/pl/i/osiedle-slow/mieszkania?building=', @b31, '#filtr'),
        'en', CONCAT('/en/i/osiedle-slow/mieszkania?building=', @b31, '#filtr')
    ),
    sort = 3
WHERE id = @box_b31;

UPDATE boxes SET sort = 5 WHERE JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) = 'Osiedle SLOW B4.3';

-- kontrola
SELECT id, sort, JSON_UNQUOTE(JSON_EXTRACT(name, '$.pl')) AS kafel, JSON_UNQUOTE(JSON_EXTRACT(link_apartments, '$.pl')) AS link FROM boxes ORDER BY sort;
SELECT id, sort, slug, JSON_UNQUOTE(JSON_EXTRACT(stage, '$.pl')) AS etap, carousel_id FROM investments WHERE status = 2 ORDER BY sort;

-- ---------------------------------------------------------------------------
-- 4. Slow B4.1 (zrealizowana od wczesniej, slug osiedle-slow-1): karuzela zamiast
--    jednego zdjecia - 3 zdjecia doslane przez klienta 16.11 (WeTransfer) + 4 z obecnej
--    www.ippon.group (uploads/slow/b4_1_1..4.jpg, 664 px - bez powiekszania).
--    Mozna puscic ponownie (sam ten fragment), nic sie nie zdubluje.
-- ---------------------------------------------------------------------------
INSERT INTO galleries (name, slug, sort, status, created_at, updated_at)
SELECT 'Zrealizowana - Slow B4.1', 'zrealizowana-slow-b41', 0, 1, NOW(), NOW()
WHERE NOT EXISTS (SELECT 1 FROM galleries WHERE slug = 'zrealizowana-slow-b41');

SET @g_b41 = (SELECT id FROM galleries WHERE slug = 'zrealizowana-slow-b41');

INSERT INTO images (gallery_id, name, file, file_webp, sort, created_at, updated_at)
SELECT g, n, CONCAT(f, '.jpg'), CONCAT(f, '.webp'), s, NOW(), NOW() FROM (
    SELECT @g_b41 g, 'SLOW B4.1 1.jpg' n, '161126_slow-b41-1' f, 1 s UNION ALL
    SELECT @g_b41, 'SLOW B4.1 2.jpg', '161126_slow-b41-2', 2 UNION ALL
    SELECT @g_b41, 'SLOW B4.1 3.jpg', '161126_slow-b41-3', 3 UNION ALL
    SELECT @g_b41, 'b4_1_1.jpg (z ippon.group)', '161126_slow-b41-4', 4 UNION ALL
    SELECT @g_b41, 'b4_1_2.jpg (z ippon.group)', '161126_slow-b41-5', 5 UNION ALL
    SELECT @g_b41, 'b4_1_3.jpg (z ippon.group)', '161126_slow-b41-6', 6 UNION ALL
    SELECT @g_b41, 'b4_1_4.jpg (z ippon.group)', '161126_slow-b41-7', 7
) x
WHERE NOT EXISTS (SELECT 1 FROM images i WHERE i.file = CONCAT(x.f, '.jpg'));

UPDATE investments SET carousel_id = @g_b41 WHERE slug = 'osiedle-slow-1';

SELECT slug, carousel_id, (SELECT COUNT(*) FROM images WHERE gallery_id = @g_b41) AS zdjec FROM investments WHERE slug = 'osiedle-slow-1';
