-- Kasowanie 7 starszych pytan FAQ (podstrona /jak-kupic-mieszkanie).
-- Trzeci i ostatni plik modulu, po 2026_09_21_faq.sql i 2026_09_21_faq_pl.sql.
--
-- Te 7 pytan to nasze teksty, napisane na bazie poprzedniej wersji podstrony.
-- Klient ich nigdy nie zatwierdzil ani nie przetlumaczyl, a przyslany przez
-- niego zestaw 14 pytan czesciowo je dubluje ("Rynek pierwotny czy wtorny?"
-- kontra "Dlaczego warto wybrac nowe mieszkanie z rynku pierwotnego...").
-- Decyzja: zostaja wylacznie pytania od klienta, kompletne w obu jezykach.
--
-- Po tym pliku w tabeli zostaje 14 wpisow, kazdy z wersja PL i EN, wiec front
-- pokazuje tyle samo pytan po polsku co po angielsku.
--
-- Wpisy dopasowywane po polskim pytaniu, nie po `id` — id na produkcji moga
-- byc inne. Dodatkowy warunek na pusty klucz "en" pilnuje, zeby skrypt nie
-- ruszyl wpisu klienta, gdyby ktos w miedzyczasie nadal mu taka sama nazwe.
--
-- UWAGA: plik zawiera polskie znaki, wiec importujemy go JAWNIE w utf8mb4:
--   mysql -u... -p... baza --default-character-set=utf8mb4 < 2026_09_21_faq_usun_stare_pl.sql
-- Bez tego przelacznika warunki WHERE po prostu nie trafia w zadne wiersze.
--
-- URUCHAMIAC DOPIERO PO 2026_09_21_faq_pl.sql. Przed nim 14 pytan klienta tez
-- nie ma polskiej wersji i warunek "en jest puste" nie odroznilby jednych
-- od drugich — plik skasowalby komplet.

DELETE FROM `faqs`
WHERE JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.pl')) = 'Jak wybrać nowe mieszkanie? Od czego zacząć?'
  AND (JSON_EXTRACT(`question`, '$.en') IS NULL OR JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.en')) = '');

DELETE FROM `faqs`
WHERE JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.pl')) = 'Rynek pierwotny czy wtórny? Krótkie porównanie'
  AND (JSON_EXTRACT(`question`, '$.en') IS NULL OR JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.en')) = '');

DELETE FROM `faqs`
WHERE JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.pl')) = 'Zakup pierwszego mieszkania. Jak do tego podejść?'
  AND (JSON_EXTRACT(`question`, '$.en') IS NULL OR JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.en')) = '');

DELETE FROM `faqs`
WHERE JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.pl')) = 'Jak oglądać nowe mieszkanie? Praktyczny przewodnik'
  AND (JSON_EXTRACT(`question`, '$.en') IS NULL OR JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.en')) = '');

DELETE FROM `faqs`
WHERE JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.pl')) = 'Ile wkładu własnego potrzebuję, żeby kupić mieszkanie?'
  AND (JSON_EXTRACT(`question`, '$.en') IS NULL OR JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.en')) = '');

DELETE FROM `faqs`
WHERE JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.pl')) = 'Czy mogę negocjować cenę mieszkania z deweloperem?'
  AND (JSON_EXTRACT(`question`, '$.en') IS NULL OR JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.en')) = '');

DELETE FROM `faqs`
WHERE JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.pl')) = 'Jakie miesięczne koszty ponoszę po zakupie mieszkania?'
  AND (JSON_EXTRACT(`question`, '$.en') IS NULL OR JSON_UNQUOTE(JSON_EXTRACT(`question`, '$.en')) = '');

-- Numeracja `sort` od nowa (1..14), zeby po skasowaniu nie zostaly dziury.
-- Kolejnosc bez zmian — liczy sie tylko to, ze rosnie.
UPDATE `faqs` AS f
JOIN (
    SELECT `id`, ROW_NUMBER() OVER (ORDER BY `sort`, `id`) AS `rn`
    FROM `faqs`
) AS x ON x.`id` = f.`id`
SET f.`sort` = x.`rn`;
