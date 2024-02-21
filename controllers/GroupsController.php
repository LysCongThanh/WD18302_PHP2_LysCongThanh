<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Groups;

class GroupsController extends Controller
{

    public function list() {
        $groupsModel = Groups::getInstance();
        $groups = $groupsModel->getGroupsByUser();
        return $this->render('content/groups/list', [
            'groups' => $groups
        ]);
    }

}