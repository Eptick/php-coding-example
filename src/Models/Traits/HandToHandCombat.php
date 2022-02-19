<?php

namespace App\Models\Traits;

trait HandToHandCombat
{
    public function getAttackDamage(): int
    {
        return max(0, parent::getAttackDamage() - rand(3, 6));
    }
}
