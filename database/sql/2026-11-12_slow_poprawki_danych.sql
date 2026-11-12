-- Osiedle Slow (investments.id = 5) - poprawki danych po odpowiedzi klienta z 12.11.2026 (raport cen dane.gov.pl).
-- Uruchomić raz na bazie serwera. Każdy krok: najpierw SELECT (sprawdzić liczbę), potem UPDATE.
-- Liczby w komentarzach pochodzą z kopii lokalnej - na serwerze mogą się różnić o lokale dodane później.

-- 1. Pozycje "MN ..." (miejsca naziemne) wpisane jako komórki lokatorskie (type 2) -> miejsce parkingowe (type 3).
--    Klient potwierdził, że to miejsca parkingowe. Lokalnie: 29 rekordów (28 w budynku B3.1, 1 w B4.3 - MN112).
SELECT id, name, number, type, status, building_id FROM properties
WHERE investment_id = 5 AND type = 2 AND name LIKE 'MN%';

UPDATE properties SET type = 3
WHERE investment_id = 5 AND type = 2 AND name LIKE 'MN%';

-- 2. Miejsca postojowe bez budynku -> budynek ich kondygnacji.
--    Lokalnie: 21 rekordów MN 33 - MN 57, kondygnacja "Parking naziemny" budynku B3.2 (Ippon Gutkowo 2).
--    Raport od tej wersji sam dociąga budynek po kondygnacji, ale w panelu i na stronie lepiej mieć to w danych.
SELECT p.id, p.name, p.status, f.name AS kondygnacja, f.building_id FROM properties p
JOIN floors f ON f.id = p.floor_id
WHERE p.investment_id = 5 AND p.building_id IS NULL AND f.building_id IS NOT NULL;

UPDATE properties p
JOIN floors f ON f.id = p.floor_id
SET p.building_id = f.building_id
WHERE p.investment_id = 5 AND p.building_id IS NULL AND f.building_id IS NOT NULL;

-- 3. DO DECYZJI - NIE URUCHAMIAĆ BEZ SPRAWDZENIA. Osierocone kopie mieszkań w budynku B3.1.
--    Lokalnie: 11 rekordów "Mieszkanie 1 - kopia" ... "Mieszkanie 10 - kopia" (id 935, 966-975), bez ceny,
--    wskazują na kondygnacje, które już nie istnieją (floor_id 47 i 50). Raport je pomija.
--    Poniższy SELECT pokazuje, co by zostało usunięte; DELETE jest zakomentowany.
SELECT p.id, p.name, p.number, p.status, p.floor_id, p.price_brutto, p.created_at FROM properties p
LEFT JOIN floors f ON f.id = p.floor_id
WHERE p.investment_id = 5 AND p.type = 1 AND p.name LIKE '%kopia%'
  AND (p.price_brutto IS NULL OR p.price_brutto = 0) AND f.id IS NULL;

-- DELETE p FROM properties p
-- LEFT JOIN floors f ON f.id = p.floor_id
-- WHERE p.investment_id = 5 AND p.type = 1 AND p.name LIKE '%kopia%'
--   AND (p.price_brutto IS NULL OR p.price_brutto = 0) AND f.id IS NULL;
