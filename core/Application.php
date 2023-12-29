<?php

namespace app\core;

use app\core\Router;
use app\core\Request;
use app\core\Response;

class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Response $response;
    public Router $router;
    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function getController() : \app\core\Controller {
        return $this->controller;
    }

    public function setController(\app\core\Controller $controller) : void {
        $this->controller = $controller;
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }
}