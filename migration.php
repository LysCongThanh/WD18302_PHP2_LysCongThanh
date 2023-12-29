<?php

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$config = require_once __DIR__ . '/configs/kernel.php';
$app = new Application(__DIR__, $config);

$app->db->applyMigrations();