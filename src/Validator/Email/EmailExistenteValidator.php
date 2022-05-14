<?php

namespace App\Validator\Email;

use App\Repository\ClienteRepository;
use App\Validator\Constraint\Email\ConstraintEmailExistente;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class EmailExistenteValidator extends ConstraintValidator
{
    public ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ConstraintEmailExistente) {
            throw new UnexpectedTypeException($constraint, ConstraintEmailExistente::class);
        }

        if (!is_null($this->clienteRepository->existeEmailCadastrado($value))) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}