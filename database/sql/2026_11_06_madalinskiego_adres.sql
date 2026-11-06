-- Uwaga klienta 6.11.2026: zamiast "Chelm (Gdansk)" ma byc "Gdansk, ul. Madalinskiego"
UPDATE `investments`
   SET `address` = '{"pl":"Gdańsk, ul. Madalińskiego","en":"Gdańsk, ul. Madalińskiego"}'
 WHERE `slug` = 'osiedle-przy-madalinskiego';
