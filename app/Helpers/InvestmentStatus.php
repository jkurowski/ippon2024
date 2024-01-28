<?php

if (!function_exists('investmentStatus')) {
    function investmentStatus($number)
    {
        $statuses = [
            1 => "Inwestycja aktualna",
            2 => "Inwestycja zrealizowana",
            3 => "Inwestycja planowana",
            4 => "Inwestycja już wkrótce",
            5 => "Inwestycja ukryta",
        ];

        return $statuses[$number] ?? "Inny";
    }
}
