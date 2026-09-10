{{-- Sortowanie listy lokali jako dropdown w stylu filtra (.fake-select).

     Wczesniej stal tu goly <select>, w wersji polskiej podwojony — dwa
     identyczne pola obok siebie, z czego drugie nic nie robilo, bo skrypt
     wiaze sie po id (a id moze byc jedno). Wersja angielska miala id
     "filter-sort" zamiast "filtr-sort", wiec sortowanie po angielsku w ogole
     nie dzialalo.

     .fake-select nie wywoluje zdarzenia change (podmienia atrybut selected),
     dlatego przeladowanie strony obsluguje wlasny skrypt ponizej. --}}
@php
    $L = $current_locale == 'en' ? 'en' : 'pl';

    $options = $L == 'pl'
        ? [
            '' => 'Domyślne sortowanie',
            'rooms:asc' => 'Ilość pokoi: rosnąco',
            'rooms:desc' => 'Ilość pokoi: malejąco',
            'area:asc' => 'Powierzchnia: od najmniejszej',
            'area:desc' => 'Powierzchnia: od największej',
        ]
        : [
            '' => 'Default sorting',
            'rooms:asc' => 'Number of rooms: ascending',
            'rooms:desc' => 'Number of rooms: descending',
            'area:asc' => 'Area: smallest first',
            'area:desc' => 'Area: largest first',
        ];
@endphp

<div class="fake-select fake-select-icon ip-sort">
    <i class="las la-sort-amount-down"></i>

    <select name="sort" id="filtr-sort">
        @foreach($options as $value => $label)
            <option value="{{ $value }}" @selected($value !== '' && request('sort') === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>

@once
    @push('scripts')
        <script>
            /* Klikniecie w opcje obsluguje najpierw app.js (podmienia atrybut
               selected), dlatego wartosc odczytujemy dopiero po jego turze. */
            document.addEventListener('click', function (event) {
                if (!event.target.closest('#sortList .fake-select-option')) {
                    return;
                }

                setTimeout(function () {
                    const select = document.querySelector('#filtr-sort');
                    if (!select) {
                        return;
                    }

                    const url = new URL(window.location.href);

                    if (select.value) {
                        url.searchParams.set('sort', select.value);
                    } else {
                        url.searchParams.delete('sort');
                    }

                    if (url.href !== window.location.href) {
                        window.location.href = url.href;
                    }
                }, 0);
            });
        </script>
    @endpush
@endonce
