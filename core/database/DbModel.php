<?php

namespace app\core\database;

use app\core\Application;
use app\core\Model;
use app\core\QueryBuilder;

abstract class DbModel extends Model
{

    use QueryBuilder;

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
        $sql = "INSERT INTO $tableName (" . implode(",", $attrs) . ") 
                VALUES (" . implode(",", $params) . ")";
        $stmt = self::prepare($sql);
        foreach ($attrs as $attr) {
            $stmt->bindValue(":$attr", $this->{$attr});
        }
        return $stmt->execute();
    }

    /**
     * @param array $conditions
     * @return bool
     */
    public function remove(array $conditions): bool
    {
        $tableName = static::tableName();
        $attrs = array_keys($conditions);
        $conditionString = implode(" AND", array_map(fn($attr) => "$attr = :$attr", $attrs));
        $sql = "DELETE FROM $tableName WHERE $conditionString";
        $stmt = self::prepare($sql);
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function edit(array $attrs) {
        $tableName = static::tableName();

    }

    /**
     * @param array $condition
     * @return DbModel|false|stdClass|null
     */
    public function findOne(array $condition): DbModel|false|stdClass|null
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
    public function find(array $conditions): array|false
    {
        $tableName = static::tableName();
        $conditionStr = '';

        foreach ($conditions as $key => $value) {
            if (str_contains($value, '%')) {
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
     * @return array | string
     */
    public function all(): array|string
    {
        $tableName = static::tableName();
        $attrs = $this->attributes();
        $sql = "SELECT " . implode(',', $attrs) . " FROM $tableName";
        $stmt = self::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(self::getPDO()::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @param array $params
     * @return array|false
     */
    public function query($sql, array $params = []): array|false
    {
        $stmt = self::prepare($sql);
        foreach ($params as $key => $value) {

            $typeValue = gettype($value);

            $stmt->bindValue($key, $value, self::getPDO()::PARAM_INT);
        }
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