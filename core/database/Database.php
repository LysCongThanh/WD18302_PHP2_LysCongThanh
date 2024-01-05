<?php

namespace app\core\database;

use app\core\Application;

class Database
{
    public \PDO $pdo;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        try {
            $dsn = $config['dsn'] ?? '';
            $user = $config['user'] ?? '';
            $password = $config['password'] ?? '';

            $this->pdo = new \PDO($dsn, $user, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Lỗi kết nối: ' . $e->getMessage());
        }
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }
}