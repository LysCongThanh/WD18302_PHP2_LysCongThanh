<?php

namespace app\controllers;

use app\core\Controller;

class ContactsController extends Controller
{

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