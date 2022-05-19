<?php

namespace App\Infrastructure\Exception;

class ValidatorException extends \InvalidArgumentException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}