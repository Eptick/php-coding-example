<?php

namespace App;

interface ArmyFactory extends Factory
{
    public function createArmy(int $numberOfSoldiers): Models\Army;
}
