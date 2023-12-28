<?php

namespace app\core;

class Controller
{
    public function render($view, $params = []): array|string|null
    {
        return Application::$app->router->renderView($view, $params = []);
    }
}