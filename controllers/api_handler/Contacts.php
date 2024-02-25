<?php

namespace app\controllers\api_handler;

use app\core\Application;
use app\core\Controller;
use app\core\exception\ForbiddenException;
use app\core\Request;
use app\core\Response;
use app\models\Contacts as ModelsContacts;

class Contacts extends Controller
{

    public function contactDetail(Request $request, Response $response)
    {
        if($request->isGet()) {
            $dataGet = $request->getBody();
            $id = $dataGet['id'];
            $id_user = Application::$app->session->get('user');

            $contactsModel = ModelsContacts::getInstance();
            $contactResult = $contactsModel->findOne(['id' => intval($id), 'id_user' => intval($id_user)]);
            $groupsOfContact = $contactsModel->getGroupsOfContact($id, $id_user);

            if(!$contactResult) {
                return $response->setJsonContent(['status' => 'error', 'message' => 'Bạn không đủ quyền để làm điều này !'])->send();
            }

            return $response->setJsonContent(['status' => 'success', 'contact' => $contactResult, 'groups' => $groupsOfContact])->send();
        }
    }

    public function saveContacts(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postData = $request->getBody();
            $dataConverted = [
                'id_user' => intval($postData['id_user']),
                'name' => strval($postData['name']),
                'telephone' => strval($postData['telephone']),
                'company' => strval($postData['company']),
            ];

            if (isset($postData['image'])) {
                $dataConverted['image'] = strval($postData['image']);
            }

            $contactsModel = new ModelsContacts;
            $contactsModel->loadData($dataConverted);
            if ($contactsModel->validate()) {
                $addContactResult = $contactsModel->createContact();
                if ($addContactResult) {
                    $last_id = $contactsModel->getLastId();
                    return $response->setJsonContent(['status' => 'success', 'message' => 'Thêm liên hệ thành công', 'last_id' => $last_id])->send();
                } else {
                    return $response->setJsonContent(['status' => 'error', 'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại !'])->send();
                }
            } else {
                return $response->setJsonContent(['status' => 'error', 'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại !'])->send();
            }
        }
    }

    public function removeDatasIn(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postData = $request->getBody();
            if (count($postData) === 0) {
                $response->setJsonContent(['status' => 'error', 'message' => 'Không có dữ liệu được chọn !'])->send();
            } else {
                $groupsModel = ModelsContacts::getInstance();
                $removeResult = $groupsModel->removeIn(['id' => $postData]);
                if ($removeResult) {
                    $response->setJsonContent(['status' => 'success', 'message' => 'Xóa dữ liệu thành công !'])->send();
                } else {
                    $response->setJsonContent(['status' => 'success', 'error' => 'Có lỗi xảy ra, Vui lòng thử lại !'])->send();
                }
            }
        }
    }
}
