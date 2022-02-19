<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Kernel;
use App\MyApplication;

new Kernel(new MyApplication());
