<?php

namespace app\controllers;

use app\core\Controller;

class GroupsController extends Controller
{

    public function list() {
        return $this->render('content/groups/list');
    }

}