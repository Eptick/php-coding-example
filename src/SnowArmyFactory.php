<?php

namespace App;

use App\Models\SnowArmy;

class SnowArmyFactory implements ArmyFactory
{
    public function createArmy(string $name, int $numberOfSoldiers): Models\Army
    {
        return new SnowArmy($name, $numberOfSoldiers);
    }
}
