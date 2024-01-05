<?php

namespace app\core;

class Controller
{
    public string $layout = 'main';
    public array $middleware = [];
    public function setLayout($layout) {
        $this->layout = $layout;
    }

    /**
     * @param $view
     * @param array $params
     * @return array|string|null
     */
    public function render($view, array $params = []): array|string|null
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware) {
        $this->middleware[] = $middleware;
    }
}