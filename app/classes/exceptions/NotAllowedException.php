<?php

namespace Classes\Exceptions;

class NotAllowedException extends AppException
{
    public function __construct($message)
    {
        parent::__construct(405, $message);
    }

}