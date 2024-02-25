<?php

namespace app\models;

use app\core\database\DbModel;

class Contacts extends DbModel
{
    private static $instance;

    public int $id;
    public string $name;
    public string $telephone;
    public string $company;
    public int $id_user;
    public string $image;

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
            'image',
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

    public function getGroupsOfContact($contact_id, $user_id) {
        $sql = $this->select("g.name as group_name, g.id as group_id")
        ->table($this->tableName().' as c')
        ->join('contact_group as c_g', 'c_g.contact_id = c.id')
        ->join('groups as g', 'g.id = c_g.group_id')
        ->where('c.id', '=', ':id')
        ->where('c.id_user', '=', ':id_user')
        ->get();

        return $this->query($sql, [
            ':id' => $contact_id,
            ':id_user' => $user_id
        ]);
    }

    public function createContact(): bool
    {
        return parent::save();
    }

    public function getLastId(): int {
        return parent::getLastInsertedId();
    }

}