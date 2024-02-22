<?php

/**
 * Routes for API 
 */

use app\controllers\api_handler\Groups;
use app\controllers\api_handler\Auth;
use app\controllers\api_handler\Contacts;
use app\controllers\api_handler\ContactsGroups;
use app\controllers\api_handler\Dropzone;

// Routes for Auth
$app->router->post($app->api_prefix . '/login', [Auth::class, 'checkLogin']);
$app->router->post($app->api_prefix . '/register', [Auth::class, 'registerUser']);

/**
 * Routes for groups
 */

// Get method
$app->router->get($app->api_prefix . '/groups/get-group', [Groups::class, 'getGroupById']);
$app->router->get($app->api_prefix . '/groups', [Groups::class, 'getGroupsByUser']);

// Post method
$app->router->post($app->api_prefix . '/groups/add', [Groups::class, 'add']);
$app->router->post($app->api_prefix . '/groups/remove-in', [Groups::class, 'removeDatasIn']);
$app->router->post($app->api_prefix . '/groups/remove', [Groups::class, 'remove']);
$app->router->post($app->api_prefix . '/groups/edit', [Groups::class, 'edit']);
$app->router->post($app->api_prefix . '/groups/remove', [Groups::class, 'remove']);

/**
 * Routes for contacts
 */

$app->router->post($app->api_prefix . '/contacts/add', [Contacts::class, 'saveContacts']);

/**
 * Routes for contacts-groups
 */

$app->router->post($app->api_prefix . '/contacts-groups/add', [ContactsGroups::class, 'setGroups']);

/**
 * Routes for Dropzone handling
 */

$app->router->post($app->api_prefix . '/dropzone', [Dropzone::class, 'upload']);