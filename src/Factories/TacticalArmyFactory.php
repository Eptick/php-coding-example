<?php

namespace App\Factories;

use App\Models\Armies\{TacticalArmy, Army};

class TacticalArmyFactory implements ArmyFactory
{
    public static function createArmy(string $name, int $numberOfSoldiers): Army
    {
        return new TacticalArmy($name, $numberOfSoldiers);
    }
}
