<?php

namespace App\Models\Armies;

use App\Models\Effects\Effect;
use App\Models\Reports\Report;

interface Army
{
    public function getName(): string;
    public function getType(): string;

    public function attack(Army $army);
    public function defend(Army $army);

    public function getAttackDamage(): int;
    public function isDead(): bool;
    public function getHealth(): int;

    public function affectDamage(int $damage): Report;
    public function affectBodyCount(int $soldiers): Report;
}
