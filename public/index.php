<?php

use app\core\Application;

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = require_once __DIR__ . '/../configs/kernel.php';
$app = new Application(dirname(__DIR__), $config);

//Web routes
require_once __DIR__ . '/../routes/web.php';
//API routes
require_once  __DIR__ . '/../routes/api.php';


$app->run();