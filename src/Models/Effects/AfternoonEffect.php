<?php

namespace App\Models\Effects;

use App\Models\Armies\{TacticalArmy, AirForceArmy, ArmouredArmy};

class AfternoonEffect extends BasicEffect
{
    public static $affects = [
        TacticalArmy::class,
        AirForceArmy::class,
        ArmouredArmy::class,
    ];

    public function powerEffect(): int
    {
        return 4;
    }
    public function bodyCountEffect(): int
    {
        return 3;
    }
}
