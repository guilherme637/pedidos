<?php

namespace App\Validator;

use App\Repository\ClienteRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class TelefoneExistenteValidator extends ConstraintValidator
{
    private ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function validate($value, Constraint $constraint)
    {
        if ($this->clienteRepository->existeTelefoneCadastrado($value)) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}