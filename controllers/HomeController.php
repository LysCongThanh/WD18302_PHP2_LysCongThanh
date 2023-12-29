<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class HomeController extends Controller
{
    protected $users;
    public function __construct()
    {
        $this->users = new User();
    }

    public function index(Request $request)
    {
        echo $this->users->getData();
    }

}