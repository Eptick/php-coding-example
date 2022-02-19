<?php

namespace App\Services;

use App\Service;

class QueryParameterService extends Service
{
    private $parameters = ["army1", "army2"];

    public function validate()
    {
        $this->validateQueryParamters();
    }

    public function getQueryParameters()
    {
        return array_map(
            array($this, 'getQueryIntegerValue'),
            $this->parameters
        );
    }

    private function getQueryIntegerValue($name)
    {
        return intval($_GET[$name]);
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
            throw new \Exception("$name query parameter needs to be set to a positive integer larger than 0"); // phpcs:ignore
        }
    }
}
