<?php

namespace App\Services;

use App\Service;
use App\Enums\TimeOfDay;

class TimeService extends Service
{
    public function __construct()
    {
        date_default_timezone_set('Europe/Zagreb');
    }

    public function getTimeOfDay()
    {
        $hour = $this->getCurrentHour();
        if ($hour <= 6 || $hour >= 21) {
            return TimeOfDay::NIGHT;
        } elseif ($hour <= 10) {
            return TimeOfDay::MORNING;
        } else {
            return TimeOfDay::DAY;
        }
    }

    private function getCurrentHour()
    {
        return intval(date('G'));
    }
}
