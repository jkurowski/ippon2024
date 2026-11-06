-- 6.11.2026: nowe grafiki slajdera od klienta (1920x960, 2:1).
-- Pliki: uploads/slider/{1920,1440,1024,source,thumbs}/ + uploads/slider/ (z paczki uploads-2026-11-06.zip).
-- Zamiast tego SQL-a mozna wgrac grafiki w panelu (Slajder -> edycja -> Zdjecie) - wynik ten sam.
UPDATE `sliders` SET `file` = '124735-ji01_tempo.jpg',        `file_webp` = '124735-ji01_tempo.webp'        WHERE `id` = 17;
UPDATE `sliders` SET `file` = '124736-2ixz_osiedle-slow.jpg', `file_webp` = '124736-2ixz_osiedle-slow.webp' WHERE `id` = 18;
