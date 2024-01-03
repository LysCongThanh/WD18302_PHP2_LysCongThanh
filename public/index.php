<?php
//Boostrap
$app = require_once __DIR__ . '/../boostrap.php';
//Web routes
require_once __DIR__ . '/../routes/web.php';
//API routes
require_once  __DIR__ . '/../routes/api.php';
//Run app
$app->run();