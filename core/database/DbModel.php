<?php

namespace app\core\database;

use app\core\Application;
use app\core\Model;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;


    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save(): true
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(",", $attributes) . ") 
                VALUES (" . implode(",", $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }

    public static function getPDO(): \PDO
    {
        return Application::$app->db->pdo;
    }

}