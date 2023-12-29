<?php

namespace app\core\middlewares;

use app\core\Application;

class AuthMiddleware extends BaseMiddleware
{
    public array $action = [];

    public function __construct(array $action)
    {
        $this->action = $action;
    }

    public function execute()
    {
        if (Application::isG)
    }
}