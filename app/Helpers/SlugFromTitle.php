<?php

use Illuminate\Support\Str;

if (! function_exists('slugFromTitle')) {
    function slugFromTitle($title)
    {
        return Str::slug($title);
    }
}
