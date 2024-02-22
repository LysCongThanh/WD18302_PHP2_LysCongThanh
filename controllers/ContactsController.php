<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exception\ForbiddenException;
use app\core\exception\NotFoundException;
use app\core\middlewares\AuthMiddleware;
use app\core\Response;
use app\models\Contacts;
use app\core\Request;
use Dotenv\Exception\InvalidFileException;

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
        if(!isset($request->getBody()['id'])) {
            throw new NotFoundException();
        }

        $contact_id = intval($request->getBody()['id']);
        $user_id = intval(Application::$app->session->get('user'));
        $contactsModels = Contacts::getInstance();
        $contactResult = $contactsModels->findOne([
            'id' => $contact_id, 
            'id_user' => $user_id
        ]);
        $groupsOfContact = $contactsModels->getGroupsOfContact($contact_id, $user_id);

        if(!$contactResult) {
            throw new ForbiddenException();
        }

        return $this->render('content/contacts/details', [
            'title' => 'TeleCards - Details',
            'contact' => $contactResult,
            'groupsOfContact' => $groupsOfContact
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