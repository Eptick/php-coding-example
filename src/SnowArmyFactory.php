<?php

namespace App;

use App\Models\SnowArmy;

class SnowArmyFactory implements ArmyFactory
{
    public function createArmy(int $numberOfSoldiers): Models\Army
    {
        return new SnowArmy($numberOfSoldiers);
    }
}
