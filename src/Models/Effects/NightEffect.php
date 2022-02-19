<?php

namespace App\Models\Effects;

use App\Models\Armies\{SpecOpsArmy};

class NightEffect extends BasicEffect
{
    protected static $affects = [
        SpecOpsArmy::class
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
