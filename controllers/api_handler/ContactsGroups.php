<?php

namespace app\controllers\api_handler;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactsGroups as ModelsContactsGroups;

class ContactsGroups extends Controller
{

    public function setGroups(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postData = $request->getBody();
            $dataConvertted = [
                'contact_id' => intval($postData['contact_id']),
                'group_id' => intval($postData['group_id']),
            ];

            $contactsGroupsModels = ModelsContactsGroups::getInstance();
            $contactsGroupsModels->loadData($dataConvertted);
            $setGroupsResult = $contactsGroupsModels->saveContactsGroups();

            if ($setGroupsResult) {
                return $response->setJsonContent(['status' => 'success'])->send();
            } else {
                return $response->setJsonContent(['status' => 'error'])->send();
            }
        }
    }
}
