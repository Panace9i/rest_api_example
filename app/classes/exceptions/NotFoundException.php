<?php

namespace Classes\Exceptions;

class NotFoundException extends AppException
{
    public function __construct($message)
    {
        parent::__construct(404, $message);
    }

}