<?php

namespace App\Models;

abstract class BasicArmy implements Army
{
    private $numberOfSoldiers;

    public function __construct($num = 1)
    {
        $this->numberOfSoldiers = $num;
    }
}
