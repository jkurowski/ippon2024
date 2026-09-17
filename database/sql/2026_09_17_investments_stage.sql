-- Pole "Etap" — nazwy budynkow oddanych w danym etapie inwestycji
-- ("Budynek Junona i Jowisz"). Do tej pory klient wpisywal je w `address`,
-- przez co adres inwestycji nie mial gdzie usiasc.
--
-- Kolumna trzyma JSON-a spatie/laravel-translatable (jak `name` i `address`),
-- wiec jedna kolumna obsluguje PL i EN.
--
-- Baza byla wielokrotnie zmieniana recznie, migracje Laravela sa nieaktualne
-- (tabela `migrations` nie ma nawet AUTO_INCREMENT). Zmiany schematu ida tedy.
ALTER TABLE `investments`
    ADD COLUMN `stage` VARCHAR(255) NULL DEFAULT NULL AFTER `address`;
