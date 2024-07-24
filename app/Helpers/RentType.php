<?php

if (! function_exists('rentType')) {
    function rentType(int $number)
    {
        $types = [
            1 => 'Residential premises',
            2 => 'Service premises',
            3 => 'Service halls',
            4 => 'Office space',
            5 => 'Warehouse space',
            6 => 'Commercial and storage space',
            7 => 'Parking area',
        ];

        if (app()->getLocale() == 'pl') {
            $types = [
                1 => 'Lokale mieszkalne',
                2 => 'Lokale usługowe',
                3 => 'Hale usługowe',
                4 => 'Powierzchnia biurowa',
                5 => 'Powierzchnia magazynowa',
                6 => 'Powierzchnia handlowo – magazynowa',
                7 => 'Powierzchnia parkingowa',
            ];
        }
        return $types[$number] ?? null;
    }
}