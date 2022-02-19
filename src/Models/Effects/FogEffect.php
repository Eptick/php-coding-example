<?php

namespace App\Models\Effects;

use App\Models\Armies\{AirForceArmy, ArmouredArmy, SnowArmy, TacticalArmy };

class FogEffect extends BasicEffect
{
    protected static $affects = [
        AirForceArmy::class,
        ArmouredArmy::class,
        SnowArmy::class,
        TacticalArmy::class,
    ];

    public function powerEffect(): int
    {
        return -6;
    }
    public function bodyCountEffect(): int
    {
        return -10;
    }
}
