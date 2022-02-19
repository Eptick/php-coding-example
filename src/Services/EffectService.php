<?php

namespace App\Services;

use App\Service;
use App\Models\Armies\Army;
use App\Models\Effects\{Effect, MorningEffect, NightEffect, AfternoonEffect};

class EffectService extends Service
{
    private $battleReadyEffects = [
        MorningEffect::class,
        NightEffect::class,
        AfternoonEffect::class,
    ];
    private NarationService $naration;
    private ArmyService $armyService;

    protected function __construct()
    {
        $this->naration = NarationService::getInstance();
        $this->armyService = ArmyService::getInstance();
    }

    public function useBattleReadyEffects()
    {
        foreach ($this->battleReadyEffects as $value) {
            $reflection = new \ReflectionClass($value);
            $affectedArmies = $this->armyService->getArmiesOfType(
                $reflection->getStaticPropertyValue('affects')
            );
            if (empty($affectedArmies)) {
                continue;
            }
            $effect = new $value();
            foreach ($affectedArmies as $army) {
                $this->affectArmy($army, $effect);
            }
        }
    }

    private function affectArmy(Army $army, Effect $effect)
    {
        $reports = [];
        if ($effect->powerEffect() > 0) {
            $reports[] = $army->affectDamage($effect->powerEffect());
        }
        if ($effect->bodyCountEffect() > 0) {
            $reports[] = $army->affectBodyCount($effect->bodyCountEffect());
        }
        if (count($reports) > 0) {
            $this->naration->describeEffects($army, $effect, $reports);
        }
    }
}
