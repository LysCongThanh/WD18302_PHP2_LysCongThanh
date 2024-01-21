<?php

use app\controllers\AuthController;
use app\controllers\ContactsController;
use app\controllers\GroupsController;
use app\controllers\HomeController;
use app\core\Application;

/**
 * Set routes for Authentication page
 */

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/profile', [AuthController::class, 'profile']);

/**
 * Set routes for Contacts page
 */

$app->router->get('/', [ContactsController::class, 'list']);
$app->router->get('/contacts/add', [ContactsController::class, 'add']);
$app->router->get('/contacts/details', [ContactsController::class, 'details']);
$app->router->get('/contacts/edit', [ContactsController::class, 'edit']);

/**
 * Set routes for groups page
 */

$app->router->get('/groups', [GroupsController::class, 'list']);