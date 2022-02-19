<?php

namespace App\Services;

use App\Service;
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

class ArmyService extends Service
{
    private array $armies = [];
    private NarationService $naration;
    private $armyFactories = [
        SnowArmyFactory::class,
        AirForceArmyFactory::class,
        ArmouredArmyFactory::class,
        NavySealsArmyFactory::class,
        SpecOpsArmyFactory::class,
        TacticalArmyFactory::class,
    ];

    protected function __construct()
    {
        $this->naration = NarationService::getInstance();
    }

    public function createArmies(array $numberOfSoldiers)
    {
        foreach ($numberOfSoldiers as $key => $value) {
            $name = "Army " . $key + 1;
            $factory =  $this->getRandomArmyFactory();
            $this->armies[] = call_user_func(
                [$factory, 'createArmy'],
                $name,
                $value,
            );
        }
    }

    public function brawl()
    {
        foreach ($this->armies as $attackingArmy) {
            foreach ($this->armies as $defendingArmy) {
                if ($attackingArmy == $defendingArmy) {
                    continue;
                }
                $report = $attackingArmy->attack($defendingArmy);
                $this->naration->describeReport($report);
            }
        }
    }

    public function getWinner(): Army
    {
        if ($this->numberOfArmiesAlive() > 1) {
            throw new \Exception("Fight's not over");
        }
        foreach ($this->armies as $army) {
            if (!$army->isDead()) {
                return $army;
            }
        }
        throw new \Exception("No winner");
    }

    public function numberOfArmiesAlive()
    {
        return array_reduce($this->armies, function ($carry, $army) {
            return $army->isDead()
            ? $carry
            : $carry + 1;
        }, 0);
    }

    public function getArmiesOfType(string|array $type)
    {
        return array_filter($this->armies, function ($army) use ($type) {
            if (is_array($type)) {
                return in_array($army::class, $type);
            }
            return $army::class === $type;
        });
    }

    public function getRandomArmyFactory(): string
    {
        return $this->armyFactories[array_rand($this->armyFactories)];
    }
}
