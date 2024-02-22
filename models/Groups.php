<?php

/**
 * Groups Models
 */

namespace app\models;

use app\core\Application;
use app\core\database\DbModel;
use Dotenv\Parser\Parser;
use Dotenv\Parser\Value;
use Override;

class Groups extends DbModel {

    private static $instance;

    protected string $name = '';
    protected int $id_user;
    protected int $id;

    #[Override] public function attributes(): array {
        return [
            'id', 'name', 'id_user'
        ];
    }

    public static function getInstance(): self{
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    #[Override] public static function tableName(): string {
        return 'groups';
    }

    #[Override] public static function primaryKey(): string
    {
        return 'id';
    }

    #[Override] public function rules(): array {
        return [
            'name' => [self::RULE_REQUIRED]
        ];
    }

    public function add(): bool
    {
        return parent::save();
    }

    public function getGroupsByUser(): array {
        $sql = $this->select('g.*, COUNT(c.id) as contact_count ')
        ->table($this->tableName(). ' as g')
        ->leftJoin('contact_group AS cg', 'g.id = cg.group_id')
        ->leftJoin('contacts as c', 'cg.contact_id = c.id')
        ->where('g.id_user',  '=', ':id_user')
        ->groupBy('g.id')
        ->get();

        $id_user = Application::$app->session->get('user');

        $result = $this->query($sql, ['id_user' => intval($id_user)]);
        
        return $result;
    }

    public function getGroupById() {
        $sql = $this->select()
        ->table($this->tableName())
        ->where('id', '=', ':id')
        ->get();

        $idGroup = $this->id;

        $result = $this->getOne($sql, ['id' => $idGroup]);
        return $result;
    }

    public function updateGroup() {
        $id = $this->id;
        return parent::edit(['id' => $id]);
    }

    public function delete() {
        $id = $this->id;
        return parent::remove(['id' => $id]);
    }

}

