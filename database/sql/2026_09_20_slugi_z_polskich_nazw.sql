-- Slugi wygenerowane z angielskich nazw — naprawa danych po bledzie, ktory
-- zalatano w tym samym commicie (Investment::getSlugOptions + UrlObserver).
-- Zapis rekordu w CMS-ie przy `?lang=en` przepisywal slug z tlumaczenia,
-- wiec kazda edycja wersji angielskiej cicho zmieniala adres.
--
-- Zaden z ponizszych adresow nie jest linkowany z frontu:
--   * pozycje menu (`pages`.`type` = 2) prowadza przez kolumne `url`,
--     a `uri` sluzy tylko klasie "active" w starych partialach;
--   * inwestycja 1 (Osiedle Aurora Etap 1) jest zrealizowana i bez modulu
--     DeveloPro, wiec zadna lista do niej nie linkuje. Adres
--     /pl/i/aurora-estate-stage-1 przestaje dzialac — gdyby mial gdzies
--     zostac, trzeba go przekierowac.
--
-- Baza byla wielokrotnie zmieniana recznie, migracje Laravela sa nieaktualne
-- (tabela `migrations` nie ma nawet AUTO_INCREMENT). Zmiany danych ida tedy.
UPDATE `investments` SET `slug` = 'osiedle-aurora-etap-1' WHERE `slug` = 'aurora-estate-stage-1';

UPDATE `pages` SET `slug` = 'kontakt',              `uri` = 'kontakt'              WHERE `slug` = 'contact';
UPDATE `pages` SET `slug` = 'kariera',              `uri` = 'kariera'              WHERE `slug` = 'career';
UPDATE `pages` SET `slug` = 'wynajem',              `uri` = 'wynajem'              WHERE `slug` = 'for-rent';
UPDATE `pages` SET `slug` = 'jak-kupic-mieszkanie', `uri` = 'jak-kupic-mieszkanie' WHERE `slug` = 'how-to-buy-apartment';
UPDATE `pages` SET `slug` = 'zakup-gruntow',        `uri` = 'zakup-gruntow'        WHERE `slug` = 'land-purchase';
UPDATE `pages` SET `slug` = 'aktualnosci',          `uri` = 'aktualnosci'          WHERE `slug` = 'news';
UPDATE `pages` SET `slug` = 'o-nas',                `uri` = 'o-nas'                WHERE `slug` = 'about-us';
