<?php

if (! function_exists('reviewType')) {
    function reviewType(int $number)
    {
        switch ($number) {
            case '1':
                return '<img src="/images/review-fb.svg" alt="Facebook icon"> Opinie Facebook';
            case '2':
                return '<img src="/images/review-google.svg" alt="Google icon"> Opinie Google';
        }
    }
}
