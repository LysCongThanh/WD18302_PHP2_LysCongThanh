<?php

namespace app\models;

use app\core\database\DbModel;

class ContactsGroups extends DbModel
{

    private static $instance;

    protected int $contact_id;
    protected int $group_id;

    public static function getInstance(): self
    {
        if(self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function tableName(): string
    {
        return 'contact_group';
    }

    public static function primaryKey(): string
    {
        return '';
    }

    public function attributes(): array
    {
        return [
            'contact_id', 'group_id'
        ];
    }

    public function saveContactsGroups() {
        return parent::save();
    }
}
