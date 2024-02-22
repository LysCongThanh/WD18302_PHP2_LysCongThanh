<?php

namespace app\controllers\api_handler;

use app\core\Controller;
use app\core\exception\BadRequestException;
use app\core\Request;
use app\core\Response;
use app\models\Groups as GroupsModel;

class Groups extends Controller
{

    public function getGroupById(Request $request, Response $response)
    {
        if ($request->isGet()) {
            $getData = $request->getBody();
            if (isset($getData['id'])) {
                $groupsModel = GroupsModel::getInstance();
                $groupsModel->loadData($getData);
                $result = $groupsModel->getGroupById();

                if (!$result) {
                    $response->setJsonContent(['status' => 'error', 'message' => 'No data found !'])->send();
                } else {
                    $response->setJsonContent(['status' => 'success', 'group' => $result])->send();
                }
            } else {
                $response->setJsonContent(['status' => 'error', 'message' => 'invalid parameters'])->send();
            }
        }
    }

    public function getGroupsByUser(Request $request, Response $response)
    {
        if ($request->isGet()) {
            $getData = $request->getBody();
            if (isset($getData['id'])) {
                $groupsModel = GroupsModel::getInstance();
                $groupsModel->loadData($getData);
                $result = $groupsModel->getGroupsByUser();

                if (!$result) {
                    $response->setJsonContent(['status' => 'error', 'message' => 'No data found !'])->send();
                } else {
                    $response->setJsonContent(['status' => 'success', 'group' => $result])->send();
                }
            } else {
                $response->setJsonContent(['status' => 'error', 'message' => 'invalid parameters'])->send();
            }
        }
    }

    public function add(Request $request, Response $response)
    {
        if ($request->isPost()) {

            $postData = $request->getBody();
            $dataConvertted = [
                'name' => strval($postData['name']),
                'id_user' => intval($postData['id_user'])
            ];
            $groupsModel = GroupsModel::getInstance();
            $groupsModel->loadData($dataConvertted);
            if (!$groupsModel->validate()) {
                throw new BadRequestException();
            } else {
                $result = $groupsModel->add();
                if ($result) {
                    return $response->setJsonContent(['status' => 'success', 'message' => 'Thêm nhóm liên hệ thành công'])->send();
                } else {
                    return $response->setJsonContent(['status' => 'error', 'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại !'])->send();
                }
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
                $groupsModel = GroupsModel::getInstance();
                $removeResult = $groupsModel->removeIn(['id' => $postData]);
                if ($removeResult) {
                    $response->setJsonContent(['status' => 'success', 'message' => 'Xóa dữ liệu thành công !'])->send();
                } else {
                    $response->setJsonContent(['status' => 'success', 'error' => 'Có lỗi xảy ra, Vui lòng thử lại !'])->send();
                }
            }
        }
    }

    public function remove(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postData = $request->getBody();
            $dataConvertted = [
                'id' => intval($postData['id'])
            ];
            $groupsModel = GroupsModel::getInstance();
            $groupsModel->loadData($dataConvertted);
            $removeResult = $groupsModel->delete();
            if ($removeResult) {
                $response->setJsonContent(['status' => 'success', 'message' => 'Xóa dữ liệu thành công !'])->send();
            } else {
                $response->setJsonContent(['status' => 'success', 'error' => 'Có lỗi xảy ra, Vui lòng thử lại !'])->send();
            }
        }
    }

    public function edit(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postData = $request->getBody();
            $groupsModel = GroupsModel::getInstance();
            $dataConvertted = [
                'id' => intval($postData['id']),
                'name' => strval($postData['name']),
            ];
            $groupsModel->loadData($dataConvertted);
            $updateResult = $groupsModel->updateGroup();

            if ($updateResult) {
                $response->setJsonContent(['status' => 'success', 'message' => 'Cập nhật dữ liệu thành công !'])->send();
            } else {
                $response->setJsonContent(['status' => 'success', 'error' => 'Có lỗi xảy ra, Vui lòng thử lại !'])->send();
            }
        }
    }
}
