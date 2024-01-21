<?php

namespace app\controllers;

use app\core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->setLayout('main');
        return $this->render('content/home');
    }

}