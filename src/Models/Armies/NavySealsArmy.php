<?php

namespace App\Models\Armies;

use App\Models\Traits\HandToHandCombat;

class NavySealsArmy extends BasicArmy
{
    use HandToHandCombat;

    protected int $attackDamage = 16;
}
