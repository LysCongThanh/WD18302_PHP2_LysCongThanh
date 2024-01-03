<?php

namespace app\core\database;

use app\core\Application;
use app\core\Model;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;


    abstract public function primaryKey(): string;

    public function save(): true
    {
        $tableName = self::tableName();
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

    public function findOne(array $condition) {
        $tableName = static::tableName();
        $attrs = array_keys($condition);
        $conditionStr = implode(" AND", array_map(fn($attr) => "$attr = :$attr", $attrs));
        $sql = "SELECT * FROM $tableName WHERE $conditionStr";
        $stmt = self::prepare($sql);
        foreach ($condition as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchObject(static::class);
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