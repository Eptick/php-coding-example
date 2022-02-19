<?php

namespace App\Models\Effects;

use App\Models\Armies\{SnowArmy};

class AfternoonEffect extends BasicEffect
{
    protected static $affects = [
        SnowArmy::class
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
