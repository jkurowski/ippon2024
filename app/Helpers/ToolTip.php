<?php

if (! function_exists('toolTip')) {
    function toolTip(int $number): string
    {
        $types = [
            1 => 'Gotowe do odbioru',
            2 => 'Atrakcyjny wygląd',
            3 => 'Duży taras / balkon',
            4 => 'Ogródek zewnętrzny',
            5 => 'Dodatkowe WC',
            6 => 'Osobna garderoba'
        ];

        return $types[$number] ?? '';
    }
}