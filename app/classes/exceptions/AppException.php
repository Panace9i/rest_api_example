<?php

namespace Classes\Exceptions;

use Phalcon\Exception;

class AppException extends Exception
{
    private $content;
    private $title;

    public function __construct(int $code, string $message, string $title = '', array $content = [], \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->content = $content;
        $this->title   = $title;
    }

    public function getContent(): array
    {
        return $this->content;
    }

//    public function getTitle()
//    {
//        if (!isset($this->title) || empty($this->title)) {
//            $path        = explode('\\', static::class);
//            $this->title = array_pop($path);
//        }
//
//        return $this->title;
//    }
}