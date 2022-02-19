<?php

namespace App\Models\Effects;

use App\Models\Armies\Army;
use App\Models\Reports\Report;

interface Effect
{
    public function getName(): string;
    public function powerEffect(): int;
    public function bodyCountEffect(): int;
}
