<?php

if (! function_exists('investmentSectionCategory')) {
    function investmentSectionCategory(int $number)
    {
        switch ($number) {
            case '1':
                return "Opis inwestycji";
            case '2':
                return "Lokalizacja";
        }
    }
}
