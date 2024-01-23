<?php

namespace app\controllers;

use app\core\Controller;
use app\core\middlewares\AuthMiddleware;

class ContactsController extends Controller
{

    public function __construct()
    {
        return $this->registerMiddleware(new AuthMiddleware(['list']));
    }

    public function list()
    {
        return $this->render('content/contacts/list', [
            'title' => 'TeleCards - Contacts'
        ]);
    }

    public function details()
    {
        return $this->render('content/contacts/details', [
            'title' => 'TeleCards - Details'
        ]);
    }

    public function edit()
    {
        return $this->render('content/contacts/edit', [
            'title' => 'TeleCards - Edit'
        ]);
    }

    public function add()
    {
        return $this->render('content/contacts/add', [
            'title' => 'TeleCards - Add'
        ]);
    }


}