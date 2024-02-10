<?php

namespace app\models;

use app\core\Application;
use app\core\database\DbModel;
use Override;

class Users extends DbModel
{

    private static $instance;

    public string $email = '';
    public string $password = '';
    public ?string $first_name = '';
    public ?string $last_name = '';
    public string $password_confirm = '';
    public bool $isRegister = false;

    public static function getInstance(): self{
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    #[Override] public static function tableName(): string
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
            'email', 'password', 'first_name', 'last_name'
        ];
    }

    public function rules(): array
    {

        $rules = [
            'email' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED],
        ];

        if($this->isRegister === true) {

            $rules['first_name'] = [self::RULE_REQUIRED];
            $rules['last_name'] = [self::RULE_REQUIRED];
            $rulse['password-confirm'] = [[self::RULE_MATCH, 'match' => 'password']];

            $rules['email'] = [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]];
        }

        return $rules;
    }

    public function register() {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    /**
     * @return bool
     */
    public function login(): bool
    {

        $user = parent::findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', 'Email không tồn tại !');
            return false;
        }

        if (!password_verify($this->password, hash: $user->password)) {
            $this->addError('password', 'Mật khẩu không đúng !');
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