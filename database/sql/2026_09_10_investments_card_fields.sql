-- Kafel inwestycji na stronie glownej: trzeci parametr ("2 pietra, winda")
-- i plakietka ("Ostatnie mieszkania"). To zdania handlowe, nie dane techniczne,
-- wiec nie da sie ich zlozyc z area_range/date_end — stad wlasne kolumny.
--
-- Baza byla wielokrotnie zmieniana recznie, migracje Laravela sa nieaktualne
-- (tabela `migrations` nie ma nawet AUTO_INCREMENT). Zmiany schematu ida tedy.
ALTER TABLE `investments`
    ADD COLUMN `card_param` VARCHAR(60)  NULL DEFAULT NULL AFTER `area_range`,
    ADD COLUMN `card_badge` VARCHAR(40)  NULL DEFAULT NULL AFTER `card_param`;
