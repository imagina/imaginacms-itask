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

      $weeks = floor($minutes / (60 * 24 * 7));
      $days = floor(($minutes % (60 * 24 * 7)) / (60 * 24));
      $hours = floor(($minutes % (60 * 24)) / 60);
      $remainingMinutes = $minutes % 60;

      $result = '';

      if ($weeks > 0) {
        $result .= $weeks . ' ' . trans('itask::tasks.weeks') . ' ';
      }

      if ($days > 0) {
        $result .= $days . ' ' . trans('itask::tasks.days') . ' ';
      }

      if ($hours > 0) {
        $result .= $hours . ' ' . trans('itask::tasks.hours') . ' ';
      }

      if ($remainingMinutes > 0) {
        $result .= trans('itask::tasks.and') . ' ' . $remainingMinutes . ' ' . trans('itask::tasks.minutes');
      }

      return $result;
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