<?php

namespace App\Services;

use App\Models\Army;
use App\SnowArmyFactory;
use App\Enums\TimeOfDay;

class ArmyFightService implements Service
{
    private Army $army1;
    private Army $army2;
    private int $fightTime = TimeOfDay::NIGHT;

    public function initiateFight($army1, $army2)
    {
        $snowArmyFactory = new SnowArmyFactory();

        $this->army1 = $snowArmyFactory->createArmy($army1);
        $this->army2 = $snowArmyFactory->createArmy($army2);

        $weatherService = new WeatherService();
        echo $weatherService->getWeather();

        echo "Fight started";
    }
}
