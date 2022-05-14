<?php

namespace App\Domain\Adapter;

use App\Exception\ValidatorException;

interface ValidatorInterface
{
    /** @throws ValidatorException */
    public function validate($value);
}