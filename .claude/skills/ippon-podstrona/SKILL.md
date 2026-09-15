---
name: ippon-podstrona
description: Przebudowa podstrony frontu IPPON wg makiety Figma z public/materialy_klienta (cięcie i pomiary PNG-a, gotowe komponenty .ip-*, konwencje LESS/Blade, pułapki starego arkusza). Użyj, gdy zadanie brzmi "robimy <NAZWA PODSTRONY>", "projekt jest w katalogu", "makieta", albo gdy poprawiamy któryś z nowych szablonów (o-nas, zakup gruntu, obiekty komercyjne, inwestycje zrealizowane/planowane/w sprzedaży, mapa, strona główna).
---

# Przebudowa podstrony IPPON wg makiety

Front `ipponnew` jest przepisywany z makiety Figma podstrona po podstronie.
Ten skill zbiera to, co już ustalone — nie wymyślaj tego od nowa.

## 1. Zanim zaczniesz

- Makieta: `public/materialy_klienta/<NAZWA>.png` (1920 px szerokości, kilka
  tysięcy wysokości). Zawsze najpierw ją obejrzyj — patrz punkt 2.
- Znajdź route i widok: `grep -n "<slug>" routes/web.php`, potem kontroler
  i `resources/views/front/...`.
- Sprawdź, skąd lecą dane (CMS): model + repozytorium + co realnie jest w bazie
  (`php artisan tinker --execute="..."`). **Treści z makiety to podgląd** —
  prawdziwe dane idą z CMS-u, jeśli tylko jest na nie pole.
- Zapytaj o rzeczy, które zmieniają zakres (karuzela vs zdjęcie, skrócenie
  formularza, pole, którego nie ma w bazie). Resztę rozstrzygaj sam.

## 2. Czytanie makiety

Narzędzie: `php .claude/skills/ippon-podstrona/scripts/makieta.php`

```bash
# pocięcie na czytelne kawałki (domyślnie ~1000 px wysokości, 1150 px szerokości)
php .claude/skills/ippon-podstrona/scripts/makieta.php slice "public/materialy_klienta/O NAS.png" <scratchpad>

# wycięcie zdjęcia z makiety do assetów (auto-krawędzie od punktu wewnątrz zdjęcia)
php .claude/skills/ippon-podstrona/scripts/makieta.php extract "public/materialy_klienta/O NAS.png" 1400 1900 public/images/about/csr.jpg

# wycinek po sztywnych współrzędnych
php .claude/skills/ippon-podstrona/scripts/makieta.php crop "<png>" 975 772 851 583 public/images/about/x.jpg

# odczyt kolorów wzdłuż wiersza/kolumny (do mierzenia odstępów i krawędzi)
php .claude/skills/ippon-podstrona/scripts/makieta.php probe "<png>" row 1000 900 1100
```

Potem `Read` na wyciętych plikach — obrazki widzisz normalnie.

Uwagi z praktyki:
- `extract` liczy krawędzie po białym tle. Na zdjęciu z jasnym fragmentem
  (sufit, biały mebel) potrafi się zatrzymać w środku — wtedy `crop` po
  współrzędnych ze slajdu (`y_slajdu / 0.599 + offset`).
- Skala slajdu: `1150 / 1920 = 0.599`. Współrzędna oryginału =
  `offset_slajdu + y_na_slajdzie / 0.599`.
- Plakaty filmów w makiecie mają **wpalony przycisk play** — nie rysuj drugiego.
- Makiety generowane przez AI (np. „JAK KUPIĆ MIESZKANIE V1") nie mają
  odpowiednika w Figmie — odtwarzasz je ze zrzutu i pytasz o treści, których
  na obrazku nie widać (np. zwinięte odpowiedzi FAQ).
- `vivid` podbija nasycenie zdjęć wyciętych z makiety. Podbijaj zawsze wycinek
  z bezstratnego PNG makiety, nie gotowy JPG — drugie przejście po JPG-u
  wzmacnia artefakty.
- **Zdjęcia z makiety to tylko podgląd** (ustalone 09.2026). Wycinki mają
  rozmiar z makiety (np. 785 px) i pikselują się na ekranach ze skalowaniem.
  Na „Jak kupić mieszkanie" zdjęcia kroków są wygenerowane pod treść
  (Higgsfield, GPT Image 2.5, 21:9, 2k) i przeskalowane do 2x szerokości
  wyświetlania — tak rób, gdy klient nie dał własnych zdjęć, a wycinek jest za mały.

## 3. Konwencje (ustalone z Jackiem, nie zmieniaj bez pytania)

- **Siatka Bootstrapa jest ważniejsza niż zgodność co do piksela.** Makieta
  istnieje tylko w 1920 px, RWD projektujesz sam.
- Fonty: **Playfair Display** (nagłówki) + **Poppins** (treść). Rozmiary
  z makiety zmniejszaj o 2–4 px — Poppins jest szerszy od TT Hoves z makiety.
- **Stary markup zostaje**, owinięty w `@if(1 == 2) ... @endif`, nowy pod
  spodem z komentarzem-nagłówkiem, co się różni od makiety i dlaczego.
- Widok dostaje `@extends('layouts.page', ['body_class' => 'ip-page'])`.
- Teksty, których nie ma w CMS-ie, siedzą w tablicy `@php` na górze widoku,
  z kluczami `pl`/`en` (`$L = in_array($current_locale, ['pl','en']) ? ... : 'pl'`).
- Zdjęcia-zastępniki oznaczaj komentarzem `UWAGA: placeholder`.
- Komentarze w LESS i Blade po polsku, **bez polskich znaków** (pliki idą przez
  różne narzędzia), i mówią *dlaczego*, nie *co*.

## 4. Gotowe komponenty — używaj, nie pisz od nowa

| Klasa / partial | Co to jest |
|---|---|
| `layouts.partials.ip-pagehead` | ciemny pas nagłówka: `$title`, `$crumbs`, `$image`, `$class` (`is-tall` przy wielolinijkowym tytule), `$lead` |
| `.ip-section` + `.ip-section-head` + `.ip-ornament` | nagłówek sekcji z ornamentem; `<span>` w `.ip-section-title` = druga linia na złoto |
| `.ip-invrows` / `.ip-invrow` | naprzemienne wiersze pełnej szerokości (zdjęcie do krawędzi ekranu + kolumna tekstu). `is-reverse` = odbicie, `is-half` = podział 50/50 |
| `.ip-card` (+ `.ip-card-media/-badge/-body/-title/-desc`) | kafel inwestycji ze strony głównej |
| `.ip-trust-card` | zdjęcie + tytuł, opis **wysuwa się po najechaniu** (ma `:focus` i fallback `@media (hover:none)`) |
| `.ip-city-tabs` (+ `ip-city-tabs-left`) | pigułki filtra miast |
| `layouts.partials.ip-contact-section` | cała sekcja kontaktowa: `$title`, `$lead`, `$form`, `$page_name`, `$class`. W środku `ip-contact-info` + wskazany formularz |
| `front.contact.ip-form` / `front.land.ip-form` | formularze w oprawie ze strony głównej (`.ip-form`, `.ip-field`, `.ip-btn-submit`) |
| `layouts.partials.ip-form-scripts` | walidacja + reCAPTCHA, parametr `$formId` |
| `.ip-video` | plakat na pełną szerokość, `data-video="<id YT>"`, klik podmienia na iframe |
| `.ip-pin` (`layouts.partials.ip-pin`) | pinezka przy adresie |

Przyciski: `.ip-btn-gold-lg`, `.ip-btn-outline`, `.ip-btn-ghost`, `.ip-btn-submit`.

### Komponenty Blade (`resources/views/components/`)

| Komponent | Do czego |
|---|---|
| `<x-section-head>` | naglowek sekcji z ornamentem; tresc w slocie, opcjonalny `lead`. Uzyty w 21 miejscach |
| `<x-property-row>` | wiersz lokalu (wyszukiwarka, schowek). Parametry: `room`, `investment`, `action` = `show`/`remove` |
| `<x-property-filter>` | pasek filtrow lokali (strona glowna + wyszukiwarka), GET na `/wyszukiwarka` |
| `<x-sort-select>` | sortowanie listy lokali jako `.fake-select` |
| `<x-ai-badge />` | plakietka „AI” w prawym dolnym rogu zdjęcia wygenerowanego przez AI (PL/EN, opis dla czytników). Rodzic z `position: relative` — zwykłe zdjęcie owiń w `.ip-ai-wrap` (`.is-block` na całą szerokość) |

Opcje filtrow (inwestycje, pokoje, pietra, progi metrazu) liczy `App\Services\PropertyFilterOptions`
— jedno zrodlo dla strony glownej i wyszukiwarki, wyniki zapamietane na czas zadania.
Schowek obsluguje `App\Services\Front\ClipboardService` (sesja, limit 8 lokali).

## 5. Rytm pionowy — jeden na wszystkie szablony

**120 / 88 / 64 px** (desktop / ≤1199 / ≤767) nad i pod sekcją.

- Blok "nagłówek sekcji + wiersze pełnej szerokości" to jedna sekcja w dwóch
  znacznikach: nagłówek dostaje `pb-0`, wiersze `padding-top: 60px`.
- Sekcja, nad którą poprzednia ma już swój dolny odstęp, dostaje `pt-0`
  (inaczej robi się 240 px). Na podstronach `pt-0`/`pb-0` **muszą mieć własną
  regułę** `.ip-page .<sekcja>.pt-0 { padding-top: 0 !important }` — bootstrapowe
  utilities przegrywają specyficznością z `!important` na paddingu sekcji.

## 6. Pułapki (każda kosztowała rundę debugowania)

1. **`section { padding: 3rem 0 !important }`** ze starego `styles.min.css`,
   ładowanego na podstronach obok `ippon.min.css`. Każdy `<section>` w nowych
   szablonach musi bronić paddingu `!important` w bloku na końcu `ippon.less`.
   Strona główna tego arkusza nie ładuje.
2. **ID bije klasy** — `#contact-form button { border: 6px solid #FFFDFA }`
   ze starego arkusza. Nadpisuj selektorem z tym samym ID.
3. **Reguły bazowe `.ip-page`** (0,1,1) biją klasy komponentów (0,1,0). Dlatego
   linki są w `:where(a)`, a `h1–h6` nie mają `color`. Nie przywracaj.
4. **responsiveSlides** (`.textSlider`, stary `app.js`) ustawia style inline na
   aktywnym `<li>`. Wysokość bierze się z aktywnego slajdu — jeśli kadr ma mieć
   `aspect-ratio`, wypchnij wszystkie `<li>` na `absolute`; jeśli ma być
   proporcja oryginału, zostaw wtyczce jej układ.
5. **Ukryte pole `form_surnames`** (`.col-input-important`, `display:none`) to
   pułapka na boty — nie usuwaj przy przebudowie formularza.
6. `php artisan view:clear` po zmianach w Blade, a w przeglądarce dobijaj URL
   parametrem (`?v=2`) — inaczej dostajesz stary HTML ze starym `?v=filemtime`.

## 7. LESS i kompilacja

Edytujesz **wyłącznie `public/css/ippon.less`**. Nowe sekcje dopisujesz na końcu
pliku, z nagłówkiem-komentarzem `PODSTRONA: <nazwa>`.

```bash
lessc --source-map public/css/ippon.less public/css/ippon.css \
  && csso public/css/ippon.css --output public/css/ippon.min.css
```

Oba narzędzia są w PATH (te same, co watchery PhpStorma). Plików `.css`,
`.css.map`, `.min.css` nie edytuj ręcznie.

## 8. Sprawdzenie w przeglądarce

- Zrzuty ekranu z rozszerzenia bywają skalowane i gubią przewijanie —
  **do liczb używaj `javascript_tool`** (`getBoundingClientRect`, `getComputedStyle`),
  a zrzutów do oceny wyglądu.
- Scroll rób kółkiem (`computer` → `scroll`); `window.scrollTo()` nie generuje
  zdarzeń `scroll` i psuje testy handlerów.
- Zdjęcia z CMS-u są lokalnie w większości niepobrane — połamane obrazki to
  normalny stan, nie błąd. Do oceny kadru podmień `img.src` przez JS.
- Na koniec: `read_console_messages` z `onlyErrors` i zamknij kartę.

## 9. Co już zrobione

| Podstrona | Widok |
|---|---|
| Strona główna | `front/homepage/index.blade.php` |
| Mieszkania w sprzedaży / planowane / wkrótce | `front/developro/{current,planned,soon}/index.blade.php` + `partials/investment-rows.blade.php` |
| Obiekty komercyjne | `front/commercial/index.blade.php` |
| Inwestycje zrealizowane | `front/developro/completed/index.blade.php` |
| Zakup gruntów | `front/land/index.blade.php` |
| O nas | `front/about/index.blade.php` |
| Mapa / lokalizacja | `front/map/index.blade.php` |
| Jak kupic mieszkanie | `front/static/howbuy.blade.php` |
| Zarzad / pod klucz (CMS) | `front/menupage/index.blade.php` |
| Kontakt, Kariera | `front/contact/index.blade.php`, `front/career/index.blade.php` |
| Aktualnosci, Blog | `front/news/*`, `front/article/*` |
| Wynajem | `front/rent/{index,show}.blade.php` |
| Karty inwestycji | `investment/{malczewskiego,slow,synergia,tempo}.blade.php` |
| Rabaty, Schowek, Wyszukiwarka | `front/promotion`, `front/clipboard`, `front/developro/search` |
| Jak kupić mieszkanie | `front/static/howbuy.blade.php` + `howbuy-icon.blade.php` |

Nic z tego nie jest zacommitowane — cały front siedzi w working tree.
