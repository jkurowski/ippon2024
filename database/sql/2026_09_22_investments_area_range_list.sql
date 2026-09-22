-- Pole "Zakres powierzchni na liscie" — recznie wpisywany metraz pokazywany
-- na karcie inwestycji na podstronie /lokalizacja/{miasto}.
--
-- Do tej pory ten metraz liczyl sie sam: widok front/map/index.blade.php bral
-- `area_range` (to samo pole, co filtr w wyszukiwarce, zapisane jako
-- "27-32,37-45,48-56,67-80") i pokazywal z niego skrajne wartosci, czyli
-- "27-80 m2". Traci to przerwy miedzy przedzialami i nie da sie tego opisac
-- inaczej (np. "od 35 m2"), bo `area_range` musi zostac w formacie, ktory
-- rozumie filtr.
--
-- Stad osobna kolumna zamiast zmiany `area_range`: wypelniona nadpisuje to,
-- co widac na liscie, pusta zostawia dotychczasowe liczenie ze skrajnych
-- wartosci. Dlatego NULL i zaden backfill — po wdrozeniu podstrona wyglada
-- dokladnie tak jak przed zmiana.
--
-- Migracje Laravela sa nieaktualne (patrz 2026_09_17_investments_sort.sql),
-- zmiany schematu ida tedy.
ALTER TABLE `investments`
    ADD COLUMN `area_range_list` VARCHAR(60) NULL DEFAULT NULL AFTER `area_range`;
