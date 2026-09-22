{{-- Miniaturka naglowka na liscie stron. Jeden partial dla poziomu glownego
     i dla podstron (admin.page.children), zeby obie tabele mialy te sama kolumne.
     Parametr: $page

     Naglowek maja tylko strony (type == 1) — linki go nie uzywaja, wiec tam
     zostaje kreska. is_file, bo czesc plikow z CMS-u nie istnieje w kopii
     lokalnej; bez tej kontroli w liscie wisialyby ikony zepsutego obrazka. --}}
@php
    $headerFile = $page->type == 1 && $page->file_header
        ? 'uploads/header/'.$page->file_header
        : null;
    $headerExists = $headerFile && is_file(public_path($headerFile));
@endphp

@if($headerExists)
    <a href="{{ asset($headerFile) }}" target="_blank" title="{{ $page->file_header }}">
        <img src="{{ asset($headerFile) }}" alt="Nagłówek: {{ $page->title }}"
             style="width: 150px;border-radius: 5px;border:1px solid white">
    </a>
@elseif($headerFile)
    {{-- Plik jest wpisany w bazie, ale go nie ma — lepiej to pokazac niz ukryc --}}
    <span class="text-danger" title="{{ $page->file_header }}">brak pliku</span>
@else
    <span class="text-muted">&mdash;</span>
@endif
