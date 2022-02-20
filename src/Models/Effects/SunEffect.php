<?php

namespace App\Models\Effects;

use App\Models\Armies\{AirForceArmy, ArmouredArmy, TacticalArmy};

class SunEffect extends BasicEffect
{
    public static $affects = [
        AirForceArmy::class,
        ArmouredArmy::class,
        TacticalArmy::class,
    ];

    public function powerEffect(): int
    {
        return 5;
    }
    public function bodyCountEffect(): int
    {
        return -7;
    }
}
