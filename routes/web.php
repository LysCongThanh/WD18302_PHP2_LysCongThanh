<?php

use app\controllers\Lab1Controller;

$app->router->get('/', [Lab1Controller::class, 'index']);
$app->router->get('/courses', [Lab1Controller::class, 'courses']);
$app->router->get('/user', [Lab1Controller::class, 'user']);
$app->router->post('/user', [Lab1Controller::class, 'user']);