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
    public function execute(): void
    {
        if (Application::isGuest()) {
            if(empty($this->action) || in_array(Application::$app->controller->action, $this->action)) {
                Application::$app->response->redirect('/login', 301);
            }
        }
    }
}

