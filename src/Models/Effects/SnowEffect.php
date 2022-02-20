<?php

namespace App\Models\Effects;

use App\Models\Armies\{SnowArmy};

class SnowEffect extends BasicEffect
{
    public static $affects = [
        SnowArmy::class
    ];

    public function powerEffect(): int
    {
        return 15;
    }
    public function bodyCountEffect(): int
    {
        return 30;
    }
}
