<?php 

namespace app\core\exception;

use Exception;

class BadRequestException extends Exception {

    protected $code = 400;
    protected $message = '400 Bad request !';

    public function __toString(): string
    {
        return '400 bad request';
    }

}

?>