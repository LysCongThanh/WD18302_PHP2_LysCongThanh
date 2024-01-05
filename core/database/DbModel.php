<?php

namespace app\core\database;

use app\core\Application;
use app\core\Model;

abstract class DbModel extends Model
{
    abstract public static function tableName(): string;

    abstract public static function primaryKey(): string;

    /**
     * @return bool
     */
    public function save(): bool
    {
        $tableName = self::tableName();
        $attrs = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attrs);
        $stmt= self::prepare("INSERT INTO $tableName (" . implode(",", $attrs) . ") 
                VALUES (" . implode(",", $params) . ")");
        foreach ($attrs as $attr) {
            $stmt->bindValue(":$attr", $this->{$attr});
        }
        return $stmt->execute();
    }

    /**
     * @param array $condition
     * @return DbModel|false|object|\stdClass|null
     */
    public function findOne(array $condition): DbModel|false|\stdClass|null
    {
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


    /**
     * @param array $conditions
     * @return array|false
     */
    public function find(array $conditions) : array|false
    {
        $tableName = static::tableName();
        $conditionStr = '';

        foreach ($conditions as $key => $value) {
            if (strpos($value, '%') !== false) {
                // If the value contains '%', use LIKE
                $conditionStr .= "$key LIKE :$key AND ";
            } else {
                // Otherwise, use '='
                $conditionStr .= "$key = :$key AND ";
            }
        }

        $conditionStr = rtrim($conditionStr, ' AND '); // Remove the trailing ' AND '

        $sql = "SELECT * FROM $tableName WHERE $conditionStr";
        $stmt = self::prepare($sql);

        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(self::getPDO()::FETCH_ASSOC);
    }

    /**
     * @param array $fields
     * @return array | string
     */
    public function all(): array|string
    {
        $tableName = static::tableName();
        $attrs = $this->attributes();
        $sql = "SELECT ".implode(',', $attrs)." FROM $tableName";
        $stmt = self::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(self::getPDO()::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @return \PDOStatement
     */
    public static function prepare($sql): \PDOStatement
    {
        return Application::$app->db->prepare($sql);
    }

    /**
     * @return \PDO
     */
    public static function getPDO(): \PDO
    {
        return Application::$app->db->pdo;
    }

}