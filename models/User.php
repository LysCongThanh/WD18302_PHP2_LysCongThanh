<?php

namespace app\models;

use app\core\Application;
use app\core\database\DbModel;

class User extends DbModel
{
    public static function tableName(): string
    {
        return 'table';
    }

    public function getData()
    {
        $sql = self::table(self::tableName())
            ->select('*')
            ->where('id', '=', '1')
            ->get();

        return $sql;
    }
}