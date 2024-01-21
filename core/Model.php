<?php

namespace app\core;

abstract class Model
{
    const RULE_REQUIRED = 'required';
    const RULE_EMAIL = 'email';
    const RULE_MIN = 'min';
    const RULE_MAX = 'max';
    const RULE_MATCH = 'match';
    const RULE_UNIQUE = 'unique';

    public array $errors = [];

    /**
     * @param $data
     * @return void
     */
    public function loadData($data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @return array
     */
    abstract public function attributes(): array;

    /**
     * @return array
     */
    public function labels(): array
    {
        return [];
    }

    /**
     * @param $attribute
     * @return mixed
     */
    public function getLabel($attribute): mixed
    {
        return $this->labels()[$attribute] ?? $attribute;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addErrorByRule($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorByRule($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrorByRule($attribute, self::RULE_MIN, ['min' => $rule['min']]);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorByRule($attribute, self::RULE_MAX, ['max' => $rule['max']]);
                }
                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $this->addErrorByRule($attribute, self::RULE_MATCH, ['match' => $rule['match']]);
                }
                if ($ruleName === self::RULE_UNIQUE) {
                    $className = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attribute;
                    $tableName = $className::tableName();
                    $db = Application::$app->db;
                    $statement = $db->prepare("SELECT * FROM $tableName WHERE $uniqueAttr = :$uniqueAttr");
                    $statement->bindValue(":$uniqueAttr", $value);
                    $statement->execute();
                    $record = $statement->fetchObject();
                    if ($record) {
                        $this->addErrorByRule($attribute, self::RULE_UNIQUE, ['field' => $attribute]);
                    }
                }
            }
        }
        return empty($this->errors);
    }

    /**
     * @return array{\app\core\Model.RULE_REQUIRED: string, \app\core\Model.RULE_EMAIL: string, \app\core\Model.RULE_MIN: string, \app\core\Model.RULE_MAX: string, \app\core\Model.RULE_MATCH: string, \app\core\Model.RULE_UNIQUE: string}
     */
    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Min length of this field must be {min}',
            self::RULE_MAX => 'Max length of this field must be {max}',
            self::RULE_MATCH => 'This field must be the same as {match}',
            self::RULE_UNIQUE => 'Record with with this {field} already exists',
        ];
    }

    /**
     * @param $rule
     * @return string
     */
    public function errorMessage($rule): string
    {
        return $this->errorMessages()[$rule];
    }

    /**
     * @param string $attribute
     * @param string $rule
     * @param array $params
     * @return void
     */
    protected function addErrorByRule(string $attribute, string $rule, array $params = []): void
    {
        $params['field'] ??= $attribute;
        $errorMessage = $this->errorMessage($rule);
        foreach ($params as $key => $value) {
            $errorMessage = str_replace("{{$key}}", $value, $errorMessage);
        }
        $this->errors[$attribute][] = $errorMessage;
    }

    /**
     * @param string $attribute
     * @param string $message
     * @return void
     */
    public function addError(string $attribute, string $message): void
    {
        $this->errors[$attribute][] = $message;
    }

    /**
     * @param $attribute
     * @return false|mixed
     */
    public function hasError($attribute): mixed
    {
        return $this->errors[$attribute] ?? false;
    }

    /**
     * @param $attribute
     * @return mixed|string
     */
    public function getFirstError($attribute): mixed
    {
        $errors = $this->errors[$attribute] ?? [];
        return $errors[0] ?? '';
    }
}