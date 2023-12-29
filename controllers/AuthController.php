<?php

namespace app\controllers;

use app\core\Controller;

class AuthController extends  Controller
{
    public function login()
    {
        $this->setLayout('login');
        return $this->render('login');
    }

    public function register()
    {

    }
}