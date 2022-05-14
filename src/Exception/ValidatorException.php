<?php

namespace App\Exception;

class ValidatorException extends \InvalidArgumentException
{
    public function __construct(string $message = "")
    {
        parent::__construct($message);
    }
}