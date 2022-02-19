<?php

namespace App\Factories;

use App\Factory;
use App\Models\Armies\Army;

interface ArmyFactory extends Factory
{
    public static function createArmy(
        string $name,
        int $numberOfSoldiers
    ): Army;
}
