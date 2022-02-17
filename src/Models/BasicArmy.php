<?php

namespace App\Models;

abstract class BasicArmy implements Army
{
    private string $name;
    protected int $attackDamage = 10;
    protected $defendPower = 2;
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

    public function attack($army)
    {
        $army->defend($this);
    }

    public function defend($army)
    {
        $this->takeDamage($army->getAttackDamage());
    }

    private function takeDamage($dmg)
    {
        $this->numberOfSoldiers -= max(0, $dmg - $this->defendPower);
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
