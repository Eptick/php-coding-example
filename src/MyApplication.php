<?php

namespace App;

use App\Services\ApplicationStartupService;

class MyApplication extends HttpApplication
{
    public function boot()
    {
        ApplicationStartupService::getInstance()->startup();
    }
}
