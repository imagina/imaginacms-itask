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

if (! function_exists('convertMinutesToHumanReadable')) {
    function convertMinutesToHumanReadable($minutes)
    {
        if (!$minutes) return 0;
        if ($minutes < 60) {
            return $minutes . ' ' . trans('itask::tasks.minutes');
        }

        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        return $hours . ' ' . trans('itask::tasks.hours') . ($remainingMinutes ? ' ' . trans('itask::tasks.and') . ' ' . $remainingMinutes . ' ' . trans('itask::tasks.minutes') : '');
    }
}

if (! function_exists('humanizeDuration')) {
    function humanizeDuration($startDate, $endDate)
    {
        if (!$endDate) {
            return null;
        }

        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $diffInMinutes = $start->diffInMinutes($end);

        $days = floor($diffInMinutes / (60 * 24));
        $hours = floor(($diffInMinutes % (60 * 24)) / 60);
        $minutes = $diffInMinutes % 60;

        return ($days > 0 ? $days . ' ' . trans('itask::tasks.days') . ' ' : '') . 
               ($hours > 0 ? $hours . ' ' . trans('itask::tasks.hours') . ' ' : '') . 
               ($minutes > 0 ? $minutes . ' ' . trans('itask::tasks.minutes') : '');
    }
}