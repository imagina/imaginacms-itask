<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

if (! function_exists('convertMinutesToSeconds')) {
    function convertMinutesToSeconds($minutes)
    {
        if (!$minutes) return 0;
        return $minutes * 60;
    }
}
