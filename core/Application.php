<?php

namespace app\core;

use AllowDynamicProperties;
use app\core\database\Database;
use app\core\database\DbModel;

#[AllowDynamicProperties] class Application
{

    public static string $ROOT_DIR;
    public string $layout = 'main';
    public Request $request;
    public Response $response;
    public Session $session;
    public Router $router;
    public static Application $app;
    public ?Controller $controller = null;
    public Database $db;
    public ?DbModel $user;
    public View $view;
    public string $api_prefix;
    public string $url_dir;

    /**
     * @param $rootPath
     * @param array $config
     */
    public function __construct($rootPath, array $config)
    {
        $this->user = new $config['model']['users'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->api_prefix = $config['app']['api_prefix'];
        $this->url_dir = $config['app']['url'];

        try {
            $this->db = new Database($config['db']);
        } catch (\PDOException $e) {
            $this->layout = 'error';
            echo $this->view->renderView('error/_'.$e->getCode(), [
                'title' => '500 Internal Server Error',
                'exception' => $e
            ]);
            die();
        }

        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->user->primaryKey();
            $this->user->findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }
    }

    /**
     * @return Controller
     */
    public function getController(): \app\core\Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     * @return void
     */
    public function setController(\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return bool
     */
    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    /**
     * @param DbModel $user
     * @return true
     */
    public function login(DbModel $user): true
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryKeyValue = $user->{$primaryKey};
        $this->session->set('user', $primaryKeyValue);
        return true;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        $this->user = null;
        $this->session->remove('user');
    }

    /**
     * @return void
     */
    public function run(): void
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            $errPage = strval($e->getCode());
            $this->layout = 'error';
            if($this->controller) {
                $this->controller->layout = 'error';
            }
            echo $this->view->renderView('error/_'.$errPage, [
                'title' => $e->getMessage(),
                'exception' => $e
            ]);
        }
    }

    /**
     * @return string
     */
    public static function api_prefix(): string {
        return self::$app->api_prefix;
    }

    /**
     * @param $url
     * @return string
     */
    public static function url($url): string
    {
        return self::$app->url_dir . $url;
    }
}