<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Service;
use App\Models\Armies\SnowArmy;
use App\Services\ArmyService;

final class ArmyServiceTest extends TestCase
{
    private $armyService;

    protected function setUp(): void
    {
        $this->armyService = ArmyService::getInstance();
    }

    public function testIsService(): void
    {
        $this->assertInstanceOf(
            Service::class,
            $this->armyService,
        );
    }

    public function testArmyCreation()
    {
        $this->armyService->createArmies([10, 10]);
        $this->assertEquals(2, $this->armyService->numberOfArmiesAlive());
    }

    public function testGetWinnerThrowsException()
    {
        $this->expectException(\Error::class);

        $this->getWinner();
    }

    public function testArmyType()
    {
        $types = $this->armyService->getArmiesOfType(SnowArmy::class);
        $this->assertIsArray($types);
    }
}
