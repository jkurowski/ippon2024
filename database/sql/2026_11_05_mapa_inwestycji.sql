-- Uwagi klienta 5.11.2026 (mapa inwestycji /lokalizacja). Po slugach, bo ID roznia sie miedzy bazami.

-- BOX: brak pinezki (znacznik wylaczony, wspolrzedne domyslne z Warszawy). Adres z maila.
UPDATE `investments` SET `marker` = 1, `lat` = '53.7832509', `lng` = '20.5097960',
       `address` = '{"pl":"ul. Żelazna 4, 10-419 Olsztyn","en":"ul. Żelazna 4, 10-419 Olsztyn"}'
 WHERE `slug` = 'boxy-samoobslugowe';

-- Madalinskiego (Gdansk): wspolrzedne domyslne z Warszawy -> punkt z linku Google Maps od klienta
UPDATE `investments` SET `lat` = '54.332553', `lng` = '18.610422'
 WHERE `slug` = 'osiedle-przy-madalinskiego';
