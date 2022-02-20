<?php

namespace App\Models\Effects;

use App\Models\Armies\{SnowArmy, TacticalArmy};

class MorningEffect extends BasicEffect
{
    public static $affects = [
        SnowArmy::class,
        TacticalArmy::class,
    ];

    public function powerEffect(): int
    {
        return 3;
    }
    public function bodyCountEffect(): int
    {
        return 0;
    }
}
