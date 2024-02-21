<?php

namespace app\core\middlewares;

use app\core\Application;
use app\core\exception\ForbiddenException;

class AuthMiddleware extends BaseMiddleware
{
    public array $action = [];

    public function __construct(array $action = [])
    {
        $this->action = $action;
    }

    /**
     * @
     */
    public function checkLogin()
    {
        if (Application::isGuest()) {
            Application::$app->response->redirect('/login', 301);
        } else {
            return 'next';
        }
    }

    public function isUser()
    {
        if (!Application::isGuest()) {
            Application::$app->response->redirect('/', 301);
        } else {
            return 'next';
        }
    }
}
