-- Kolejnosc inwestycji ustawiana w CMS-ie (przeciaganie na liscie), zamiast
-- zaszytej w kontrolerze tablicy FIELD(id, 1,2,3,11,4). Po przeniesieniu bazy
-- ID sie przenumerowaly i zaszyta kolejnosc przestala cokolwiek znaczyc.
--
-- Mechanizm jest ten sam co w miastach, galeriach i aktualnosciach:
-- BaseRepository::updateOrder() przepisuje `sort` od 1 w gore.
--
-- Baza byla wielokrotnie zmieniana recznie, migracje Laravela sa nieaktualne
-- (tabela `migrations` nie ma nawet AUTO_INCREMENT). Zmiany schematu ida tedy.
ALTER TABLE `investments`
    ADD COLUMN `sort` INT NOT NULL DEFAULT 0 AFTER `developro`;

-- Kolejnosc startowa = dokladnie to, co widac dzis na froncie. Zrealizowane
-- (1, 2, 3, 11, 4) zachowuja porzadek z kontrolera — Aurora 3.2 przed Aurora 4
-- — zeby podstrona po wdrozeniu wygladala identycznie jak przed zmiana.
UPDATE `investments`
SET `sort` = FIELD(`id`, 1, 2, 3, 11, 4, 5, 6, 7, 8, 9, 10, 12, 13);

-- FIELD() zwraca 0 dla rekordow spoza listy — takie ladujemy na koniec,
-- a nie na gore listy.
UPDATE `investments`
SET `sort` = `id` + 100
WHERE `sort` = 0;
