-- Raport cen (dane.gov.pl): spolka celowa i punkt sprzedazy per budynek.
-- Puste (NULL) = jak w inwestycji. Raport bierze dane z budynku, gdy sa ustawione.
ALTER TABLE `buildings`
    ADD COLUMN `company_id` INT UNSIGNED NULL DEFAULT NULL AFTER `investment_id`,
    ADD COLUMN `sale_point_id` INT UNSIGNED NULL DEFAULT NULL AFTER `company_id`;

-- Osiedle Slow (klient, 10.11.2026): B3.1 i B3.2 = Ippon Gutkowo 2 (NIP 5252885383),
-- B4.1, B4.2, B4.3 = Ippon Gutkowo 1 (NIP 5252886626). Po NIP i numerze budynku, nie po ID.
-- Spolke Ippon Gutkowo 2 klient dodal w panelu - gdy jej nie ma, UPDATE nic nie zmieni.
UPDATE `buildings` b
  JOIN `investments` i ON i.id = b.investment_id AND i.slug = 'osiedle-slow'
  JOIN `investment_companies` c ON REPLACE(REPLACE(c.nip, '-', ''), ' ', '') = '5252885383'
   SET b.company_id = c.id
 WHERE b.number IN ('B3.1', 'B3.2');

UPDATE `buildings` b
  JOIN `investments` i ON i.id = b.investment_id AND i.slug = 'osiedle-slow'
  JOIN `investment_companies` c ON REPLACE(REPLACE(c.nip, '-', ''), ' ', '') = '5252886626'
   SET b.company_id = c.id
 WHERE b.number IN ('B4.1', 'B4.2', 'B4.3');
