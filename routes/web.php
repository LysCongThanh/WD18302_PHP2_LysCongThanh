<?php

use app\controllers\HomeController;

$app->router->get('/', [HomeController::class, 'index']);
$app->router->post('/', [HomeController::class, 'index']);

$app->router->get('/login', [\app\controllers\AuthController::class, 'login']);
$app->router->post('/login', [\app\controllers\AuthController::class, 'login']);
$app->router->get('/register', [\app\controllers\AuthController::class, 'register']);
$app->router->post('/register', [\app\controllers\AuthController::class, 'register']);