-- Dwa dodatkowe zdjecia inwestycji, wgrywane BEZ przycinania (tylko zmniejszane
-- do szerokosci z config/images.php), zeby klient mogl przygotowac kadr pod
-- konkretne miejsce na stronie:
--
--   file_list_thumb — "Duza miniatura na listach": wiersze na podstronach
--                     W sprzedazy / Wkrotce / Planowane (kadr 1122x650)
--                     oraz "Nadchodzace projekty" na stronie glownej.
--   file_slide      — "Karuzela": karuzela "Sprawdz inwestycje planowane"
--                     na stronie glownej (kadr 1920x620).
--   file_slide_mobile — "Karuzela - telefon": ta sama karuzela ponizej 768 px
--                     (kadr 4:3). Pusta = na telefonie idzie file_slide.
--
-- WebP i zmniejszona wersja mobilna duzej miniatury powstaja automatycznie przy
-- wgraniu (katalogi webp/ i mobile/ obok pliku) — nie maja osobnych kolumn.
--
-- Puste pole = front bierze to co wczesniej (naglowek / miniatura).
--
-- Baza byla wielokrotnie zmieniana recznie, migracje Laravela sa nieaktualne
-- (tabela `migrations` nie ma nawet AUTO_INCREMENT). Zmiany schematu ida tedy.
ALTER TABLE `investments`
    ADD COLUMN `file_list_thumb` VARCHAR(190) NULL DEFAULT NULL AFTER `file_header`,
    ADD COLUMN `file_slide` VARCHAR(190) NULL DEFAULT NULL AFTER `file_list_thumb`,
    ADD COLUMN `file_slide_mobile` VARCHAR(190) NULL DEFAULT NULL AFTER `file_slide`;
