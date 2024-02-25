<?php

namespace app\controllers\api_handler;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

class Dropzone extends Controller
{

    public function upload(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $postData = $request->getBody();

            $id_user = Application::$app->session->get('user');
            $file = $postData['image'];
            $target_directory = 'uploads/' . $id_user . '/';

            if (!is_dir($target_directory)) {
                try {
                    mkdir($target_directory, 0755, true);
                } catch (\Exception $e) {
                    var_dump($e->getMessage());
                }
            }

            $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $new_file_path = $target_directory . $new_file_name;

            while (file_exists($new_file_path)) {
                $new_file_name = time() . '_' . uniqid() . '.' . $file_extension;
                $new_file_path = $target_directory . $new_file_name;
            }

            if (!move_uploaded_file($file['tmp_name'], $new_file_path)) {
                $response->setJsonContent([
                    'status' => 'error',
                    'message' => "Can't not move file uploaded !"
                ])->send();
            }

            $response->setJsonContent([
                'stauts' => 'success',
                'message' => 'Thêm hình ảnh thành công',
                'image' => $new_file_path
            ])->send();
        }
    }
}
