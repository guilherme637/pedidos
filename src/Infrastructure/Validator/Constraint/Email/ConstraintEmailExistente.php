<?php

namespace App\Infrastructure\Validator\Constraint\Email;

use App\Infrastructure\Validator\Email\EmailExistenteValidator;
use Symfony\Component\Validator\Constraint;

class ConstraintEmailExistente extends Constraint
{
    public string $message = 'Email já cadastrado';

    public function validatedBy()
    {
        return EmailExistenteValidator::class;
    }
}