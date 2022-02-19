<?php

namespace App\Factories;

use App\Models\Armies\{ArmouredArmy, Army};

class ArmouredArmyFactory implements ArmyFactory
{
    public static function createArmy(string $name, int $numberOfSoldiers): Army
    {
        return new ArmouredArmy($name, $numberOfSoldiers);
    }
}
