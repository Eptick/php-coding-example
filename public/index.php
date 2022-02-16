<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Kernel;
use App\HttpApplication;

new Kernel(new HttpApplication());
