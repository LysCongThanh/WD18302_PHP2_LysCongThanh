<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Response;
use app\models\Contacts;
use app\core\Request;

class ContactsController extends Controller
{

    public function __construct()
    {
        return $this->registerMiddleware(new AuthMiddleware([
            'list' => 'checkLogin', 
            'add' => 'checkLogin', 
            'details' => 'checkLogin', 
            'edit' => 'checkLogin'
        ]));
    }

    public function list()
    {
        $contacts = Contacts::getInstance();
        $user_id = Application::$app->session->get('user');
        $contactsData = null;
        if($user_id) {
            $contactsData = $contacts->getContactsByUser($user_id);
        }

        return $this->render('content/contacts/list', [
            'title' => 'TeleCards - Contacts',
            'contacts' => $contactsData
        ]);
    }

    public function details(Request $request)
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

    public function add(Request $request, Response $response)
    {

        if ($request->isPost()) {
            $postData = $request->getBody();
            $dataConverted = [
                'id_user' => intval($postData['id_user']),
                'name' => strval($postData['name']),
                'telephone' => strval($postData['telephone']),
                'company' => strval($postData['company']),
            ];
            $contactsModel = new Contacts;
            $contactsModel->loadData($dataConverted);
            if ($contactsModel->validate()) {
                $addContactResult = $contactsModel->createContact();
                var_dump($addContactResult);
                die();
            }

            var_dump($contactsModel);
            die();
        }

        return $this->render('content/contacts/add', [
            'title' => 'TeleCards - Add'
        ]);
    }

    public function delete(Request $request, Response $response)
    {
        if($request->isPost()) {
            $postData = $request->getBody();
            $dataConverted = [
                'id' => intval($postData['id'])
            ];
            var_dump($dataConverted);
        }
    }

}