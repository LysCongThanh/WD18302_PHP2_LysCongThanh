<?php

namespace app\core;

use AllowDynamicProperties;
use app\core\database\Database;
use app\core\database\DbModel;

#[AllowDynamicProperties] class Application
{
    public static string $ROOT_DIR;
//    public string $userClass;
    public Request $request;
    public Response $response;
    public Session $session;
    public Router $router;
    public static Application $app;
    public Controller $controller;
    public Database $db;
//    public ?DbModel $user;

    /**
     * @param $rootPath
     * @param array $config
     */
    public function __construct($rootPath, array $config)
    {
//        $this->user = new $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->user->primaryKey();
            $this->user->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    public function getController(): \app\core\Controller
    {
        return $this->controller;
    }

    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    /**
     * @param DbModel $user
     * @return true
     */
    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryKeyValue = $user->{$primaryKey};
        $this->session->set('user', $primaryKeyValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }
}