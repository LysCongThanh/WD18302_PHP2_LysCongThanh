<?php

class m12292023_demo {
    public function up() {
        $db = \app\core\Application::$app->db;
        $SQL = "
            CREATE TABLE test (name1 varchar(255))
        ";
        $db->pdo->exec($SQL);
    }

    public function down() {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE test";
        $db->pdo->exec($SQL);
    }
}