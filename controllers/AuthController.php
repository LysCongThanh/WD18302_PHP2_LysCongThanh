<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\AuthModel;
use thecodeholic\phpmvc\View;

class AuthController extends  Controller
{
    public function login(Request $request, Response $response)
    {
        if($request->isPost()) {
            $authModel = new AuthModel();
            $authModel->loadData($request->getBody());

            if($authModel->validate()) {
                echo 'success';
            }

            $authModel->create();
            return;
        }

        $this->setLayout('login');
        return $this->render('login');
    }
}