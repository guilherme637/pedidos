<?php

namespace App\Validator\Constraint\Email;

use App\Validator\Email\EmailExistenteValidator;
use Symfony\Component\Validator\Constraint;

class ConstraintEmailExistente extends Constraint
{
    public string $message = 'Email já cadastrado';

    public function validatedBy()
    {
        return EmailExistenteValidator::class;
    }
}