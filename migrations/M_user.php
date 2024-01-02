<?php

class M_user {

    public function up() {
        $db = \app\core\Application::$app->db;
        $SQL = "create TABLE users (email varchar(255), password varchar(255))";
        $db->pdo->exec($SQL);
    }

    public function down() {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE users";
        $db->pdo->exec($SQL);
    }

}