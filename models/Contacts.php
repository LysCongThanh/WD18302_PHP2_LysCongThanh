<?php

namespace app\models;

use app\core\database\DbModel;

class Contacts extends DbModel
{
    private static $instance;

    public string $name;
    public string $telephone;
    public string $company;
    public int $id_user;

    public static function getInstance(): self{
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function tableName(): string
    {
        return 'contacts';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return [
            'id',
            'id_user',
            'name',
            'telephone',
            'company',
            'is_recycle',
            'created_at',
            'updated_at',
        ];
    }

    public function getContactsByUser($id)   
    {
        $sql = $this->select()
        ->table($this->tableName())
        ->where('id_user', '=', ':id_user')
        ->get();

        return $this->query($sql, [
            ':id_user' => $id
        ]);
    }

    public function createContact(): bool
    {
        return parent::save();
    }

}