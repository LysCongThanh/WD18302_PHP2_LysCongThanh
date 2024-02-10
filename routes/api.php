<?php

use app\controllers\api_handler\Auth;

$app->router->post($app->api_prefix . '/login', [Auth::class, 'checkLogin']);
$app->router->post($app->api_prefix . '/register', [Auth::class, 'registerUser']);