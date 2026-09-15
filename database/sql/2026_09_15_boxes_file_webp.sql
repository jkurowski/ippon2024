-- 2026-09-15: Boksy (kafle "Inwestycje w sprzedazy") — wersja WebP obrazka.
-- Upload zapisuje obrazek zmniejszony do 960 px + kopie WebP w uploads/boxes/webp/,
-- tak jak slider i aktualnosci trzymaja ja w osobnej kolumnie file_webp.
-- Puscic PO 2026_09_15_boxes_inwestycje_w_sprzedazy.sql.

SET NAMES utf8mb4;

ALTER TABLE boxes
    ADD COLUMN file_webp VARCHAR(255) NULL AFTER file;
