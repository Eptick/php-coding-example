<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Enums\{TimeOfDay, Weather};

final class EnumTest extends TestCase
{
    public function testEnumsReturnsInt(): void
    {
        $this->assertIsInt(TimeOfDay::DAY);
        $this->assertIsInt(Weather::SUN);
    }
}
