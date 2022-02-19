<?php

namespace App\Models\Traits;

trait Guns
{
    public function getAttackDamage(): int
    {
        return parent::getAttackDamage() + rand(2, 5);
    }
}
