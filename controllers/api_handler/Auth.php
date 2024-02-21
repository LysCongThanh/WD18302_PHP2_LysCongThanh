<?php

namespace app\controllers\api_handler;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Users;

class Auth extends Controller
{

    public function checkLogin(Request $request, Response $response)
    {

        if ($request->isPost()) {

            $postData = $request->getBody();
            $usersModel = new Users;
            $usersModel->loadData($postData);
            $usersModel->validate();
            $loginResult = $usersModel->login(); 

            if ($loginResult === true) {
                $user_id = Application::$app->session->get('user');
                if($user_id) {
                    $primaryKey = $usersModel->primaryKey(); 
                    $user = $usersModel->findOne([$primaryKey => $user_id]);
                }
                
                return $response->setJsonContent(['status' => 'success', 'message' => 'Đăng nhập thành công', 'user' => $user])->send();
            } else {
                $errorMessages = reset($usersModel->errors)[0];
                return $response->setJsonContent(['status' => 'error', 'message' => $errorMessages])->send();
            }
        }
    }

    public function registerUser(Request $request, Response $response)
    {

        if($request->isPost()) {
            $postData = $request->getBody();
            $usersModel = new Users;
            $usersModel->isRegister = true;
            $usersModel->loadData($postData);
            if($usersModel->validate()) {

                $registerResult = $usersModel->register();
                
                if($registerResult) {
                    return $response->setJsonContent(['status' => 'success', 'message' => 'Đăng ký thành công'])->send();
                } else {
                    return $response->setJsonContent(['status' => 'error', 'message' => 'Đã có lỗi xảy ra, Vui lòng thử lại !'])->send();
                }

            } else {
                $errorMessages = reset($usersModel->errors)[0];
                return $response->setJsonContent(['status' => 'error', 'message' => $errorMessages])->send();
            }
        }

    }
}
