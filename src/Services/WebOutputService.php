<?php

namespace App\Services;

use App\{Service, Output};

class WebOutputService extends Service implements Output
{
    public function write($content)
    {
        echo $content . '<br>' . PHP_EOL;
    }
}
