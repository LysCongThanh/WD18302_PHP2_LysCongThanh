<?php

namespace app\core\exception;

class ServerErrorException extends \PDOException
{

    protected $code = 500;
    protected $message = 'Server Error !';

    public function __toString(): string
    {
        return "$this->code - Error !";
    }

}