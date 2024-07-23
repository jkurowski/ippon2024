<?php

if (! function_exists('roomStatusBadge')) {
    function roomStatusBadge(int $number)
    {
        $badges = [
            '1' => '<span class="status-badge status-1">Available</span>',
            '2' => '<span class="status-badge status-2">Reservation</span>',
            '3' => '<span class="status-badge status-3">Sold</span>',
            '4' => '<span class="status-badge status-4">Rented</span>',
        ];
        if (app()->getLocale() == 'pl') {
            $badges = [
                '1' => '<span class="status-badge status-1">Dostępne</span>',
                '2' => '<span class="status-badge status-2">Rezerwacja</span>',
                '3' => '<span class="status-badge status-3">Sprzedane</span>',
                '4' => '<span class="status-badge status-4">Wynajęte</span>',
            ];
        }
        return $badges[$number] ?? null;
    }
}
