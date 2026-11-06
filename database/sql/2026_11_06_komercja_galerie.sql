-- Uwagi klienta 6.11.2026 (Gabriela, 11:49): obiekty komercyjne
-- Narcyzowa, Lubi (Lesna) - zostaje jedno (nowe) zdjecie, pozostale stare - usunac.
-- Zelazna (budynek przy ul. Zelaznej) - usunac zdjecia na pozycjach 3 i 4.
-- Pliki zostaja na dysku; nowe zdjecia Lubi/Narcyzowa sa wgrane pod nazwami pierwszych pozycji.
--
-- Usuwane wiersze (kopia):
--   {"id":41,"gallery_id":1,"name":"3.jpg","file":"120119_3.jpg","file_webp":"120119_3.webp","file_alt":null,"created_at":"2024-02-01 12:01:19","updated_at":"2024-02-01 12:01:19","sort":0}
--   {"id":42,"gallery_id":1,"name":"2 — kopia.jpg","file":"120119_2-kopia.jpg","file_webp":"120119_2-kopia.webp","file_alt":null,"created_at":"2024-02-01 12:01:19","updated_at":"2024-02-01 12:01:20","sort":0}
--   {"id":23,"gallery_id":7,"name":"2.JPG","file":"105359_2.JPG","file_webp":"105359_2.webp","file_alt":null,"created_at":"2024-02-01 10:53:59","updated_at":"2024-10-08 09:55:01","sort":2}
--   {"id":24,"gallery_id":7,"name":"1.JPG","file":"105359_1.JPG","file_webp":"105359_1.webp","file_alt":null,"created_at":"2024-02-01 10:53:59","updated_at":"2024-10-08 09:55:01","sort":3}
--   {"id":25,"gallery_id":7,"name":"3.JPG","file":"105359_3.JPG","file_webp":"105359_3.webp","file_alt":null,"created_at":"2024-02-01 10:53:59","updated_at":"2024-10-08 09:55:01","sort":4}
--   {"id":32,"gallery_id":8,"name":"2.jpg","file":"105839_2.jpg","file_webp":"105839_2.webp","file_alt":null,"created_at":"2024-02-01 10:58:39","updated_at":"2025-10-20 21:27:23","sort":3}
--   {"id":33,"gallery_id":8,"name":"3.jpg","file":"105839_3.jpg","file_webp":"105839_3.webp","file_alt":null,"created_at":"2024-02-01 10:58:39","updated_at":"2025-10-20 21:27:23","sort":4}

DELETE FROM `images` WHERE `gallery_id` = 1 AND `file` IN ('120119_3.jpg','120119_2-kopia.jpg');
DELETE FROM `images` WHERE `gallery_id` = 7 AND `file` IN ('105359_2.JPG','105359_1.JPG','105359_3.JPG');
DELETE FROM `images` WHERE `gallery_id` = 8 AND `file` IN ('105839_2.jpg','105839_3.jpg');
