<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Factories\{
    ArmyFactory,
    SnowArmyFactory,
    AirForceArmyFactory,
    ArmouredArmyFactory,
    NavySealsArmyFactory,
    SpecOpsArmyFactory,
    TacticalArmyFactory,
};
use App\Models\Armies\Army;

final class FactoriesTest extends TestCase
{
    private $armyFactories = [
        SnowArmyFactory::class,
        AirForceArmyFactory::class,
        ArmouredArmyFactory::class,
        NavySealsArmyFactory::class,
        SpecOpsArmyFactory::class,
        TacticalArmyFactory::class,
    ];

    private int $armyHealth = 5;

    public function testArmyFactoriesReturnHealthyArmies(): void
    {
        foreach ($this->armyFactories as $value) {
            $army = call_user_func(
                [$value, 'createArmy'],
                "Test",
                $this->armyHealth,
            );
            $this->assertInstanceOf(
                Army::class,
                $army
            );
            $this->assertEquals($army->getHealth(), $this->armyHealth);
            $this->assertFalse($army->isDead());
        }
    }
}
