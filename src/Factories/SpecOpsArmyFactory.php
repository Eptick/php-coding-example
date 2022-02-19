<?php

namespace App\Factories;

use App\Models\Armies\{SpecOpsArmy, Army};

abstract class SpecOpsArmyFactory implements ArmyFactory
{
    public static function createArmy(string $name, int $numberOfSoldiers): Army
    {
        return new SpecOpsArmy($name, $numberOfSoldiers);
    }
}
