<?php

namespace Classes\Exceptions;

class AlreadyAddException extends AppException
{
    public function __construct($message)
    {
        parent::__construct(400, $message);
    }

}