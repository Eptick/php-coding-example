<?php

namespace App;

interface ArmyFactory extends Factory
{
    public function createArmy(
        string $name,
        int $numberOfSoldiers
    ): Models\Armies\Army;
}
