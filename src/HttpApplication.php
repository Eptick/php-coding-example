<?php

namespace App;

use App\Services\ApplicationStartupService;

class HttpApplication implements Application
{
    public function boot()
    {
        ApplicationStartupService::getInstance()->startup();
    }
}
