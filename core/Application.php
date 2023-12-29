<?php

namespace app\core;

use AllowDynamicProperties;
use app\core\database\Database;

#[AllowDynamicProperties] class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Response $response;
    public Router $router;
    public static Application $app;
    public Controller $controller;
    public Database $db;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
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