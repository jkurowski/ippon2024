-- Slider (hero na stronie glownej): film zamiast / obok zdjecia. Warunek z rozmow z klientem, mail p. Anny 16.11.2026.
-- Zdjecie slajdu zostaje obowiazkowe: kadr startowy, miniaturka "nastepny" i zapas, gdy film sie nie wczyta.
ALTER TABLE sliders ADD COLUMN file_video VARCHAR(190) NULL DEFAULT NULL AFTER file_webp;
