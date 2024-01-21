<?php

namespace app\core;

use app\core\middlewares\BaseMiddleware;

class Controller
{
    protected array $middleware = [];

    public string $layout = 'main';
    public string $action;


    /**
     * @param $layout
     * @return void
     */
    public function setLayout($layout): void {
        $this->layout = $layout;
    }

    /**
     * @param $view
     * @param array $params
     * @return array|string|null
     */
    public function render($view, array $params = []): array|string|null
    {
        return Application::$app->view->renderView($view, $params);
    }

    /**
     * @param BaseMiddleware $middleware
     * @return void
     */
    public function registerMiddleware(BaseMiddleware $middleware): void {
        $this->middleware[] = $middleware;
    }

    /**
     * @return array
     */
    public function getMiddlewares(): array
    {
        return $this->middleware;
    }

}
