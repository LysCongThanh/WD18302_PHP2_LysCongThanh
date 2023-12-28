<?php

namespace app\core;
use app\core\Request;

class Router
{

    public Request $request;
    private array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct()
    {
        $this->request = new Request();
    }


    public function get($path, $callback) {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if(!$callback) {
            echo 'not found';
            exit();
        }

        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        echo call_user_func($callback);
    }

    public function renderView($view) {
        $layoutContent = $this->layoutContent();
        include_once __DIR__. '/../views/'. $view . '.php';
    }

    public function layoutContent() {
        include_once
    }

}