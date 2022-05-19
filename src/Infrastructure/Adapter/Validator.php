<?php

namespace App\Infrastructure\Adapter;

use App\Infrastructure\Exception\ValidatorException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator implements \App\Domain\Adapter\ValidatorInterface
{
    public function __construct(private ValidatorInterface $validator) {}

    public function validate($value)
    {
        $erros = $this->validator->validate($value);

        if ($erros->count() > 0) {
            $mensagem = $erros->get(0)->getMessage() . ' - ' . $erros->get(0)->getPropertyPath();
            throw new ValidatorException($mensagem);
        }
    }
}