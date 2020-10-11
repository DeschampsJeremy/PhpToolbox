<?php

namespace DeschampsJeremy;

use DateTime;

class DatetimeService
{

    /**
     * Format hour digital to format hour:minutes
     * @return string
     */
    public static function formatTimeFromFloat(float $val): string
    {
        $h = floor($val);
        $hFormat = ($h < 10) ? "0$h" : $h;
        $m = $val - $h;
        $mFormat = $m * 60;
        $mFormat = ($mFormat < 10) ? "0$mFormat" : $mFormat;
        return "$hFormat:$mFormat";
    }

    /**
     * Get midnight to a datetime
     * @return DateTime
     */
    public static function getMidnight(DateTime $datetime): DateTime
    {
        return new Datetime($datetime->format('Y-m-d'));
    }

    /**
     * Find all dates beetween two date
     * @return array
     */
    public static function findAllDateBeetween(DateTime $datetimeStart, DateTime $datetimeStop): array
    {
        $rep = [];
        $testDate = self::getMidnight($datetimeStart);
        while ($testDate < $datetimeStop) {
            $rep[] = new Datetime($testDate->format('Y-m-d H:i:s'));
            $testDate = $testDate->modify("+1 day");
        }
        return $rep;
    }

    /**
     * Find all availables durations ranges beetween two numerics hours
     * @return array
     */
    public static function findRangeBeetween(float $timeStart, float $timeStop, float $durationMinute): array
    {
        $rep = [];
        $durationHour = $durationMinute / 60;
        for ($i = $timeStart; $i < $timeStop; $i += $durationHour) {
            if ($i + $durationHour <=  $timeStop) {
                $rep[] = $i;
            }
        }
        return $rep;
    }

    /**
     * Check if datetime is include in two datetimes
     * @return bool
     */
    public static function isInclude(DateTime $datetimeStart, DateTime $datetimeStop, DateTime $datetime): bool
    {
        return ($datetime > $datetimeStart && $datetime < $datetimeStop);
    }

    /**
     * Check if two datetimes is include in two datetimes
     * @return bool
     */
    public static function isIncludeRange(DateTime $datetimeStart, DateTime $datetimeStop, DateTime $datetimeRangeStart, DateTime $datetimeRangeStop): bool
    {
        if (($datetimeStart == $datetimeRangeStart) && ($datetimeStop == $datetimeRangeStop)) {
            return true;
        }
        if (self::isInclude($datetimeStart, $datetimeStop, $datetimeRangeStart) || self::isInclude($datetimeStart, $datetimeStop, $datetimeRangeStop)) {
            return true;
        }
        if (self::isInclude($datetimeRangeStart, $datetimeRangeStop, $datetimeStart) || self::isInclude($datetimeRangeStart, $datetimeRangeStop, $datetimeStop)) {
            return true;
        }
        return false;
    }
}
