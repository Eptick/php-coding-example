<?php

namespace App\Services;

use App\{Service, Output};

class StdOutputService extends Service implements Output
{
    public function write($content)
    {
        echo $content . PHP_EOL;
    }
}
