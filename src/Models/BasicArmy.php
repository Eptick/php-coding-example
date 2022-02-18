<?php

namespace App\Models;

use App\Models\Reports\{Report, BattleReportBuilder};

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
            ->to($army);
    }

    public function defend($army): int
    {
        return $this->takeDamage($army->getAttackDamage());
    }

    private function takeDamage($dmg): int
    {
        $strengthDifference = $this->getAttackDamage() - $dmg;
        // formula taken and modified from civilization 6 combat mechanics
        $dmg = round(10 * pow(M_EULER, 0.4 * $strengthDifference) * (rand(80, 120) / 100));
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
}
