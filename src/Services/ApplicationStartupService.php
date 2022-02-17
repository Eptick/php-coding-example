<?php

namespace App\Services;

use App\Service;

class ApplicationStartupService extends Service
{
    public function startup()
    {
        $queryParameterService = QueryParameterService::getInstance();
        $queryParameterService->validate();
        $parameters = $queryParameterService->getQueryParameters();
        ArmyFightService::getInstance()->initiateFight(...$parameters);
    }
}
