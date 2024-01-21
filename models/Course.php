<?php

namespace app\models;

use app\core\database\DbModel;

class Course extends DbModel
{
    public int $id;
    public string $name;

    public static function tableName(): string
    {
        return 'course';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function attributes(): array
    {
        return [
            'id',
            'name'
        ];
    }

    public function delete()
    {
        return self::remove(['id' => $this->id]);
    }

}