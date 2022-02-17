<?php

namespace App\Services;

use App\Service;
use App\Models\Army;
use App\SnowArmyFactory;
use App\Enums\TimeOfDay;

class ArmyFightService extends Service
{
    private Army $army1;
    private Army $army2;
    private int $timeOfDay;
    private int $weather;
    private float $temperature;
    private NarationService $naration;
    private WeatherService $weatherService;

    protected function __construct()
    {
        $this->naration = NarationService::getInstance();
        $this->weatherService = WeatherService::getInstance();
    }

    public function initiateFight($army1, $army2)
    {
        $this->setTheMood();
        $snowArmyFactory = new SnowArmyFactory();

        $this->army1 = $snowArmyFactory->createArmy($army1);
        $this->army2 = $snowArmyFactory->createArmy($army2);
    }

    private function setTheMood()
    {
        $this->timeOfDay = TimeService::getInstance()->getTimeOfDay();
        $this->naration->describeTimeOfDay($this->timeOfDay);
        $this->weather = $this->weatherService->getWeather();
        $this->naration->describeWeather($this->weather);
        $this->temperature = $this->weatherService->getTemperature();
        $this->naration->describeTemperature($this->temperature);
    }
}
