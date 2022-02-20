<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Armies\{AirForceArmy, TacticalArmy, Army};
use App\Models\Reports\{Report};

final class ArmiesTest extends TestCase
{
    private $army;

    protected function setUp(): void
    {
        $this->army = new AirForceArmy("Test", 10);
    }

    public function testArmyInterface(): void
    {
        $this->assertInstanceOf(
            Army::class,
            $this->army,
        );
    }

    public function testArmyHealth(): void
    {
        $this->assertEquals(
            10,
            $this->army->getHealth(),
        );
    }

    public function testArmyName(): void
    {
        $this->assertIsString(
            $this->army->getName(),
        );
    }

    public function testArmyType(): void
    {
        $this->assertIsString(
            $this->army->getType(),
        );
    }

    public function testAttack(): void
    {
        $startingHealth = 100;
        $defendingArmy = new TacticalArmy("Test defender", $startingHealth);

        $this->assertInstanceOf(
            Report::class,
            $this->army->attack($defendingArmy),
        );

        $this->assertLessThan($startingHealth, $defendingArmy->getHealth());
    }

    public function testDefend(): void
    {
        $startingHealth = $this->army->getHealth();
        $attackingArmy = new TacticalArmy("Test attacker", 100);

        $damageTaken = $this->army->defend($attackingArmy);
        $this->assertIsInt($damageTaken);
        $this->assertGreaterThan(1, $damageTaken);

        $this->assertLessThan($startingHealth, $this->army->getHealth());
    }

    public function testAttackDamage(): void
    {
        $this->assertIsInt($this->army->getAttackDamage());
        $this->assertGreaterThan(0, $this->army->getAttackDamage());
    }

    public function testCanBeKilled(): void
    {
        $armyToBeKilled = new TacticalArmy("Sacrifical Lamb", 10);
        $this->assertIsBool($armyToBeKilled->isDead());
        for ($i = 0; $i < 1000; $i++) {
            $armyToBeKilled->defend($this->army);
            if ($armyToBeKilled->isDead()) {
                return;
            }
        }
        $this->assertFalse(true);
    }

    public function testAffectDamage(): void
    {
        $startingDamage = $this->army->getAttackDamage();
        $this->assertInstanceOf(
            Report::class,
            $this->army->affectDamage(2),
        );
        $this->assertGreaterThan(
            $startingDamage,
            $this->army->getAttackDamage()
        );
    }

    public function testAffectBodyCount(): void
    {
        $startingBodyCount = $this->army->getHealth();
        $this->assertInstanceOf(
            Report::class,
            $this->army->affectBodyCount(2),
        );
        $this->assertGreaterThan(
            $startingBodyCount,
            $this->army->getHealth()
        );
    }
}
