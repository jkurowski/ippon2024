-- Raport cen (dane.gov.pl, Dz.U. 2026 poz. 1489), grupa D: numer nieruchomości i współrzędne per budynek.
-- Puste (NULL) = jak w inwestycji. Uruchomić raz na bazie serwera PRZED wgraniem kodu.
-- Wymaga wcześniejszego 2026_11_12_investments_wspolrzedne.sql (kolumny w `investments`).

ALTER TABLE `buildings`
    ADD COLUMN `inv_property_number` VARCHAR(50) NULL DEFAULT NULL AFTER `sale_point_id`,
    ADD COLUMN `inv_longitude` DECIMAL(9,6) NULL DEFAULT NULL AFTER `inv_property_number`,
    ADD COLUMN `inv_latitude` DECIMAL(9,6) NULL DEFAULT NULL AFTER `inv_longitude`;

-- Dane od klienta (mail 19.11.2026). Klient podał "szerokość, długość" - tu rozdzielone na kolumny.
-- Osiedle Slow, ul. Kordeckiego. B4.1 bez współrzędnych, B3.x bez numeru - nie zgadujemy.
UPDATE `buildings` b JOIN `investments` i ON i.id = b.investment_id AND i.slug = 'osiedle-slow'
   SET b.inv_property_number = '28'
 WHERE b.number = 'B4.1';

UPDATE `buildings` b JOIN `investments` i ON i.id = b.investment_id AND i.slug = 'osiedle-slow'
   SET b.inv_property_number = '30', b.inv_latitude = 53.801844, b.inv_longitude = 20.390799
 WHERE b.number = 'B4.2';

UPDATE `buildings` b JOIN `investments` i ON i.id = b.investment_id AND i.slug = 'osiedle-slow'
   SET b.inv_property_number = '32', b.inv_latitude = 53.801889, b.inv_longitude = 20.391679
 WHERE b.number = 'B4.3';

UPDATE `buildings` b JOIN `investments` i ON i.id = b.investment_id AND i.slug = 'osiedle-slow'
   SET b.inv_latitude = 53.802693, b.inv_longitude = 20.391250
 WHERE b.number = 'B3.1';

UPDATE `buildings` b JOIN `investments` i ON i.id = b.investment_id AND i.slug = 'osiedle-slow'
   SET b.inv_latitude = 53.802503, b.inv_longitude = 20.391979
 WHERE b.number = 'B3.2';

-- Osiedle Tempo, ul. Dolna (numer jeszcze nienadany): współrzędne na inwestycji.
UPDATE `investments`
   SET inv_latitude = 53.741347, inv_longitude = 20.487030
 WHERE slug = 'osiedle-tempo';
