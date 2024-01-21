<?php

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $message = "You don't have permission to do this !";
    protected $code = 403;

}