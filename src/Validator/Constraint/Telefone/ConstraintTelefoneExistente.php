<?php

namespace App\Validator\Constraint\Telefone;

use App\Validator\TelefoneExistenteValidator;
use Symfony\Component\Validator\Constraint;

class ConstraintTelefoneExistente extends Constraint
{
    public string $message = 'Telefone já cadastrado';

    public function validatedBy()
    {
        return TelefoneExistenteValidator::class;
    }
}