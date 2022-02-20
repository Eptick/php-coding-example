<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Models\Armies\{AirForceArmy, TacticalArmy, Army};
use App\Models\Effects\{MorningEffect, FogEffect, Effect, BasicEffect};

final class EffectsTest extends TestCase
{
    private $airForceArmy;
    private $tacticalArmy;
    private $effect;

    protected function setUp(): void
    {
        $this->airForceArmy = new AirForceArmy("Air force 1", 10);
        $this->tacticalArmy = new TacticalArmy("Base", 10);
        $this->effect = new MorningEffect();
    }

    public function testEffectInstance(): void
    {
        $this->assertInstanceOf(
            Effect::class,
            $this->effect,
        );
        $this->assertInstanceOf(
            BasicEffect::class,
            $this->effect,
        );
    }

    public function testAffectsAtLeastOne()
    {
        $this->assertGreaterThan(0, count(MorningEffect::$affects));
    }

    public function testReturnsInts()
    {
        $this->assertIsInt($this->effect->powerEffect());
        $this->assertIsInt($this->effect->bodyCountEffect());
    }
}
