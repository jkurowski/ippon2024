<?php

if (! function_exists('reviewType')) {
    function reviewType(int $number)
    {
        $reviews = [
            '1' => '<img src="/images/review-fb.svg" alt="Facebook icon"> Facebook review',
            '2' => '<img src="/images/review-google.svg" alt="Google icon"> Google review',
        ];

        if (app()->getLocale() == 'pl') {
            $reviews = [
                '1' => '<img src="/images/review-fb.svg" alt="Facebook icon"> Opinie Facebook',
                '2' => '<img src="/images/review-google.svg" alt="Google icon"> Opinie Google',
            ];
        }

        return $reviews[$number] ?? null;
    }
}