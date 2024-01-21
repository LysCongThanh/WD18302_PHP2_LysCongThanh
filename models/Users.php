<?php

namespace app\models;

use app\core\Application;
use app\core\database\DbModel;

class Users extends DbModel
{

    public string $email;
    public string $password;

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
            'email', 'password'
        ];
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    /**
     * @return bool
     */
    public function login(): bool
    {

        $user = self::findOne(['email' => $this->email]);

        if (!$user) {
            Application::$app->session->setFlash('message', 'Tai khoan khong ton tai !');
            return false;
        }

        if (!password_verify($this->password, hash: $user->password)) {
            Application::$app->session->setFlash('message', 'Mat khau khong dung !');
            return false;
        }

        Application::$app->session->setFlash('message', 'Dang nhap thanh cong !');
        return Application::$app->login($user);

    }

    /**
     * @return false|array
     */
    public function getUser(): false|array
    {
        $sql = $this->select('u.email, u.id, u.password')
            ->table('users as u')
            ->where('u.id', '=', ':id')
            ->where('u.email', '=', ':email')
            ->orderBy('id')
            ->get();

        return $this->query($sql, [
            // BindValue >>>
            ':id' => 11,
            ':email' => 'john.doe@email.com'
        ]);
    }

}