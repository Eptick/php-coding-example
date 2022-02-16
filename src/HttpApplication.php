<?php

namespace App;

use App\Controllers\HomeController;
use App\Services\ArmyFightService;

class HttpApplication implements Application
{
    private $parameters = ["army1", "army2"];

    public function boot()
    {
        $this->validateQueryParamters();
        $intval = fn($x) => intval($_GET[$x]);
        new HomeController(new ArmyFightService(), ...(array_map($intval, $this->parameters)));
    }

    private function validateQueryParamters()
    {
        foreach ($this->parameters as $param) {
            $this->checkArmyParameter($param);
        }
    }

    private function checkArmyParameter($name)
    {
        $val = @$_GET[$name];
        if (!isset($val) || !is_numeric($val) || intval($val) <= 0) {
            throw new \Exception("$name query parameter needs to be set to a positive integer larger than 0");
        }
    }
}
