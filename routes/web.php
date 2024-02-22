<?php

use app\controllers\AuthController;
use app\controllers\ContactsController;
use app\controllers\GroupsController;

/**
 * Set routes for Authentication page
 */

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->post('/logout', [AuthController::class, 'logout']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/profile', [AuthController::class, 'profile']);

/**
 * Set routes for Contacts page
 */

$app->router->get('/', [ContactsController::class, 'list']);
$app->router->get('/contacts', [ContactsController::class, 'list']);
$app->router->get('/contacts/add', [ContactsController::class, 'add']);
$app->router->post('/contacts/add', [ContactsController::class, 'add']);
$app->router->get('/contacts/details', [ContactsController::class, 'details']);
$app->router->get('/contacts/edit', [ContactsController::class, 'edit']);
$app->router->post('/contacts/delete', [ContactsController::class, 'delete']);

/**
 * Set routes for groups page
 */

$app->router->get('/groups', [GroupsController::class, 'list']);
$app->router->get('/groups/edit', [GroupsController::class, 'edit']);