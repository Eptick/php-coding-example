<?php

namespace App\Services;

use App\Service;
use App\Models\Armies\Army;
use App\Enums\TimeOfDay;
use App\Models\Reports\Report;

class ArmyFightService extends Service
{
    private int $timeOfDay;
    private int $weather;
    private float $temperature;
    private NarationService $naration;
    private ArmyService $armyService;
    private WeatherService $weatherService;
    private TimeService $timeService;
    private EffectService $effectService;

    protected function __construct()
    {
        $this->naration = NarationService::getInstance();
        $this->armyService = ArmyService::getInstance();
        $this->weatherService = WeatherService::getInstance();
        $this->timeService = TimeService::getInstance();
        $this->effectService = EffectService::getInstance();
    }

    public function initiateFight($army1, $army2)
    {
        $this->setTheMood();

        $this->armyService->createArmies([$army1, $army2]);
        $this->naration->describeBattleStarting();
        $this->effectService->useBattleReadyEffects(
            $this->timeOfDay,
            $this->weather
        );
        while (!$this->isGameOver()) {
            $this->takeTurn();
        }
        $this->determineTheWinner();
    }

    private function setTheMood()
    {
        $this->naration->describeTime($this->timeService->getHours());
        $this->timeOfDay = $this->timeService->getTimeOfDay();
        $this->naration->describeTimeOfDay($this->timeOfDay);
        $this->weather = $this->weatherService->getWeather();
        $this->naration->describeWeather($this->weather);
        $this->temperature = $this->weatherService->getTemperature();
        $this->naration->describeTemperature($this->temperature);
    }

    private function takeTurn()
    {
        $this->armyService->brawl();
    }

    private function isGameOver()
    {
        return $this->armyService->numberOfArmiesAlive() <= 1;
    }

    private function determineTheWinner()
    {
        if ($this->isStalemate()) {
            $this->naration->declareStalemate();
            return;
        }
        $this->naration->declareWinner($this->armyService->getWinner());
    }

    private function isStalemate()
    {
        return $this->armyService->numberOfArmiesAlive() <= 0;
    }
}
