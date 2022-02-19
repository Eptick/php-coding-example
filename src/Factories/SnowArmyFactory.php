<?php

namespace App\Factories;

use App\Models\Armies\{SnowArmy, Army};

class SnowArmyFactory implements ArmyFactory
{
    public static function createArmy(string $name, int $numberOfSoldiers): Army
    {
        return new SnowArmy($name, $numberOfSoldiers);
    }
}
