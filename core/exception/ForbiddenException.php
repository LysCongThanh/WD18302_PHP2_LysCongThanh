<?php

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $message = "Bạn không đủ quyền để làm điều này !";
    protected $code = 403;

}