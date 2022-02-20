<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Service;
use App\Services\WeatherService;

final class WeatherTest extends TestCase
{
    private $weatherService;

    protected function setUp(): void
    {
        $this->weatherService = WeatherService::getInstance();
    }

    public function testIsService(): void
    {
        $this->assertInstanceOf(
            Service::class,
            $this->weatherService,
        );
    }

    public function testGetWeather()
    {
        $this->assertGreaterThan(0, $this->weatherService->getWeather());
    }

    public function testGetTemperature()
    {
        $this->assertIsFloat($this->weatherService->getTemperature());
    }
}
