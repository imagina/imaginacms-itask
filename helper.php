<?php

namespace Modules\Itask;

use Carbon\Carbon;
use Illuminate\Support\Facades\Lang;

class TimeHelper
{
    public static function convertMinutesToSeconds($minutes)
    {
        if (!$minutes) return 0;
        return $minutes * 60;
    }

    public static function convertMinutesToHumanReadable($minutes)
    {
        if (!$minutes) return 0;
        if ($minutes < 60) {
            return $minutes . ' ' . trans('itask::tasks.minutes');
        }

        $hours = floor($minutes / 60);
        $remainingMinutes = $minutes % 60;

        return $hours . ' ' . trans('itask::tasks.hours') . ($remainingMinutes ? ' ' . trans('titask::tasks.and') . ' ' . $remainingMinutes . ' ' . trans('itask::tasks.minutes') : '');
    }

    public static function humanizeDuration($startDate, $endDate)
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
