<?php

namespace App\Services;

use App\Service;
use App\Enums\{TimeOfDay, Weather};
use App\Models\Armies\Army;
use App\Models\Effects\{
    Effect,
    MorningEffect,
    AfternoonEffect,
    NightEffect,
    SunEffect,
    RainEffect,
    SnowEffect,
    FogEffect,
};

class EffectService extends Service
{
    private NarationService $naration;
    private ArmyService $armyService;

    protected function __construct()
    {
        $this->naration = NarationService::getInstance();
        $this->armyService = ArmyService::getInstance();
    }

    public function useBattleReadyEffects(int $timeOfDay, int $weather)
    {
        switch ($timeOfDay) {
            case TimeOfDay::MORNING:
                $this->applyEffect(MorningEffect::class);
                break;
            case TimeOfDay::DAY:
                $this->applyEffect(AfternoonEffect::class);
                break;
            case TimeOfDay::NIGHT:
                $this->applyEffect(NightEffect::class);
                break;
            default:
                // no action
                break;
        }
        switch ($weather) {
            case Weather::SUN:
                $this->applyEffect(SunEffect::class);
                break;
            case Weather::RAIN:
                $this->applyEffect(RainEffect::class);
                break;
            case Weather::SNOW:
                $this->applyEffect(SnowEffect::class);
                break;
            case Weather::FOG:
                $this->applyEffect(FogEffect::class);
                break;
            default:
                // no action
                break;
        }
    }

    private function applyEffect($effect)
    {
        $reflection = new \ReflectionClass($effect);
        $affectedArmies = $this->armyService->getArmiesOfType(
            $reflection->getStaticPropertyValue('affects')
        );
        if (empty($affectedArmies)) {
            return;
        }
        $effect = new $effect();
        foreach ($affectedArmies as $army) {
            $this->affectArmy($army, $effect);
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
