<?php

namespace App\Models\Traits;

trait Snipers
{
    public function getAttackDamage(): int
    {
        return parent::getAttackDamage() + rand(5, 20);
    }
}
