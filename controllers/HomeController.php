<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        if($request->getMethod() === 'get') {
            $params = [
                'name' => 'Thanh'
            ];
            return $this->render('hellobannho', $params);
        } else {
            $postDatas = $request->getBody();
            var_dump($postDatas);
        }
    }

}