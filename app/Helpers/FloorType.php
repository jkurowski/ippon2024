<?php

if (! function_exists('floorType')) {
    function floorType(int $number): string
    {
        $floorTypes = [
            1 => 'Piętro mieszkalne',
            2 => 'Piętro usługowe',
            3 => 'Parking naziemny',
            4 => 'Parking podziemny',
        ];

        return $floorTypes[$number] ?? '';
    }
}