<?php

if (! function_exists('kitchenType')) {
    function kitchenType(int $number)
    {
        $kitchen = [
            1 => 'Aneks',
            2 => 'Kuchnia'
        ];

        return $kitchen[$number] ?? 'Inne';
    }
}