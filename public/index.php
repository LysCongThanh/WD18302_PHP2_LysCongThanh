<?php
define("WEBROOT", dirname(__DIR__));
//App initialize
$app = require_once __DIR__ . '/../boostrap.php';
//Import web routes
require_once __DIR__ . '/../routes/web.php';
//Import Api routes
require_once  __DIR__ . '/../routes/api.php';
//App-running
$app->run();