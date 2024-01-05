<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Courses;
use app\models\Users;

class Lab1Controller extends Controller
{

    /**
     * @return array|string|null
     */
    public function index(): array|string|null
    {
        $params = [
            'heading' => 'Trang Chủ'
        ];
        return $this->render('home', $params);
    }

    /**
     * @param Request $request
     * @return array|string|null
     */
    public function courses(Request $request): array|string|null
    {
        $courses = new Courses();
        $params['heading'] = 'bài 1';
        $params['courses'] = $courses->getCourses();
        $searchValue = $request->getBody()['name'] ?? false;


        if ($searchValue) {
            $courseByFilter = $courses->find(['name' => "%$searchValue%"]);
            $params['courses'] = $courseByFilter;
        }

        return $this->render('pages/courses', $params);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return array|string|null
     */
    public function user(Request $request, Response $response): array|string|null
    {

        $params['heading'] = 'Users';

        if ($request->isPost()) {
            $postValues = $request->getBody();
            $users = new Users();
            $users->loadData($postValues);

            if ($users->validate() && $users->findUserByEmail()) {
                $countUser = count($users->findUserByEmail());
                $params = [
                    'status' => 'success',
                    'message' => "$countUser kết quả cho $users->email"
                ];
            } else {
                $params = [
                    'status' => 'fail',
                ];
            }

            Application::$app->session->setFlash('result', $params);
            $response->redirect('/user', 301);
        }

        return $this->render('pages/user', $params);

    }

}