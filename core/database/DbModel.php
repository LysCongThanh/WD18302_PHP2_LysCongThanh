<?php

namespace app\core\database;

use app\core\Application;
use app\core\Model;
use app\core\QueryBuilder;

abstract class DbModel extends Model
{
    use QueryBuilder;

    abstract public static function tableName(): string;

    public static function primaryKey(): string
    {
        return 'id';
    }

    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }

    public function query(string $sql)
    {
        return $sql;
    }
}