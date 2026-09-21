-- Pole "Pozycja w miescie" — recznie ustawiana kolejnosc inwestycji na
-- podstronie /lokalizacja/{miasto}. Do tej pory Map\IndexController sortowal
-- grupami statusow (FIELD(status,1,4,3,2)), a w grupie alfabetycznie po
-- nazwie, wiec kolejnosci nie dalo sie ustawic z CMS-u.
--
-- Osobna kolumna zamiast istniejacego `sort`, bo `sort` ustawia sie
-- przeciaganiem wiersza na globalnej liscie inwestycji i steruje podstrona
-- "Inwestycje zrealizowane" — jedna liczba nie obsluzy dwoch roznych
-- porzadkow (globalnego i per miasto).
--
-- Migracje Laravela sa nieaktualne (patrz 2026_09_17_investments_sort.sql),
-- zmiany schematu ida tedy.
ALTER TABLE `investments`
    ADD COLUMN `city_sort` INT NOT NULL DEFAULT 0 AFTER `sort`;

-- Wartosci startowe = dokladnie to, co widac dzis na froncie: numerujemy od 1
-- w obrebie kazdego miasta, w kolejnosci statusow i nazw z kontrolera.
-- Dzieki temu po wdrozeniu podstrona wyglada identycznie jak przed zmiana,
-- a Jacek moze ja od tego momentu przestawiac.
--
-- ORDER BY name sortuje po surowym JSON-ie ({"pl":"...","en":"..."}), czyli
-- faktycznie po nazwie polskiej — tak samo jak robil to dotad kontroler.
UPDATE `investments` AS i
JOIN (
    SELECT
        `id`,
        ROW_NUMBER() OVER (
            PARTITION BY `city`
            ORDER BY FIELD(`status`, 1, 4, 3, 2), `name`
        ) AS `rn`
    FROM `investments`
    WHERE `status` != 5
) AS x ON x.`id` = i.`id`
SET i.`city_sort` = x.`rn`;

-- Inwestycje ukryte (status 5) zostaja z 0. Zero znaczy "pozycja nieustawiona"
-- i w kontrolerze laduje na koncu swojej grupy statusu, a nie na jej poczatku.
