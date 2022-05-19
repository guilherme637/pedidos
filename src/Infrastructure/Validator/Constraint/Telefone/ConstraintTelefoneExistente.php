<?php

namespace App\Infrastructure\Validator\Constraint\Telefone;

use App\Infrastructure\Validator\TelefoneExistenteValidator;
use Symfony\Component\Validator\Constraint;

class ConstraintTelefoneExistente extends Constraint
{
    public string $message = 'Telefone já cadastrado';

    public function validatedBy()
    {
        return TelefoneExistenteValidator::class;
    }
}