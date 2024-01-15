<?php

if (! function_exists('rentType')) {
    function rentType(int $number): string
    {
        $types = [
            1 => 'Lokale mieszkalne',
            2 => 'Lokale usługowe',
            3 => 'Hale usługowe',
            4 => 'Powierzchnia biurowa',
            5 => 'Powierzchnia magazynowa',
            6 => 'Powierzchnia handlowo – magazynowa',
            7 => 'Powierzchnia parkingowa',
        ];

        return $types[$number] ?? '';
    }
}