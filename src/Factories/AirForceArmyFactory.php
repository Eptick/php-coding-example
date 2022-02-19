<?php

namespace App\Factories;

use App\Models\Armies\{AirForceArmy, Army};

class AirForceArmyFactory implements ArmyFactory
{
    public static function createArmy(string $name, int $numberOfSoldiers): Army
    {
        return new AirForceArmy($name, $numberOfSoldiers);
    }
}
