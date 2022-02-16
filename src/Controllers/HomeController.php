<?php

namespace App\Controllers;

use App\Services\ArmyFightService;

class HomeController
{
    private int $army1;
    private int $army2;

    public function __construct(ArmyFightService $armyFightService, $army1, $army2)
    {
        $this->army1 = $army1;
        $this->army2 = $army2;
        $armyFightService->initiateFight($this->army1, $this->army2);
    }
}
