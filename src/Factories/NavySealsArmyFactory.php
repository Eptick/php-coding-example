<?php

namespace App\Factories;

use App\Models\Armies\{NavySealsArmy, Army};

class NavySealsArmyFactory implements ArmyFactory
{
    public static function createArmy(string $name, int $numberOfSoldiers): Army
    {
        return new NavySealsArmy($name, $numberOfSoldiers);
    }
}
