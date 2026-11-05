-- Uwagi klienta 5.11.2026: na mapie inwestycji (lokalizacja) osiedle Slow ma byc
-- rozbite na budynki, kazdy z wlasnym statusem. Kody jak investments.status:
-- 1 = w sprzedazy, 2 = zrealizowane, 3 = planowana, 4 = wkrotce. NULL = bez statusu
-- (budynek nie jest wtedy rozbijany na mapie).
ALTER TABLE `buildings` ADD COLUMN `status` TINYINT UNSIGNED NULL DEFAULT NULL AFTER `display_sold`;

-- Statusy z maila p. Anny (5.11.2026 13:53) - po numerze budynku, bo ID roznia sie miedzy bazami
UPDATE `buildings` b JOIN `investments` i ON i.id = b.investment_id
   SET b.status = CASE b.number WHEN 'B4.1' THEN 2 WHEN 'B4.2' THEN 2 ELSE 1 END
 WHERE i.slug = 'osiedle-slow' AND b.number IN ('B4.1','B4.2','B4.3','B3.1','B3.2');
