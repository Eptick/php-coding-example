<?php

namespace App\Models\Armies;

use App\Models\Reports\{Report, BattleReportBuilder, EffectReportBuilder};
use App\Models\Effects\Effect;

abstract class BasicArmy implements Army
{
    private string $name;
    protected int $attackDamage = 10;
    private $numberOfSoldiers;

    public function __construct($name, $num = 10,)
    {
        $this->name = $name;
        $this->numberOfSoldiers = $num;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function attack($army): Report
    {
        return (new BattleReportBuilder())
            ->who($this)
            ->dealtDamage($army->defend($this))
            ->to($army)
            ->soldiersLeft($army);
    }

    public function defend($army): int
    {
        return $this->takeDamage($army->getAttackDamage());
    }

    private function takeDamage($dmg): int
    {
        $strengthDifference = $this->getAttackDamage() - $dmg;
        // formula taken and modified from civilization 6 combat mechanics
        $dmg = round(10 * pow(M_EULER, 0.04 * $strengthDifference) * (rand(80, 120) / 100));
        $this->numberOfSoldiers -= $dmg;
        return $dmg;
    }

    public function getAttackDamage(): int
    {
        return $this->attackDamage;
    }

    public function isDead(): bool
    {
        return $this->numberOfSoldiers <= 0;
    }

    public function getHealth(): int
    {
        return $this->numberOfSoldiers;
    }

    public function affectDamage(int $damage): Report
    {
        $this->attackDamage += $damage;
        $this->attackDamage = max(1, $this->attackDamage);
        return (new EffectReportBuilder())
            ->who($this)
            ->damageAffected($damage);
    }
    public function affectBodyCount(int $soldiers): Report
    {
        $this->numberOfSoldiers += $soldiers;
        $this->numberOfSoldiers = max(1, $this->numberOfSoldiers);
        return (new EffectReportBuilder())
            ->who($this)
            ->bodyCountAffected($soldiers);
    }
}
