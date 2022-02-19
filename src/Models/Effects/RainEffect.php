<?php

namespace App\Models\Effects;

use App\Models\Armies\{SnowArmy, ArmouredArmy, TacticalArmy};

class RainEffect extends BasicEffect
{
    protected static $affects = [
        SnowArmy::class,
        ArmouredArmy::class,
        TacticalArmy::class,
    ];

    public function powerEffect(): int
    {
        return -4;
    }
    public function bodyCountEffect(): int
    {
        return 4;
    }
}
