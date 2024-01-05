<?php

namespace app\models;

use app\core\database\DbModel;

class Users extends DbModel
{

    public string $email;

    public static function tableName(): string
    {
        return 'users';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return [
            'id',
            'first_name',
            'last_name',
            'email',
            'password',
            'created_at',
            'updated_at'
        ];
    }


    /**
     * @return array|false
     */
    public function findUserByEmail(): false|array
    {
        return $this->find(['email' => "%$this->email%"]);
    }

}