<?php

namespace App;

use App\Models\Armies\{SnowArmy, Army};

class SnowArmyFactory implements ArmyFactory
{
    public function createArmy(string $name, int $numberOfSoldiers): Army
    {
        return new SnowArmy($name, $numberOfSoldiers);
    }
}
