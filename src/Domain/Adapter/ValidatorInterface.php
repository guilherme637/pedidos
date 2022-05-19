<?php

namespace App\Domain\Adapter;

use App\Infrastructure\Exception\ValidatorException;

interface ValidatorInterface
{
    /** @throws \App\Infrastructure\Exception\ValidatorException */
    public function validate($value);
}