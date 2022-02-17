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

        $this->army1 = $snowArmyFactory->createArmy("First army", $army1);
        $this->army2 = $snowArmyFactory->createArmy("Second army", $army2);

        while (!$this->isGameOver()) {
            $this->takeTurn();
            $this->naration->write("turn");
        }
        $this->determineTheWinner();
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

    private function takeTurn()
    {
        $this->army1->attack($this->army2);
        $this->army2->attack($this->army1);
    }

    private function isGameOver()
    {
        return $this->army1->isDead() || $this->army2->isDead();
    }

    private function determineTheWinner()
    {
        if ($this->army1->getHealth() == $this->army2->getHealth()) {
            $this->naration->declareStalemate();
        } elseif ($this->army1->getHealth() > $this->army2->getHealth()) {
            $this->naration->declareWinner($this->army1);
        } else {
            $this->naration->declareWinner($this->army2);
        }
    }
}
