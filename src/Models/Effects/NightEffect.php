<?php

namespace App\Models\Effects;

use App\Models\Armies\{SnowArmy};

class NightEffect extends BasicEffect
{
    protected static $affects = [
        SnowArmy::class
    ];

    public function powerEffect(): int
    {
        return 3;
    }
    public function bodyCountEffect(): int
    {
        return -4;
    }
}
