<?php

namespace App\Models\Armies;

use App\Models\Traits\Guns;

class SpecOpsArmy extends BasicArmy
{
    use Guns;

    protected int $attackDamage = 18;
}
