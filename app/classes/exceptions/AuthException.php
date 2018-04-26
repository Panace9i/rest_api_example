<?php

namespace Classes\Exceptions;

class AuthException extends AppException
{
    public function __construct($message)
    {
        parent::__construct(401, $message);
    }

}