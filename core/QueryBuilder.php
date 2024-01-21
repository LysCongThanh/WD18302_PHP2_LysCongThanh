<?php

namespace app\core;

trait QueryBuilder
{
    protected $tableName = '';
    protected $where = '';
    protected $operator = '';
    protected $selectField = '*';
    protected $limit = '';
    protected $orderBy = '';
    protected $innerJoin = '';
    protected $insert = '';
    protected $leftJoin = '';
    protected $groupBy = '';

    /**
     * @param $tableName
     * @return $this
     */
    public function table($tableName): static
    {
        $this->tableName = $tableName;

        return $this;
    }

    /**
     * @param $field
     * @param $compare
     * @param $value
     * @return $this
     */
    public function where($field, $compare, $value): static
    {
        $this->operator = " WHERE";
        if (!empty($this->where)) {
            $this->operator = " AND ";
            $this->where .= "$this->operator $field $compare $value";
        } else {
            $this->where .= "$this->operator $field $compare $value";
        }
        return $this;
    }

    /**
     * @param $field
     * @param $compare
     * @param $value
     * @return $this
     */
    public function orWhere($field, $compare, $value): static
    {
        $this->operator = " WHERE ";
        if (!empty($this->where)) {
            $this->operator = " OR ";
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    /**
     * @param $field
     * @param $value
     * @return $this
     */
    public function whereLike($field, $value): static
    {
        $this->operator = " WHERE ";
        if (!empty($this->where)) {
            $this->operator = " AND ";
        }
        $this->where .= "$this->operator $field LIKE '%$value%'";

        return $this;
    }

    /**
     * @param $number
     * @param $offset
     * @return $this
     */
    public function limit($number, $offset = 0): static
    {
        $this->limit = " LIMIT $offset, $number";
        return $this;
    }

    /**
     * @param $field
     * @param $type
     * @return $this
     */
    public function orderBy($field, $type = 'ASC'): static
    {
        $fileArr = array_filter(explode(',', $field));
        if (!empty($fileArr && count($fileArr) >= 2)) {
            // SQL order by multi
            $this->orderBy = " ORDER BY " . implode(', ', $fileArr);
        } else {
            $this->orderBy = " ORDER BY " . $field . " " . $type;
        }
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function groupBy($field): static
    {
        $this->groupBy = " GROUP BY $field";
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function select($field = "*"): static
    {
        $this->selectField = $field;
        return $this;
    }


    /**
     * @param $tableName
     * @param $relationship
     * @return $this
     */
    public function join($tableName, $relationship): static
    {
        $this->innerJoin .= " INNER JOIN $tableName ON $relationship ";
        return $this;
    }

    /**
     * @param $tableName
     * @param $relationship
     * @return $this
     */
    public function leftJoin($tableName, $relationship): static
    {
        $this->leftJoin .= " LEFT JOIN $tableName ON $relationship ";
        return $this;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        /** @var TYPE_NAME $this */
        $sql = "SELECT $this->selectField FROM $this->tableName $this->innerJoin $this->leftJoin $this->where  $this->groupBy $this->orderBy $this->limit";
        $this->resetQuery();
        return $sql;
    }

    /**
     * @return void
     */
    public function resetQuery(): void
    {
        // reset field
        $this->tableName = '';
        $this->where  = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->groupBy = '';
        $this->innerJoin = '';
        $this->insert = '';
        $this->leftJoin = '';
    }
}