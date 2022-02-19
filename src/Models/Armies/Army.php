<?php

namespace App\Models\Armies;

interface Army
{
    public function getName(): string;

    public function attack(Army $army);
    public function defend(Army $army);

    public function getAttackDamage(): int;
    public function isDead(): bool;
    public function getHealth(): int;
}
