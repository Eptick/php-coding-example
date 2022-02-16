<?php

namespace App;

class Kernel
{
    public function __construct($app)
    {
        try {
            $app->boot();
        } catch (\Throwable $th) {
            echo "Error while booting application: " . $th->getMessage();
        }
    }
}
