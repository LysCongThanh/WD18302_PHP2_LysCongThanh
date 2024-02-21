<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\Users;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware([
            'profile' => 'checkLogin', 
            'logout' => 'checkLogin',
            'login' => 'isUser'
        ]));
    }

    public function login(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $usersModel = Users::getInstance();
            $usersModel->loadData($request->getBody());

            if (!$usersModel->validate()) {
                $errors = $usersModel->errors;

                foreach ($errors as $key => $err) {
                    $errors[$key] = $err[0];
                }

                Application::$app->session->setFlash('error', $errors);
            }

            // Check login >>
            if ($usersModel->login()) {
                $response->redirect('/profile', 301);
                exit();
            } else {
                // error handle

                var_dump(Application::$app->session->getFlash('message'));
            }
        }

        $this->setLayout('auth');

        return $this->render('content/auth/login', [
            'title' => 'TeleCards - Login',
        ]);
    }

    public function logout(Request $request, Response $response): void
    {

        if ($request->isPost()) {
            Application::$app->logout();
            $response->redirect('/', 302);
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return array|string|null
     */
    public function register()
    {
        $this->setLayout('auth');
        return $this->render('content/auth/register', [
            'title' => 'TeleCards - Register'
        ]);
    }

    public function profile(Request $request, Response $response)
    {

        $this->setLayout('main');
        return $this->render('content/auth/profile', [
            'title' => 'TeleCards - Profile'
        ]);
    }
}
