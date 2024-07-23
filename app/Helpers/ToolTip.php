<?php

if (! function_exists('toolTip')) {
    function toolTip(int $number)
    {
        $types = [
            1 => 'Ready for collection',
            2 => 'Attractive appearance',
            3 => 'Large terrace / balcony',
            4 => 'Outdoor garden',
            5 => 'Additional toilet',
            6 => 'Separate dressing room'
        ];
        if (app()->getLocale() == 'pl') {
            $types = [
                1 => 'Gotowe do odbioru',
                2 => 'Atrakcyjny wygląd',
                3 => 'Duży taras / balkon',
                4 => 'Ogródek zewnętrzny',
                5 => 'Dodatkowe WC',
                6 => 'Osobna garderoba'
            ];
        }
        return $types[$number] ?? null;
    }
}